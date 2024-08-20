<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="permission.css">
    <style>
        .boutton{
            background-color: #80034cf8;
            width: 130px;
            height: 40px;
            margin: 5px;
            border: 2px solid #fff;
            font-weight: bolder;
            color: aliceblue;
            font-size: 15px;
            border-radius: 15px;
        }
        .boutton:hover{
            background-color: #fff;
            width: 130px;
            height: 40px;
            margin: 5px;
            border: 2px solid #80034cf8;
            font-weight: bolder;
            color: #80034cf8;
            font-size: 15px;
            border-radius: 15px;
        }
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
                            if($jour=='14' OR ($jour=='28' AND $m=='02') OR $jour=='30')
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
    <div class="div-top">
        <p>.</p>
    </div>
    <div class="conteneur">
        <span><a href="permission_ajout.php"><button class="boutton">+ ajouter</button></a></span>
    <center>
    <p class="titre">Liste des permisions</p>
                    <table>
                        <tr>
                            <th>Numero personnel</th>
                            <th>Date de permission</th>
                            <th>Heure de sortie</th>
                            <th>Heure de retour</th>
                            <th>Motif</th>
                            <th>Duré de permission</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
            <?php
                //inclure la page connexion
                include_once "bd.php" ;
                //requete pour afficher
                $req=mysqli_query($con,"SELECT id_permission,numero_personnel,date_permission, heure_sortie, heure_retour, motif ,TIMEDIFF(heure_retour, heure_sortie) AS dure_permission FROM permission WHERE heure_retour!='00:00:00' AND date_permission=CURRENT_DATE()");
                if(mysqli_num_rows($req)==0)
                {
                    $req_if=mysqli_query($con,"SELECT id_permission,numero_personnel,date_permission, heure_sortie, heure_retour, motif ,TIMEDIFF(heure_retour, heure_sortie) AS dure_permission FROM permission WHERE heure_retour!='00:00:00'");
                    if(mysqli_num_rows($req_if)==0)
                    {
                        echo "Il n'y a aucun permission";
                    }
                    else
                    {?>
                        <?php
                            //raha efa misy valeur indray ao @ base données
                            while($rows = mysqli_fetch_assoc($req_if))
                            {
                                ?>
                                <tr>
                                    <td><?=$rows['numero_personnel']?></td>
                                    <td><?=$rows['date_permission']?></td>
                                    <td><?=$rows['heure_sortie']?></td>
                                    <td><?=$rows['heure_retour']?></td>
                                    <td><?=$rows['dure_permission']?></td>
                                    <td><?=$rows['motif']?></td>
                                    <!--atao anaty lien modifier ny id ny employe rehetra -->
                                    <td><a href="permission_modifier.php?id=<?=$rows['id_permission']?>"><input type="button" value="Modifier" class="tab_btn"></a></td>
                                    <td><a href="permission_supprimer.php?id=<?=$rows['id_permission']?>"><input type="button" value="Supprimer" class="tab_btn"></a></td>
                                </tr>
                                <?php
                            }

                    }
                }else
                {?>
                <?php
                    //raha efa misy valeur indray ao @ base données
                    while($row = mysqli_fetch_assoc($req))
                    {
                        ?>
                        <tr>
                            <td><?=$row['numero_personnel']?></td>
                            <td><?=$row['date_permission']?></td>
                            <td><?=$row['heure_sortie']?></td>
                            <td><?=$row['heure_retour']?></td>
                            <td><?=$row['dure_permission']?></td>
                            <td><?=$row['motif']?></td>
                            <!--atao anaty lien modifier ny id ny employe rehetra -->
                            <td><a href="permission_modifier.php?id=<?=$row['id_permission']?>"><input type="button" value="Modifier" class="tab_btn"></a></td>
                            <td><a href="permission_supprimer.php?id=<?=$row['id_permission']?>"><input type="button" value="Supprimer" class="tab_btn"></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </table>
            <?php
                //inclure la page connexion
                include_once "bd.php" ;
                //requete pour afficher
                $req=mysqli_query($con,"SELECT * FROM permission WHERE heure_retour='00:00:00'");
                if(mysqli_num_rows($req)==0)
                {
                    //rah tsis employe ao @ base de données
                    echo "Il n'y a aucun personnel en permission en ce moment!";
                }else
                {?>
                <p class="titre">Liste des personnels en permission:</p>
                    <table>
            
                    <tr>
                            <th>Numero personnel</th>
                            <th>Date de sortie</th>
                            <th>Heure de sortie</th>
                            <th>Motif</th>
                            <th>Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                        <?php
                    //raha efa misy valeur indray ao @ base données
                    while($row = mysqli_fetch_assoc($req))
                    {
                        ?>
                        <tr>
                            <td><?=$row['numero_personnel']?></td>
                            <td><?=$row['date_permission']?></td>
                            <td><?=$row['heure_sortie']?></td>
                            <td><?=$row['motif']?></td>
                            <!--atao anaty lien modifier ny id ny employe rehetra -->
                            <td><a href="permission_retour.php?id=<?=$row['id_permission']?>"><input type="button" value="Retourner" class="tab_btn"></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>

        </table>
    </div></center>
</body>
</html>