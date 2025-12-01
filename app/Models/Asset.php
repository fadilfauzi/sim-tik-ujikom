<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'asset_tag',
        'name',
        'category_id',
        'serial_number',
        'status',
        'location',
        'purchase_date',
    ];

    public function category()
    {
        // Setiap aset adalah milik satu kategori
        return $this->belongsTo(Category::class);
    }
}
