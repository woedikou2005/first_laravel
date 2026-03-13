<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table      = 'documents';
    protected $primaryKey = 'idDocument';

    protected $fillable = [
        'idUtilisateur', 'idMatiere', 'idNiveau',
        'titre', 'description', 'fichier', 'dateUpload',
    ];

    protected $casts = ['dateUpload' => 'datetime'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'idUtilisateur', 'idUtilisateur');
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class, 'idMatiere', 'idMatiere');
    }

    public function niveau()
    {
        return $this->belongsTo(Niveau::class, 'idNiveau', 'idNiveau');
    }

    public function telecharger(): string
    {
        return storage_path('app/public/' . $this->fichier);
    }

    public function getRouteKeyName(): string
    {
        return 'idDocument';
    }
}
