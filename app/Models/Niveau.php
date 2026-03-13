<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $table      = 'niveaux';
    protected $primaryKey = 'idNiveau';

    protected $fillable = ['nomNiveau'];

    public function documents()
    {
        return $this->hasMany(Document::class, 'idNiveau', 'idNiveau');
    }

    public function getRouteKeyName(): string
    {
        return 'idNiveau';
    }
}
