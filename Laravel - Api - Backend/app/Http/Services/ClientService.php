<?php

namespace App\Http\Services;

use App\Models\Client;
use App\Interfaces\ClientServiceInterface;

class ClientService implements ClientServiceInterface
{
    public function getClients(){
        
        $clients = Client::get();

        return $clients;
    }    
}