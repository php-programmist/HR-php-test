<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public static function getOptionsList()
    {
        return self::all()->pluck('name', 'id')->all();
    }
}
