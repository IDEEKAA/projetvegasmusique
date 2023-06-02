<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artiste extends Model
{
    use HasFactory;

    protected $fillable = ['nom','art_desc'];

    public function musiques()
    {
//retourne la collection de musiques pour une playlist
        return $this->belongsToMany(Musique::class);
    }
}
