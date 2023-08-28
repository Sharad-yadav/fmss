<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SectionRequest extends FormRequest
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

            'semester_id' => 'required',
            'name' => [
                'required',
                'string',
                'max:25',
                Rule::unique('sections')->where(function ($query) {
                    $query->where('semester_id', $this->input('semester_id'));
                }),
            ],
        ];
    }
    public function messages()
    {
        return [
            'semester_id.required' => 'The semester id is required',
            'name.required' => 'The Section is required'

        ];
    }
}
