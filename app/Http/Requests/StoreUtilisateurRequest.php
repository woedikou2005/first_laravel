<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreUtilisateurRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'nom'        => 'required|string|max:100',
            'prenom'     => 'required|string|max:100',
            'email'      => 'required|email|unique:utilisateurs,email',
            'motDePasse' => 'required|string|min:8|confirmed',
        ];
    }
}