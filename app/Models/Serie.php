<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;
    protected $fillable = ['nome', ];


    public function series()
        {
            return $this->belongsTo(Serie::class); //temporada pertece a uma serie
        }
    public function episodes()
        {
            return $this->belongsTo( Episode::class);
        }

}