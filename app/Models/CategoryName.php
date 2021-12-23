<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class CategoryName extends Model
{
    public function categoryName()
    {
        return $this->belongsTo(Category::class, 'id', 'category_names_id');
    }
}
