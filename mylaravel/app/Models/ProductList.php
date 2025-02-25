<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductList extends Model
{
    public $timestamps = false;
    protected $table = 'product_list';

    // ความสัมพันธ์กับตาราง categories
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    // ความสัมพันธ์กับตาราง users (แก้จาก users เป็น user)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
