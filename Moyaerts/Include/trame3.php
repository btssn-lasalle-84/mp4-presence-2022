<?php
        $portserie = "/dev/ttyUSB0" ;
        $trame3 = "$"."mouvement,0,temperature,0,humidite,0,lumiere,1;";
        $ouv2 = fopen($portserie, 'w');
        fputs($ouv2, $trame3);
        fclose($ouv2);
?>

