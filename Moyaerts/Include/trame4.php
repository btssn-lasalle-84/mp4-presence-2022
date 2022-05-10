<?php
        $portserie = "/dev/ttyUSB0" ;
        $trame4 = "$"."mouvement,1,temperature,1,humidite,1,lumiere,1;";
        $ouv3 = fopen($portserie, 'w');
        fputs($ouv3, $trame4);
        fclose($ouv3);

?>

