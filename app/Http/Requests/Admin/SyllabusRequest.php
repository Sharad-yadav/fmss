<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SyllabusRequest extends FormRequest
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
            'batch_id'=> 'required',
            'faculty_id'=> 'required',
            'semester_id'=> 'required',
            'subject_id'=> 'required',
            'name'=> 'required',
            'file'=> [
                'nullable',
                'file',
                'mimes:jpeg,png,gif,pdf,doc,docx',
                ],
        ];
    }
    public function messages()
    {
        return [
            'faculty_id.required' => 'The faculty id is required',
            'semester_id.required' => 'The semester id is required',
            'subject_id.required' => 'The subject id is required',
            'file.required' => 'The file is required',
            'batch_id.required' => 'The batch id is required'

        ];
    }
    public function validate()
    {
        parent::validate();

        // Your custom validation checks...
    }

}
