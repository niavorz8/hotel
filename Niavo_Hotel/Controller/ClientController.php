<?php
    include('../inc/Function.php');

    $nomcl = $_POST['nom'];
    $prenomcl = $_POST['prenom'];
    $sexecl = $_POST['sexe'];
    $telephonecl = $_POST['telephone'];
    $payscl = $_POST['pays'];
    $cartecl = $_POST['carte'];
    $dateentre = $_POST['dateentre'];
    $datesortie = $_POST['datesortie'];
    $chambre = $_POST['chambre'];

    echo addClient($nomcl, $prenomcl, $sexecl, $telephonecl, $payscl, $cartecl, $dateentre, $datesortie, $chambre);

    header('Location:../Pages/client.php');
?>