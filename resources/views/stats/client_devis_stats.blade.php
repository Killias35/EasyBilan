@extends('layouts.app')

@section('content')

<div class="w-full px-6 py-8">

    <h1 class="text-2xl font-semibold mb-6">
        Devis du client : {{ $client->nom_client }}
    </h1>

    @if($client->devis->isEmpty())
        <p class="text-gray-500">Aucun devis pour ce client</p>
    @else

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($client->devis as $devis)

                <div class="bg-white shadow rounded-xl p-6 border border-gray-200">

                    <p class="text-gray-500 text-sm">Devis #{{ $devis->id }}</p>

                    <div class="mt-4 space-y-2">

                        <div>
                            <p class="text-gray-500 text-xs">Sous-total</p>
                            <p class="text-xl font-semibold">
                                {{ number_format($devis->sous_total, 2, ',', ' ') }} €
                            </p>
                        </div>

                        <div>
                            <p class="text-gray-500 text-xs">Date devis</p>
                            <p class="text-sm">
                                {{ $devis->date_devis }}
                            </p>
                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>

@endsection