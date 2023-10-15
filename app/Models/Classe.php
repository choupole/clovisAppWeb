<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $primaryKey = 'codclas'; // Définir la clé primaire
    protected $casts = [
        'codclas' => 'string',
    ];

    protected $fillable = [
        'codclas',
        'libclas',
    ];

    // Définir les relations avec d'autres modèles si nécessaire

    public function eleves()
    {
        return $this->hasMany(Eleve::class);
    }
}
