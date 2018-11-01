<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public static function exists($category_id) {
        return self::find($category_id) ?? false;
    }

    public function freelancers()
    {
        return $this->hasMany('App\Models\Freelancer');
    }

    public function rfqs()
    {
        return $this->hasMany('App\Models\RFQ');
    }
}