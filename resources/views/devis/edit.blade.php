@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Modifier un devis</h1>
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
        <form action="{{ route('devis.update', $devis->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Client --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Client</label>
                    <select name="id_client" required
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                        <option value="{{ $devis->client->id }}"> #{{ $devis->client->id }} {{ $devis->client->nom_client }} </option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}"
                                {{ old('id_client') == $client->id ? 'selected' : '' }}>
                                #{{ $client->id }} {{ $client->nom_client }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">date_devis</label>
                    <input type="date" name="date_devis" value="{{ old('date_devis', $devis->date_devis) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">duree_validite</label>
                    <input type="date" name="duree_validite" value="{{ old('duree_validite', $devis->duree_validite) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">sous_total</label>
                    <input type="text" name="sous_total" value="{{ old('sous_total', $devis->sous_total) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2 cursor-not-allowed" disabled>
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('devis.index') }}"
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