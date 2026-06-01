<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [

        'user_id',

        'course_name',

        'start_date',

        'payment_method',

        'status',

        'review',
    ];

    /*
    |--------------------------------------------------------------------------
    | USER
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
