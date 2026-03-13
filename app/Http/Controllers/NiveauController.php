<?php
namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Http\Requests\StoreNiveauRequest;
use App\Http\Requests\UpdateNiveauRequest;

class NiveauController extends Controller
{
    public function index()
    {
        $niveaux = Niveau::withCount('documents')->paginate(10);
        return view('niveaux.index', compact('niveaux'));
    }

    public function create()
    {
        return view('niveaux.create');
    }

    public function store(StoreNiveauRequest $request)
    {
        Niveau::create($request->validated());
        return redirect()->route('niveaux.index')
                         ->with('success', 'Niveau créé avec succès.');
    }

    public function show(Niveau $niveau)
    {
        $niveau->load('documents');
        return view('niveaux.show', compact('niveau'));
    }

    public function edit(Niveau $niveau)
    {
        return view('niveaux.edit', compact('niveau'));
    }

    public function update(UpdateNiveauRequest $request, Niveau $niveau)
    {
        $niveau->update($request->validated());
        return redirect()->route('niveaux.index')
                         ->with('success', 'Niveau mis à jour.');
    }

    public function destroy(Niveau $niveau)
    {
        $niveau->delete();
        return redirect()->route('niveaux.index')
                         ->with('success', 'Niveau supprimé.');
    }
}
