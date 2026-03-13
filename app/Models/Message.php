<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table      = 'messages';
    protected $primaryKey = 'idMessage';

    protected $fillable = [
        'idUtilisateur', 'idAdmin',
        'contenu', 'dateEnvoi', 'statut',
    ];

    protected $casts = ['dateEnvoi' => 'datetime'];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'idUtilisateur', 'idUtilisateur');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'idAdmin', 'idAdmin');
    }

    public function lireMessage(): void
    {
        $this->update(['statut' => 'lu']);
    }

    public function getRouteKeyName(): string
    {
        return 'idMessage';
    }
}
