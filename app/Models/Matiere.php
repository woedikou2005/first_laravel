<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    protected $table      = 'matieres';
    protected $primaryKey = 'idMatiere';

    protected $fillable = ['nomMatiere'];

    public function documents()
    {
        return $this->hasMany(Document::class, 'idMatiere', 'idMatiere');
    }

    public function getRouteKeyName(): string
    {
        return 'idMatiere';
    }
}

