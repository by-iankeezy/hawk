<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activities";

    protected $fillable = [
        'userID',
        'activity',
        'status',
        'ip',
        'country_code',
        'country',
        'type',
        'user_agent'
    ];


}
