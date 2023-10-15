<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table = 'agents';
    protected $primaryKey = 'matri';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = ['nom', 'postnom', 'prenom', 'sexe', 'coddir'];

    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    public function caisse()
    {
        return $this->belongsTo(Caisse::class);
    }
}
