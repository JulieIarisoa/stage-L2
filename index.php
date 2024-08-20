<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    *{
        margin: 0%;
        padding: 0%;
    }

        body{
        background-image: url("image/accu.jpg");
        background-repeat:no-repeat;
        background-size: cover;
    }

    .commence{
        width: 180px;
        height: 60px;
        padding: 5px 20px;
        background-color: rgba(5, 5, 14, 0.322);
        color: #fff;
        border: none;
        font-size: 16px;
        margin-bottom: 10px;
        font-weight: bolder;
        margin-top: 112px;
        margin-left: 200px;
        margin-bottom:56.5px;
    }
    .commence:hover{
    background-color: rgba(0, 183, 255, 0.397);
    width: 200px;
    height: 60px;
}
    .foot{
        height:213px;
        background-color:rgba(0, 0, 0, 0.558);
    }
    .p1{
        color:white;
        font-size: 45px;
        font-weight:bolder;
        margin-left:200px;
        margin-top:150px;
    }
    .p2{
        color:white;
        font-size: 20px;
        font-weight:bolder;
        margin-left:200px;
    }   
    button span {
    cursor: pointer;
    display: inline-block;
    position: relative;
    transition: 0.5s;
    }
    button span:after {
    content: "\00bb";
    position: absolute;
    opacity: 0;
    top: 0;
    right: -20px;
    transition: 0.5s;
    }
    button:hover {
    background-color: #24171b;
    }
    button:hover span {
    padding-right: 25px;
    }
    button:hover span:after {
    opacity: 1;
    right: 0;
    }
    </style>
</head>
<body>
    <div>
        <p class="p1">Gestions de pointage des personnel</p>
        <p class="p2">Au sein du magasin Computer Store Ampasambazaha Fianarantsoa</p>
    </div>
    <li>             
        <a href="login.php">
            <button class="commence"> <span>Commencer </span></button>
        </a>
    </li>
    <div class="foot">
        
    </div>

</body>
</html> 