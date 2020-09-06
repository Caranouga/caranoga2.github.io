<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=forum2', 'root', '');

if (isset($_POST['connect'])) {
	$mailconnect = htmlspecialchars($_POST['mailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($mailconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM membres  WHERE mail = ? AND motdepasse = ?");
		$requser->execute(array($mailconnect, $mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['id'] = $userinfo['id'];
			$_SESSION['pseudo'] = $userinfo['pseudo'];
			$_SESSION['mail'] = $userinfo['mail'];
			header("Location: profil.php?id=".$_SESSION['id']);
		}
		else
		{
			$erreur = "Mauvais mail ou mot de passe !";
		}
	}
	else
	{
		$erreur = "Tout les champs doivent êtres complétés !";
	}

}

?>

<html>
	<head>
		<title>TEST</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div align="center">
			<h2>Connexion</h2>
			<br /><br />
			<form method="POST" action="">
				<input type="email" name="mailconnect" placeholder="Mail"  value="<?php if(isset($mailconnect)) {echo $mailconnect; } ?>"/>
				<input type="password" name="mdpconnect" placeholder="Mot de passe"/>
				<input type="submit" name="connect" placeholder="Se connecter !" >
				<br /><br />
			</form>
			<a href="inscription.php">Pas encore de compte ? Va ici pour en créer un !</a>
			<?php
			if(isset($erreur))
			{
				echo '<font color="red">'.$erreur."</font>";
			}
			?>
		</div>
	</body>
</html>