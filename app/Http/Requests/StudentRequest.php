<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user.name'    => 'required|string|max:25',
            'user.email'   => 'required|email|unique:users,email',

            'user.faculty' => 'required|string|max:25',
            'user.batch'   => 'required|string|max:25',
            'user.semester'=> 'required|string|max:25',

            'user.section' => 'required|string|max:25',

            'user.phone'   => 'required|string|',


        ];
    }
     public function messages() {
        return [
            'user.name.required' => 'The user name is required.'
        ];
    }
}