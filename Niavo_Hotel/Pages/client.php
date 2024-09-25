<?php 
include ("Template/header.php");
include('../inc/function.php');

$allChambre = getAllChambre();
$allSexe = getAllGenre();
$allPays = getAllPays();
?>

        <div class="container mt-5">
        <h1>Enregistrement Client</h1>
        <form method="post" action="../Controller/ClientController.php">
            <div class="row">
                <div class="col-md-4">
            <div class="form-group">
                <label for="nomClient">Nom</label>
                <input type="text" name="nom" class="form-control" id="nomClient" placeholder="Entrez le nom">
            </div>
            <div class="form-group">
                <label for="prenomClient">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="prenomClient" placeholder="Entrez le prénom">
            </div>
            <div class="form-group">
                <label for="sexe">Sexe</label>
                <select class="form-control" name="sexe" id="sexe">
                    <?php foreach($allSexe as $data) { ?>
                    <option value="<?=$data['id']?>"><?=$data['libelle']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="telephone">Numéro de téléphone</label>
                <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="Entrez le numéro de téléphone">
            </div>
            <div class="form-group">
                <label for="paysProvenance">Pays de provenance</label>
                <select class="form-control" name="pays" id="paysProvenance">
                    <?php foreach($allPays as $data) { ?>
                        <option value="<?=$data['id']?>"><?=$data['libelle']?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="numeroCarte">Numéro de carte</label>
                <input type="text" name="carte" class="form-control" id="numeroCarte" placeholder="Entrez le numéro de carte">
            </div>
            <div class="form-group">
                <label for="dateEntree">Date d'entrée</label>
                <input type="date" name="dateentre" class="form-control" id="dateEntree">
            </div>
            <div class="form-group">
                <label for="dateSortie">Date de sortie</label>
                <input type="date" name="datesortie" class="form-control" id="dateSortie">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="typeChambre">Chambre</label>
                <select class="form-control" name="chambre" id="typeChambre">
                    <?php foreach($allChambre as $data) { ?>
                        <option value="<?=$data['id']?>"><?=$data['numero'].' - nbr_lit : '.$data['nbrlit'].' - type : '.$data['typechambrelibelle'].' - prix : '.$data['prix'].'Ar' ?></option>
                    <?php } ?>
                </select>
            </div>
        
            
            <button type="submit" class="btn btn-outline-success mt-4">Valider</button>
        </div>
        </form>
    </div>

<?php 
include ("Template/footer.php");
?>