<?php

namespace App\Http\Controllers\Api\V1\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __invoke()
    {   
        $products = Product::get();

        return response()->json([
            'data' => $products
        ]);
    }
}
