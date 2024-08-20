<?php
    //connection à la base de données
    include_once "bd.php";

    // recuperation de l'id dans le lien
    $id = $_GET['id'];

    //requete de suppression
    $req= mysqli_query($con,"DELETE  FROM entre WHERE id_entre = $id");

    //miverina any @ page index.php
    header("Location:entre.php");
?>