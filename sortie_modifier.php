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
        $req = mysqli_query($con, "SELECT * FROM sortie WHERE id_sortie = $id");
        $row = mysqli_fetch_assoc($req);

        // verifier que le bouton ajouter est bien cliquer
        if(isset($_POST['btn']))
        {
            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($numero_personnel) && isset($date_sortie) && isset($heure_sortie))
            {
                //requête de modification
                $req = mysqli_query($con, "UPDATE sortie SET numero_personnel='$numero_personnel', date_sortie = '$date_sortie', heure_sortie = '$heure_sortie' WHERE id_sortie = $id");
                if($req)
                {
                    //requete d'ajout avec succés 
                    header("Location: sortie.php");
                }else
                {
                    $message = "Sortie non modifier";
                }
            }else
            {
                //rah tsy misy inona ny champ
                $message= "Veuillez remplir tous les champs !";
            }
        }
    ?>
    <div class="formulaire">
        <button class="close"><a href="sortie.php">x</a></button>
        <h3>Modifier entre numéro: <?=$row['id_sortie']?></h3>
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
            <label>Date de sortie</label>
            <input type="date" name="date_sortie" value="<?=$row['date_sortie']?>"><br>
            <label>Heure de sortie</label>
            <input type="time" name="heure_sortie" value="<?=$row['heure_sortie']?>"><br>

            <input type="submit" value="Modifier" name="btn" id="ajout" class="btn" id="modif">
            <input type="reset" value="Annuler" id="annuler" class="btn" id="suppr">
        </form>
    </div>
</body>
</html>