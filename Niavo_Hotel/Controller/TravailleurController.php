<?php
    include('../inc/Function.php');

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $telephone = $_POST['telephone'];
    $civilite = $_POST['civilite'];
    $datenaissance = $_POST['datenaissance'];
    $poste = $_POST['poste'];
    $adresse = $_POST['adresse'];
    $carte = $_POST['carte'];
    $salaire = $_POST['salaire'];

    echo addTravailleur($nom, $prenom, $sexe, $telephone, $civilite, $datenaissance, $poste, $adresse, $carte, $salaire);

    header('Location:../Pages/travailleur.php');
?>