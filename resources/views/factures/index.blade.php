@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Liste des factures</h1>
    @if(session('success'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('success')  }}</p>
                </div>
            </div>
        </div>
    @elseif (session('error'))
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('error')  }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="mb-6 text-right">
        <a href="{{ route('factures.create') }}"
        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            + Créer une facture
        </a>
    </div>

    <div class="bg-white shadow rounded-xl overflow-hidden text-center">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-sm text-gray-800">ID</th>
                    <th class="px-4 py-3 text-sm text-gray-800">ID Client</th>
                    <th class="px-4 py-3 text-sm text-gray-800">ID Chantier</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Numero situation</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Numero Pv</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Date</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Sous Total</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Montant Facture</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Echeance</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Affacturage</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Modifier</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Supprimer</th>
                </tr>
            </thead>


            <tbody>
                @foreach ($factures as $facture)
                    @php
                        $client = $clients->where('id', $facture->id_client)->first();
                        $chantier = $chantiers->where('id', $facture->id_chantier)->first();

                        $nom_client = $client ? $client->nom_client : '';
                        $nom_chantier = $chantier ? $chantier->nom_client : '';
                    @endphp
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $facture->id }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">#{{ $facture->id_client }} {{ $nom_client }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">#{{ $facture->id_chantier }} {{ $nom_chantier }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $facture->numero_situation }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $facture->pv_numero }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $facture->date_facture }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $facture->sous_total }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $facture->montant_facture }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $facture->echeance }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $facture->affacturage == 1 ? 'Oui' : 'Non' }}</td>
                        <td class="text-sm">
                            <a href="{{ route('factures.edit', $facture->id) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                Modifier
                            </a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('factures.destroy', $facture->id) }}"
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
