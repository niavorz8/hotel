<?php 
include ("Template/header.php");
include('../inc/function.php');

$allChambre = getAllChambre();
$allTypeChambre = getAllTypeChambre();
?>

    <div class="container mt-5">
        <div class="row">
            <!-- Partie gauche : Tableau -->
            <div class="col-md-6">
                <h2>Liste des Chambres</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Type</th>
                            <th>Nombre de lits</th>
                            <th>Prix (par jour)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($allChambre as $data) { ?>
                        <tr>
                            <td><?php echo $data['numero']; ?></td>
                            <td><?php echo $data['typechambrelibelle']; ?></td>
                            <td><?php echo $data['nbrlit']; ?></td>
                            <td><?php echo $data['prix']; ?> Ar</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- Partie droite : Formulaire -->
            <div class="col-md-6">
                <h2>Formulaire Chambre</h2>
                <form method="post" action="../Controller/ChambreController.php">
                    <div class="form-group">
                        <label for="numeroChambre">Numéro de chambre</label>
                        <input type="text" name="numeroChambre" class="form-control" id="numeroChambre" placeholder="Entrez le numéro de chambre">
                    </div>
                    <div class="form-group">
                        <label for="typeChambre">Type de chambre</label>
                        <select class="form-control" name="typeChambre" id="typeChambre">
                            <?php foreach($allTypeChambre as $data) { ?>
                                <option value="<?=$data['id'] ?>"><?=$data['libelle'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nombreLit">Nombre de lits</label>
                        <select class="form-control" name="nombreLit" id="nombreLit">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prixJournalier">Prix journalier</label>
                        <input type="number" name="prixJournalier" class="form-control" id="prixJournalier" placeholder="Entrez le prix journalier">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                    <!-- <button type="button" class="btn btn-warning mr-2">Modifier</button>
                    <button type="button" class="btn btn-danger">Supprimer</button> -->
                </form>
            </div>
        </div>
    </div>
<?php 
include ("Template/footer.php");
?>