<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatevehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'type' => ['required', 'max:50'],
            'car_number' => ['required', 'max:50'],
            'body_type' => ['max:50'],
            'registration_date' => ['max:50'],
            'inspection_date' => ['required','max:50'],
            'start_milage' => ['numeric'],
        ];
    }
}