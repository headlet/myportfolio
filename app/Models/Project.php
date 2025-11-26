<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public const statuses=['starting','ongoing','completed'];
    //
    protected $fillable=[
        'name',
        'description',
        'status',
        'image',
        'start_date',
        'end_date',
        'source',
        'live'
    ];
}
