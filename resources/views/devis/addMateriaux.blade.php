@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Gestion des matériaux du devis</h1>

    {{-- FLASH --}}
    @if(session('success'))
        <div class="bg-teal-100 border-t-4 border-teal-500 text-teal-900 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="bg-red-100 border-t-4 border-red-500 text-red-900 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- ===================== LEFT SIDE ===================== --}}
        <div class="space-y-6">

            {{-- DEVIS --}}
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold mb-4">Devis</h2>

                <div class="space-y-2 text-sm">
                    <p><span class="text-gray-500">ID :</span> {{ $devis->id }}</p>
                    <p><span class="text-gray-500">Date :</span> {{ $devis->date_devis }}</p>
                    <p><span class="text-gray-500">Validité :</span> {{ $devis->duree_validite }}</p>
                    <p><span class="text-gray-500">Sous-total :</span> {{ $devis->sous_total }}</p>
                </div>
            </div>

            {{-- CLIENT --}}
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold mb-4">Client</h2>

                <div class="space-y-2 text-sm">
                    <p>{{ $devis->client->nom_client }}</p>
                    <p>{{ $devis->client->adresse_client }}</p>
                    <p>TVA : {{ $devis->client->tva_intra }}</p>
                </div>
            </div>

            {{-- CHANTIER --}}
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-lg font-semibold mb-4">Chantier</h2>

                <div class="space-y-2 text-sm">
                    <p>{{ $devis->chantier->nom_chantier ?? '-' }}</p>
                    <p>{{ $devis->chantier->adresse_chantier ?? '-' }}</p>
                </div>
            </div>

        </div>

        {{-- ===================== RIGHT SIDE ===================== --}}
        <div class="bg-white shadow rounded-xl p-6 flex flex-col">

            <h2 class="text-lg font-semibold mb-4">Matériaux du devis</h2>

            <form method="POST" action="{{ route('devis.removeMateriaux', $devis->id) }}" id="deleteMateriauForm">
                @csrf
                @method('DELETE')
                <input type="hidden" name="materiau_id" id="deleteMateriauId">
            </form>

            <form method="POST" action="{{ route('devis.addMateriaux', $devis->id) }}">
                @csrf

                {{-- ================= DEVIS MATERIALS ================= --}}
                <div class="space-y-4 mb-8">

                    <h3 class="font-semibold text-gray-700">Matériaux du devis</h3>

                    @foreach($devis->materiaux as $materiau)

                        @php $pivot = $materiau->pivot; @endphp

                        <div class="border rounded-lg p-4 space-y-3">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                <div>
                                    <p class="font-semibold">{{ $materiau->nom }}</p>
                                    <p class="text-xs text-gray-500">{{ $materiau->description }}</p>
                                </div>

                                <div class="flex justify-end">
                                    <button type="button"
                                        class="text-xl text-red-600 px-4 py-1 rounded-lg hover:bg-red-100"
                                        onclick="deleteMateriau({{ $materiau->id }})">
                                        X
                                    </button>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 text-sm gap-2">
                                <div>Qté : {{ $pivot->quantite }}</div>
                                <div>Prix : {{ $pivot->prix ?? $materiau->prix }} <button type="button" class="text-sm" onclick="resetOveridePrix({{ $materiau->id }})">◉</button></div>
                                <div>TVA : {{ $pivot->tva ?? $materiau->tva }} <button type="button" class="text-sm" onclick="resetOverideTva({{ $materiau->id }})">◉</button></div>
                            </div>

                            <div class="grid grid-cols-3 gap-2">

                                <input type="number"
                                    id="materiaux[{{ $materiau->id }}][quantite]"
                                    name="materiaux[{{ $materiau->id }}][quantite]"
                                    value="{{ $pivot->quantite }}"
                                    class="border rounded px-2 py-1 text-sm">

                                <input type="number"
                                    id="materiaux[{{ $materiau->id }}][prix]"
                                    name="materiaux[{{ $materiau->id }}][prix]"
                                    value="{{ $pivot->prix }}"
                                    placeholder="Prix override"
                                    class="border rounded px-2 py-1 text-sm">

                                <input type="number"
                                    id="materiaux[{{ $materiau->id }}][tva]"
                                    name="materiaux[{{ $materiau->id }}][tva]"
                                    value="{{ $pivot->tva }}"
                                    placeholder="TVA override"
                                    class="border rounded px-2 py-1 text-sm">

                            </div>

                        </div>

                    @endforeach

                </div>
                
                {{-- ================= SEARCH (UNIQUEMENT AJOUT) ================= --}}
                <input
                    type="text"
                    id="searchMateriaux"
                    placeholder="Rechercher un matériau à ajouter..."
                    class="w-full border rounded-lg px-3 py-2 mb-4 text-sm"
                >

                {{-- ================= AVAILABLE MATERIALS ================= --}}
                <div>

                    <h3 class="font-semibold text-gray-700 mb-2">
                        Ajouter des matériaux
                    </h3>

                    <div id="materiauxDisponibles" class="space-y-3">

                        @foreach($materiaux as $materiau)

                            {{-- on masque déjà ceux du devis --}}
                            @if(!$devis->materiaux->contains('id', $materiau->id))

                                <div class="border rounded-lg p-3 materiau-available">

                                    <p class="font-semibold materiau-name">{{ $materiau->nom }}</p>
                                    <p class="text-xs text-gray-500">{{ $materiau->description }}</p>

                                    <div class="grid grid-cols-1 mt-2">
                                        <button type="button"
                                            class="add-materiau bg-green-600 text-white text-sm px-3 py-1 rounded hover:bg-green-700"
                                            data-id="{{ $materiau->id }}"
                                            data-nom="{{ $materiau->nom }}">
                                            Ajouter
                                        </button>
                                    </div>

                                    {{-- hidden inputs injected via JS --}}
                                    <div class="hidden-fields"></div>

                                </div>

                            @endif

                        @endforeach

                    </div>

                </div>

                {{-- ================= SUBMIT ================= --}}
                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                        Enregistrer
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>

