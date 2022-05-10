<?php
        $portserie = "/dev/ttyUSB0" ;
        $trame4 = "$"."mouvement,0,temperature,0,humidite,0,lumiere,0;";
        $ouv3 = fopen($portserie, 'w');
        fputs($ouv3, $trame4);
        fclose($ouv3);

?>


