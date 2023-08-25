<?php

namespace App\Http\Requests\Teacher;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
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
            'faculty_id' => 'required','string','max:25',
            'semester_id' => 'required','string','max:25',
            'subject_id' => 'required','string','max:25',
            'name' => 'required','string','max:25',
            'note' => [
                'nullable',
                'file',
                'mimes:jpeg,png,gif,pdf,doc,docx',
            ],



        ];
    }
}
