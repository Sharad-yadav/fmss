<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;


use Illuminate\Foundation\Http\FormRequest;

class SemesterRequest extends FormRequest
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
            'faculty_id'    => 'required|string|max:25',
            'name' => [
                'required',
                'string',
                'max:25',
                Rule::unique('semesters', 'name')->where('faculty_id', $this->input('faculty_id')),
            ],

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The semester is required.'];
    }
}
