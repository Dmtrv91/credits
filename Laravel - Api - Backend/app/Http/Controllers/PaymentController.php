<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentRequest;
use App\Http\Services\PaymentService;

class PaymentController extends Controller
{
    private $paymentService;
    
    public function __construct(){
        $this->paymentService = new PaymentService();
    }
    public function creditPayment(PaymentRequest $request){

        return $this->paymentService->creditPayment($request);
    }

    public function getCreditNumbers(){

        return $this->paymentService->getCreditNumbers();
    }
}
