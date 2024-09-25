<?php 
include ("Template/header.php");
include('../inc/function.php');

$allClient = getAllClient();
$allTravailleur = getAllTravailleur();
$countTravailleur = 0;
?>

    <div class="container mt-5">
        <h1>Historique</h1>

        <!-- Tableau des clients -->
        <div class="mt-4">
            <h2>Liste des Clients</h2>
            
            <div class="mb-4">
                <input type="text" class="form-control" id="searchClient" onkeyup="searchTableClient()" placeholder="Rechercher par nom ou numéro de chambre">
            </div>
            
            <table class="table table-bordered" id="tableClient">
                <thead class="thead-light">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Numéro de téléphone</th>
                        <th>Provenance</th>
                        <th>Numéro de carte</th>
                        <th>Date d'entrée</th>
                        <th>Date de sortie</th>
                        <th>Nombre de jours</th>
                        <th>Numéro de chambre</th>
                        <th>Prix par jour</th>
                        <th>Total à payer</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($allClient as $data) { ?>
                    <tr>
                        <td><?=$data['nom'] ?></td>
                        <td><?=$data['prenom'] ?></td>
                        <td><?=$data['libellesexe'] ?></td>
                        <td><?=$data['telephone'] ?></td>
                        <td><?=$data['pays'] ?></td>
                        <td><?=$data['carte'] ?></td>
                        <td><?=$data['dateentre'] ?></td>
                        <td><?=$data['datesortie'] ?></td>
                        <td><?php
                            $jour = ((new DateTime($data['datesortie']))->diff(new DateTime($data['dateentre'])))->format('%a');
                            echo $jour 
                        ?></td>
                        <td><?=$data['numerochambre'] ?></td>
                        <td><?=$data['prix'] ?></td>
                        <td><?php
                            $montantPayer = $data['prix']*(int)$jour;
                            echo $montantPayer;
                        ?> Ar</td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Tableau des travailleurs -->
        <div class="mt-4">
            <h2>Liste des Travailleurs</h2>
            <div class="mb-4">
                <input type="text" class="form-control" id="searchTravail" onkeyup="searchTableTravailleurs()" placeholder="Rechercher par nom, prénom ou poste">
            </div>
            <table class="table table-bordered" id="tableTravail">
                <thead class="thead-light">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Sexe</th>
                        <th>Numéro de téléphone</th>
                        <th>Civilité</th>
                        <th>Date de naissance</th>
                        <th>Poste</th>
                        <th>Adresse</th>
                        <th>Numéro de carte</th>
                        <th>Salaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allTravailleur as $data) { ?>
                    <tr>
                        <td><?=$data['nom'] ?></td>
                        <td><?=$data['prenom'] ?></td>
                        <td><?=$data['sexe'] ?></td>
                        <td><?=$data['telephone'] ?></td>
                        <td><?=$data['civilite'] ?></td>
                        <td><?=$data['datenaissance'] ?></td>
                        <td><?=$data['poste'] ?></td>
                        <td><?=$data['adresse'] ?></td>
                        <td><?=$data['carte'] ?></td>
                        <td><?=$data['salaire'] ?> Ar</td>
                    </tr>
                    
                    <?php 
                    $countTravailleur++;
                    } ?>
                </tbody>
            </table>
        </div>

        <!-- Statistiques en bas de page -->
        <div class="row mt-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre de Clients par Année</h5>
                        <p class="card-text">2024: <?=getSommeClientAnne(2024);?></p>
                        <!-- Ajouter d'autres années si nécessaire -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nombre de Travailleurs</h5>
                        <p class="card-text">Total: <?=$countTravailleur?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recettes Réalisées en 1 Année</h5>
                        <p class="card-text">2024: <?=getRecetteAnne(2024) ?> Ar</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchTableTravailleurs() {
            var input = document.getElementById("searchTravail").value.toLowerCase();
            var table = document.getElementById("tableTravail");
            var tr = table.getElementsByTagName("tr");

            for (var i = 1; i < tr.length; i++) {
                var tdNom = tr[i].getElementsByTagName("td")[0];
                var tdPrenom = tr[i].getElementsByTagName("td")[1];
                var tdPoste = tr[i].getElementsByTagName("td")[6];

                if (tdNom || tdPrenom || tdPoste) {
                    var txtValueNom = tdNom.textContent || tdNom.innerText;
                    var txtValuePrenom = tdPrenom.textContent || tdPrenom.innerText;
                    var txtValuePoste = tdPoste.textContent || tdPoste.innerText;

                    if (txtValueNom.toLowerCase().indexOf(input) > -1 ||
                        txtValuePrenom.toLowerCase().indexOf(input) > -1 ||
                        txtValuePoste.toLowerCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function searchTableClient() {
            var input = document.getElementById("searchClient").value.toLowerCase();
            var table = document.getElementById("tableClient");
            var tr = table.getElementsByTagName("tr");

            for (var i = 1; i < tr.length; i++) {
                var tdNom = tr[i].getElementsByTagName("td")[0];
                var tdPrenom = tr[i].getElementsByTagName("td")[1];
                var numChambre = tr[i].getElementsByTagName("td")[9];

                if (tdNom || tdPrenom || numChambre) {
                    var txtValueNom = tdNom.textContent || tdNom.innerText;
                    var txtValuePrenom = tdPrenom.textContent || tdPrenom.innerText;
                    var txtValueChambre = numChambre.textContent || numChambre.innerText;

                    if (txtValueNom.toLowerCase().indexOf(input) > -1 ||
                        txtValuePrenom.toLowerCase().indexOf(input) > -1 ||
                        txtValueChambre.toLowerCase().indexOf(input) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

<?php 
include ("Template/footer.php");
?>