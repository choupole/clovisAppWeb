<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;
    protected $primaryKey = 'coddir'; // Définir la clé primaire
    protected $casts = [
        'coddir' => 'string',
    ];

    protected $fillable = [
        'coddir',
        'libdir',
    ];

    // Définir les relations avec d'autres modèles si nécessaire

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    public function paies()
    {
        return $this->hasMany(Paie::class);
    }
}
