<?php

namespace App\Http\Services;

use Carbon\Carbon;
use App\Models\Client;
use App\Interfaces\CreditServiceInterface;
use Illuminate\Http\Request;


class CreditService implements CreditServiceInterface
{
    private $creditYearRate = 7.9;
    private $creditIndex = "X0X0";
    private $maxCreditSum = 80000;

    public function createCredit(Request $request){
    //Checking whether the borrower has credits in the amount of 80,000, including new requests;

    $canHeGetCredit = $this->sumCredits($request->first_name, $request->middle_name, $request->last_name, $request->sum_payment);
    $generateCreditIndex = $this->generateCreditIndex();

       if(true === $canHeGetCredit){
        //If there are no credits in the amount of 80 000, we execute a new one
            $client = new Client();
            $client->first_name = $request->first_name;
            $client->middle_name = $request->middle_name;
            $client->last_name = $request->last_name;
            $client->credit_number =  $generateCreditIndex; 
            $client->sum_payment = $request->sum_payment;
            $client->monthly_installments = $request->monthly_installments;
            $client->month_contribution = $this->calculateMonthContribution($request->sum_payment,  $request->monthly_installments);
            $client->credit_created = Carbon::now();
            $client->credit_expired = Carbon::now()->modify("+$request->monthly_installments month");
            $client->save();

            return response('Success', 201);
       } else {
            return $canHeGetCredit;
       }
    }

    private function calculateMonthContribution($sumPayment, $monthlyInstallments){
        //We calculate the monthly import taking into account the annual interest rate of 7.9%
        $monthRateIndex = round(($this->creditYearRate / 12), 2);
        $monthlyPayment = round((($sumPayment / $monthlyInstallments) * $monthRateIndex), 2);

        return $monthlyPayment;
    }

    private function generateCreditIndex(){
    //Consider unique code X0X0 for credits and add datetimeNow from the year to the seconds for uniqueness
        $date = Carbon::now();
        $index = $this->creditIndex.
            $date->year.
            $date->month.
            $date->year.
            $date->hour.
            $date->minute.
            $date->second;

        return $index;
    }

    private function sumCredits($first_name, $middle_name, $last_name, $newSumPayment){
        
        //We sum up all the loans of a specific borrower and if it exceeds the amount of 80,000
        //we return an answer with exactly how much we exceed the allowable amount
        $sumCredits = Client::where('first_name', $first_name)
                ->where('middle_name', $middle_name)
                ->where('last_name', $last_name)
                ->sum('sum_payment');

        if(($sumCredits + $newSumPayment) > $this->maxCreditSum){
            //Calculate by how much it exceeds its limit returns it as a resul
            return $this->maxCreditSum - ($sumCredits + $newSumPayment);
        } else {
            return true;
        }
    }    
}