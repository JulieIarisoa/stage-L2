<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center><h1>Aucun notification aujourd'hui!</h1></center>
    <!--?php
        $dated = new DateTime('2023-01-01');
        $datef = new DateTime('2023-12-31');
        $interval = new DateInterval('P1D');
        $periode = new DatePeriod($dated,$interval,$datef);
        foreach($periode as $date)
        {
            $jour= $date->format('Y-m-d');
                if(date('N',strtotime($jour))==1)
                {
                    echo "c'est lundi";
                }
                else if(date('N',strtotime($jour))==2)
                {
                    echo "c'est mardi";
                }
                else if(date('N',strtotime($jour))==3)
                {
                    echo "c'est mercredi";
                }
                else if(date('N',strtotime($jour))==4)
                {
                    echo "c'est jeudi";
                }
                else if(date('N',strtotime($jour))==5)
                {
                    echo "c'est vendredi";
                }
                else if(date('N',strtotime($jour))==6)
                {
                    echo "c'est samedi";
                }
                else if(date('N',strtotime($jour))==7)
                {
                    echo "c'est dimanche";
                }
                else
                {
                    echo "cc";    
                }
        
        }
    ?-->
</body>
</html>