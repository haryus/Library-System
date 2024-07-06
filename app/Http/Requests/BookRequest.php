<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;

class BookRequest extends FormRequest
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
            'title' => ['required','string','max:125', Rule::unique('books')->ignore($this->route('book'))],
            'author' => 'required|integer',
            'isbn' => 'required|string',
            'genre' => 'integer|required',
            'publisher' => 'required|string',
            'publisherYear' => 'required|string',
            'price' => 'required|string',
            'stockQuantity' => 'required|numeric',
            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title is required!',
            'author.required' => 'author is required!',
            'isbn.required' => 'isbn is required!',
            'genre.required' => 'genre is required!',
            'publisher.required' => 'publisher is required!',
            'publisherYear.required' => 'Publisher Year is required!',
            'price.required' => 'price is required!',
            'stockQuantity.required' => 'stock quantity is required!',
            'img.image' => 'uploaded file must be an image!',
            'img.mimes' => 'only JPEG, PNG, JPG, and GIF images are allowed!',
            'img.max' => 'image must not be larger than 2MB!',
        ];
    }
}
