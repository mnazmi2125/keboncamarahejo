<?php

namespace App\Filament\Resources\BookingTransactionResource\Pages;

use App\Filament\Resources\BookingTransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBookingTransaction extends CreateRecord
{
    protected static string $resource = BookingTransactionResource::class;

    // ✅ Process data sebelum disimpan ke database
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return BookingTransactionResource::processExtraServicesData($data);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}