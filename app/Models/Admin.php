<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table      = 'admins';
    protected $primaryKey = 'idAdmin';

    protected $fillable = ['idUtilisateur'];

    // Héritage : Admin est lié à un Utilisateur
    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'idUtilisateur', 'idUtilisateur');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'idAdmin', 'idAdmin');
    }

    public function getRouteKeyName(): string
    {
        return 'idAdmin';
    }

    // Accès rapide aux attributs de l'utilisateur parent
    public function getNomAttribute()    { return $this->utilisateur?->nom; }
    public function getPrenomAttribute() { return $this->utilisateur?->prenom; }
    public function getEmailAttribute()  { return $this->utilisateur?->email; }
}
