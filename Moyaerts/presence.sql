CREATE DATABASE IF NOT EXISTS presence ;

USE presence ;

CREATE TABLE tableauTrames (
	id int NOT NULL,
	trames VARCHAR(200));

INSERT INTO tableauTrames (id, trames)
VALUES	(1, '$mouvement,0,temperature,1,humidite,0,lumiere,1;'),
	(2, '$mouvement,0,temperature,1,humidite,0,lumiere,0;'),
 	(3, '$mouvement,0,temperature,0,humidite,0,lumiere,1;'),
	(4, '$mouvement,1,temperature,1,humidite,1,lumiere,1;');	


