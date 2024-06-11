<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Services\ClientService;

class ClientsController extends Controller
{
    private $clientsService;
    
    public function __construct(){
        $this->clientsService = new ClientService();
    }

    public function getClientList(){

        $output = $this->paginatedTemplate($this->clientsService->getClients()->count());
        $output['data'] = $this->clientsService->getClients()->forPage(request()->query('page', 1), request()->query('per_page', 10))->flatten();

        return $output;
    }
}
