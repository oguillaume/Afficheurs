use voyageurs;

insert into acces(identifiant,mot_de_passe)
	values('olivier',sha1('bonjour'));

insert into zones(libelle_zone,type_afficheur)
	values('Entrée du Palais du Grand Large','IRIS'),
			('Salle Maupertuis du Palais du Grand Large','ENR'),
			('Entrée Quai Duguay-Trouin','IRIS'),
			('Salon du Quai Duguay-Trouin','ENR');

insert into consignes(libelle_cons) 
	values('ZONE NON FUMEUR'),
			('FERMETURE DU SALON DANS 15 MINUTES ......'),
			('HORAIRES DU SALON SAMEDI 10h00 - 18h00'),
			('HORAIRES DU SALON DIMANCHE 10h00 - 17h00');

insert into securite(libelle_secu)
	values(' ATTEND SES PARENTS A L''ACCUEIL'),
			('ATTENTION CECI EST UNE ALERTE A LA BOMBE  PAS DE PANIQUE');
			
insert into dedicaces(heure_dedi,lieu,auteur)
	values('13h00 - 17h00','Stand Edition  Flammarion','AGOUDJIAN Antoine'),
			('14h00 - 15h00','Stand Edition Grasser','CHALANDON Sorj'),
			('14h00 - 16h00','Stand Edition Gallimard','DEVI Amanda'),
			('10h00 - 12h00','Stand Edition Le Lombard','DUBOIS Pierre');
			
insert into spectacles(libelle_spect,heure)
	values('année 30 le retour ?','14h00 - 17h00'),
			('The killing','17h00 - 19h00'),
			('Kill bill 3','9h00 - 12h00');