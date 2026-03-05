@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Créer une facture</h1>
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
        <form action="{{ route('factures.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Client --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Client</label>
                    <select name="id_client" class="mt-1 w-full border rounded-lg px-3 py-2">
                        <option value="">-- Sélectionner un client --</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ old('id_client') == $client->id ? 'selected' : '' }}>
                                {{ $client->nom_client }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Chantier --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Chantier</label>
                    <select name="id_chantier" class="mt-1 w-full border rounded-lg px-3 py-2">
                        <option value="">-- Sélectionner un chantier --</option>
                        @foreach($chantiers as $chantier)
                            <option value="{{ $chantier->id }}"
                                {{ old('id_chantier') == $chantier->id ? 'selected' : '' }}>
                                {{ $chantier->nom_chantier }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Numéro situation</label>
                    <input type="text" name="numero_situation"
                        value="{{ old('numero_situation') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Numéro PV</label>
                    <input type="text" name="pv_numero"
                        value="{{ old('pv_numero') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Date facture</label>
                    <input type="date" name="date_facture"
                        value="{{ old('date_facture') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Sous total</label>
                    <input type="number" step="0.01" name="sous_total"
                        value="{{ old('sous_total') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Montant facture</label>
                    <input type="number" step="0.01" name="montant_facture"
                        value="{{ old('montant_facture') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Échéance</label>
                    <input type="date" name="echeance"
                        value="{{ old('echeance') }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div class="flex items-center mt-6">
                    <input type="checkbox" name="affacturage" value="1"
                        {{ old('affacturage') ? 'checked' : '' }}
                        class="mr-2">
                    <label class="text-sm text-gray-700">Affacturage</label>
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