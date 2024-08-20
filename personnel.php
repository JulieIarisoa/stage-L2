<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="personnel.css">
        <style>
            .notif{
                background-color:red;
                padding: 2px 8px;
                border-radius:50%;
                position: fixed;
                color: white;
                margin-top: 2px;
                margin-left: 150px;
            }
        </style>
    </head>

    <body>
            <?php
            $date= date('d/m/20y');
            $jour= date('d');
            $m= date('m');
            $a= date('20y'); 
            ?>
        <nav>
            <ul>
                <li>            
                    <a href="index.php">
                        <button class="btn" id="btn_logo">C<span class="logo">omputer</span> S<span class="logo">tore</span></button>
                    </a>
                </li>
                <li>             
                    <a href="personnel.php">
                        <button class="btn" id="active_nav"><img src="image/personal.png" alt="image btn"> <span>Personnel</span></button>
                    </a>
                </li>
                <li>
                    <a href="entre.php">
                        <button class="btn"><img src="image/enter.png" alt="image btn"> <span>Entre</span></button>
                    </a>
                </li>
                <li>
                    <a href="sortie.php">
                        <button class="btn"><img src="image/logout.png" alt="image btn"> <span>Sortie</span></button>
                    </a>
                </li>
                <li>
                    <a href="permission.php">
                        <button class="btn"><img src="image/sort.png" alt="image btn"> <span>Permission</span></button>
                    </a>
                </li>
                <!--li>            
                        <?php 
                            if($jour=='15' OR ($jour=='28' AND $m=='02') OR $jour=='30')
                            {
                                echo '<span class="notif">1</span><a href="notification.php"><button class="btn"><img src="image/notif.png" alt="image btn"><span>Notification</span> </button></a>';
                            }
                            else
                            {  
                                echo '<a href="Aucunnotification.php"><button class="btn"><img src="image/nonotif.png" alt="image btn"><span>Notification</span> </button></a>';
                            }
                        ?>   
                    </a>
                </li-->
            </ul>
        </nav>
        <div class="nav-div">
        </div>
        <div class="div-bt">
            <span class="bt"><a href="personnel_ajout.php">+ ajouter</a></span>
            <span class="bt"><a href="personnel_absent.php">Absence</a></span>
            <!--span class="bt"><a href="dure_travail.php">Duré travail</a></span-->
        </div>
            <?php
                include_once "bd.php";
            
                $req=mysqli_query($con,"SELECT * FROM personnel ORDER BY numero_personnel ASC");
                if(mysqli_num_rows($req)==0)
                {
                    //rah tsis employe ao @ base de données
                    echo "il n'y a pas de photo ajouter!";
                }else
                {
                    //raha efa misy valeur indray ao @ base données
                    while($row = mysqli_fetch_assoc($req))
                    {?>
                        <div class="corp"><?php
                        $nom_image=$row['image'];

                        if (!is_dir('vignettes'))
                        mkdir('vignettes', 0777);
        
                        $fichier = opendir('.');
        
                        while ($fichier_courant = readdir($fichier)) 
                        {
                            $extension = strtolower(strrchr($fichier_courant, '.'));
                            if ($extension == '.jpg' || $extension == '.jpeg') 
                            {
                                $nom_vignette = 'vignettes/' . $fichier_courant;
                                $taille = getimagesize($fichier_courant);
                                $largeur = $taille[0];
                                $hauteur = $taille[1];
        
                                if (!file_exists($nom_vignette)) 
                                {
                                    $im = imagecreatefromjpeg($fichier_courant);
                                    $largeur_vignette = 10;
                                    $hauteur_vignette = $hauteur / $largeur * 150;
                                    $im_vignette = imagecreatetruecolor($largeur_vignette, $hauteur_vignette);
                                    imagecopyresampled($im_vignette, $im, 0, 0, 0, 0, $largeur_vignette, $hauteur_vignette, $largeur, $hauteur);
                                    imagejpeg($im_vignette, $nom_vignette, 60);
                                }    
                                else {
                                    if($fichier_courant== $nom_image){
                                    echo '<img src="' . $nom_vignette . '" title="Cliquez pour agrandir" class="indentity">';}
                                }
                            }
                        }
                        
            ?>
             <div class="para"> 
            <center><p><b>Personnel numéro: </b><?=$row['numero_personnel']?></p></center>
            <p><b>Nom: </b><?=$row['nom']?></p>
            <p><b>Prénom: </b><?=$row['prenom']?></p>
            <p><b>Poste: </b><?=$row['poste']?></p>
            <p><b>Numéro téléphone: </b><?=$row['numero_telephone']?></p>
            <p><b>Email: </b><?=$row['email']?></p>
            <p><b>Age: </b><?=$row['age']?></p>
            <p><b>Numéro CIN: </b><?=$row['numero_cin']?></p>
            <p><b>Adresse: </b><?=$row['adresse']?></p>
            <p><b>Nationalité: </b><?=$row['nationalite']?></p>
            <p><b>Langue: </b><?=$row['langue']?></p>
            <p><b>Travail depuis: </b><?=$row['travail_depuis']?> au sein du magasin computer store </p></div>
            <div class="btn_pers"><a href="personnel_supprimer.php?id=<?=$row['numero_personnel']?>"><img src="image/delete.png" alt="image btn" class="btn1">Supprimer</a></div>
            <div class="btn_pers"><a href="personnel_modifier.php?id=<?=$row['numero_personnel']?>"><img src="image/edit.png" alt="image btn" class="btn1">Modifier</a></div>
        </div>
        <?php
                    }
                }
            ?>
    </body>
</html>