<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    protected $table = 'factures';
    public $timestamps = true;

    protected $fillable = [
        'id_devis',
        'sous_devis',
        'numero_situation',
        'pv_numero',
        'date_facture',
        'sous_total',
        'montant_facture',
        'echeance',
        'affacturage'
    ];


    public function devis()
    {
        return $this->belongsTo(Devis::class, 'id_devis');
    }

    public function reglements()
    {
        return $this->hasMany(Reglement::class, 'id_facture');
    }

}
