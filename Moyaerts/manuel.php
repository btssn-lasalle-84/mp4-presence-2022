<html>

	<head><title>MODE MANUEL</title>
	<link rel = "stylesheet" href="stylesheet.css" />

	</head>
        
	<body>
		<h1>PROJET PRESENCE EN MODE MANUEL<h1>
		  <div>
                        <button id = "bouton" onclick="trame1()">Chauffage et Lumière</button>
                        <button id = "bouton" onclick="trame2()">Chauffage</button>
                        <button id = "bouton" onclick="trame3()">Lumière</button>
                        <button id = "bouton" onclick="trame4()">Arrêt</button>
                        <button id = "bouton" onclick="donnee()">Affichage des données</button>
                 </div>
		
<br>
<script>
        function trame1(){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {};
        xhttp.open("GET", "Include/trame1.php", true);
        xhttp.send();
        }
</script>
<script>
        function trame2()
        {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {};
        xhttp.open("GET", "Include/trame2.php", true);
        xhttp.send();
	}
</script>       
<script>
        
        function trame3()
        {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {};
        xhttp.open("GET", "Include/trame3.php", true);
        xhttp.send();
        }
</script>
<script>        
        function trame4()
        {
          var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {};
        xhttp.open("GET", "Include/trame4.php", true);
        xhttp.send();

	}
</script>
<script>
	function donnee()
	{
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {};
		xhttp.open("GET", "Include/donnee.php", true);
		xhttp.send();
	}
</script>
<?php
header("Refresh:3");
$portserie = "/dev/ttyUSB0" ;
if($ouvertureFichier = fopen($portserie, 'r'))
{

        $lecture = fgets($ouvertureFichier, 4096) ;
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

</body>
</html>

