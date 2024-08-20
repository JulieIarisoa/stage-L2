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
        $req = mysqli_query($con, "SELECT * FROM personnel WHERE numero_personnel = $id");
        $row = mysqli_fetch_assoc($req);

        // verifier que le bouton ajouter est bien cliquer
        if(isset($_POST['btn']))
        {
            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($nom) && isset($prenom) && isset($poste) && $numero_telephone && isset($email))
            {
                //requête de modification
                $req = mysqli_query($con, "UPDATE personnel SET nom='$nom', prenom = '$prenom', poste = '$poste', numero_telephone = '$numero_telephone', email = '$email', age='$age', numero_cin='$numero_cin', adresse='$adresse', nationalite='$nationalite',langue='$langue'  WHERE numero_personnel = $id");
                if($req)
                {
                    //requete d'ajout avec succés 
                    header("Location: personnel.php");
                }else
                {
                    $message = "Personnel non modifier";
                }
            }else
            {
                //rah tsy misy inona ny champ
                $message= "Veuillez remplir tous les champs !";
            }
        }
    ?>
    <div class="formulaire">
        <button class="close"><a href="personnel.php">x</a></button>
        <h3>Modifier le personnel: <?=$row['nom']?></h3>
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
            <label>Nom</label>
            <input type="text" name="nom" value="<?=$row['nom']?>"><br>
            <label>Prénom</label>
            <input type="text" name="prenom" value="<?=$row['prenom']?>"><br>
            <label>Poste</label>
            <input type="text" name="poste" value="<?=$row['poste']?>"><br>
            <label>Numéro téléphone</label>
            <input type="text" name="numero_telephone" value="<?=$row['numero_telephone']?>"><br>
            <label>Email</label>
            <input type="email" name="email" value="<?=$row['email']?>"><br>
            <label>Age</label>
            <input type="number" name="age" value="<?=$row['age']?>"><br>
            <label>Numero CIN</label>
            <input type="text" name="numero_cin" value="<?=$row['numero_cin']?>"><br>
            <label>Adresse</label>
            <input type="adresse" name="adresse" value="<?=$row['adresse']?>"><br>
            <label>Nationalité</label>
            <input type="text" name="nationalite" value="<?=$row['nationalite']?>"><br>
            <label>Langue</label>
            <input type="text" name="langue" value="<?=$row['langue']?>"><br>

            <input type="submit" value="Modifier" name="btn" id="ajout" class="btn" id="modif">
            <input type="reset" value="Annuler" id="annuler" class="btn" id="suppr">
        </form>
    </div>
</body>
</html>