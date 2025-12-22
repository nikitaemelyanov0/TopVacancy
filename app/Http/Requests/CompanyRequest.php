<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'user_id' => '',
            'company_name' => 'required|max:40',
            'email' => 'required',
            'logo' => 'nullable',
            'phone' => 'required|size:11|regex:/^[0-9]+$/',
            'address' => 'required|max:200',
            'description' => 'required|max:4000'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Обязательно для заполнения',
            'size' => 'Номер телефона должен состоять из 11 цифр',
            'regex' => 'Номер телефона должен состоять из цифр',
            'max' => 'Максимум :max сиволов'
        ];
    }
}
