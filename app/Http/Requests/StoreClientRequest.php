<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:clients',
            'phone_number' => 'required|numeric|unique:clients',
            'company_name' => 'required',
            'company_address' => 'required',
            'company_city' => 'required',
            'company_zip' => 'required|numeric',
            'company_tin' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ];
    }
}
