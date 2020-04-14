<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";

    protected $fillable = [
        'userID',
        'adm',
        'date_of_birth',
        'first_name',
        'last_name',
        'classID',
        'last_promotion',
        'year_of_completion',
        'parentID',
        'parent2ID',
        'parent_relationship',
        'parent2_relationship',
        'superuser',
        'medical_notes',
        'other'
    ];
}
