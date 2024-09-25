<?php
    include('../inc/Function.php');

    $numeroChambre = $_POST['numeroChambre'];
    $typeChambre = $_POST['typeChambre'];
    $nombreLit = $_POST['nombreLit'];
    $prixJournalier = $_POST['prixJournalier'];

    echo addChambre($numeroChambre, $typeChambre, $nombreLit, $prixJournalier);

    header('Location:../Pages/chambre.php');
?>