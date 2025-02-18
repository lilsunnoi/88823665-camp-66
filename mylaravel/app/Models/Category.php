<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // กำหนดชื่อตาราง

    public function products()
    {
        return $this->hasMany(ProductList::class, 'category_id');
    }
}
