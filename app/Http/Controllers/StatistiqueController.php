<?php

namespace App\Http\Controllers;

use App\Http\Services\ReglementsService;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Devis;

class StatistiqueController extends Controller
{
    public function clientDevis(Client $client)
    {
        $client->load('devis');
        return view('stats.client_devis_stats', compact('client'));
    }
}
