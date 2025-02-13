<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    function add_product(Request $request){
        $category = new Category();
        $category->name = $req ->Category_name;
        $category ->save();

    }
}
