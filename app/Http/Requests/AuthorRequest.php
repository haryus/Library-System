<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:125', Rule::unique('authors')->ignore($this->route('author'))],
            'biography' => 'required|string',
            'nationality' => 'required|string',
            'birthData' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'biography.required' => 'Biography is required!',
            'nationality.required' => 'Nationality is required!',
            'birthData.required' => 'Birth Date is required!',
        ];
    }
}
