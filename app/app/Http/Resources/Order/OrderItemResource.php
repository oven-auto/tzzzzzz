<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Client\ClientItemResource;
use App\Http\Resources\Product\ProductOrderResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => [
                'id' => $this->id,
                'client' => new ClientItemResource($this->client),
                'status' => $this->status,
                'products' => ProductOrderResource::collection($this->products),
            ],
            'success' => 1,
        ];
    }
}
