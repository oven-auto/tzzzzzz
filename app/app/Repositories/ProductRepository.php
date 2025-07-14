<?php

namespace App\Repositories;

use App\Models\Product;

Class ProductRepository
{
    private const PERPAGE = 20;

    public function getAll()
    {
        $products = Product::get();

        return $products;
    }



    public function paginate()
    {
        $products = Product::query()->simplePaginate(self::PERPAGE);

        return $products;
    }
}