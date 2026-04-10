<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    public $timestamps = true;

    protected $fillable = [
        'civilite',
        'nom_client',
        'adresse_client',
        'code_postal_client',
        'ville_client',
        'tel',
        'tva_intra',
        'rcs'
    ];

    public function devis()
    {
        return $this->hasMany(Devis::class, 'id_client');
    }

}
