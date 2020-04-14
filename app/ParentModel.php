<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentModel extends Model
{
    protected $table = "parents";

    protected $fillable = [
        'userID',
        'nationalID',
        'first_name',
        'last_name',
        'address',
        'city',
        'county',
        'superuser',
        'other'
    ];
}
