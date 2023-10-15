<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    protected $table = 'eleves';
    protected $primaryKey = 'nelev';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['nom', 'postnom', 'prenom', 'sexe', 'codclas'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class, 'enseignant_eleve');
    }
}
