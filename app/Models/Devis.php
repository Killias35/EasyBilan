<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $table = 'devis';
    public $timestamps = true;

    protected $fillable = [
        'id_client',
        'date_devis',
        'duree_validite',
        'sous_total'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function chantier()
    {
        return $this->hasOne(Chantier::class, 'id_devis');
    }

    public function factures()
    {
        return $this->hasMany(Facture::class, 'id_devis');
    }

    public function materiaux()
    {
        return $this->belongsToMany(Materiel::class)->withPivot('quantite', 'prix', 'tva', 'sous_devis')->withTimestamps();
    }
}
