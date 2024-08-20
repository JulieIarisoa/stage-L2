<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modifier.css">
    <style>
        body{
            background-color: #999;
        }
        .close{
            background-color: rgba(245, 37, 37, 0.904);
            width:40px;
            float: right;
            border: none;
            margin: 0;
        }
        .close a{
            color: white;
            text-decoration: none;
            font-weight: bolder;
        }
    </style>
</head>
<body>
<?php
            date_default_timezone_set('Indian/Antananarivo');
            $heure=date('H:i:s');
        // verifier que le bouton ajouter est bien cliquer
        if(isset($_POST['btn']))
        {
            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($numero_personnel) && isset($motif))
            {
                //connectio à la base de données
                include_once "bd.php";

                //requête d'ajout
                $req = mysqli_query($con, "INSERT INTO permission VALUES (Null, '$numero_personnel', CURRENT_DATE(),'$heure', '00:00:00', '$motif')");
                if($req)
                {
                    //requete d'ajout avec succés 
                    header("Location: permission.php");
                }else
                {
                    $message = "Permission non ajouté";
                }
            }else
            {
                //rah tsy misy inona ny champ
                $message= "Veuillez remplir tous les champs !";
            }
        }
    ?>
    <div class="formulaire">
        <button class="close"><a href="permission.php">x</a></button>
        <h1>Ajouter un permission</h1>
        <p>
            <?php
                //rah misy ilay variable message
                if(isset($message))
                {
                    echo $message;
                }
            ?>
        </p>

        <form action="" method="post">
            <label>Numéro presonnel</label>
            <input type="text" name="numero_personnel"><br>
            <label>Motif</label>
            <input type="text" name="motif"><br>

            <input type="submit" value="Ajouter" name="btn" class="btn">
            <input type="reset" value="Annuler" class="btn">
        </form>
    </div>
</body>
</html>