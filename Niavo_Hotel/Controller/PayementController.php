<?php
    include('../inc/Function.php');

    $client = $_POST['client'];
    $montant = $_POST['montant'];
    $datePayement = date('Y-m-d', (new DateTime())->getTimestamp());

    echo payerChambre($client, $datePayement, $montant);

    header('Location:../Pages/caisse.php');
?>