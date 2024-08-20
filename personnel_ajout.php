<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="modifier.css">
</head>
    <body>
        <div class="formulaire">
            <center><h3>Ajouter nouveau personnel</h3></center>
		<form method="post" enctype="multipart/form-data">
            <label>Nom</label>
            <input type="text" name="nom"><br>
            <label>Prénom</label>
            <input type="text" name="prenom"><br>
            <label>Poste</label>
            <input type="texte" name="poste"><br>
            <label>Numéro téléphone</label>
            <input type="texte" name="numero_telephone"><br>
            <label>Email</label>
            <input type="email" name="email"><br>
            <label>Age</label>
            <input type="number" name="age"><br>
            <label>Numero CIN</label>
            <input type="text" name="numero_cin"><br>
            <label>Adresse</label>
            <input type="adresse" name="adresse"><br>
            <label>Nationalité</label>
            <input type="text" name="nationalite"><br>
            <label>Langue</label>
            <input type="text" name="langue"><br>
            <label>Photo</label>
			<input type="file" name="newyork">    
			<input type="submit" value="Ajouter" name="btn" class="btn">
            <input type="reset" value="Annuler" id="annuler" class="btn">
		</form></div>

<?php
        // verifier que le bouton ajouter est bien cliquer
            include_once "bd.php";
        if(isset($_POST['btn'])&& isset($_FILES['newyork']['tmp_name']))
        {
			$taille = getimagesize($_FILES['newyork']['tmp_name']);
			$largeur = $taille[0];
			$hauteur = $taille[1];
			$largeur_miniature = 300;
			$hauteur_miniature = $hauteur / $largeur * $largeur_miniature;
			$im = imagecreatefromjpeg($_FILES['newyork']['tmp_name']);
			$im_miniature = imagecreatetruecolor($largeur_miniature, $hauteur_miniature);
			imagecopyresampled($im_miniature, $im, 0, 0, 0, 0, $largeur_miniature, $hauteur_miniature, $largeur, $hauteur);
			imagejpeg($im_miniature, 'vignettes/'.$_FILES['newyork']['name'], 90);
			imagejpeg($im_miniature, $_FILES['newyork']['name'], 90);
            //requête d'ajout
            $newyork = $_FILES['newyork']['name'];

            //envoye des information par post
            extract($_POST);
            
            // verifier que tout les champs ont été remplis
            if(isset($nom) && isset($prenom) && isset($poste) && $numero_telephone && isset($email))
            {
                //connectio à la base de données
                include_once "bd.php";

                //requête d'ajout
                $req = mysqli_query($con, "INSERT INTO personnel VALUES (Null, '$nom', '$prenom','$poste', '$numero_telephone','$email','$age','$numero_cin','$adresse','$nationalite','$langue',Now(),'$newyork')");
                if($req)
                {
                    //requete d'ajout avec succés 
                    echo "ok";
                    header("Location: personnel.php");
                }else
                {
                    $message = "Employé non ajouté";
                }
            }else
            {
                //rah tsy misy inona ny champ
                $message= "Veuillez remplir tous les champs !";
            }
        }
    ?>

    </body>
</html>