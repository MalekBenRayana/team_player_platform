<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisionclub extends Model
{
    use HasFactory;
    protected $fillable = [
        'iddivisionclub',
        'idas',
        'iddivision',
        'idclub'

    ];
}
