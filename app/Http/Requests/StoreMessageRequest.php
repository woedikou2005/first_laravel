<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreMessageRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'idUtilisateur' => 'required|exists:utilisateurs,idUtilisateur',
            'idAdmin'       => 'required|exists:admins,idAdmin',
            'contenu'       => 'required|string',
            'statut'        => 'nullable|in:envoye,lu,repondu',
        ];
    }
}