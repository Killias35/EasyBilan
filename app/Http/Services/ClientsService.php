<?php

namespace App\Http\Services;

use Carbon\Carbon;

use App\Models\Client;

class ClientsService
{

    public static function create($civilite, $nom_client, $adresse_client, $code_postal_client, $ville_client, $tel, $tva_intra, $rcs)
    {
        $client = Client::create([
            'civilite' => $civilite,
            'nom_client' => $nom_client,
            'adresse_client' => $adresse_client,
            'code_postal_client' => $code_postal_client,
            'ville_client' => $ville_client,
            'tel' => $tel,
            'tva_intra' => $tva_intra,
            'rcs' => $rcs
        ]);
        return $client;
    }

    public static function update(Client $client, $civilite, $nom_client, $adresse_client, $code_postal_client, $ville_client, $tel, $tva_intra, $rcs)
    {
        $client->update([
            'civilite' => $civilite,
            'nom_client' => $nom_client,
            'adresse_client' => $adresse_client,
            'code_postal_client' => $code_postal_client,
            'ville_client' => $ville_client,
            'tel' => $tel,
            'tva_intra' => $tva_intra,
            'rcs' => $rcs
        ]);
        return $client;
    }

    public static function delete(Client $client)
    {
        $client->delete();
        return $client;
    }

}
