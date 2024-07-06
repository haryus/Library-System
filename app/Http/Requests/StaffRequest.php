<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StaffRequest extends FormRequest
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
            'firstName' => ['required','string','max:125'],
            'lastName' => ['required','string','max:125'],
            'position' => 'required|string',
            'email' => 'required|string|email|unique:staffs,email',
            'phoneNumber' => 'required|string',
            'hireDate' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'First Name is required!',
            'lastName.required' => 'Last Name is required!',
            'position.required' => 'Position is required!',
            'email.required' => 'Email is required!',
            'email.unique' => 'Email is already taken!',
            'phoneNumber.required' => 'Phone Number is required!',
            'hireDate.required' => 'Hire Date is required!',
        ];
    }
}
