<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
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
            'profession' => 'required|max:80',
            'photo' => 'nullable',
            'phone' => 'required|size:11|regex:/^[0-9]+$/',
            'gender' => 'required',
            'city' => 'required|max:30',
            'date_of_birth' => 'required',
            'salary_expectation' => 'nullable|numeric|max:100000000',
            'education' => 'required',
            'educational_institution' => 'required',
            'description' => 'required|max:4000',
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
