<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class url extends Model
{
    //
    public $timestamps = false;

    protected $fillable = ['url','shortened'];

    
    public static function get_unique_short_url()
    {
        $shortened = str_random(5);

        if (static::whereShortened($shortened)->first()) {
            # code...
            return static::get_unique_short_url();
        }

        return $shortened;
    }
}
