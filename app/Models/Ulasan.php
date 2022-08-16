<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $guarded = ['id_ulasan'];
    protected $primaryKey = 'id_ulasan';
    protected $table = 'ulasan';

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'id_lokasi');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
