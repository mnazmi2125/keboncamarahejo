<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingTransactionResource\Pages;
use App\Jobs\SendBookingApprovedEmail;
use App\Models\BookingTransaction;
use App\Models\ExtraService;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class BookingTransactionResource extends Resource
{
    protected static ?string $model = BookingTransaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getNavigationBadge(): ?string
    {
        return (string) BookingTransaction::where('is_paid', false)->count();
    }

    protected static ?string $navigationGroup = 'Transaction';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Product and Price')
                        ->schema([
                            Forms\Components\Select::make('ticket_id')
                                ->relationship('ticket', 'name')
                                ->searchable()
                                ->required()
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $set) {
                                    $ticket = Ticket::find($state);
                                    $set('price', $ticket ? $ticket->price : 0);
                                    self::recalculateTotal(fn($key) => null, $set);
                                }),

                            Forms\Components\TextInput::make('total_participant')
                                ->required()
                                ->numeric()
                                ->prefix('People')
                                ->reactive()
                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                    self::recalculateTotal($get, $set);
                                }),

                            Forms\Components\Section::make('Peralatan Camping Tambahan (Optional)')
                                ->schema([
                                    Repeater::make('extra_services_items')
                                        ->label('Pilih Peralatan')
                                        ->schema([
                                            Forms\Components\Select::make('service_slug')
                                                ->label('Peralatan')
                                                ->options(function () {
                                                    return ExtraService::active()
                                                        ->orderBy('name')
                                                        ->pluck('name', 'slug')
                                                        ->toArray();
                                                })
                                                ->required()
                                                ->reactive()
                                                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                                    if (!$state) return;
                                                    
                                                    $service = ExtraService::where('slug', $state)->first();
                                                    if ($service) {
                                                        $set('service_name', $service->name);
                                                        $set('service_price', $service->price);
                                                        
                                                        $quantity = $get('quantity') ?? 1;
                                                        $set('subtotal', $service->price * $quantity);
                                                    }
                                                })
                                                ->searchable(),

                                            Forms\Components\TextInput::make('quantity')
                                                ->label('Jumlah')
                                                ->numeric()
                                                ->default(1)
                                                ->minValue(1)
                                                ->required()
                                                ->reactive()
                                                ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                                    $price = $get('service_price') ?? 0;
                                                    $set('subtotal', $price * ($state ?? 1));
                                                }),

                                            Forms\Components\Hidden::make('service_name'),
                                            Forms\Components\Hidden::make('service_price'),

                                            Forms\Components\TextInput::make('subtotal')
                                                ->label('Subtotal')
                                                ->prefix('IDR')
                                                ->disabled()
                                                ->dehydrated(false),
                                        ])
                                        ->columns(3)
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, callable $get, callable $set) {
                                            self::recalculateTotal($get, $set);
                                        })
                                        ->addActionLabel('Tambah Peralatan')
                                        ->collapsed()
                                        ->itemLabel(fn (array $state): ?string => 
                                            ($state['service_name'] ?? 'Item') . 
                                            ' (' . ($state['quantity'] ?? 1) . 'x) - Rp ' . 
                                            number_format($state['subtotal'] ?? 0, 0, ',', '.')
                                        ),
                                ])
                                ->collapsible(),

                            Forms\Components\TextInput::make('extra_service_price')
                                ->label('Total Harga Peralatan Tambahan')
                                ->numeric()
                                ->prefix('IDR')
                                ->disabled()
                                ->dehydrated()
                                ->helperText('Total dari semua peralatan yang dipilih'),

                            Forms\Components\TextInput::make('total_amount')
                                ->required()
                                ->numeric()
                                ->prefix('IDR')
                                ->disabled()
                                ->dehydrated()
                                ->helperText('Total keseluruhan: Tiket + Peralatan'),
                        ]),

                    Forms\Components\Wizard\Step::make('Customer Information')
                        ->schema([
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('phone_number')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('email')
                                ->required()
                                ->maxLength(255),

                            Forms\Components\TextInput::make('booking_trx_id')
                                ->required()
                                ->maxLength(255),
                        ]),

                    Forms\Components\Wizard\Step::make('Payment Information')
                        ->schema([
                            ToggleButtons::make('is_paid')
                                ->label('Apakah sudah membayar?')
                                ->boolean()
                                ->grouped()
                                ->icons([
                                    true => 'heroicon-o-pencil',
                                    false => 'heroicon-o-clock',
                                ])
                                ->required(),

                            Forms\Components\FileUpload::make('proof')
                                ->image()
                                ->required(),

                            Forms\Components\DatePicker::make('started_at')
                                ->required(),
                        ]),
                ])
                    ->columnSpan('full')
                    ->columns(1)
                    ->skippable()
            ]);
    }

    protected static function recalculateTotal(callable $get, callable $set): void
    {
        $price = $get('price') ?? 0;
        $participants = $get('total_participant') ?? 1;
        
        if ($participants >= 10) {
            $price = $price * 0.9;
        }
        
        $ticketTotal = $price * $participants;
        
        $extraServicesItems = $get('extra_services_items') ?? [];
        $extraServicesTotal = 0;
        
        foreach ($extraServicesItems as $item) {
            if (isset($item['service_price']) && isset($item['quantity'])) {
                $extraServicesTotal += $item['service_price'] * $item['quantity'];
            }
        }
        
        $set('extra_service_price', $extraServicesTotal);
        $set('total_amount', $ticketTotal + $extraServicesTotal);
    }

    // ✅ Helper function untuk process extra services data
    public static function processExtraServicesData(array $data): array
    {
        if (isset($data['extra_services_items']) && is_array($data['extra_services_items'])) {
            $extraServicesData = [];
            $serviceNames = [];
            
            foreach ($data['extra_services_items'] as $item) {
                if (isset($item['service_slug']) && isset($item['quantity']) && $item['quantity'] > 0) {
                    $extraServicesData[] = [
                        'slug' => $item['service_slug'],
                        'name' => $item['service_name'] ?? '',
                        'price' => $item['service_price'] ?? 0,
                        'quantity' => $item['quantity'],
                        'subtotal' => ($item['service_price'] ?? 0) * $item['quantity'],
                    ];
                    
                    $serviceNames[] = ($item['service_name'] ?? $item['service_slug']) . ' (' . $item['quantity'] . 'x)';
                }
            }
            
            $data['extra_services_data'] = !empty($extraServicesData) ? json_encode($extraServicesData) : null;
            $data['extra_service'] = !empty($serviceNames) ? implode(', ', $serviceNames) : null;
            
            unset($data['extra_services_items']);
        }
        
        return $data;
    }

    // ✅ Helper function untuk load data ke form
    public static function loadExtraServicesData(array $data): array
    {
        if (isset($data['extra_services_data'])) {
            $services = is_string($data['extra_services_data']) 
                ? json_decode($data['extra_services_data'], true) 
                : $data['extra_services_data'];
            
            if (is_array($services) && !empty($services)) {
                $data['extra_services_items'] = array_map(function($service) {
                    return [
                        'service_slug' => $service['slug'] ?? '',
                        'service_name' => $service['name'] ?? '',
                        'service_price' => $service['price'] ?? 0,
                        'quantity' => $service['quantity'] ?? 1,
                        'subtotal' => $service['subtotal'] ?? 0,
                    ];
                }, $services);
            }
        }
        
        return $data;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('ticket.thumbnail'),

                Tables\Columns\TextColumn::make('name')
                    ->searchable(),

                Tables\Columns\TextColumn::make('booking_trx_id')
                    ->searchable(),

                Tables\Columns\TextColumn::make('extra_services_data')
                    ->label('Peralatan Tambahan')
                    ->badge()
                    ->formatStateUsing(function ($state): string {
                        if (empty($state)) return 'Tidak ada';
                        
                        $services = is_string($state) ? json_decode($state, true) : $state;
                        if (!is_array($services) || empty($services)) return 'Tidak ada';
                        
                        return collect($services)
                            ->map(fn($s) => ($s['name'] ?? 'Item') . ' (' . ($s['quantity'] ?? 1) . 'x)')
                            ->join(', ');
                    })
                    ->wrap()
                    ->color(fn ($state): string => !empty($state) ? 'success' : 'gray'),

                Tables\Columns\TextColumn::make('extra_service_price')
                    ->label('Harga Tambahan')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_amount')
                    ->label('Total Bayar')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_paid')
                    ->boolean()
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->label('Terverifikasi'),
            ])
            ->filters([
                SelectFilter::make('ticket_id')
                    ->label('Tiket')
                    ->relationship('ticket', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),

                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->action(function (BookingTransaction $record) {
                        $record->is_paid = true;
                        $record->save();

                        SendBookingApprovedEmail::dispatch($record);

                        Notification::make()
                            ->title('Transaction Approved')
                            ->success()
                            ->body('The booking transaction has been approved.')
                            ->send();
                    })
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (BookingTransaction $record) => !$record->is_paid),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBookingTransactions::route('/'),
            'create' => Pages\CreateBookingTransaction::route('/create'),
            'edit' => Pages\EditBookingTransaction::route('/{record}/edit'),
        ];
    }
}