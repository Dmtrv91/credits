<?php

namespace App\Http\Requests;

class CreateCreditRequest extends Request
{
    public function rules()
    {
        return [
            'first_name' => 'required|string|min:2',
            'middle_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'monthly_installments' => 'required|int|min:3|max:120',
            'sum_payment' => 'required|int|min:100|max:80000',
        ];
    }
}