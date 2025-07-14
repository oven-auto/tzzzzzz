<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApproveOrderController extends Controller
{
    public function __invoke()
    {   
        return response()->json([
            'name' => "ApproveOrderController"
        ]);
    }
}
