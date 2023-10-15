<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $table = 'enseignants';
    protected $primaryKey = 'nens';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['nom', 'postnom', 'prenom', 'sexe', 'codcais'];

    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }

    public function eleves()
    {
        return $this->belongsToMany(Eleve::class, 'enseignant_eleve');
    }

    public function prestations()
    {
        return $this->belongsToMany(Prestation::class, 'enseignant_prestation');
    }
}
