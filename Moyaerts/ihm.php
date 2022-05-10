<html>

	<head><title>Oui</title>
	<link rel = "stylesheet" href="stylesheet.css" />

	</head>
        
	<body>
		<header>
			<button id= "auto" href="auto.php">MODE AUTOMATIQUE</button>
		<h1>Projet Présence en mode manuel</h1>
		<div>
			<button id = "bouton" onclick="trame1()">Trame1</button>
                	<button id = "bouton" onclick="trame2()">Trame2</button>
			<button id = "bouton" onclick="trame3()">Trame3</button>
			<button id = "bouton" onclick="trame4()">Trame4</button>
			<button id = "bouton" onclick="donnee()">Affichage des données</button> 
		</div>
		<img src="Images/index.jpeg" alt = "presence" />


		<script>	
			function trame1()
			{
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
header("Refresh:1");
$portserie = "/dev/ttyUSB0" ;
if($ouvertureFichier = fopen($portserie, 'r'))
{

        $lecture = fgets($ouvertureFichier, 4096) ;
        fclose($ouvertureFichier);
}


$mouvement=$lecture[10];
$presence = intval($mouvement);
$temperature = $lecture[24].$lecture[25].$lecture[26].$lecture[27].$lecture[28];
$valTemperature = floatval($temperature);
$humidite = $lecture[39].$lecture[40].$lecture[41].$lecture[42].$lecture[43];
$valHumidite = floatval($humidite);
$lumiere = $lecture[53].$lecture[54].$lecture[55].$lecture[56].$lecture[57].$lecture[58];
$valLumiere = floatval($lumiere);

//////////////////// CONNEXION /////////////////

$serveur = "localhost" ;
$user = "mathieu" ;
$password = "password" ;
$dbName = "presence" ;
$con = mysqli_connect($serveur, $user, $password);
mysqli_select_db($con, $dbName);

/////////////////////REQUETE//////////////////

$requeteTempLum = 'SELECT trames FROM tableauTrames WHERE id="1"';
$requeteTemp = 'SELECT trames FROM tableauTrames WHERE id = "2"';
$requeteLum = 'SELECT trames FROM tableauTrames WHERE id = "3"';
$requeteStop = 'SELECT trames FROM tableauTrames WHERE id = "4"';

///////////////RESULTAT REQUETE////////////////////

$resultatTempLum = mysqli_query($con, $requeteTempLum);
$resultatTemp = mysqli_query($con, $requeteTem);
$resultatLum = mysqli_query($con, $requeteLum);
$resultatStop = mysqli_query($con, $requeteStop);
/*
if(($presence == 1) && ($valLumiere < 400) && ($valTemperature < 20))
{
	$ligne = mysqli_fetch_array($resultatTempLum, MYSQLI_ASSOC);
	if($ouverture = fopen($portserie, 'w'))
	{
		fputs($ouverture, $ligne);
		fclose($ouverture);
	}
}
 */
if(($presence == 1) && ($valTemperature < 20))
{
        $ligne = mysqli_fetch_array($resultatTemp, MYSQLI_ASSOC);
        if($ouverture = fopen($portserie, 'w'))
        {
                fputs($ouverture, $ligne);
                fclose($ouverture);
        }
}
 
if($valLumiere < 400)
{
	//$ligne = mysqli_fetch_array($resultatLum, MYSQLI_ASSOC);
	$ligne = "$"."mouvement,0,temperature,0,humidite,0,lumiere,1;";
	//var_dump($ligne);
	if($ouverture = fopen($portserie, 'w'))
        {
		var_dump($ouverture);
		fputs($ouverture, $ligne);
                fclose($ouverture);
        }
}
if($presence == 0)
{
	$ligne = mysqli_fetch_array($resultatStop, MYSQLI_ASSOC);
        if($ouverture = fopen($portserie, 'w'))
        {
                fputs($ouverture, $ligne);
                fclose($ouverture);
        }
}



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
