<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    use HasFactory;
    protected $primaryKey = 'codcais'; // Définir la clé primaire
    protected $casts = [
        'codcais' => 'string',
    ];

    protected $fillable = [
        'codcais',
        'libcais',
    ];

    // Définir les relations avec d'autres modèles si nécessaire

    public function enseignants()
    {
        return $this->hasMany(Enseignant::class);
    }
}
