<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $table = 'materiel';
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'description',
        'prix',
    ];

    public function devis()
    {
        return $this->belongsToMany(Devis::class)->withPivot('quantite', 'prix', 'tva', 'sous_devis', 'situation')->withTimestamps();
    }
}
