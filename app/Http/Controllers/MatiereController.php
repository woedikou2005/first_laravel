<?php
namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Http\Requests\StoreMatiereRequest;
use App\Http\Requests\UpdateMatiereRequest;

class MatiereController extends Controller
{
    public function index()
    {
        $matieres = Matiere::withCount('documents')->paginate(10);
        return view('matieres.index', compact('matieres'));
    }

    public function create()
    {
        return view('matieres.create');
    }

    public function store(StoreMatiereRequest $request)
    {
        Matiere::create($request->validated());
        return redirect()->route('matieres.index')
                         ->with('success', 'Matière créée avec succès.');
    }

    public function show(Matiere $matiere)
    {
        $matiere->load('documents');
        return view('matieres.show', compact('matiere'));
    }

    public function edit(Matiere $matiere)
    {
        return view('matieres.edit', compact('matiere'));
    }

    public function update(UpdateMatiereRequest $request, Matiere $matiere)
    {
        $matiere->update($request->validated());
        return redirect()->route('matieres.index')
                         ->with('success', 'Matière mise à jour.');
    }

    public function destroy(Matiere $matiere)
    {
        $matiere->delete();
        return redirect()->route('matieres.index')
                         ->with('success', 'Matière supprimée.');
    }
}
