<?php

namespace App\Http\Requests;
use App\Models\Faculty;
use Illuminate\Validation\Rule;


use Illuminate\Foundation\Http\FormRequest;

class FacultyRequest extends FormRequest
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

        $rules =  [
            'name' => [
                'required',
                'max:25',
                Rule::unique('faculties', 'name')
            ],
            'years_to_graduate' => 'required|string',
        ];
        if($this->method() == 'PATCH') {
            $rules['name'] = [
                'required',
                'max:25',
                Rule::unique('faculties', 'name')->ignore($this->route('faculty')->id)->whereNull('deleted_at')
            ];
        }
        return $rules;
    }
    public function messages() {
        return [
            'years_to_graduate.required' => 'The Duration is required.',

        ];
    }
}
