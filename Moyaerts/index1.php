<?php
$fichier = "/dev/ttyUSB0";

if($ouverture = fopen($fichier, w+))
{
	$recup = $_POST['texte'];
	echo $recup ;
	fputs($ouverture, $recuperation);
	echo $recup ;
	fclose($ouverture);
}
else {
	die('Ouverture du fichier impossible');
}

