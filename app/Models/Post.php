<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Content;
use App\Models\Media;

class Post extends Model
{
    protected $keyType = 'string';

    public function category()
    {
        return $this->hasMany(Category::class, 'post_id')
            ->leftJoin('category_names as cn', 'categories.category_names_id', '=', 'cn.id')
            ->select([
                'cn.name',
                'categories.primary'
            ]);
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'post_id');
    }

    public function content()
    {
        return $this->hasMany(Content::class, 'post_id');
    }
}
