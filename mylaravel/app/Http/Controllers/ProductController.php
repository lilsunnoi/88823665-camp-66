<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        return view('product.index', compact('categories'));
    }

    public function add_product(Request $request)
    {
        // Validate the request
        $request->validate([
            'category' => 'required|string|max:255',
            'product_name' => 'required|array',
            'product_name.*' => 'required|string|max:255',
        ]);

        // สร้าง Category ถ้ายังไม่มี
        $category = Category::firstOrCreate(['name' => $request->category]);

        // เพิ่ม Product
        foreach ($request->product_name as $productName) {
            Product::create([
                'name' => $productName,
                'category_id' => $category->id,
                'user_id' => auth()->id(), // ใช้ user ที่ login
            ]);
        }

        return redirect()->route('product.index')->with('success', 'Product added successfully');
    }
}
