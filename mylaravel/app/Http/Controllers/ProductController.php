<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductList;

class ProductController extends Controller
{
    public function index()
    {
        $users = User::all();
        $categories = Category::all();
        $products = ProductList::with('category', 'user')->get();

        return view('product', compact('categories', 'products', 'users'));
    }

    public function insert(Request $req)
{
    // Validate the request
    $req->validate([
        'category_name' => 'required|string|max:255',
        'product_name' => 'required|array',
        'product_name.*' => 'required|string|max:255',
    ]);

    // Create a new category
    $category = new Category();
    $category->name = $req->category_name;
    $category->save();

    // Retrieve the authenticated user
    $user = Auth::user();

    // Check if user is authenticated
    if (!$user) {
        return redirect('/login')->withErrors('You must be logged in to add products.');
    }

    // Loop through each product name and create a new product
    foreach ($req->product_name as $value) {
        $product = new ProductList();
        $product->name = $value;
        $product->category_id = $category->id;
        $product->user_id = $user->id;
        $product->save();
    }

    // Redirect to the products page
    return redirect('/products')->with('success', 'Products added successfully.');
}
}
