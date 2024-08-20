<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modifier.css">
    <style>
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
        //connectio à la base de données
        include_once "bd.php";

        //recuperation de d'id
        $id = $_GET['id'];

        //requête d'affiche des info de l'employé
        $req = mysqli_query($con, "SELECT * FROM entre WHERE id_entre = $id");
        $row = mysqli_fetch_assoc($req);

        // verifier que le bouton ajouter est bien cliquer
        if(isset($_POST['btn']))
        {
            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($numero_personnel) && isset($date_entre) && isset($heure_entre) && isset($materiel_apporter))
            {
                //requête de modification
                $req = mysqli_query($con, "UPDATE entre SET numero_personnel='$numero_personnel', date_entre = '$date_entre', heure_entre = '$heure_entre', materiel_apporter = '$materiel_apporter' WHERE id_entre = $id");
                if($req)
                {
                    //requete d'ajout avec succés 
                    header("Location: entre.php");
                }else
                {
                    $message = "Entrée non modifier";
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
        <h3>Modifier entre numéro: <?=$row['id_entre']?></h3>
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
            <input type="number" name="numero_personnel" value="<?=$row['numero_personnel']?>"><br>
            <label>Date d'entrée</label>
            <input type="date" name="date_entre" value="<?=$row['date_entre']?>"><br>
            <label>Heure d'entrée</label>
            <input type="time" name="heure_entre" value="<?=$row['heure_entre']?>"><br>
            <label>Materiel apporter</label>
            <input type="text" name="materiel_apporter" value="<?=$row['materiel_apporter']?>"><br>

            <input type="submit" value="Modifier" name="btn" id="ajout" id="modif" class="btn">
            <input type="reset" value="Annuler" id="annuler" class="btn" id="suppr">
        </form>
    </div>
</body>
</html>