<?php
// commander() -> Chauffage et Lumière
$fichierPortSerie = "/dev/ttyUSB0" ;
$trame = "$"."mouvement,0,temperature,1,humidite,0,lumiere,1;";
if($portserie = fopen($fichierPortSerie, 'w'))
{
        fputs($portserie, $trame);
        fclose($portserie);
}
?>
