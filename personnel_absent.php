<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=".css">
    <style>
        *{
            padding: 0px;
            margin-left: 2px;
            font-family:cursive;
        }
        table{
            display: block;
        }
        
        table, th, td{
            padding: 5px 20px;
            text-align: center;
        }
        table th, td{
            width:200px;
        }
        #logo{
            height: 80px;
            width: 80px;
        }
        .date_in{
            float:right;
            margin-right:5px;
        }
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
    </style>
</head>
<body> 
    <a href="personnel.php">
        <button class="boutton">Retour</button>
    </a>   
        <center>
            <img src="image/legend.PNG" alt="image btn">
            <img src="image/logo.png" id="logo"></center>        

        <form action="" method="post" class="date_in"> <?php 
            $date= date('d/m/20y');
            echo $date;
            date_default_timezone_set('Indian/Antananarivo');
            $heure=date('H:i:s');
            echo "  ".$heure;
            //inclure la page connexion
            include_once "bd.php" ;
        ?>
            <input type="date" name="date_input">
            <input type="submit" value="Rechercher" name="rech" class="boutton">
        </form>
        <center>
        <?php
                if(isset($_POST['rech'])){
                    extract($_POST);
                    if(isset($date_input)){
                
                    //requete pour afficher
                    $req=mysqli_query($con,"SELECT numero_personnel,nom,prenom,poste,numero_telephone,email FROM personnel WHERE numero_personnel NOT IN (SELECT personnel.numero_personnel FROM personnel JOIN entre ON(personnel.numero_personnel = entre.numero_personnel) WHERE entre.date_entre='$date_input')");
                    if(mysqli_num_rows($req)==0)
                    {
                        //rah tsis employe ao @ base de données
                        echo "Aujourd'hui, il n'y a aucun personnel absent!";
                    }else
                    {?>
                </center>
                        <p>Liste des absents en <?=$date_input?>:</p>
                        <center>
                        <table>
                            <tr>
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
                                <td><?=$row['nom']?></td>
                                <td><?=$row['prenom']?></td>
                                <td><?=$row['poste']?></td>
                                <td><?=$row['numero_telephone']?></td>
                                <td><?=$row['email']?></td>
                                <!--atao anaty lien modifier ny id ny employe rehetra -->
                            </tr>
                            <?php
                        }
                    }
                }
            }
                ?>
        </table>

                <?php
                /************************************************************************************************** */
                    //requete pour afficher
                    $req=mysqli_query($con,"SELECT numero_personnel,nom,prenom,poste,numero_telephone,email FROM personnel WHERE numero_personnel NOT IN (SELECT personnel.numero_personnel FROM personnel JOIN entre ON(personnel.numero_personnel = entre.numero_personnel) WHERE entre.date_entre=CURRENT_DATE())");
                    if(mysqli_num_rows($req)==0)
                    {
                        //rah tsis employe ao @ base de données
                        echo "Aujourd'hui, il n'y a aucun personnel absent!";
                    }else
                    {?></center>
                    <p>Liste des absents au jourd'hui:</p>
                    <center>
                        <table>
                            <tr>
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
                                <td><?=$row['nom']?></td>
                                <td><?=$row['prenom']?></td>
                                <td><?=$row['poste']?></td>
                                <td><?=$row['numero_telephone']?></td>
                                <td><?=$row['email']?></td>
                                <!--atao anaty lien modifier ny id ny employe rehetra -->
                            </tr>
                            <?php
                        }
                    }
                ?>
        </table>

        </center>
</body>
</html>