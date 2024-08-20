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
    // date et heure aujourd'hui
            $date= date('d/m/20y');
            date_default_timezone_set('Indian/Antananarivo');
            $heure=date('H:i:s');

    //id de personnel arrivée 
        $id = $_GET['id'];

        // verifier que le bouton ajouter est bien cliquer
        if(isset($_POST['btn']))
        {
            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($materiel_apporter))
            {
                //connectio à la base de données
                include_once "bd.php";

                //requête d'ajout
                $req = mysqli_query($con, "INSERT INTO entre VALUES (Null, '$id', CURRENT_DATE(),'$heure', '$materiel_apporter')");
                if($req)
                {
                    //requete d'ajout avec succés 
                    header("Location: entre.php");
                }else
                {
                    $message = "Entrée non ajouté";
                }
            }else
            {
                //rah tsy misy inona ny champ
                $message= "Veuillez remplir tous les champs !";
            }
        }
    ?>
    <div class="formulaire">
        <button class="close"><a href="entre.php">x</a></button>
        <h1>Ajouter un personnel</h1>
        <?php 
            print $date;
            print $heure;
        ?>
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
            <label>Materiel apporter</label>
            <input type="texte" name="materiel_apporter"><br>

            <input type="submit" value="Ajouter" name="btn" class="btn">
            <input type="reset" value="Annuler" id="annuler" class="btn">
        </form>
    </div>
</body>
</html>