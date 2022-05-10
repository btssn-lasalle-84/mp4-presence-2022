<?php

        $portserie = "/dev/ttyUSB0" ;
        $trame1 = "$"."mouvement,0,temperature,1,humidite,0,lumiere,0;";
        if($ouv = fopen($portserie, 'w'))
        {
        fputs($ouv, $trame1);
        fclose($ouv);
        }
?>


