<?php

namespace App\Http\Requests;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeacherRequest extends FormRequest
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
        $rules = [
            'user.name'     => 'required|string|max:25',
            'user.email' => 'required|email|unique:users,email,',
            'user.number'   => [
                'required',
                'string',
                Rule::unique('users', 'number')
            ],
            'salary'       => 'required|string',
            'faculty_id'   => 'required'
        ];
        if($this->method() == 'PATCH') {

            $rules['user.email'] = [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->route('teacher')->user_id)
            ];
        }
        return $rules;

    }

    public function messages() {
        return [
            'user.name.required' => 'The user name is required.',
            'user.email.required' => 'The user email is required.',
            'user.number.required' => 'The user number is required.',
            'salary.required' => 'The  salary is required.'

        ];
    }


}
