<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcelController;

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ChantiersController;
use App\Http\Controllers\MateriauxController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\ReglementsController;

use App\Http\Controllers\ExportController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\DatabaseController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
Route::post('/clients/create', [ClientsController::class, 'store'])->name('clients.store');
Route::get('/clients/edit/{client}', [ClientsController::class, 'edit'])->name('clients.edit');
Route::put('/clients/edit/{client}', [ClientsController::class, 'update'])->name('clients.update');
Route::get('/clients/delete/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

Route::get('/devis', [DevisController::class, 'index'])->name('devis.index');
Route::get('/devis/addMateriaux', [DevisController::class, 'addMateriaux'])->name('devis.addMateriaux');
Route::get('/devis/create', [DevisController::class, 'create'])->name('devis.create');
Route::post('/devis/create', [DevisController::class, 'store'])->name('devis.store');
Route::get('/devis/edit/{client}', [DevisController::class, 'edit'])->name('devis.edit');
Route::put('/devis/edit/{client}', [DevisController::class, 'update'])->name('devis.update');
Route::get('/devis/delete/{client}', [DevisController::class, 'destroy'])->name('devis.destroy');

Route::get('/chantiers', [ChantiersController::class, 'index'])->name('chantiers.index');
Route::get('/chantiers/create', [ChantiersController::class, 'create'])->name('chantiers.create');
Route::post('/chantiers/create', [ChantiersController::class, 'store'])->name('chantiers.store');
Route::get('/chantiers/edit/{chantier}', [ChantiersController::class, 'edit'])->name('chantiers.edit');
Route::put('/chantiers/edit/{chantier}', [ChantiersController::class, 'update'])->name('chantiers.update');
Route::get('/chantiers/delete/{chantier}', [ChantiersController::class, 'destroy'])->name('chantiers.destroy');

Route::get('/materiaux', [MateriauxController::class, 'index'])->name('materiaux.index');
Route::get('/materiaux/create', [MateriauxController::class, 'create'])->name('materiaux.create');
Route::post('/materiaux/create', [MateriauxController::class, 'store'])->name('materiaux.store');
Route::get('/materiaux/edit/{chantier}', [MateriauxController::class, 'edit'])->name('materiaux.edit');
Route::put('/materiaux/edit/{chantier}', [MateriauxController::class, 'update'])->name('materiaux.update');
Route::get('/materiaux/delete/{chantier}', [MateriauxController::class, 'destroy'])->name('materiaux.destroy');

Route::get('/factures', [FacturesController::class, 'index'])->name('factures.index');
Route::get('/factures/create', [FacturesController::class, 'create'])->name('factures.create');
Route::post('/factures/create', [FacturesController::class, 'store'])->name('factures.store');
Route::get('/factures/edit/{facture}', [FacturesController::class, 'edit'])->name('factures.edit');
Route::put('/factures/edit/{facture}', [FacturesController::class, 'update'])->name('factures.update');
Route::get('/factures/delete/{facture}', [FacturesController::class, 'destroy'])->name('factures.destroy');

Route::get('/reglements', [ReglementsController::class, 'index'])->name('reglements.index');
Route::get('/reglements/create', [ReglementsController::class, 'create'])->name('reglements.create');
Route::post('/reglements/create', [ReglementsController::class, 'store'])->name('reglements.store');
Route::get('/reglements/edit/{reglement}', [ReglementsController::class, 'edit'])->name('reglements.edit');
Route::put('/reglements/edit/{reglement}', [ReglementsController::class, 'update'])->name('reglements.update');
Route::get('/reglements/delete/{reglement}', [ReglementsController::class, 'destroy'])->name('reglements.destroy');


Route::get('/db/import', [ExcelController::class, 'show'])->name('excel.show');
Route::post('/db/import/debug', [ExcelController::class, 'debug'])->name('excel.debug');
Route::post('/db/import', [ExcelController::class, 'store'])->name('excel.upload');

Route::get('/export', [ExportController::class, 'create'])->name('export.create');
Route::post('/export/upload', [ExportController::class, 'upload'])->name('export.upload');

Route::get('/export/download', [ExportController::class, 'downloadPdf'])->name('export.download');

// Reinitialiser la base de données
Route::post('/backup', [DatabaseController::class, 'backup']);
Route::post('/restore', [DatabaseController::class, 'restore']);