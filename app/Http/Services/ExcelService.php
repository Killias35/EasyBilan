<?php

namespace App\Http\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Carbon\Carbon;

use App\Models\Client;
use App\Models\Chantier;
use App\Models\Facture;
use App\Models\Reglement;
use App\Models\Devis;

class ExcelService
{

    public static function readXlsx(string $filePath): array
    {
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray(null, true, true, true);

        $data = [];

        // La première ligne = headers
        $headers = array_values($rows[2]);
        unset($rows[1]); // on enlève la ligne des headers de categorie
        unset($rows[2]); // on enlève la ligne des headers

        foreach ($rows as $row) {
            $item = [];

            $i = 0;
            foreach ($row as $colValue) {
                str_replace("\n", "", $colValue);
                $key = $headers[$i] ?? "col_$i";
                $item[$key] = $colValue;
                $i++;
            }

            $data[] = $item; // retourne chaque ligne sous forme d'objet
        }
        return $data;
    }

    public static function toNumber($v) {
        if (is_null($v)) {
            return null;
        }
        $v = preg_replace('/[^0-9,.\-]/', '', $v);
        return floatval(str_replace(',', '', $v));
    }



    public static function GetData($path): array
    {
        try {
            $data = self::readXlsx($path);
            $clients = [];
            $clientsId = [];
            $devis = [];
            $devisId = [];
            $chantiers = [];
            $chantiersId = [];
            $factures = [];
            $facturesId = [];
            $reglements = [];

            foreach ($data as $row) {
                // --- CLIENT ---
                if (!empty($row["N° Client"]) && !in_array($row["N° Client"], $clientsId)) {
                    $clients[] = [
                        "id" => $row["N° Client"] ?? null,
                        "civilite" => $row["Civilite"] ?? null,
                        "nom_client" => $row["Nom Client"] ?? null,
                        "adresse_client" => $row["Adresse Client"] ?? null,
                        "code_postal_client" => $row["Code postal Client"] ?? null,
                        "ville_client" => $row["Ville Client"] ?? null,
                        "tel" => $row["Tél"] ?? null,
                        "tva_intra" => $row["TVA intra"] ?? null,
                        "rcs" => $row["RCS"] ?? null
                    ];
                    $clientsId[] = $row["N° Client"];
                }

                // --- CHANTIER ---
                if (!empty($row["N° Chantier"]) && !in_array($row["N° Chantier"], $chantiersId)) {
                    $id_chantier = $row["N° Chantier"];
                    $devis[] = [
                        "id" => $row["N° Chantier"] ?? null,
                        "id_client" => $row["N° Client"] ?? null,
                        "date_devis" => date('Y-m-d'),
                        "duree_validite" => date('Y-m-d')
                    ];
                    $chantiers[] = [
                        "id" => $row["N° Chantier"] ?? null,
                        "id_devis" => $row["N° Chantier"] ?? null,
                        "nom_chantier" => $row["Nom Chantier"] ?? null,
                        "adresse_chantier" => $row["Adresse Chantier"] ?? null,
                        "code_postal_chantier" => $row["Code Postal Chantier"] ?? null,
                        "ville_chantier" => $row["Ville Chantier"] ?? null,
                        "conducteur" => $row["Conducteur"] ?? null,
                    ];
                    $chantiersId[] = $row["N° Chantier"];
                }

                // --- FACTURE ---
                if (!empty($row["N° Facture"]) && !in_array($row["N° Facture"], $facturesId)) {
                    try{
                        $date = Carbon::createFromFormat('d/m/Y', $row["Date"])->format('Y-m-d');
                    }
                    catch (\Throwable $th) {
                        $date = now();
                    }
                    try{
                        $dateEcheance = Carbon::createFromFormat('d/m/Y', $row["Echéance"])->format('Y-m-d');
                    }
                    catch (\Throwable $th) {
                        $dateEcheance = now();
                    }
                    $affacturage = $row["Affacturage"] ?? null;
                    $affacturage = $affacturage == "TRUE" ? true : ($affacturage == "FALSE" ? false : null);
                    
                    $factures[] = [
                        "id" => $row["N° Facture"] ?? null,
                        "id_devis" => $row["N° Chantier"] ?? null,
                        "numero_situation" => self::toNumber($row["N°Situation"] ?? 1),
                        "pv_numero" => self::toNumber($row["P.V. N°"] ?? null),
                        "date_facture" => $date,
                        "sous_total" => self::toNumber($row["Sous-total"] ?? null),
                        "montant_facture" => self::toNumber($row["Montant Facturé"] ?? null),
                        "echeance" => $dateEcheance,
                        "affacturage" => $affacturage
                    ];   
                    $facturesId[] = $row["N° Facture"];
                }
                
                // --- REGLEMENT ---
                if (!empty($row["N° Facture"]) && !empty($row["Date Règlement"]) && !empty($row["Montant Réglé"])) {
                    try{
                        $date = Carbon::createFromFormat('d/m/Y', $row["Date Règlement"])->format('Y-m-d');
                    }
                    catch (\Throwable $th) {
                        $date = "1800-01-01";
                    }

                    $reglements[] = [
                        "id_facture" => $row["N° Facture"],
                        "date_reglement" => $date,
                        "montant_regle" => self::toNumber($row["Montant Réglé"]),
                    ];
                }
            }
            return [
                "success" => true,
                "clients" => $clients,
                "devis" => $devis,
                "chantiers" => $chantiers,
                "factures" => $factures,
                "reglements" => $reglements,
            ];
        } catch (\Throwable $th) {
            return [
                "success" => false, 
                "message" => [
                    "message" => $th->getMessage(),
                    "file"    => $th->getFile(),
                    "line"    => $th->getLine(),
                    "trace"   => $th->getTraceAsString()
                ]
            ];
        }
    }

