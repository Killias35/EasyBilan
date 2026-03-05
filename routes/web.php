<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcelController;

use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ChantiersController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\ReglementsController;

use App\Http\Controllers\DevisController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientsController::class, 'create'])->name('clients.create');
Route::post('/clients/create', [ClientsController::class, 'store'])->name('clients.store');
Route::get('/clients/edit/{client}', [ClientsController::class, 'edit'])->name('clients.edit');
Route::put('/clients/edit/{client}', [ClientsController::class, 'update'])->name('clients.update');
Route::get('/clients/delete/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

Route::get('/chantiers', [ChantiersController::class, 'index'])->name('chantiers.index');
Route::get('/chantiers/create', [ChantiersController::class, 'create'])->name('chantiers.create');
Route::post('/chantiers/create', [ChantiersController::class, 'store'])->name('chantiers.store');
Route::get('/chantiers/edit/{chantier}', [ChantiersController::class, 'edit'])->name('chantiers.edit');
Route::put('/chantiers/edit/{chantier}', [ChantiersController::class, 'update'])->name('chantiers.update');
Route::get('/chantiers/delete/{chantier}', [ChantiersController::class, 'destroy'])->name('chantiers.destroy');

Route::get('/factures', [FacturesController::class, 'index'])->name('factures.index');
Route::get('/reglements', [ReglementsController::class, 'index'])->name('reglements.index');


Route::get('/db/import', [ExcelController::class, 'show'])->name('excel.show');
Route::post('/db/import/debug', [ExcelController::class, 'debug'])->name('excel.debug');
Route::post('/db/import', [ExcelController::class, 'store'])->name('excel.upload');

Route::get('/devis', [DevisController::class, 'create'])->name('devis.create');
Route::post('/devis/upload', [DevisController::class, 'upload'])->name('devis.upload');

Route::get('/devis/download', [DevisController::class, 'downloadPdf'])->name('devis.download');
