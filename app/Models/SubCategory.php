<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    public static function subCategoryExists($subCategory_id) {
        return self::find($subCategory_id) ?? false;
    }
}