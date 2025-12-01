<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function assets()
    {
        // Satu kategori memiliki banyak aset
        return $this->hasMany(Asset::class);
    }
}
