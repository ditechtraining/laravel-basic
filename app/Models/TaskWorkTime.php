<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskWorkTime extends Model
{
    public $timestamps = false;

    protected $dates = ['worked_in'];

    protected $fillable = [
        'worked_in',
        'time'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
