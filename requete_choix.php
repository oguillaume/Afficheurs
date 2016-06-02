<?php 
	$Lieu= $_POST["lieu"];
	$Consigne=$_POST["consigne"];
	$Securite=$_POST["securite"];
	$Dedicace=$_POST["dedicace"];
	$Spectacle=$_POST["spectacle"];	
	$Nom=$_POST["nom"];
	$Heure=getdate();
	
	$requete_lieu="SELECT * FROM zones where id_zone=".$Lieu;
	$forme_resultats_lieu=$connexion->query($requete_lieu);
	$forme_resultats_lieu->setFetchMode(PDO::FETCH_OBJ);
	$resultat_lieu=$forme_resultats_lieu->fetch();
	
	$requete_consi="SELECT * FROM consignes where id_cons=".$Consigne;
	$forme_resultats_consi=$connexion->query($requete_consi);
	$forme_resultats_consi->setFetchMode(PDO::FETCH_OBJ);
	$resultat_consi=$forme_resultats_consi->fetch();	
		
	$requete_secur="SELECT * FROM securite where id_secu=".$Securite;
	$forme_resultats_secur=$connexion->query($requete_secur);
	$forme_resultats_secur->setFetchMode(PDO::FETCH_OBJ);
	$resultat_secur=$forme_resultats_secur->fetch();	
		

	$requete_dedic="SELECT * FROM dedicaces where id_dedi=".$Dedicace;
	$forme_resultats_dedic=$connexion->query($requete_dedic);
	$forme_resultats_dedic->setFetchMode(PDO::FETCH_OBJ);
	$resultat_dedic=$forme_resultats_dedic->fetch();	
	
	$requete_specta="SELECT * FROM spectacles where id_spect=".$Spectacle;
	$forme_resultats_specta=$connexion->query($requete_specta);
	$forme_resultats_specta->setFetchMode(PDO::FETCH_OBJ);
	$resultat_specta=$forme_resultats_specta->fetch();	
?>