<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>EasyBilan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Style bouton custom pour input[type=file] */
        input[type="file"]::-webkit-file-upload-button {
            visibility: hidden;
        }
        input[type="file"]::before {
            content: 'Choisir un fichier';
            display: inline-block;
            background: linear-gradient(180deg,#fff,#f3f4f6);
            border: 1px solid #d1d5db;
            padding: .45rem .75rem;
            margin-right: .5rem;
            border-radius: .375rem;
            font-weight: 500;
            cursor: pointer;
        }
        input[type="file"]:hover::before {
            filter: brightness(.98);
        }
    </style>

    @yield('head')
</head>

<body class="min-h-screen bg-gray-100 text-gray-800 antialiased">

    <div class="min-h-screen flex flex-col">

        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-6 py-4 flex items-center">

                <!-- TITRE -->
                <h1 class="text-xl font-semibold tracking-tight text-gray-800 mr-8">
                    @yield('title')
                </h1>

                <!-- NAVBAR -->
                <nav class="flex-1 flex justify-between">
                    
                    <!-- LIENS À GAUCHE -->
                    <ul class="flex gap-6 text-sm">
                        <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-900">Dashboard</a></li>
                        <li><a href="{{ route('excel.show') }}" class="text-gray-600 hover:text-gray-900">Import</a></li>
                        <li><a href="{{ route('export.create') }}" class="text-gray-600 hover:text-gray-900">Devis</a></li>
                     </ul>

                    <!-- LIENS À DROITE -->
                    <ul class="flex gap-6 text-sm">
                        <li><a href="{{ route('clients.index') }}" class="text-gray-600 hover:text-gray-900">Clients</a></li>
                        <li><a href="{{ route('devis.index') }}" class="text-gray-600 hover:text-gray-900">Devis</a></li>
                        <li><a href="{{ route('chantiers.index') }}" class="text-gray-600 hover:text-gray-900">Chantiers</a></li>
                        <li><a href="{{ route('materiaux.index') }}" class="text-gray-600 hover:text-gray-900">Materiaux</a></li>
                        <li><a href="{{ route('factures.index') }}" class="text-gray-600 hover:text-gray-900">Factures</a></li>
                        <li><a href="{{ route('reglements.index') }}" class="text-gray-600 hover:text-gray-900">Règlements</a></li>
                    </ul>
                </nav>
            </div>
        </header>


        <main class="flex-1">
            <div class="max-w-7xl mx-auto px-6 py-8">
                @yield('content')
            </div>
        </main>

        <footer class="bg-white border-t border-gray-200 py-4 mt-8">
            <div class="max-w-7xl mx-auto px-6 text-center text-sm text-gray-500">
                EasyBilan — Application de devis & comptabilité — Par Killias bouillet
            </div>
        </footer>

    </div>

    @yield('scripts')
</body>
</html>
