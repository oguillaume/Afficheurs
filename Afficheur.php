<?php
require_once 'connection.php';				
require_once 'requete_choix.php';

date_default_timezone_set('Europe/Paris');

$Tab4=array();
if ($Lieu!=0){
	
	$Afficheur=$resultat_lieu->type_afficheur;
	if ($Consigne!=0){	
		$Message=$resultat_consi->libelle_cons;
	}
	else if ($Securite!=0){
		switch ($Securite){
			case 1 :
				$Message="Le petit ".$Nom." ".$resultat_secur->libelle_secu;
				break;
			case 2 : 
				$Message=$resultat_secur->libelle_secu;
				$Tab4=Array(0x1B,0x30,0x6E,0x5A);
				break;}
	}
	else if ($Dedicace!=0){
		
		$Message=$resultat_dedic->heure_dedi." ".$resultat_dedic->lieu." ".$resultat->auteur;
	}
	else if ($Spectacle!=0){
		
		$Message=$resultat_specta->heure." ".$resultat_specta->libelle_spect;
	}
	else{
		$Message=date('H:i:s');
	}

				/////////////////////////////////////////////////////////////////////////////////

												//AFFICHEUR IRIS\\

				/////////////////////////////////////////////////////////////////////////////////


	
	

	
	
if ($Afficheur == "IRIS")
{
	echo 'Afficheur : IRIS <I>Selection</I> - ';
	
	
	// $Couleur = $_POST["Couleur"];
	$Couleur = "Arc";
	if ($Couleur == "Rouge") {
		$Tab2 = Array(0x1C,0x34); }
	if ($Couleur == "Arc") {
		$Tab2 = Array(0x1C,0x41); }
	if ($Couleur == "Vert") {
		$Tab2 = Array(0x1C,0x35); }
	if ($Couleur == "Jaune") {
		$Tab2 = Array(0x1C,0x38); }
	
	$Tab3 = Array(0x04,0x00);
	
/*	 if ($Animation=="animaux") $Tab4=Array(0x1B,0x30,0x6E,0x57);
	 else if ($Animation="voiture") $Tab4=Array(0x1B,0x30,0x6E,0x59);*/
	if ($Message == "") 
	{
		echo '<B>Problème Message absent</B><BR>'; 
	}
	else
	{
		$Tab1 = Array(0,0,0,0,0,0,0,0x01,0x5A,0x30,0x30,0x02,0x41,0x41,0x1b,0x20,0x61);
		$socket_client = socket_create(AF_INET,SOCK_STREAM,SOL_TCP); 
		socket_connect($socket_client,"192.168.12.105","10001"); 
		

		for($i=0;$i<17;$i=$i+1)
		{
			$Partie1 = sprintf("%c", $Tab1[$i]);
			socket_send($socket_client, $Partie1, 1, 1);
		}
	
		for($i=0;$i<2;$i=$i+1)
		{	
			$Partie2 = sprintf("%c", $Tab2[$i]);
			socket_send($socket_client, $Partie2, 1, 1);
		}

		socket_send($socket_client, $Message, strlen($Message), 1);

		for($i=0;$i<4;$i=$i+1)
		{
			$Partie3 = sprintf("%c", $Tab3[$i]);
			socket_send($socket_client, $Partie3, 1, 1);
		}
		for($i=0;$i<2;$i=$i+1)
		{
			$Partie4 = sprintf("%c", $Tab3[$i]);
			socket_send($socket_client, $Partie4, 1, 1);
		}

		echo '<B>OK</B><BR>';
		socket_close($socket_client);
	}
}
else
{
	echo 'Afficheur : IRIS - <I>Non Selectionné</I><BR>';
}
			/////////////////////////////////////////////////////////////////////////////////

											//AFFICHEUR ENR\\

			/////////////////////////////////////////////////////////////////////////////////

if ($Afficheur == "ENR")
{
	echo 'Afficheur : ENR - <I>Selectionné</I> - ';
	echo $Message;
	$Partie1 = "<ID00><PA><FE><CF><FX>";
	
	// $Couleur = $_POST["Couleur"];
	$Couleur = "Arc";
	if($Couleur == "Rouge") {
		$ChoixCouleur ="<CB>"; }
	if($Couleur == "Vert") {
		$ChoixCouleur ="<CM>"; }
	if($Couleur == "Jaune") {
		$ChoixCouleur ="<CG>"; }
	if($Couleur == "Arc") {
		$ChoixCouleur ="<CP>"; }
	

	if ($Message == "") 
	{
		echo '<B>Problème Message absent</B><BR>'; 
	}
	else
	{
		$Partie2 = "<FP>\r\n";
		$Trame = $Partie1.$ChoixCouleur.$Message.$Partie2;
	
		$socket_client = socket_create(AF_INET,SOCK_STREAM,SOL_TCP); 
		socket_connect($socket_client,"192.168.12.102","10001"); 
		socket_send($socket_client, $Trame, strlen($Trame), 1);
		echo '<B>OK</B><BR>';
		socket_close($socket_client);
	}
}
else
{
	echo 'Afficheur : ENR - <I>Non Selectionné</I>';
}
}
?>