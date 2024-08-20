<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
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
    <?php
                $moi_precedent = date('m') - 1;//moi percedent
                $date_precedent ='2023-'.$moi_precedent.'-01';
                $dated = new DateTime($date_precedent);
                $datef = new DateTime(date('20y-m-d'));
                $interval = new DateInterval('P1D');
                $periode = new DatePeriod($dated,$interval,$datef);

                $datefun=date('20y-m-d');
                ?>
                <a href="personnel.php">
                    <button class="boutton">Retour</button>
                </a>   
                    <center>
                        <img src="image/legend.PNG" alt="image btn">
                        <img src="image/logo.png" id="logo">
                        <h3>Nombre d'absence de chaque personnel entre: <?=$date_precedent;?> jusqu'à <?= $datefun; ?></h3>
    <?php
        include_once "bd.php";

        $reqs=mysqli_query($con,"SELECT * FROM personnel ORDER BY numero_personnel ASC");
        $nb_absence = 0;
        if(mysqli_num_rows($reqs)==0)
        {
            //tsis inoninona
        }
        else
        {
                      while($rows = mysqli_fetch_assoc($reqs))
            {?>
                <table>
                    <tr>
                        <th>Numéro personnel</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nombre d'absence </th>
                    </tr>
    <?php  
                $numero=$rows['numero_personnel'];

                
                foreach($periode as $date)
                {
                    $jour= $date->format('Y-m-d');
                        if(date('N',strtotime($jour))==7)
                        {
                            $nb_absence = $nb_absence;
                        }
                        else
                        {
                            $req=mysqli_query($con,"SELECT * FROM entre WHERE numero_personnel='$numero' AND date_entre='$jour'");
                            if(mysqli_num_rows($req)==0)
                            {
                                $nb_absence=$nb_absence+1;
                            }
                            else
                            {
                                $nb_absence = $nb_absence;
                            }
                        }  
                }
                ?>
                            <tr>
                                <td><?=$rows['numero_personnel']?></td>
                                <td><?=$rows['nom']?></td>
                                <td><?=$rows['prenom']?></td>
                                <td><?=$nb_absence?></td>
                            </tr>
                        </table>
                    </center> 
                <?php
            }
        }
    ?>
</body>
</html>