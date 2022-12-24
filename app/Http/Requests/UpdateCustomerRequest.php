<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
            'work_category' => ['required', 'max:50'],
            'tel' => ['required', 'numeric'],
            'email' => ['max:50'],
            'postcode' => ['required', 'max:7'],
            'address' => ['max:255'],
            'person_in_charge1' => ['required', 'max:50'],
            'person_in_charge2' => ['max:50'],
            'person_in_charge3' => ['max:50'],
            'request_date' => ['required', 'date'],
            'memo' => ['required', 'max:500'],
        ];
    }
}