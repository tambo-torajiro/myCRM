<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
            'name' => ['required', 'max:50'],
            'tel' => ['required', 'numeric'],
            'employee_status' => ['max:10'],
            'emergency_name' => ['max:25'],
            'emergency_contact' => ['numeric'],
            'emergency_relation' => ['max:25'],
        ];
    }
}