@extends('layouts.app')

@section('content')

<script>
    let devis_id = "{{ $devi->id }}";
    function selectDevis(id) {
        window.location.href='{{ route('export.create') }}?devis_id=' + id;
    }
    function selectFacture(id) {
        window.location.href='{{ route('export.create') }}?devis_id=' + devis_id + '&facture_id=' + id;
    }
</script>

<div class="mb-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">

        {{-- Sélecteur de devis --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Sélection du devis
            </label>

            <select
                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                onchange="selectDevis(this.value)"
            >
                @foreach ($devis as $dev)
                    <option
                        value="{{ $dev->id }}"
                        @selected($dev->id === $devi->id)
                    >
                        #{{ $dev->id }} "{{ $dev->client->nom_client }}"
                        @if ($dev->chantier != null)
                            pour chantier "{{ $dev->chantier->nom_chantier }}"
                        @endif
                        du {{ $dev->date_devis }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Sélecteur de facture --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Sélection de la facture
            </label>

            <select
                class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                onchange="selectFacture(this.value)"
            >
                @foreach ($factures as $fac)
                    <option
                        value="{{ $fac->id }}"
                        @selected($fac->id === $facture->id)
                    >
                        Facture {{ $fac->id }} situation {{ $fac->numero_situation }}
                        du {{ $fac->date_facture }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Info devis sélectionnée --}}
        <div class="text-sm text-gray-600">
            <div class="font-medium text-gray-800">
                devis sélectionnée
            </div>
            <div>ID : {{ $devi->id }}</div>
        </div>

        {{-- Info Facture sélectionnée --}}
        <div class="text-sm text-gray-600">
            <div class="font-medium text-gray-800">
                facture sélectionnée
            </div>
            @if (isset($facture)) <div>ID : {{ $facture->id }}</div>
            @else <div>Aucune facture selectionnée</div>
            @endif
        </div>

        {{-- Bouton téléchargement --}}
        <div class="text-right">
            <a
                href="{{route('export.download')}}?id={{ $devi->id}}"
                type="button"
                target="_blank"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 transition"
            >
                Télécharger le PDF
            </a>
        </div>

    </div>
</div>



@include('pdf.partials.devis', ['devi' => $devi, 'devis' => $devis])

@endsection