@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Créer un chantier</h1>
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
    
    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ route('chantiers.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Client --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Client</label>
                    <select name="id_client"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                        <option value="">-- Sélectionner un client --</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ old('id_client') == $client->id ? 'selected' : '' }}>
                                {{ $client->nom_client }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Nom chantier --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom chantier</label>
                    <input type="text" name="nom_chantier"
                        value="{{ old('nom_chantier') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                {{-- Adresse --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Adresse</label>
                    <input type="text" name="adresse_chantier"
                        value="{{ old('adresse_chantier') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                {{-- Code postal --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Code postal</label>
                    <input type="text" name="code_postal_chantier"
                        value="{{ old('code_postal_chantier') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                {{-- Ville --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Ville</label>
                    <input type="text" name="ville_chantier"
                        value="{{ old('ville_chantier') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                {{-- Conducteur --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Conducteur</label>
                    <input type="text" name="conducteur"
                        value="{{ old('conducteur') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Enregistrer
                </button>
            </div>

        </form>
    </div>

</div>
@endsection