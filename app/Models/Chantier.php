<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chantier extends Model
{
    protected $table = 'chantiers';
    public $timestamps = true;

    protected $fillable = [
        'id_devis',
        'nom_chantier',
        'adresse_chantier',
        'code_postal_chantier',
        'ville_chantier',
        'conducteur'
    ];

    public function devis()
    {
        return $this->belongsTo(Devis::class, 'id_devis');
    }
}
