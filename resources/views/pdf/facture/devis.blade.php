@extends('layouts.app')

@section('content')

<script>
    function select(id) {
        window.location.href='{{ route('export.create') }}?facture_id=' + id;
    }
</script>

<div class="mb-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">

        {{-- Sélecteur de facture --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Sélection de la facture
            </label>

            <select
                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                onchange="select(this.value)"
            >
                @foreach ($factures as $f)
                    <option
                        value="{{ $f->id }}"
                        @selected($f->id === $facture->id)
                    >
                        Facture #{{ $f->id }} de {{ $f->client->nom_client }} 
                        @if ($f->chantier != null)
                            pour chantier "{{ $f->chantier->nom_chantier }}"
                        @endif
                        du {{ $f->date_facture }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Info facture sélectionnée --}}
        <div class="text-sm text-gray-600">
            <div class="font-medium text-gray-800">
                Facture sélectionnée
            </div>
            <div>ID : {{ $facture->id }}</div>
        </div>

        {{-- Bouton téléchargement --}}
        <div class="text-right">
            <a
                href="{{route('export.download')}}?id={{ $facture->id}}"
                type="button"
                target="_blank"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition"
            >
                Télécharger le PDF
            </a>
        </div>

    </div>
</div>



@include('pdf.partials.devis', ['facture' => $facture, 'factures' => $factures])

@endsection