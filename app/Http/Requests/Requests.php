<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// ── Matiere ──────────────────────────────────────────────────────────────────
class StoreMatiereRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() { return ['nomMatiere' => 'required|string|max:100']; }
}
class UpdateMatiereRequest extends StoreMatiereRequest {}

// ── Niveau ───────────────────────────────────────────────────────────────────
class StoreNiveauRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() { return ['nomNiveau' => 'required|string|max:100']; }
}
class UpdateNiveauRequest extends StoreNiveauRequest {}

// ── Utilisateur ──────────────────────────────────────────────────────────────
class StoreUtilisateurRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
        return [
            'nom'        => 'required|string|max:100',
            'prenom'     => 'required|string|max:100',
            'email'      => 'required|email|unique:utilisateurs,email',
            'motDePasse' => 'required|string|min:8|confirmed',
        ];
    }
}
class UpdateUtilisateurRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
        return [
            'nom'        => 'required|string|max:100',
            'prenom'     => 'required|string|max:100',
            'email'      => 'required|email|unique:utilisateurs,email,'.$this->route('utilisateur').',idUtilisateur',
            'motDePasse' => 'nullable|string|min:8|confirmed',
        ];
    }
}

// ── Admin ────────────────────────────────────────────────────────────────────
class StoreAdminRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
        return ['idUtilisateur' => 'required|exists:utilisateurs,idUtilisateur|unique:admins,idUtilisateur'];
    }
}
class UpdateAdminRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
        return ['idUtilisateur' => 'required|exists:utilisateurs,idUtilisateur'];
    }
}

// ── Document ─────────────────────────────────────────────────────────────────
class StoreDocumentRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
        return [
            'idUtilisateur' => 'required|exists:utilisateurs,idUtilisateur',
            'idMatiere'     => 'required|exists:matieres,idMatiere',
            'idNiveau'      => 'required|exists:niveaux,idNiveau',
            'titre'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'fichier'       => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:20480',
        ];
    }
}
class UpdateDocumentRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
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

// ── Message ──────────────────────────────────────────────────────────────────
class StoreMessageRequest extends FormRequest {
    public function authorize() { return true; }
    public function rules() {
        return [
            'idUtilisateur' => 'required|exists:utilisateurs,idUtilisateur',
            'idAdmin'       => 'required|exists:admins,idAdmin',
            'contenu'       => 'required|string',
            'statut'        => 'in:envoye,lu,repondu',
        ];
    }
}
class UpdateMessageRequest extends StoreMessageRequest {}
