<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    protected $fillable = [
        'Mname',
        'Mpic',
        'Mlink',
        'description',
        'year',
        'Cid',
        'Mos',
        'createdby_id',
        'view_count',
    ];
}
