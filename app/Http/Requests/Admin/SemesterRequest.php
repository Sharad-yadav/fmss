<?php

namespace App\Http\Requests\Admin;

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
            'batch_id' => 'required',
            'faculty_id' => 'required',
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'faculty_id.required' => 'The faculty is required',
          'batch_id.required' => 'The batch is required'
        ];
    }
}
