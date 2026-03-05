@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Liste des clients</h1>
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
                    <p class="text-sm">{{ $error }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="mb-6 text-right">
        <a href="{{ route('clients.create') }}"
        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            + Créer un client
        </a>
    </div>

    <div class="bg-white shadow rounded-xl overflow-hidden text-center">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">ID</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Civilité</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Nom</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Adresse</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Code Postal</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Ville</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Téléphone</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">TVA Intra</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">RCS</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Modifier</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Supprimer</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($clients as $client)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->id }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->civilite }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->nom_client }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->adresse_client }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->code_postal_client }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->ville_client }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->tel }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->tva_intra }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $client->rcs }}</td>
                        <td class="text-sm">
                            <a href="{{ route('clients.edit', $client->id) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                Modifier
                            </a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('clients.destroy', $client->id) }}"
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
