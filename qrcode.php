<?php
    require_once "phpqrcode/qrlib.php";
    $path = 'codeqr/';
    $qrcode = $path.time().".png";

    $exemple = "fhjhgfmhlhdkfhlqeh";
    QRcode::png($exemple,$qrcode, 'H', 4, 4);
    echo "<img src='".$qrcode."'>";
?>