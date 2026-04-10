@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-semibold mb-6">Modifier un materiel</h1>
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
        <form action="{{ route('materiaux.update', $materiel->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom"
                        value="{{ old('nom', $materiel->nom) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" name="description"
                        value="{{ old('description', $materiel->description) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Prix</label>
                    <input type="number" step="0.01" name="prix"
                        value="{{ old('prix', $materiel->prix) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tva</label>
                    <input type="number" step="0.01" name="tva"
                        value="{{ old('tva', $materiel->tva) }}"
                        class="mt-1 w-full border rounded-lg px-3 py-2">
                </div>
            </div>

            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('materiaux.index') }}"
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