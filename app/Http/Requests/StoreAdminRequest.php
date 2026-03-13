<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'idUtilisateur' => 'required|exists:utilisateurs,idUtilisateur|unique:admins,idUtilisateur',
        ];
    }
}