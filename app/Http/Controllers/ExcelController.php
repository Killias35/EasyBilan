<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ExcelService;
use App\Models\Chantier;
use App\Http\Controllers\DatabaseController;

class ExcelController extends Controller
{
    public static function show()
    {
        $lastBackup  = DatabaseController::getLastDate();
        return view('upload_excel', compact('lastBackup'));
    }

    public static function store(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('excel_file'); 

        // Path temporaire
        $path = $file->getRealPath();
        $data = ExcelService::GetData($path);
        
        if (!$data["success"] ?? false) {
            return response()->json([
                'success' => false,
                'message' => "data non chargé",
                'data' => $data
            ]);
        }

        $ret = ExcelService::SeedData($data);
        
        if ($ret["success"] ?? false) {
            $msg = "data bien chargé";
        }
        else {
            $msg = "data non chargé";
        }
        return response()->json([
            'success' => true,
            'message' => $msg,
            'data' => $ret
        ]);
    }

    public static function debug(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('excel_file'); 

        // Path temporaire
        $path = $file->getRealPath();
        $data = ExcelService::GetData($path);
        
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }
}
