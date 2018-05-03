<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Project extends Model
{
    protected $fillable = ['name', 'description'];

    /**
     * @return BelongsTo
     */
    public function company() : BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return HasMany
     */
    public function tasks() : HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * @return MorphMany
     */
    public function comments() : HasMany
    {
        //return $this->morphMany('App\Models\Comment', 'commentable');
        return this->$this->hasMany(Comment::class)
    }
}
