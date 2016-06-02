<?php 
//recherche en BDD
$Bdd_hote='localhost';
$Bdd_port='3306';
$Bdd_nom_bd='voyageurs';
$Bdd_user='root';
$Bdd_mot_de_passe='';


$connexion= new PDO('mysql:host='.$Bdd_hote.';port='.$Bdd_port.';dbname='.$Bdd_nom_bd,$Bdd_user,$Bdd_mot_de_passe);
?>