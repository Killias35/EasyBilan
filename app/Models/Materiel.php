<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    protected $table = 'materiaux';
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'tva'
    ];

    public function devis()
    {
        return $this->belongsToMany(Devis::class)->withPivot('quantite', 'prix', 'tva')->withTimestamps();
    }
}
