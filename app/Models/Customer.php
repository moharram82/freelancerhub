<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public static function customerExists($customer_id) {
        return self::find($customer_id) ?? false;
    }
}