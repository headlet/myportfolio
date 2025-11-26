<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{

    protected $fillable=[
        'skill_name',
        'skill_category',
        'skill_level'
    ];
}
