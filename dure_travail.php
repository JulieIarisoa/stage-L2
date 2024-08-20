<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="conteneur">           
    <a href="personnel.php">
        <button class="btn">Retour</button>
    </a>
        <table>
            <tr>
                <th>Numéro personnel</th>
                <th>Dure</th>
                <th>Date</th>
            </tr>
            <?php
                //inclure la page connexion
                include_once "bd.php" ;
                //requete pour afficher
                $req=mysqli_query($con,"SELECT sortie.numero_personnel,TIMEDIFF(sortie.heure_sortie, entre.heure_entre) as dure, entre.date_entre as date_e FROM sortie,entre WHERE (sortie.numero_personnel=entre.numero_personnel) AND entre.date_entre=sortie.date_sortie");
                if(mysqli_num_rows($req)==0)
                {
                    //rah tsis employe ao @ base de données
                    echo "il n'y a pas de personnel ajouter!";
                }else
                {
                    //raha efa misy valeur indray ao @ base données
                    while($row = mysqli_fetch_assoc($req))
                    {
                        ?>
                        <tr>
                            <td><?=$row['numero_personnel']?></td>
                            <td><?=$row['dure']?></td>
                            <td><?=$row['date_e']?></td>
                            <!--atao anaty lien modifier ny id ny employe rehetra -->
                        </tr>
                        <?php
                    }
                }
            ?>

        </table>
    </div>
</body>
</html>