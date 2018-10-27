<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public static function categoryExists($category_id) {
        return self::find($category_id) ?? false;
    }
}