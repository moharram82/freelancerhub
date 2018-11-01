<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    public static function exists($subCategory_id) {
        return self::find($subCategory_id) ?? false;
    }

    public function freelancers()
    {
        $this->hasMany('App\Models\Freelancer', 'category_id', 'id');
    }

    public function rfqs()
    {
        $this->hasMany('App\Models\RFQ');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}