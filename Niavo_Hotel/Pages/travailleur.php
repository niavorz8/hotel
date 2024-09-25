<?php 
include ("Template/header.php");
include('../inc/function.php');

$allSexe = getAllGenre();
$allCivilite = getAllCivilite();
$allPoste = getAllPoste();
?>

    <div class="container mt-5">
        <h1>Formulaire Employé</h1>
        <form method="post" action="../Controller/TravailleurController.php">
            <!-- Première partie -->
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrez le nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Entrez le prénom">
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select class="form-control" name="sexe" id="sexe">
                            <?php foreach($allSexe as $data) { ?>
                                <option value="<?=$data['id']?>"><?=$data['libelle']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telephone">Numéro de téléphone</label>
                        <input type="tel" name="telephone" class="form-control" id="telephone" placeholder="Entrez le numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <label for="civilite">Civilité</label>
                        <select class="form-control" name="civilite" id="civilite">
                            <?php foreach($allCivilite as $data) { ?>
                                <option value="<?=$data['id']?>"><?=$data['libelle']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dateNaissance">Date de naissance</label>
                        <input type="date" name="datenaissance" class="form-control" id="dateNaissance">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="poste">Poste</label>
                        <select class="form-control" name="poste" id="poste">
                            <?php foreach($allPoste as $data) { ?>
                                <option value="<?=$data['id']?>"><?=$data['libelle']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Entrez l'adresse">
                    </div>
                    <div class="form-group">
                        <label for="numeroCarte">Numéro de carte</label>
                        <input type="text" name="carte" class="form-control" id="numeroCarte" placeholder="Entrez le numéro de carte">
                    </div>
                </div>
            </div>

            <!-- Deuxième partie -->
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="salaire">Salaire</label>
                        <input type="number" name="salaire" class="form-control" id="salaire" placeholder="Entrez le salaire">
                    </div>
                </div>
            </div>

            <!-- Boutons -->
            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                    <button type="button" class="btn btn-secondary mr-2">Rechercher</button>
                    <button type="button" class="btn btn-warning mr-2">Modifier</button>
                    <button type="button" class="btn btn-danger">Supprimer</button>
                </div>
            </div>
        </form>
    </div>

<?php 
include ("Template/footer.php");
?>