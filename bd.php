<?php
    //connexion à la base de données
    $con = mysqli_connect("localhost","root","","projet_stage");
    if(!$con)
    {
        echo "vous n'êtes pas connecté à la base de données!";
    }
?>