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

                {{-- Devis --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Devis</label>
                    <select name="id_devis"
                        class="mt-1 w-full border rounded-lg px-3 py-2" required>
                        <option value="">-- Sélectionner un devis --</option>
                        @foreach($devis as $devi)
                            <option value="{{ $devi->id }}"
                                {{ old('id_devis') == $devi->id ? 'selected' : '' }}>
                                #{{ $devi->id }} {{ $devi->client->nom_client }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Sous devis</label>
                    <input type="text" name="sous_devis"
                        value="{{ old('sous_devis', $facture->sous_devis) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
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