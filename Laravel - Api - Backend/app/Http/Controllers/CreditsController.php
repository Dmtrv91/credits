<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCreditRequest;
use App\Http\Services\CreditService;

class CreditsController extends Controller
{
    private $creditService;
    
    public function __construct(){
        $this->creditService = new CreditService();
    }

    public function createCredit(CreateCreditRequest $request){

    return $this->creditService->createCredit($request);
    }
}
