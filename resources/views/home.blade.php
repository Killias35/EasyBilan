{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- Import Tailwind via CDN --}}
<div class="w-full px-6 py-8">

    <h1 class="text-3xl font-semibold mb-8">Tableau de bord</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-6">

        <div class="bg-white shadow rounded-xl p-6 text-center border border-gray-200">
            <p class="text-gray-500 text-sm">Clients</p>
            <p class="text-4xl font-bold mt-2">{{ $clientsCount }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6 text-center border border-gray-200">
            <p class="text-gray-500 text-sm">Devis</p>
            <p class="text-4xl font-bold mt-2">{{ $devisCount }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6 text-center border border-gray-200">
            <p class="text-gray-500 text-sm">Chantiers</p>
            <p class="text-4xl font-bold mt-2">{{ $chantiersCount }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6 text-center border border-gray-200">
            <p class="text-gray-500 text-sm">Factures</p>
            <p class="text-4xl font-bold mt-2">{{ $facturesCount }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6 text-center border border-gray-200">
            <p class="text-gray-500 text-sm">Règlements</p>
            <p class="text-4xl font-bold mt-2">{{ $reglementsCount }}</p>
        </div>

        <div class="bg-white shadow rounded-xl p-6 text-center border border-gray-200">
            <p class="text-gray-500 text-sm">Materiaux</p>
            <p class="text-4xl font-bold mt-2">{{ $materiauxCount }}</p>
        </div>

    </div>

</div>

@endsection
