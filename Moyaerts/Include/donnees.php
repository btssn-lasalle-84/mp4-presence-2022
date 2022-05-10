<?php
$fichierPortSerie = "/dev/ttyUSB0";
$portserie = fopen($fichierPortSerie, 'r');
if ($portserie !== false)
{
        $trame = fgets($portserie, 4096);
        fclose($portserie);
}
else exit("Erreur port !");

// Décodage de la trame reçue
// Format : $Presence,W,Temperature,X,Humidite,Y,Lumiere,Z;
// Exemple : $trame = "$"."Presence,0,Temperature,25.50,Humidite,63,Lumiere,512;\n";
if(!empty($trame))
{
        $trame = rtrim($trame, " ;\r\n");
        $champs = explode(",", $trame);
        $numeroChamp = 0;
        if($champs[$numeroChamp] == '$Presence')
        {
                $mouvement = $champs[$numeroChamp+1];
        }
        $numeroChamp = 2;
        if($champs[$numeroChamp] == 'Temperature')
        {
                $temperature = $champs[$numeroChamp+1];
        }
        $numeroChamp = 4;
        if($champs[$numeroChamp] == 'Humidite')
        {
                $humidite = $champs[$numeroChamp+1];
        }
        $numeroChamp = 6;
        if($champs[$numeroChamp] == 'Lumiere')
        {
                $lumiere = $champs[$numeroChamp+1];
        }

        // La réponse à renvoyer via Ajax
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Salle</th>";
        echo "<th>Présence</th>";
        echo "<th>Température</th>";
        echo "<th>Humidité</th>";
        echo "<th>Lumière</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>B22</th>";
        echo "<td>".$mouvement."</td>";
        echo "<td>".$temperature."°C"."</td>";
        echo "<td>".$humidite."%</td>";
        echo "<td>".$lumiere."</td>";
        echo "</tr>";
        echo "</table>";
}
?>
