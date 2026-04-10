@extends('layouts.app')

@section('content')
<div class="w-full max-w-2xl bg-white border border-gray-200 rounded-2xl shadow-lg p-8">
    <header class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Importer un fichier Excel</h1>
        <p class="text-sm text-gray-500 mt-1">
            Rentrer un fichier xlsx (excel) pour seed la db
        </p>
    </header>

   <form id="excelForm" class="space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 gap-3">
            <label class="text-sm font-medium text-gray-700">Fichier Excel (.xlsx)</label>

            <div class="flex items-center gap-4">
                <input
                    id="fileInput"
                    name="excel_file"
                    type="file"
                    accept=".xlsx,.xls"
                    required
                    class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4
                           file:rounded-md file:border-0 file:text-sm file:font-medium
                           file:bg-white file:cursor-pointer"
                />

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
                <li>Format accepté : <code>.xlsx</code> ou <code>.xls</code>.</li>
                <li>Le fichier sera utilisé pour seed la base de données.</li>
            </ul>
        </div>
    </form>

    @if (session('success'))
        <div id="responseBox" class="mt-4 p-4 rounded-lg border">{{ session('success') }}</div>
    @else
        <div id="responseBox" class="hidden mt-4 p-4 rounded-lg border"></div>
    @endif

    <div class="grid grid-cols-2 gap-3 mt-6">
        <form method="POST" action="/backup" class="flex justify-center">
            @csrf
            <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white text-sm font-semibold rounded-lg shadow-sm
                hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Sauvegarder données
            </button>
        </form>

        <form method="POST" action="/restore" class="flex justify-center">
            @csrf
            <button type="submit"
                class="inline-flex items-center gap-2 px-4 py-2 bg-red-600 text-white text-sm font-semibold rounded-lg shadow-sm
                hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Restaurer données
            </button>
        </form>
    </div>

    <div class="mt-6 text-center">
        <h2>
            @if($lastBackup)
                Dernière sauvegarde : {{ $lastBackup }}
            @else
                Aucune sauvegarde trouvée
            @endif
        </h2>
    </div>
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
        const allowed = /\.(xlsx|xls)$/i;
        if (!allowed.test(name)) {
            info.textContent = 'Fichier non supporté — uniquement .xlsx/.xls.';
            input.value = '';
            return;
        }

        info.textContent = `Fichier sélectionné : ${name} — ${Math.round(file.size / 1024)} KB`;
    });

document.getElementById('excelForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    const form = e.target;
    const formData = new FormData(form);

    const responseBox = document.getElementById('responseBox');
    const upload_btn = document.getElementById('upload_btn');

    upload_btn.classList.add('pointer-events-none');
    upload_btn.textContent = 'En cours...';
    upload_btn.disabled = true;
    const response = await fetch("{{ route('excel.upload') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
        },
        body: formData
    });

    const result = await response.json();

    upload_btn.classList.remove('pointer-events-none');
    upload_btn.textContent = 'Importer';
    upload_btn.disabled = false;

    responseBox.classList.remove('hidden');
    console.log(result);
    if (result.success) {
        responseBox.textContent = result.message;
        responseBox.className = "mt-4 p-4 rounded-lg border border-green-300 bg-green-100 text-green-800";
    } else {
        responseBox.textContent = result.message ?? "Erreur lors de l'import.";
        responseBox.className = "mt-4 p-4 rounded-lg border border-red-300 bg-red-100 text-red-800";
    }
});

</script>
@endsection
