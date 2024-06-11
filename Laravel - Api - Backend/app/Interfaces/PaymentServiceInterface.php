<?php

namespace App\Interfaces;

use App\Http\Requests\PaymentRequest;

interface PaymentServiceInterface {
    public function creditPayment(PaymentRequest $request);
    public function getCreditNumbers();
}  