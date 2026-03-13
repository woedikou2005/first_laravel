<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreNiveauRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return ['nomNiveau' => 'required|string|max:100'];
    }
}