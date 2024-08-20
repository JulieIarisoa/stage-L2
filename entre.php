<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="entre.css">
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
    <center>
    <div>
        <?php 
            $date= date('d/m/20y');
            echo "   .\n";
            date_default_timezone_set('Indian/Antananarivo');
            $heure=date('H:i:s');
            echo "   .";
                //inclure la page connexion
                include_once "bd.php" ;
                //requete pour afficher
                $req=mysqli_query($con,"SELECT numero_personnel,nom,prenom,poste,numero_telephone,email FROM personnel WHERE numero_personnel NOT IN (SELECT personnel.numero_personnel FROM personnel JOIN entre ON(personnel.numero_personnel = entre.numero_personnel) WHERE entre.date_entre=CURRENT_DATE())");
                if(mysqli_num_rows($req)==0)
                {
                    //rah tsis employe ao @ base de données
                }else
                {
                    ?>
                    <p class="titre">Liste des personnels non arrivée :</p>
                    <table>
                        <tr>
                            <th>Numéro personnel</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>poste</th>
                            <th>Numéro téléphone</th>
                            <th>Email</th>
                        </tr>
                        <?php
                    //raha efa misy valeur indray ao @ base données
                    while($row = mysqli_fetch_assoc($req))
                    {
                        ?>
                        <tr>
                            <td><?=$row['numero_personnel']?></td>
                            <td><?=$row['nom']?></td>
                            <td><?=$row['prenom']?></td>
                            <td><?=$row['poste']?></td>
                            <td><?=$row['numero_telephone']?></td>
                            <td><?=$row['email']?></td>
                            <td>
                            <a href="entre_ajout.php?id=<?=$row['numero_personnel']?>"><button class="tab_btn"><img src="image/modifier.png" alt="modifier">Arrivée</button></a>
                            </td>
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
                $req=mysqli_query($con,"SELECT * FROM entre WHERE date_entre=CURRENT_DATE()");
                if(mysqli_num_rows($req)==0)
                {
                    //rah tsis employe ao @ base de données
                    echo "il n'y a aucun personnel arrivée aujourd'hui!";
                }else
                {?>
                    <p class="titre">Liste des personnels arrivée :</p>
                    <table>
                        <tr>
                            <th>Numero personnel</th>
                            <th>Date</th>
                            <th>Heure d'arrivée</th>
                            <th>Materiel apporter</th>
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
                            <td><?=$row['date_entre']?></td>
                            <td><?=$row['heure_entre']?></td>
                            <td><?=$row['materiel_apporter']?></td>
                            <!--atao anaty lien modifier ny id ny employe rehetra -->
                            <td><a href="entre_modifier.php?id=<?=$row['id_entre']?>"><button class="tab_btn"><img src="image/modifier.png">Modifier</button></a></td>
                            <td><a href="entre_supprimer.php?id=<?=$row['id_entre']?>"><button class="tab_btn"><img src="image/supprimer.png">Supprimer</button></a></td>
                        </tr>
                        <?php
                    }
                }
            ?>
            </table>

    </div></center>
</body>
</html>