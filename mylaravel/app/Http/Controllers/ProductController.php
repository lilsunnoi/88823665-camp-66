<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\ProductList;

class ProductController extends Controller
{
    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $products = ProductList::with('category', 'user')->get(); // แก้จาก 'users' เป็น 'user'

        return view('product', compact('categories', 'products', 'users'));
    }



    public function insert(Request $req){
        $category = new Category();
        $category->name = $req->category_name;
        $category->save();

        foreach($req->product_name as $value){
            $product = new ProductList();
            $product->name = $value;
            $product->category_id = $category->id;
            if (session()->has('user')) {
                $product->user_id = session('user')->id;
                $product->save();
            } else {
                // Handle the case where the session user is not set
                return redirect('/product')->withErrors('User session not found.');
            }
        }
        return redirect('/product');
    }
}
