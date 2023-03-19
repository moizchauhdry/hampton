<?php

namespace App\Http\Requests;

use App\Models\Booking;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string', 'max:255'],
            'user_email' => ['required', 'email', 'max:255'],
            'user_phone' => ['required', 'string', 'max:255'],

            'pickup' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],

            'passengers_no' => ['required', 'numeric'],
            'lugages_no' => ['required', 'numeric'],
            'vehicles_no' => ['required', 'numeric'],
            'flight_no' => ['required', 'string', 'max:255'],

            'price' => ['required', 'numeric'],
            'tip' => ['required', 'numeric'],
            'toll' => ['required', 'numeric'],
            'process_fee' => ['required', 'numeric'],
            'discount' => ['required', 'numeric'],

            'booking_date' => ['required', 'date'],
            'vehicle_name' => ['required', 'string', 'max:255'],
            'booking_plan' => ['required', 'string', 'max:255'],
            'payment_type' => ['required', 'string', 'max:255'],

            'additional_msg' => ['required', 'string', 'max:5000'],
        ];
    }
}
