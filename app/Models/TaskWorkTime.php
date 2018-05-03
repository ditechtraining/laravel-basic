<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskWorkTime extends Model
{
    protected $dates = ['worked_in'];

    protected $fillable = [
        'worked_in',
        'time'
    ];
}
