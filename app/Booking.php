<?php

namespace App;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Booking extends Eloquent
{
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'service',
        'customer',
        'staff',
    ];
}

/*use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
}
*/
