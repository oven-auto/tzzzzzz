<?php

namespace App\Http\Controllers\Api\V1\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderItemResource;
use App\Repositories\OrderRepository;
use Illuminate\Http\Request;

class ApproveOrderController extends Controller
{
    private $repo; 

    public function __construct(OrderRepository $repo)
    {
        $this->repo = $repo;
    }



    //можно забиндить, но убедился что лучше вызывать самому. Ведь где то надо что то подгрузить, где то выводить в том числе и удаленные
    //лучше когда вся логика в методе сервиса хранится, в нем я сразу увижу что подгружаю жадно, и когда удаленные включены 
    public function __invoke(int $orderId)
    {
        $order = $this->repo->approve($orderId);

        return new OrderItemResource($order);
    }
}
