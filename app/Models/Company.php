<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App
 */
class Company extends Model
{
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $fillable = [
        'name', 'email'
    ];

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
