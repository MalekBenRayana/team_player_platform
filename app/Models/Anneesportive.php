<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anneesportive extends Model
{
    use HasFactory;
    protected $fillable = [
        'idas',
        'libelle',
        'datedebut',
        'datefin',

    ];
}
