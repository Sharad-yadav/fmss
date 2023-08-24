<?php

namespace App\Http\Requests;

use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

        $rules = [
            'user.name'     => 'required|string|max:25',
            'user.email'    => 'required|email|unique:users,email',
            'faculty_id'    => 'required|string|max:25',
            'batch_id'      => 'required|string|max:25',
            'semester_id'   => 'required|string|max:25',
            'section_id'    => 'required|string|max:25',
            'user.number'   => [
                'required',
                'string',
                Rule::unique('users', 'number')
            ],
        ];
        if($this->method() == 'PATCH') {
            $student = Student::find($this->route('student'));
//            dd($student);

            $rules['user.email'] = [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($student->user_id)
            ];
        }
        return $rules;

    }
     public function messages() {
        return [
            'user.name.required' => 'The user name is required.',
            'user.email.required' => 'The user email is required.',
            'user.number.required' => 'The user phone is required.'




        ];
    }
}
