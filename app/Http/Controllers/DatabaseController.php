<?php

namespace App\Http\Controllers;

use App\Http\Services\DatabaseService;

class DatabaseController extends Controller
{
    public function backup()
    {
        DatabaseService::backup();
        return back()->with('success', 'Backup créé');
    }

    public function restore()
    {
        DatabaseService::restore();
        return back()->with('success', 'Base restaurée');
    }

    public static function getLastDate()
    {
        return DatabaseService::getLastDate();
    }
}