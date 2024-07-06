<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GenreRequest extends FormRequest
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
             'genre' => ['required','string','max:125', Rule::unique('genres')->ignore($this->route('genre'))],
             'description' => 'required|string',
         ];
     }
 
     public function messages()
     {
         return [
             'genre.required' => 'Genre is required!',
             'description.required' => 'Biography is required!',
         ];
     }
}
