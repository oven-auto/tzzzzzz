<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\OrderCreateRequest;
use App\Http\Resources\Order\OrderItemResource;
use App\Models\Order;
use App\Repositories\OrderRepository;

class CreateOrderController extends Controller
{
    private $repo; 

    public function __construct(OrderRepository $repo)
    {
        $this->repo = $repo;
    }



    public function __invoke(OrderCreateRequest $request)
    {   
        $order = $this->repo->create($request->getDTO());

        return new OrderItemResource($order);
    }
}
