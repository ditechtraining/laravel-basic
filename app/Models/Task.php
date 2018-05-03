<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'name', 'deadline', 'estimated_time', 'status'
    ];

    /**
     * @return BelongsTo
     */
    public function projects() : BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function workTimes()
    {
        return $this->hasMany(TaskWorkTime::class, 'task_id');
    }
}