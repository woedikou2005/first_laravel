<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Utilisateur extends Model
{
    protected $table      = 'utilisateurs';
    protected $primaryKey = 'idUtilisateur';

    protected $fillable = ['nom', 'prenom', 'email', 'motDePasse'];
    protected $hidden   = ['motDePasse'];

    // Hash auto du mot de passe à l'assignation
    public function setMotDePasseAttribute(string $value): void
    {
        $this->attributes['motDePasse'] = Hash::make($value);
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'idUtilisateur', 'idUtilisateur');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'idUtilisateur', 'idUtilisateur');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'idUtilisateur', 'idUtilisateur');
    }

    public function getRouteKeyName(): string
    {
        return 'idUtilisateur';
    }
}
