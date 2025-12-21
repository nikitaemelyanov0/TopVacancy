<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegestrationRequest extends FormRequest
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
            'user_name' => 'required|max:35',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed|max:35',
            'role' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Все поля обязательны для заполнения',
            'unique' => 'Пользователь с таким email уже существует',
            'min' => 'Пароль должен содержать минимум :min символов',
            'confirmed' => 'Пароли не совпадают',
            'max' => 'Максимум :max сиволов'
        ];
    }
}
