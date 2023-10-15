<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;
    protected $table = 'prestations';
    protected $primaryKey = 'nprest';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'nprest',
        'libprest',
        'datprest',
    ];

    public function enseignants()
    {
        return $this->belongsToMany(Enseignant::class, 'enseignant_prestation');
    }

    public function paies()
    {
        return $this->belongsToMany(Paie::class, 'prestation_paie');
    }
}
