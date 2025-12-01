<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $fillable = [
        'name',
        'head_name',
    ];

    public function users()
    {
        // Satu divisi memiliki banyak user
        return $this->hasMany(User::class);
    }
}
