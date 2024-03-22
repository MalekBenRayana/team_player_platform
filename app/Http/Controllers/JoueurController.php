<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Joueur;
use App\Models\Like;

use Illuminate\Support\Facades\Auth;


class JoueurController extends Controller
{
    public function create()
    {
        return view('joueurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'idjoueur',
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'datenaissance' => 'required|date',
        ]);

    $existingJoueur = Joueur::where('id', Auth::id())->first();

    if ($existingJoueur) {
        return redirect()->route('joueurs.create')->with('error', 'Vous avez déjà crée votre espace joueur.');
    }


        

        $joueur = new Joueur([
            'idjoueur',
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'datenaissance' => $request->input('datenaissance'),
            'id' => Auth::id(), 
        ]);

        $joueur->save();

        return redirect()->route('joueurs.interface', ['joueur' => $joueur->idjoueur]);
    }

    public function interface($idjoueur)
    {
        $joueur = Joueur::findOrFail($idjoueur);

        return view('joueurs.interface', compact('joueur'));
    }

    public function edit($idjoueur)
{
    $joueur = Joueur::findOrFail($idjoueur);

    return view('joueurs.edit', compact('joueur'));
}


public function update(Request $request, $idjoueur)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'datenaissance' => 'required|date',
    ]);

    $joueur = Joueur::findOrFail($idjoueur);
    $joueur->update([
        'nom' => $request->input('nom'),
        'prenom' => $request->input('prenom'),
        'datenaissance' => $request->input('datenaissance'),
    ]);

    return redirect()->route('joueurs.interface', ['joueur' => $joueur->idjoueur])->with('success', 'Les modifications ont été enregistrées.');
}




public function destroy($idjoueur)
{
    $joueur = Joueur::findOrFail($idjoueur);
    $joueur->delete();

    return redirect()->route('home')->with('success', 'Votre espace joueur a été supprimé avec succès.');
}

public function search(Request $request)
{
    $search = $request->input('search');

    $joueurs = Joueur::where('nom', 'like', "%$search%")
                     ->orWhere('prenom', 'like', "%$search%")
                     ->paginate(10);

    return view('dashboard', compact('joueurs'));
}


public function show($idjoueur)
{
    $joueur = Joueur::findOrFail($idjoueur);
    return view('joueurs.show', compact('joueur'));
}

public function like($idjoueur)
{
    $joueur = Joueur::findOrFail($idjoueur);

    $like = Like::where('id', Auth::id())->where('idjoueur', $idjoueur)->first();

    if ($like) {
        $like->delete();
    } else {
        Like::create([
            'id' => Auth::id(),
            'idjoueur' => $idjoueur,
        ]);
    }

    return redirect()->back();
}



}
