<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateOrderController extends Controller
{
    public function __invoke()
    {   
        return response()->json([
            'name' => "CreateOrderController"
        ]);
    }
}
