@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Liste des chantiers</h1>
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
        <a href="{{ route('chantiers.create') }}"
        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            + Créer un chantier
        </a>
    </div>

    <div class="bg-white shadow rounded-xl overflow-hidden text-center">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-sm text-gray-800">ID</th>
                    <th class="px-4 py-3 text-sm text-gray-800">ID Client</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Nom Chantier</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Adress Chantier</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Code Postal Chantier</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Ville Chantier</th>
                    <th class="px-4 py-3 text-sm text-gray-800">Conducteur</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Modifier</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Supprimer</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach ($chantiers as $chantier)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $chantier->id }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">#{{ $chantier->id_client }} {{ $clients->where('id', $chantier->id_client)->first()->nom_client }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $chantier->nom_chantier }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $chantier->adresse_chantier }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $chantier->code_postal_chantier }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $chantier->ville_chantier }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $chantier->conducteur }}</td>
                        <td class="text-sm">
                            <a href="{{ route('chantiers.edit', $chantier->id) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                Modifier
                            </a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('chantiers.destroy', $chantier->id) }}"
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
