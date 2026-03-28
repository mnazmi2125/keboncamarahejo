<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExtraServiceResource\Pages;
use App\Models\ExtraService;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ExtraServiceResource extends Resource
{
    protected static ?string $model = ExtraService::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-plus';

    protected static ?string $navigationLabel = 'Extra Services';

    protected static ?string $modelLabel = 'Extra Service';

    protected static ?string $navigationGroup = 'Master Data';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Extra Service Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Extra Service')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => 
                                $set('slug', \Illuminate\Support\Str::slug($state))
                            )
                            ->helperText('Contoh: Kavling Tenda 2m x 2m, Tenda 2x2, Matras')
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('slug')
                            ->label('Slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->helperText('Otomatis dibuat dari nama. Contoh: kavling-tenda-2m-x-2m')
                            ->disabled()
                            ->dehydrated()
                            ->columnSpanFull(),

                        Forms\Components\TextInput::make('price')
                            ->label('Harga')
                            ->required()
                            ->numeric()
                            ->prefix('Rp')
                            ->minValue(0)
                            ->helperText('Masukkan harga dalam Rupiah')
                            ->columnSpan(1),

                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->required()
                            ->default(true)
                            ->helperText('Extra service aktif dan bisa dipilih customer')
                            ->columnSpan(1),

                        Forms\Components\Select::make('ticket_id')
                            ->label('Khusus Untuk Ticket (Opsional)')
                            ->options(Ticket::pluck('name', 'id'))
                            ->searchable()
                            ->nullable()
                            ->helperText('Kosongkan jika extra service berlaku untuk semua ticket')
                            ->columnSpanFull(),

                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Deskripsi tambahan tentang extra service ini (opsional)')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),

                Tables\Columns\TextColumn::make('ticket.name')
                    ->label('Untuk Ticket')
                    ->default('Semua Ticket')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('Semua')
                    ->trueLabel('Aktif')
                    ->falseLabel('Tidak Aktif'),

                Tables\Filters\SelectFilter::make('ticket_id')
                    ->label('Ticket')
                    ->relationship('ticket', 'name')
                    ->placeholder('Semua Ticket'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListExtraServices::route('/'),
            'create' => Pages\CreateExtraService::route('/create'),
            'edit' => Pages\EditExtraService::route('/{record}/edit'),
        ];
    }
}