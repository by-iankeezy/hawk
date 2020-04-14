<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = "teachers";

    protected $fillable = [
        'userID',
        'nationalID',
        'first_name',
        'last_name',
        'address',
        'city',
        'county',
        'classID',
        'superuser',
        'subject',
        'other'
    ];

    public function user() {
        return $this->belongsTo('App\User','id','userID');
    }
}
