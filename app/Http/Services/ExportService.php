<?php

namespace App\Http\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

use App\Models\Client;
use App\Models\Chantier;
use App\Models\Facture;
use App\Models\Reglement;

use Smalot\PdfParser\Parser;
use Illuminate\Http\UploadedFile;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportService
{
    static function normalizeUtf8(string $text): string
    {
        // Supprime les caractères invalides
        $text = mb_convert_encoding($text, 'UTF-8', 'UTF-8');

        // Fallback si le PDF est en ISO-8859-1 / Windows-1252
        if (!mb_check_encoding($text, 'UTF-8')) {
            $text = mb_convert_encoding($text, 'UTF-8', 'ISO-8859-1');
        }

        return $text;
    }

    public static function ReadPdf(UploadedFile $pdfFile): array
    {
        $parser = new Parser();

        $pdf = $parser->parseFile($pdfFile->getPathname());
        $text = $pdf->getText();
        $text = self::normalizeUtf8($text);
        return [
            'text' => $text,
            'details' => $pdf->getDetails(), // métadonnées
            'pages' => collect($pdf->getPages())->map(function ($page) {
                return $page->getText();
            })->toArray(),
        ];
    }

    public static function GeneratePdfFromText(string $text)
    {
        // conversion simple texte → HTML
        $html = nl2br(e($text));

        return Pdf::loadHTML("
            <html>
                <head>
                    <meta charset='utf-8'>
                    <style>
                        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
                    </style>
                </head>
                <body>
                    $html
                </body>
            </html>
        ");
    }


    public static function Replace(string $text, Facture $facture): string
    {
        preg_match_all('/%%([\w\.]+)%%/', $text, $matches);

        foreach ($matches[1] as $path) {
            $value = data_get($facture, $path);

            if (is_null($value)) {
                continue;
            }

            if (!is_scalar($value)) {
                continue;
            }

            $text = str_replace(
                '%%' . $path . '%%',
                (string) $value,
                $text
            );
        }

        preg_match_all('/%%([\w\.]+)%%/', $text, $matches);

        foreach ($matches[1] as $path) {
            $value = data_get($facture, $path);

            $text = str_replace(
                '%%' . $path . '%%',
                'Pas de valeur pour le champ ' . $path,
                $text
            );
        }

        return $text;
    }

}
