<?php
    //connectio à la base de données
    include_once "bd.php";

    //numero personnel sortir
    $id= $_GET['id'];

        //date et heure de sortie
        date_default_timezone_set('Indian/Antananarivo');
        $heure=date('H:i:s');
            
        //requête d'ajout
        $req = mysqli_query($con, "INSERT INTO sortie VALUES (Null, '$id', CURRENT_DATE(),'$heure','False')");
        //
        header("Location:sortie.php");
    ?>