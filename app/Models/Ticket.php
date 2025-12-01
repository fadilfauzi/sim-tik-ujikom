<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'subject',
        'description',
        'image',
        'reporter_id',
        'technician_id',
        'priority',
        'status',
        'asset_id',
        'category_id',
    ];

    public function reporter()
    {
        // Pelapor tiket (reporter_id) adalah user
        return $this->belongsTo(User::class, 'reporter_id');
    }

    public function technician()
    {
        // Teknisi yang ditugaskan (technician_id) adalah user
        return $this->belongsTo(User::class, 'technician_id');
    }

    public function asset()
    {
        // Aset yang terkait dengan tiket
        return $this->belongsTo(Asset::class, 'asset_id');
    }

    public function category()
    {
        // Kategori yang terkait dengan tiket
        return $this->belongsTo(Category::class, 'category_id');
    }
}
