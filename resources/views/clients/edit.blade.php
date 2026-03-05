@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Modifier un client</h1>
    @if (session('success'))
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

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Civilité</label>
                    <input type="text" name="civilite"
                        value="{{ old('civilite', $client->civilite) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom_client"
                        value="{{ old('nom_client', $client->nom_client) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Adresse</label>
                    <input type="text" name="adresse_client"
                        value="{{ old('adresse_client', $client->adresse_client) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Code postal</label>
                    <input type="text" name="code_postal_client"
                        value="{{ old('code_postal_client', $client->code_postal_client) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Ville</label>
                    <input type="text" name="ville_client"
                        value="{{ old('ville_client', $client->ville_client) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="text" name="tel"
                        value="{{ old('tel', $client->tel) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">TVA Intra</label>
                    <input type="text" name="tva_intra"
                        value="{{ old('tva_intra', $client->tva_intra) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">RCS</label>
                    <input type="text" name="rcs"
                        value="{{ old('rcs', $client->rcs) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('clients.index') }}"
                   class="bg-gray-500 text-white px-6 py-2 rounded-lg hover:bg-gray-600">
                    Annuler
                </a>

                <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700">
                    Mettre à jour
                </button>
            </div>

        </form>
    </div>

</div>
@endsection