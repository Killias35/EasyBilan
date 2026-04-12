@if (isset($devi) && $devi != null && $devi->chantier != null)
    @php
        $chantier = $devi->chantier;
        $client = $devi->client;
    @endphp

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
                <img src="logo.jpg" alt="Logo">
            </div>
        </section>

        <section class="title">
            <h2>
                FACTURE de Situation n° {{ data_get($devi, 'numero_situation', '#')}}
            </h2>

            <div class="meta">
                <div>Date : {{ data_get($devi, 'today') }}</div>
                <div>Numéro : {{ data_get($devi, 'id') }}</div>
                <div>Échéance : {{ data_get($devi, 'echeance') }}</div>
                <div>N° Devis : {{ data_get($devi, 'id_devis') }}</div>
            </div>
        </section>

        <section class="section">
            <h3>Chantier</h3>

            <div class="grid">
                <div>
                    <strong>Nom :</strong>
                    {{ $chantier->nom_chantier }}
                </div>

                <div>
                    <strong>N° :</strong>
                    {{ $chantier->id }}
                </div>

                <div>
                    <strong>Adresse :</strong>
                    {{ $chantier->adresse_chantier }}
                </div>

                <div>
                    <strong>Ville :</strong>
                    {{ $chantier->code_postal_chantier }}
                    {{ $chantier->ville_chantier }}
                </div>

                <div>
                    <strong>Conducteur :</strong>
                    {{ $chantier->conducteur }}
                </div>
            </div>
        </section>

        <section class="section">
            <h3>Destinataire</h3>

            <div class="grid">
                <div>
                    <strong>client :</strong>
                    {{ $client->nom_client }}
                </div>

                <div>
                    <strong>Téléphone :</strong>
                    {{ $client->tel }}
                </div>

                <div>
                    <strong>Adresse :</strong>
                    {{ $client->adresse_client }}
                </div>

                <div>
                    <strong>Ville :</strong>
                    {{ $client->code_postal_client }}
                    {{ $client->ville_client }}
                </div>

                <div>
                    <strong>TVA Intra :</strong>
                    {{ $client->tva_intra }}
                </div>

                <div>
                    <strong>RCS :</strong>
                    {{ $client->rcs }}
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
