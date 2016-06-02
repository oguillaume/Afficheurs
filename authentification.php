<?php
function identifiant_unique() {
	return md5 ( uniqid ( rand () ) );
}
function utilisateur_existe($identifiant, $mot_de_passe) {
	$connexion = mysqli_connect ( 'localhost', 'root' );
	mysqli_select_db ( $connexion, 'voyageurs' );
	$sql = 'SELECT 1 FROM acces ';
	$sql .= 'WHERE identifiant = ? AND mot_de_passe = ?';
	$requête = mysqli_stmt_init ( $connexion );
	$ok = mysqli_stmt_prepare ( $requête, $sql );
	$pass_hache = sha1 ( $mot_de_passe );
	$ok = mysqli_stmt_bind_param ( $requête, 'ss', $identifiant, $pass_hache );
	$ok = mysqli_stmt_execute ( $requête );
	mysqli_stmt_bind_result ( $requête, $existe );
	$ok = mysqli_stmt_fetch ( $requête );
	mysqli_stmt_free_result ( $requête );
	return ( bool ) $existe;
}
$identifiant = ' ';
$mot_de_passe = ' ';
$message = ' ';
if (isset ( $_POST ['connexion'] )) {
	$identifiant = $_POST ['identifiant'];
	$mot_de_passe = $_POST ['mot_de_passe'];
	if (utilisateur_existe ( $identifiant, $mot_de_passe )) {
		$session = identifiant_unique ();
		$date = date ( '\l\e d/m/Y à H:i:s' );
		$url = "?session=$session&date=" . rawurlencode ( $date ) . "&identifiant=" . rawurlencode ( $identifiant );
		header ( "location:formulaire.php$url" );
		exit ();
	} else {
		$message = 'Identification incorrecte. Essayez de nouveau.';
	}
}
?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

	<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>Login</title>
</head>
<body>
	<h1 align="center">Festival Etonnants voyageurs</br>Espace Administration</h1>
	<p>Espace r&eacute;serv&eacute; : Veuillez vous identifier !</p>
	<form action="authentification.php" method="post">
		<div class="general" align="center">
		
		<table border="0">
			<tr>
				<td align="right">Identifiant :</td>
				<td><input type="text" Name="identifiant"
					value="" /></td>
			</tr>
			<tr>
				<td align="right">Mot de passe :</td>
				<td><input type="password" Name="mot_de_passe"
					value="" /></td>
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" name="connexion"
					value="Connexion" /></td>
			</tr>
		</table>
		
		</div>
<?php echo $message; ?>
</form>
</body>
</html>
