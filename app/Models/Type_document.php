<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_document extends Model
{
    use HasFactory;

    protected $primaryKey = 'codtypedoc'; // Définir la clé primaire
    protected $casts = [
        'codtypedoc' => 'string',
    ];

    protected $fillable = [
        'codtypedoc',
        'libtypedoc',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class, 'type_document_id');
    }
}
