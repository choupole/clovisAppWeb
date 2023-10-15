<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $primaryKey = 'ndoc'; // Définir la clé primaire
    public $incrementing = true;
    protected $casts = [
        'ndoc' => 'string',
    ];

    protected $fillable = [
        'ndoc',
        'libdoc',
        'datdoc',
        'codtypedoc',
    ];

    public function paies()
    {
        return $this->belongsToMany(Paie::class, 'paie_document');
    }

    public function typeDocument()
    {
        return $this->belongsTo(TypeDocument::class);
    }
}
