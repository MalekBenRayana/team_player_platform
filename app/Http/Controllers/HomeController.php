<?php

namespace App\Http\Controllers;
use App\Models\Joueur;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $joueurs = Joueur::withCount('likes')
            ->orderByDesc('likes_count')
            ->paginate(9);
        return view('dashboard', ['joueurs' => $joueurs]);
    }
}
