<?php

namespace App\Filament\Resources\BookingTransactionResource\Pages;

use App\Filament\Resources\BookingTransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBookingTransaction extends EditRecord
{
    protected static string $resource = BookingTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // ✅ Load data dari database ke form (untuk View/Edit)
    protected function mutateFormDataBeforeFill(array $data): array
    {
        return BookingTransactionResource::loadExtraServicesData($data);
    }

    // ✅ Process data sebelum update ke database
    protected function mutateFormDataBeforeSave(array $data): array
    {
        return BookingTransactionResource::processExtraServicesData($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}