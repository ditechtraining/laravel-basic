<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'comment'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
