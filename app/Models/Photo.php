<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = [
        "judul_foto",
        "deskripsi_foto",
        "tanggal_unggah",
        "image",
        "album_id",
        "user_id",
    ] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
