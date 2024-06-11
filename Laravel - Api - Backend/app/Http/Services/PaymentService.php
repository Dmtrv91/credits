<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Payment;
use App\Http\Requests\PaymentRequest;
use App\Interfaces\PaymentServiceInterface;

class PaymentService implements PaymentServiceInterface
{
    public function creditPayment(PaymentRequest $request){

        $isClient = Client::where("credit_number", $request->credit_number)->first();

        if(null != $isClient){
            $client = Client::where('credit_number', $request->credit_number)->first();
            //If the current payment is greater than required, we return the excess as a result
            if( $request->month_contribution > $client->month_contribution){
                $changeReturned = $request->month_contribution - $client->month_contribution;
    
                return $changeReturned;
            }
    
            $payment = new Payment();
            $payment->client_id = $client->id;
            $payment->month_contribution = $request->month_contribution;
            $payment->date_payment = Carbon::now();
            $payment->save();

            return response('Success', 201);
        }
        return response('No results were found for these parameters ', 423);
    }

    public function getCreditNumbers(){
        $credits = Client::get("credit_number")->toArray();

        $creditNumbers = [];

        foreach(array_values($credits) as $k => $v):
            array_push($creditNumbers, $v['credit_number']);
        endforeach;

        return $creditNumbers;
    }

}