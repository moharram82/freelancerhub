<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'offers';

    public static function proposalExists($proposal_id) {
        return self::find($proposal_id) ?? false;
    }
}