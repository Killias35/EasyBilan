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
                        Facture {{ $fac->id }} sous devis {{ $fac->sous_devis }} situation {{ $fac->numero_situation }}
                        du {{ $fac->date_facture }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- Bouton téléchargement --}}
    <div class="text-center mt-6">
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



@include('pdf.partials.devis', ['devi' => $devi, 'devis' => $devis])

@endsection

    <style>
        .page{max-width:100%;margin:auto;background:#fff;padding:40px;border-radius:6px;box-shadow:0 0 20px rgba(0,0,0,.08)}
        .header{display:flex;justify-content:space-between;align-items:flex-start;border-bottom:4px solid #283592;padding-bottom:20px;margin-bottom:30px}
        .company h1{margin:0;color:#283592;font-size:28px}
        .company p{margin:4px 0;font-size:13px;color:#555}
        .logo img{max-width:220px}
        .title{text-align:right}
        .title h2{margin:0;font-size:30px;color:#283592}
        .meta{margin-top:10px;font-size:13px}
        .meta div{margin:2px 0}
        .section{margin-bottom:30px}
        .section h3{margin-bottom:10px;color:#283592;font-size:16px;border-bottom:1px solid #ddd;padding-bottom:4px}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;font-size:13px}
        .grid strong{color:#000}
        table{width:100%;border-collapse:collapse;font-size:13px;margin-top:15px}
        th,td{border:1px solid #ddd;padding:8px}
        th{background:#f0f2f8;color:#283592;text-align:left}
        td.right,th.right{text-align:right}
        tfoot td{font-weight:bold}
        .totals{margin-top:20px;width:100%}
        .totals td{border:none;padding:6px}
        .totals .label{text-align:right}
        .totals .value{text-align:right;font-weight:bold}
        .final{font-size:22px;color:#e01b84}
        .footer{text-align:center;font-size:11px;color:#666;margin-top:40px;border-top:1px solid #ddd;padding-top:15px}
        .note{text-align:center;font-size:12px;color:#666;margin-top:10px}
    </style>