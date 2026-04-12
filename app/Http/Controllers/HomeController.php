<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Client;
use App\Models\Devis;
use App\Models\Chantier;
use App\Models\Reglement;
use App\Models\Materiel;

class HomeController extends Controller
{
    public function index() {
        $clientsCount = Client::count();
        $devisCount = Devis::count();
        $chantiersCount = Chantier::count();
        $facturesCount = Facture::count();
        $reglementsCount = Reglement::count();
        $materiauxCount = Materiel::count();

        return view('home' , compact('clientsCount', 'devisCount', 'chantiersCount', 'facturesCount', 'reglementsCount', 'materiauxCount'));
    }
}
