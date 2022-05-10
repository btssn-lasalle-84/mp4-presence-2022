<html>
	<head>
                <title>MODE MANUEL</title>
	        <link rel="stylesheet" href="stylesheet.css" />
	</head>
	<body>
		<h1>PROJET PRESENCE EN MODE MANUEL</h1>
                <!-- Les boutons de commande -->
                <div>
                        <button id="bouton" onclick="commander()">Chauffage et Lumière</button>
                        <button id="bouton" onclick="commanderChauffage()">Chauffage</button>
                        <button id="bouton" onclick="commanderLumiere()">Lumière</button>
                        <button id="bouton" onclick="arreter()">Arrêt</button>
                </div>
                <br />
                <!-- Les données seront affichées ici -->
                <div id="donnees"></div>
                <!-- Les scripts Ajax -->
                <script>
                        function commander()
                        {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {};
                                xhttp.open("GET", "Include/commande.php", true);
                                xhttp.send();
                        }

                        function commanderChauffage()
                        {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {};
                                xhttp.open("GET", "Include/commande-chauffage.php", true);
                                xhttp.send();
                        }

                        function commanderLumiere()
                        {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {};
                                xhttp.open("GET", "Include/commande-lumiere.php", true);
                                xhttp.send();
                        }

                        function arreter()
                        {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {};
                                xhttp.open("GET", "Include/arret.php", true);
                                xhttp.send();
                        }

                        function recupererDonnees()
                        {
                                var xhttp = new XMLHttpRequest();
                                <!-- Les états de readyState sont les suivants : -->
                                <!--         0: non initialisé -->
                                <!--         1: connexion établie -->
                                <!--         2: requête reçue -->
                                <!--         3: réponse en cours -->
                                <!--         4: terminé (le seul vraiment utile) -->
                                xhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                                document.getElementById("donnees").innerHTML = this.responseText;
                                        }
                                        else
                                        {
                                                document.getElementById("donnees").innerHTML = "<p>Pas de données</p>";
                                        }
                                };
                                xhttp.open("GET", "Include/donnees.php", true);
                                xhttp.send();
                        }

                        <!-- Appel périodique pour récupérer les données -->
                        setInterval(recupererDonnees, 5000); // ici toutes les 5 secondes
                </script>
        </body>
</html>
