<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'idUtilisateur' => 'required|exists:utilisateurs,idUtilisateur',
            'idMatiere'     => 'required|exists:matieres,idMatiere',
            'idNiveau'      => 'required|exists:niveaux,idNiveau',
            'titre'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'fichier'       => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:20480',
        ];
    }
}