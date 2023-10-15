<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paie extends Model
{
    use HasFactory;

    protected $table = 'paies';
    protected $primaryKey = 'npaie';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['mont', 'datpaie', 'coddir', 'nens', 'ndoc'];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function prestations()
    {
        return $this->belongsToMany(Prestation::class, 'prestation_paie');
    }

    public function document()
    {
        return $this->belongsToMany(Document::class, 'paie_document', 'npaie', 'ndoc');
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class, 'nens');
    }
}
