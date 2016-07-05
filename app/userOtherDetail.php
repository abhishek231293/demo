<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class userOtherDetail extends Model
{
    protected $table = 'user_other_details';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id'
    ];
}
