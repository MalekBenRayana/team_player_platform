<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueurclub extends Model
{
    use HasFactory;
    protected $fillable = [
        'idjoueurclub',
        'idjoueur',
        'idclub',
        'datedebutcontrat',
        'datefin',
        'etat'

    ];
}