    public static function SeedData(array $data): array
    {
        $newClientsId = [];
        $newDevisId = [];
        $newChantiersId = [];
        $newFacturesId = [];
        try{
            $clients = [];
            foreach ($data['clients'] ?? [] as $item) {
                $client = Client::create($item);
                $clients[] = $client;
                $newClientsId[$item['id']] = $client->id;
            }
            $devis = [];
            foreach ($data['devis'] ?? [] as $item) {
                $devi = Devis::create([
                    "id_client" => $newClientsId[$item['id_client']],
                    "date_devis" => now(),
                    "duree_validite" => now(),
                    "sous_total" => 0
                ]);

                $devis[] = $devi;
                $newDevisId[$item['id']] = $devi->id;
            }

            $chantiers = [];
            foreach ($data['chantiers'] ?? [] as $item) {
                $chantier = Chantier::create([
                        "id_devis" => $newDevisId[$item['id_devis']], 
                        "nom_chantier" => $item['nom_chantier'], 
                        "adresse_chantier" => $item['adresse_chantier'], 
                        "code_postal_chantier" => $item['code_postal_chantier'], 
                        "ville_chantier" => $item['ville_chantier'], 
                        "conducteur" => $item['conducteur']]);

                $chantiers[] = $chantier;
                $newChantiersId[$item['id']] = $chantier->id;
            }

            $factures = [];
            foreach ($data['factures'] ?? [] as $item) {
                if(!isset($item['id_devis'])) {
                    continue;
                }
                $facture = Facture::create([
                    "id_devis" => $newDevisId[$item['id_devis']], 
                    "numero_situation" => $item['numero_situation'], 
                    "pv_numero" => $item['pv_numero'], 
                    "date_facture" => $item['date_facture'], 
                    "sous_total" => $item['sous_total'], 
                    "montant_facture" => $item['montant_facture'], 
                    "echeance" => $item['echeance'], 
                    "affacturage" => $item['affacturage']]);
                $factures[] = $facture;
                $newFacturesId[$item['id']] = $facture->id;
            }

            $reglements = [];
            foreach ($data['reglements'] ?? [] as $item) {
                if(!isset($newFacturesId[$item['id_facture']])) {
                    continue;
                }
                $reglement = Reglement::create([
                    "id_facture" => $newFacturesId[$item['id_facture']], 
                    "date_reglement" => $item['date_reglement'], 
                    "montant_regle" => $item['montant_regle']]);
                $reglements[] = $reglement;
            }
            
            return [
                "success" => true,
                "clients" => $clients,
                "devis" => $devis,
                "chantiers" => $chantiers,
                "factures" => $factures,
                "reglements" => $reglements,
                "debug" => $newFacturesId
        ];
        
        } catch(\Throwable $th) {
            return [
                "success" => false, 
                "message" => [
                    "message" => $th->getMessage(),
                    "file"    => $th->getFile(),
                    "line"    => $th->getLine(),
                    "trace"   => $th->getTraceAsString()
                ],
                "data" => $data,
                "newClientsId" => $newClientsId,
                "newDevisId" => $newDevisId,
                "newChantiersId" => $newChantiersId,
                "newFacturesId" => $newFacturesId
            ];
        }
    }
}
