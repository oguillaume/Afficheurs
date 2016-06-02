<?php
$requete_zone="SELECT * FROM zones";
$forme_resultats_zone=$connexion->query($requete_zone);
$forme_resultats_zone->setFetchMode(PDO::FETCH_OBJ);
$lieu_zone=array();

$requete_cons="SELECT * FROM consignes";
$forme_resultats_cons=$connexion->query($requete_cons);
$forme_resultats_cons->setFetchMode(PDO::FETCH_OBJ);
$lieu_cons=array();

$requete_secu="SELECT * FROM securite";
$forme_resultats_secu=$connexion->query($requete_secu);
$forme_resultats_secu->setFetchMode(PDO::FETCH_OBJ);
$lieu_secu=array();

$requete_dedi="SELECT * FROM dedicaces";
$forme_resultats_dedi=$connexion->query($requete_dedi);
$forme_resultats_dedi->setFetchMode(PDO::FETCH_OBJ);
$lieu_dedi=array();

$requete_spect="SELECT * FROM spectacles";
$forme_resultats_spect=$connexion->query($requete_spect);
$forme_resultats_spect->setFetchMode(PDO::FETCH_OBJ);
$lieu_spect=array();

	
	
?>