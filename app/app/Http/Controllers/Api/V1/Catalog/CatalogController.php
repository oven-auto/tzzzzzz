<?php

namespace App\Http\Controllers\Api\V1\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __invoke()
    {   
        return response()->json([
            'name' => "CatalogController"
        ]);
    }
}
