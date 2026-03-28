<?php

namespace App\Http\Requests;

use App\Models\ExtraService;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string','email', 'max:255'],
            'started_at' => ['required', 'date', 'after:today'],
            'total_participant' => 'required|integer|min:1',
            
            // ✅ UPDATED: Validation untuk multiple extra services
            'extra_services' => 'nullable|array',
            'extra_services.*.slug' => 'required|string',
            'extra_services.*.name' => 'required|string',
            'extra_services.*.price' => 'required|integer|min:0',
            'extra_services.*.quantity' => 'required|integer|min:0',
            'extra_service_price' => 'nullable|integer|min:0',
        ]; 
    }

    /**
     * Custom messages untuk validation
     */
    public function messages(): array
    {
        return [
            'started_at.after' => 'Tanggal booking harus setelah hari ini.',
            'total_participant.min' => 'Minimal 1 orang untuk booking.',
            'extra_services.*.quantity.min' => 'Quantity tidak boleh negatif.',
        ];
    }

    /**
     * Prepare data for validation - filter out items with 0 quantity
     */
    protected function prepareForValidation()
    {
        if ($this->has('extra_services')) {
            $extraServices = collect($this->extra_services)
                ->filter(function ($service) {
                    return isset($service['quantity']) && $service['quantity'] > 0;
                })
                ->values()
                ->toArray();

            $this->merge([
                'extra_services' => $extraServices,
            ]);
        }
    }
}