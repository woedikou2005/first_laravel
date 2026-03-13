<?php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Utilisateur;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with(['utilisateur', 'matiere', 'niveau'])
                             ->latest('dateUpload')
                             ->paginate(10);
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        $utilisateurs = Utilisateur::all();
        $matieres     = Matiere::all();
        $niveaux      = Niveau::all();
        return view('documents.create', compact('utilisateurs', 'matieres', 'niveaux'));
    }

    public function store(StoreDocumentRequest $request)
    {
        $data = $request->validated();

        // Enregistrement du fichier
        $data['fichier']     = $request->file('fichier')->store('documents', 'public');
        $data['dateUpload']  = now();

        Document::create($data);
        return redirect()->route('documents.index')
                         ->with('success', 'Document ajouté avec succès.');
    }

    public function show(Document $document)
    {
        $document->load(['utilisateur', 'matiere', 'niveau']);
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        $utilisateurs = Utilisateur::all();
        $matieres     = Matiere::all();
        $niveaux      = Niveau::all();
        return view('documents.edit', compact('document', 'utilisateurs', 'matieres', 'niveaux'));
    }

    public function update(UpdateDocumentRequest $request, Document $document)
    {
        $data = $request->validated();

        if ($request->hasFile('fichier')) {
            // Supprime l'ancien fichier
            Storage::disk('public')->delete($document->fichier);
            $data['fichier'] = $request->file('fichier')->store('documents', 'public');
        }

        $document->update($data);
        return redirect()->route('documents.index')
                         ->with('success', 'Document mis à jour.');
    }

    public function destroy(Document $document)
    {
        Storage::disk('public')->delete($document->fichier);
        $document->delete();
        return redirect()->route('documents.index')
                         ->with('success', 'Document supprimé.');
    }

    public function telecharger(Document $document)
    {
        return Storage::disk('public')->download($document->fichier, $document->titre);
    }
}
