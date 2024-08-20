<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>New York</title>
        <style>
            img{
                height:100px;
                border-radius:50% 50% 50% 50%; 
                width: 100px;
            }
        </style>
    </head>
    <body>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="newyork">    
			<input type="submit" value="Voir l'image">
            <input type="reset" value="Annuler" id="annuler">
		</form>
		<?php  
            include_once "bd.php";
		if (isset($_FILES['newyork']['tmp_name'])) {  
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
			echo '<img src="vignettes/' . $_FILES['newyork']['name'] . '">';
            
			echo '<p>' . $_FILES['newyork']['name'] . '"</p>';


            //requête d'ajout
            $newyork = $_FILES['newyork']['name'];
            $req = mysqli_query($con, "INSERT INTO photo VALUES (Null, '$newyork')");
            if($req)
            {
                //requete d'ajout avec succés 
                header("Location: newyork.php");
            }else
            {
                $message = "Image non ajouté";
            }
		}
		?>
    <?php

    
	$req=mysqli_query($con,"SELECT image FROM photo");
    if(mysqli_num_rows($req)==0)
    {
        //rah tsis employe ao @ base de données
        echo "il n'y a pas de photo ajouter!";
    }else
    {
        //raha efa misy valeur indray ao @ base données
        while($row = mysqli_fetch_assoc($req))
        {
                 $nom_image=$row['image'];
                 echo $nom_image;

    if (!is_dir('vignettes'))
        mkdir('vignettes', 0777);
      
    $fichier = opendir('.');
      
    while ($fichier_courant = readdir($fichier)) {
        $extension = strtolower(strrchr($fichier_courant, '.'));
        if ($extension == '.jpg' || $extension == '.jpeg') {
            $nom_vignette = 'vignettes/' . $fichier_courant;
            $taille = getimagesize($fichier_courant);
            $largeur = $taille[0];
            $hauteur = $taille[1];
      
            if (!file_exists($nom_vignette)) {
                $im = imagecreatefromjpeg($fichier_courant);
                $largeur_vignette = 10;
                $hauteur_vignette = $hauteur / $largeur * 150;
                $im_vignette = imagecreatetruecolor($largeur_vignette, $hauteur_vignette);
                imagecopyresampled($im_vignette, $im, 0, 0, 0, 0, $largeur_vignette, $hauteur_vignette, $largeur, $hauteur);
                imagejpeg($im_vignette, $nom_vignette, 60);
            }    
            else {
                if($fichier_courant== $nom_image){
                echo 'Nom de l\'image : ' . $fichier_courant . '<br>
                Largeur : ' . $largeur . '<br>
                Hauteur : ' . $hauteur . '<br><img src="' . $nom_vignette . '" title="Cliquez pour agrandir">
                <hr>';}
            }
        }
    }
}
}
    ?>
    </body>
</html>