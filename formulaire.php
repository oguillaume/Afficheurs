<?php
require_once 'connection.php';
require_once 'requete_select.php';

if (! isset ( $_GET ['session'] )) {
	header ( 'location: authentification.php' );
	exit ();
} else {
	$session = $_GET ['session'];
	$date = $_GET ['date'];
	$identifiant = $_GET ['identifiant'];
	$message = "Session : $session - $identifiant - $date";
}
$url = "?session=$session&date=" . rawurlencode ( $date ) . "&identifiant=" . rawurlencode ( $identifiant );
$actuel = 'Nous sommes le ' . date ( 'd/m/Y' ) . ' ; il est ' . date ( 'H:i:s' );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//FR"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html> 
<head>
	<title>Afficheurs</title>
		<meta charset="utf-8" />
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body onload="miseazero()">

	<h1 class="gras" align="center">
	Gestion des panneaux d'affichage Festival Grands voyageurs
	</h1>
	<!-- Affichage de l'heure courante -->
	<?php
	date_default_timezone_set('Europe/Paris');
	echo '<p align="center">',date('H:i:s'),'</p>',"\n";
	?>
	
<form method="post" action ="Afficheur.php">
<div class="general">
			<div id="div3" class="div3"><p>Securite et Consignes</p></div>
			<div id="div4" class="div4"><p>Manifestations</p></div>
			<div class="div1" id="div1">
			<fieldset id="gestion">
				<!-- choix de la consigne -->
				Consigne
				<select id="consigne" name="consigne">
				<option value="0"></option>
				<?php
					$selected='';
					while ($resultat=$forme_resultats_cons->fetch())
					{
					$lieu_cons=$resultat->libelle_cons;
					$selected=0;
					echo "\t",'<option value="',$resultat->id_cons,'"',$selected,'>',$lieu_cons,'</option>',"n";
					$selected='';
					}
				?>
				</select></br>Securit&eacute;
				<!-- choix du message de sécurité -->
				<select id="securite" name="securite">
				<option value="0"></option>
				<?php
					$selected='';
					while ($resultat=$forme_resultats_secu->fetch())
					{
					$lieu_secu=$resultat->libelle_secu;
					$selected=0;
					echo "\t",'<option value="'.$resultat->id_secu.'"'.$selected.'>'.$lieu_secu.'</option>',"\n";
					$selected='';
					}
				?>
				</select></br>
				Nom de l'enfant :<input name="nom" maxlenght="40" size="20"/>
			</fieldset>
			<?php
			$zones=array();
			$i=0;
			while ($resultat=$forme_resultats_zone->fetch())
			{
			$lieu_zone=$resultat->libelle_zone;
			$zones[$i]=$resultat;
			
			if ($zones[$i]->id_zone%2==1)
			echo '<td><button id="Voir" name="lieu" value="',$resultat->id_zone,'" class="quick"><b>',$lieu_zone,'</b></button></td>';
			//echo $zones[$i]->libelle_zone;;
			$i++;
			}
			?>
			</div>
			<div class="div2" id="div2">
				<fieldset id="manif">
				<!-- choix des dedicaces -->
				D&eacute;dicaces :
				<select id="dedicace" name="dedicace">
				<option value="0"></option>
				<?php
				$selected='';
				while ($resultat=$forme_resultats_dedi->fetch())
				{
				$message=$resultat->heure_dedi." ".$resultat->lieu." ".$resultat->auteur;
				$lieu_dedi=$message;
				$selected=0;
				echo "\t",'<option value="',$resultat->id_dedi,'"',$selected,'>',$message,'</option>',"\n";
				$selected='';
				}
				?>
				</select>
				</br>
				<!-- choix des spectacles -->
				Spectacles :

				<select id="spectacle" name="spectacle">
					<option value="0"></option>
					<?php
					$selected='';
					while ($resultat=$forme_resultats_spect->fetch())
					{
					$lieu_spect=$resultat->heure." ".$resultat->libelle_spect;
					$selected=0;
					echo "\t",'<option value="',$resultat->id_spect,'"',$selected,'>',$lieu_spect,'</option>',"\n";
					$selected='';
					}
					?>
				</select>
				</fieldset>
				<?php	
					$i=0;
					while ($i<4){
					if ($zones[$i]->id_zone%2==0)
					echo '<td><button id="Voir" name="lieu" value="',$zones[$i]->id_zone,'" class="quick1"><b>',$zones[$i]->libelle_zone,' </b></button></td>';
					$i++;
					}
				?>
			</div>
		</div>


</form></body>
</html>



