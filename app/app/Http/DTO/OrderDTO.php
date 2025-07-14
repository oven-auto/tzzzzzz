<?php

namespace App\Http\DTO;

Class OrderDTO
{
    public int $client_id;
    public array $products;//поидее ValueObject было бы не плохо сделать, но это же ТЗ

    public function __construct(int $client_id, array $products)
    {
        $this->client_id = $client_id;
        $this->products = $products;
    }



    public static function fromArray(array $data)
    {
        return new self(
            $data['client_id'], $data['products']
        );
    }
}