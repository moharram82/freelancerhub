<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    public static function reviewExists($review_id) {
        return self::find($review_id) ?? false;
    }
}