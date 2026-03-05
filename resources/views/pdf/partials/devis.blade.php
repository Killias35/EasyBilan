@if (isset($facture) && isset($factures) && $facture != null && $factures != null)
    <style>
        .page{max-width:100%;margin:auto;background:#fff;padding:40px;border-radius:6px;box-shadow:0 0 20px rgba(0,0,0,.08)}
        .header{display:flex;justify-content:space-between;align-items:flex-start;border-bottom:4px solid #283592;padding-bottom:20px;margin-bottom:30px}
        .company h1{margin:0;color:#283592;font-size:28px}
        .company p{margin:4px 0;font-size:13px;color:#555}
        .logo img{max-width:220px}
        .title{text-align:right}
        .title h2{margin:0;font-size:30px;color:#283592}
        .meta{margin-top:10px;font-size:13px}
        .meta div{margin:2px 0}
        .section{margin-bottom:30px}
        .section h3{margin-bottom:10px;color:#283592;font-size:16px;border-bottom:1px solid #ddd;padding-bottom:4px}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:20px;font-size:13px}
        .grid strong{color:#000}
        table{width:100%;border-collapse:collapse;font-size:13px;margin-top:15px}
        th,td{border:1px solid #ddd;padding:8px}
        th{background:#f0f2f8;color:#283592;text-align:left}
        td.right,th.right{text-align:right}
        tfoot td{font-weight:bold}
        .totals{margin-top:20px;width:100%}
        .totals td{border:none;padding:6px}
        .totals .label{text-align:right}
        .totals .value{text-align:right;font-weight:bold}
        .final{font-size:22px;color:#e01b84}
        .footer{text-align:center;font-size:11px;color:#666;margin-top:40px;border-top:1px solid #ddd;padding-top:15px}
        .note{text-align:center;font-size:12px;color:#666;margin-top:10px}
    </style>

    <div class="page">
        <section class="header">
            <div class="company">
                <h1>B.E.T. Construction</h1>
                <p>Neuf et Rénovation – Depuis plus de 20 ans</p>
                <p>6 rue d’Ardignon – 44530 DREFFEAC</p>
                <p>Tél : 06.62.17.48.14 / 06.95.02.25.45</p>
                <p>bet.construction.ouest@gmail.com</p>
            </div>
            <div class="logo">
                <img src="resources/image_14065920_0.jpg" alt="Logo">
            </div>
        </section>

        <section class="title">
            <h2>
                FACTURE de Situation n° {{ data_get($facture, 'numero_situation', '#')}}
            </h2>

            <div class="meta">
                <div>Date : {{ data_get($facture, 'today') }}</div>
                <div>Numéro : {{ data_get($facture, 'id') }}</div>
                <div>Échéance : {{ data_get($facture, 'echeance') }}</div>
                <div>N° Client : {{ data_get($facture, 'id_client') }}</div>
            </div>
        </section>

        <section class="section">
            <h3>Chantier</h3>

            <div class="grid">
                <div>
                    <strong>Nom :</strong>
                    {{ data_get($facture, 'chantier.nom_chantier') }}
                </div>

                <div>
                    <strong>N° :</strong>
                    {{ data_get($facture, 'id_chantier') }}
                </div>

                <div>
                    <strong>Adresse :</strong>
                    {{ data_get($facture, 'chantier.adresse_chantier') }}
                </div>

                <div>
                    <strong>Ville :</strong>
                    {{ data_get($facture, 'chantier.code_postal_chantier') }}
                    {{ data_get($facture, 'chantier.ville_chantier') }}
                </div>

                <div>
                    <strong>Conducteur :</strong>
                    {{ data_get($facture, 'chantier.conducteur') }}
                </div>
            </div>
        </section>

        <section class="section">
            <h3>Destinataire</h3>

            <div class="grid">
                <div>
                    <strong>Client :</strong>
                    {{ data_get($facture, 'client.nom_client') }}
                </div>

                <div>
                    <strong>Téléphone :</strong>
                    {{ data_get($facture, 'client.tel') }}
                </div>

                <div>
                    <strong>Adresse :</strong>
                    {{ data_get($facture, 'client.adresse_client') }}
                </div>

                <div>
                    <strong>Ville :</strong>
                    {{ data_get($facture, 'client.code_postal_client') }}
                    {{ data_get($facture, 'client.ville_client') }}
                </div>

                <div>
                    <strong>TVA Intra :</strong>
                    {{ data_get($facture, 'client.tva_intra') }}
                </div>

                <div>
                    <strong>RCS :</strong>
                    {{ data_get($facture, 'client.rcs') }}
                </div>
            </div>
        </section>


        <section class="section">
        <h3>Détail des travaux</h3>
        <table>
        <thead>
        <tr>
        <th>Description</th>
        <th>Unité</th>
        <th class="right">Qté</th>
        <th class="right">Prix unitaire</th>
        <th class="right">TVA</th>
        <th class="right">Total HT</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <td>Exemple 1 x 1 x 0,50</td>
        <td>Autre Exemple</td>
        <td class="right">X</td>
        <td class="right">XXX,XX €</td>
        <td class="right">XX %</td>
        <td class="right">XXX,XX €</td>
        </tr>
        <tr>
        <td>Exemple 2</td>
        <td>Autre Exemple 2</td>
        <td class="right">XX,XX</td>
        <td class="right">XX €</td>
        <td class="right">XX %</td>
        <td class="right">XX €</td>
        </tr>
        <tr>
        <td>Exemple Frais de déplacement</td>
        <td>Autre Exemple</td>
        <td class="right">X</td>
        <td class="right">XX €</td>
        <td class="right">XX %</td>
        <td class="right">XX €</td>
        </tr>
        </tbody>
        </table>
        </section>

        <table class="totals">
        <tr><td class="label">Exemple Sous-total</td><td class="value">X XXX,XX €</td></tr>
        <tr><td class="label">Exemple Frais de gestion XX</td><td class="value">-XX €</td></tr>
        <tr><td class="label">Exemple Total</td><td class="value">XX</td></tr>
        <tr><td class="label">Exemple Retenue de garantie (X %)</td><td class="value">-XX €</td></tr>
        <tr><td class="label final">Exemple Montant facturé</td><td class="value final">XX €</td></tr>
        </table>

        <div class="note">Autoliquidation – Régime de la sous-traitance</div>

        <footer class="footer">
        SARL au capital de 1 000 € – SIRET 920 905 908 00017<br>
        TVA Intracommunautaire : FR14 920 905 908 – Décennale MAAF Pro n°144309410 T‑MCE‑001
        </footer>

    </div>
@else 
    <h1>Facture non trouvée</h1>
@endif
