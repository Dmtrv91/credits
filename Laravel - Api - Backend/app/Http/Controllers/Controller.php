<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function paginatedTemplate(int $total)
    {
        $page = (int)request()->query('page', 1);
        $items = request()->query('per_page', 10);

        $from = $total > 0 ? $page * $items - $items : $total;
        $to = ($from + $items) < $total ? $from + $items : $total;

        return [
            'paginator' => [
                'current_page' => $page,
                'total' => $items > 0 ? ceil($total / $items) : 0,
                'records' => $total,
                'per_page' => (int)$items,
                'items_from' => (int)$from + 1,
                'items_to' => (int)$to,
            ],
            'data' => [],
        ];
    }
}
