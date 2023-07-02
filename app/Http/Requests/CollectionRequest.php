<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->tokenCan('user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "pickup_longitude" => "required",
            "pickup_latitude" => "required",
            "pickup_address" => "required",
            "pickup_name" => "required",
            "pickup_phone" => "required",
            "deliver_longitude" => "required",
            "deliver_latitude" => "required",
            "deliver_address" => "required",
            "deliver_name" => "required",
            "deliver_phone" => "required",
        ];
    }
}
