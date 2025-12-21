<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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
            'position' => 'required|max:80',
            'company_name' => 'required|max:40',
            'logo' => 'nullable',
            'phone' => 'required|size:11|regex:/^[0-9]+$/',
            'address' => 'required|max:200',
            'salary' => 'required|numeric|max:100000000',
            'description' => 'required|max:4000'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Обязательно для заполнения',
            'size' => 'Номер телефона должен состоять из 11 цифр',
            'regex' => 'Номер телефона должен состоять из цифр',
            'numeric' => 'Ввод должен быть числом',
            'max' => 'Максимум :max сиволов'
        ];
    }
}
