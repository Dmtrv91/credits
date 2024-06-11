<?php

namespace App\Interfaces;

use App\Http\Requests\CreateCreditRequest;

interface CreditServiceInterface {
    public function createCredit(CreateCreditRequest $request);
}  