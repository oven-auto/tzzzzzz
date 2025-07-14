<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderCreateRequest;
use App\Repositories\OrderRepository;

class CreateOrderController extends Controller
{
    private $repo; 

    public function __construct(OrderRepository $repo)
    {
        $this->repo = $repo;
    }



    public function index(OrderCreateRequest $request)
    {   
        return response()->json([
            'name' => "CreateOrderController"
        ]);
    }
}
