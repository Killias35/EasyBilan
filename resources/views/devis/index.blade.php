@extends('layouts.app')

@section('content')
<div class="mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Liste des devis</h1>
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
        <a href="{{ route('devis.create') }}"
        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
            + Créer un devi
        </a>
    </div>

    <div class="bg-white shadow rounded-xl overflow-hidden text-center">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">ID</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Client</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Date devis</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Durée validité</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Sous total</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Modifier</th>
                    <th class="px-4 py-3 text-sm font-medium text-gray-700">Supprimer</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($devis as $devi)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $devi->id }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">#{{ $devi->id_client }} {{ $clients->where('id', $devi->id_client)->first()->nom_client }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $devi->date_devis }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $devi->duree_validite }}</td>
                        <td class="px-4 py-3 text-sm text-gray-800">{{ $devi->sous_total }}</td>
                        <td class="text-sm">
                            <a href="{{ route('devis.edit', $devi->id) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                Modifier
                            </a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ route('devis.destroy', $devi->id) }}"
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
