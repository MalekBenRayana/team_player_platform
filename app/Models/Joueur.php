<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    protected $primaryKey = 'idjoueur'; 
    protected $fillable = [
        'nom',
        'prenom',
        'datenaissance',
        'id'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function likedByUsers()
{
    return $this->belongsToMany(User::class, 'likes', 'idjoueur', 'id');
}

public function likes()
{
    return $this->hasMany(Like::class, 'idjoueur');
}
}