<script>
    const search = document.getElementById('searchMateriaux');

    search.addEventListener('input', function () {
        let value = this.value.toLowerCase();

        document.querySelectorAll('.materiau-available').forEach(el => {
            let name = el.querySelector('.materiau-name').textContent.toLowerCase();
            el.style.display = name.includes(value) ? '' : 'none';
        });
    });

    document.querySelectorAll('.add-materiau').forEach(btn => {
        btn.addEventListener('click', function () {

            let id = this.dataset.id;
            let parent = this.closest('.materiau-available');

            // inject form inputs into main form
            let container = parent.querySelector('.hidden-fields');

            container.innerHTML = `
                <input type="number" name="materiaux[${id}][quantite]" placeholder="Qté" class="border rounded px-2 py-1 text-sm mt-2">
                <input type="number" name="materiaux[${id}][prix]" placeholder="Prix override" class="border rounded px-2 py-1 text-sm mt-2">
                <input type="number" name="materiaux[${id}][tva]" placeholder="TVA override" class="border rounded px-2 py-1 text-sm mt-2">
            `;

            this.disabled = true;
            this.innerText = "Ajouté";
            this.classList.remove("bg-green-600", "hover:bg-green-700");
            this.classList.add("bg-gray-400");

        });
    });

function deleteMateriau(id) {
    if (!confirm('Supprimer ce matériau ?')) return;

    document.getElementById('deleteMateriauId').value = id;
    document.getElementById('deleteMateriauForm').submit();
}

function resetOverideTva(id) {
    const el = document.getElementById('materiaux[' + id + '][tva]');
    el.value = '';
}

function resetOveridePrix(id) {
    const el = document.getElementById('materiaux[' + id + '][prix]');
    el.value = '';
}

</script>
@endsection