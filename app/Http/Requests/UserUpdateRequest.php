<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'name.max' => 'Name cannot exceed 255 characters',
            'password.required' => 'Password is required',
            'password.min' => 'Password must not be less than 6 characters',
            'password_confirm.required' => 'Password Confirm is required',
            'password_confirm.same' => 'Password Confirm must be the same as Password'
        ];
    }
}
