<?php

namespace App\Http\Controllers\Api\V1\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    private $repo;//этож 7 версия тут свойства в конструкторе нельзя указывать

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }



    public function __invoke()
    {   
        $products = $this->repo->getAll();

        return response()->json([
            'data' => $products,
            'success' => 1,
        ]);
    }
}
