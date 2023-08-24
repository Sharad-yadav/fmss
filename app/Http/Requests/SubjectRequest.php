<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
        $subjectId = $this->route('subject'); // Get the subject ID if available

        return [
            'semester_id' => 'required|string|max:25',
            'code' => "required|string|max:25|unique:subjects,code,$subjectId,id", // Add the unique rule
            'name' => "required|string|max:25|unique:subjects,name,$subjectId,id", // Add the unique rule
            'credit_hour' => 'required|string|max:25',
        ];
    }

}
