<?php

        $portserie = "/dev/ttyUSB0" ;
        $trame1 = "$"."mouvement,0,temperature,1,humidite,0,lumiere,1;";
	if($ouv = fopen($portserie, 'w'))
	{
        fputs($ouv, $trame1);
	fclose($ouv);
	}
	if($ouvertureFichier = fopen($portserie, 'r'))
{

        $lecture = fgets($ouvertureFichier, 4096);
        fclose($ouvertureFichier);
}


$mouvement=$lecture[10];
$temperature = $lecture[24].$lecture[25].$lecture[26].$lecture[27].$lecture[28];
$humidite = $lecture[39].$lecture[40].$lecture[41].$lecture[42].$lecture[43];
$lumiere = $lecture[53].$lecture[54].$lecture[55].$lecture[56].$lecture[57].$lecture[58];


                echo"<table border='1'>";
                echo"<tr>";
                        echo"<th>Salle</th>";
                        echo"<th>Présence</th>";
                        echo"<th>Température</th>";
                        echo"<th>Humidité</th>";
                        echo"<th>Lumière</th>";

                echo"</tr>";
       echo"<tr>";
             echo"  <th>B22</th>";
             echo" <td>",$mouvement,"</td>";
             echo  "<td>",$temperature,"°C"."</td>";
             echo"<td>",$humidite,"%"."</td>";
             echo"  <td>",$lumiere,"</td>";
       echo"</tr>";

             echo" </table>";


?>

