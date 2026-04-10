<?php

namespace App\Http\Services;

use App\Models\Materiel;

class MateriauxService
{
    public static function create($nom, $description, $prix, $tva)
    {
        $materiau = Materiel::create([
            'nom' => $nom,
            'description' => $description,
            'prix' => $prix,
            'tva' => $tva
        ]);

        return $materiau;
    }

    public static function update(Materiel $materiau, $nom, $description, $prix, $tva)
    {
        $materiau->update([
            'nom' => $nom,
            'description' => $description,
            'prix' => $prix,
            'tva' => $tva
        ]);

        return $materiau;
    }

    public static function delete(Materiel $materiau)
    {
        $materiau->delete();
        return $materiau;
    }
}