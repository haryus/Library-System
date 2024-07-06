<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'customerName' => ['required','string','max:125'],
            'bookID' => ['required','string','max:125'],
            'quantity' => 'required|string',
            'saleDate' => 'required|date',
            'totalPrice' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'customerName.required' => 'Customer Name is required!',
            'bookID.required' => 'Book is required!',
            'quantity.required' => 'Quantity is required!',
            'saleDate.required' => 'Sale Date is required!',
            'totalPrice.required' => 'Total Price is required!',
        ];
    }
}
