<?php
    //connection à la base de données
    include_once "bd.php";

    // recuperation de l'id dans le lien
    $id = $_GET['id'];
    date_default_timezone_set('Indian/Antananarivo');
    $heure=date('H:i:s');

    //requete de retour
    $req= mysqli_query($con,"UPDATE permission SET heure_retour='$heure' WHERE id_permission='$id'");

    //miverina any @ page index.php
    header("Location:permission.php");
?>