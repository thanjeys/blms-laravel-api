<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\RoleResource;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Http\Request;

class AllSettingsController extends Controller
{

    public function products()
    {
        $products = Product::orderby('name')->get();

        return ProductResource::collection($products);
    }

    public function myrole()
    {
        return auth()->user()->role->slug;
    }

}
