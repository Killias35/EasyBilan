@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Modifier un règlement</h1>
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
        <form action="{{ route('reglements.update', $reglement->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Facture --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Facture</label>
                    <select name="id_facture" class="mt-1 w-full border rounded-lg px-3 py-2">
                        @foreach($factures as $facture)
                            <option value="{{ $facture->id }}"
                                {{ old('id_facture', $reglement->id_facture) == $facture->id ? 'selected' : '' }}>
                                Facture #{{ $facture->id }} - Situation {{ $facture->numero_situation }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Date règlement --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Date règlement</label>
                    <input type="date" name="date_reglement"
                        value="{{ old('date_reglement', $reglement->date_reglement) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                {{-- Montant --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Montant réglé</label>
                    <input type="number" step="0.01" name="montant_regle"
                        value="{{ old('montant_regle', $reglement->montant_regle) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('reglements.index') }}"
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