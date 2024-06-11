<?php

namespace App\Http\Requests;

class PaymentRequest extends Request
{
    public function rules()
    {
        return [
            'credit_number' => 'required|string|min:10',
            'month_contribution' => 'required|min:1|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }
}