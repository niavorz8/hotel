<?php 
include ("Template/header.php");
include('../inc/function.php');

$allClientNonPaye = getAllClientNonPaye();
$allPayement = getAllPayement();
?>

    <div class="container mt-5">
        <!-- Formulaire de recherche -->
        <form class="mb-5">
            <div class="form row">
                <div class="col-md-10">
                    <input type="text" class="form-control" placeholder="Rechercher par nom ou numéro de chambre">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">Rechercher</button>
                </div>
            </div>
        </form>
        <h2>Liste Client non payé</h2>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom et Prenom</th>
                        <th>Telephone</th>
                        <th>Pays</th>
                        <th>Date entrer</th>
                        <th>Date sortie</th>
                        <th>N° Chambre</th>
                        <th>Nbr de jour</th>
                        <th>Prix par jour</th>
                        <th>Montant à payer</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($allClientNonPaye as $data) { ?>
                    <tr class="text-center">
                        <td><?=$data['nom'].' '.$data['prenom']; ?></td>
                        <td><?=$data['telephone'] ?></td>
                        <td><?=$data['libellepays'] ?></td>
                        <td><?=$data['dateentre'] ?></td>
                        <td><?=$data['datesortie'] ?></td>
                        <td><?=$data['numerochambre'] ?></td>
                        <td><?php
                            $jour = ((new DateTime($data['datesortie']))->diff(new DateTime($data['dateentre'])))->format('%a');
                            echo $jour 
                        ?></td>
                        <td><?=$data['prix'] ?> Ar</td>
                        <td><?php
                            $montantPayer = $data['prix']*(int)$jour;
                            echo $montantPayer;
                        ?> Ar</td>
                        <td>
                            <form action="../Controller/PayementController.php" method="post">
                                <input type="hidden" name="client" value="<?=$data['id']?>">
                                <input type="hidden" name="montant" value="<?=$montantPayer?>">
                                <button type="submit" class="btn btn-primary">Payer</button>
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <h2>Liste Payement Effectuer</h2>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nom et Prenom</th>
                            <th>Telephone</th>
                            <th>Pays</th>
                            <th>Date entrer</th>
                            <th>Date sortie</th>
                            <th>N° Chambre</th>
                            <th>Nbr de jour</th>
                            <th>Prix par jour</th>
                            <th>Montant payer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($allPayement as $data) { ?>
                        <tr class="text-center">
                            <td><?=$data['nom'].' '.$data['prenom']; ?></td>
                            <td><?=$data['telephone'] ?></td>
                            <td><?=$data['libellepays'] ?></td>
                            <td><?=$data['dateentre'] ?></td>
                            <td><?=$data['datesortie'] ?></td>
                            <td><?=$data['numerochambre'] ?></td>
                            <td><?php
                                $jour = ((new DateTime($data['datesortie']))->diff(new DateTime($data['dateentre'])))->format('%a');
                                echo $jour 
                            ?></td>
                            <td><?=$data['prix'] ?> Ar</td>
                            <td><?php
                                $montantPayer = $data['prix']*(int)$jour;
                                echo $montantPayer;
                            ?> Ar</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
<?php 
include ("Template/footer.php");
?>