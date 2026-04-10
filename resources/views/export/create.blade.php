@extends('layouts.app')

@section('content')
<div class="w-full max-w-2xl bg-white border border-gray-200 rounded-2xl shadow-lg p-8">
    <header class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Importer un fichier Pdf</h1>
        <p class="text-sm text-gray-500 mt-1">
            Rentrer un fichier pdf pour crée le devis
        </p>
    </header>

   <form id="pdfForm" class="space-y-6" enctype="multipart/form-data" method="POST"
    action="{{ route('export.upload') }}" enctype="multipart/form-data" target="_blank">
        @csrf

        <div class="grid grid-cols-1 gap-3">
            <label class="text-sm font-medium text-gray-700">Fichier pdf (.pdf)</label>

            <div class="flex items-center gap-4">
                <input
                    id="fileInput"
                    name="devis_file"
                    type="file"
                    accept=".pdf"
                    required
                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                           file:rounded-md file:border-0 file:text-sm file:font-medium
                           file:bg-white file:cursor-pointer"
                    >
                @csrf

                <button
                    type="submit"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 text-white text-sm font-semibold rounded-lg shadow-sm
                           hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    id="upload_btn"
                >
                    Importer
                </button>
            </div>

            <p id="fileInfo" class="text-xs text-gray-500 mt-1">Aucun fichier sélectionné.</p>
        </div>

        <div class="pt-4 border-t border-gray-100 text-xs text-gray-500">
            <strong>Conseils :</strong>
            <ul class="list-disc ml-5 mt-2">
                <li>Format accepté : <code>.pdf</code>.</li>
                <li>Le fichier sera utilisé pour crée le devis.</li>
            </ul>
        </div>
    </form>

    <div id="responseBox" class="mt-4 hidden p-4 rounded-lg border"></div>

</div>
@endsection

@section('scripts')
<script>
    const input = document.getElementById('fileInput');
    const info = document.getElementById('fileInfo');

    input.addEventListener('change', () => {
        const file = input.files[0];
        if (!file) {
            info.textContent = 'Aucun fichier sélectionné.';
            return;
        }

        const name = file.name;
        const allowed = /\.(pdf)$/i;
        if (!allowed.test(name)) {
            info.textContent = 'Fichier non supporté — uniquement .pdf .';
            input.value = '';
            return;
        }

        info.textContent = `Fichier sélectionné : ${name} — ${Math.round(file.size / 1024)} KB`;
    });
</script>
@endsection
