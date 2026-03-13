<?php
namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Http\Requests\StoreUtilisateurRequest;
use App\Http\Requests\UpdateUtilisateurRequest;

class UtilisateurController extends Controller
{
    public function index()
    {
        $utilisateurs = Utilisateur::withCount(['documents', 'messages'])
                                   ->paginate(10);
        return view('utilisateurs.index', compact('utilisateurs'));
    }

    public function create()
    {
        return view('utilisateurs.create');
    }

    public function store(StoreUtilisateurRequest $request)
    {
        Utilisateur::create($request->validated());
        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur créé avec succès.');
    }

    public function show(Utilisateur $utilisateur)
    {
        $utilisateur->load(['documents.matiere', 'documents.niveau', 'messages']);
        return view('utilisateurs.show', compact('utilisateur'));
    }

    public function edit(Utilisateur $utilisateur)
    {
        return view('utilisateurs.edit', compact('utilisateur'));
    }

    public function update(UpdateUtilisateurRequest $request, Utilisateur $utilisateur)
    {
        $data = $request->validated();
        // Ne met à jour le mot de passe que s'il est fourni
        if (empty($data['motDePasse'])) {
            unset($data['motDePasse']);
        }
        $utilisateur->update($data);
        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur mis à jour.');
    }

    public function destroy(Utilisateur $utilisateur)
    {
        $utilisateur->delete();
        return redirect()->route('utilisateurs.index')
                         ->with('success', 'Utilisateur supprimé.');
    }
}
