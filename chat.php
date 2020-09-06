<?php

session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=forum2', 'root', '');
if(isset($_SESSION['id'])) {
	if(isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['pseudo']) AND !empty($_POST['message']))
	{
		$pseudo = $_POST['pseudo'];
		$message = $_POST['message'];
		$insertmsg = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(?, ?)');
		$insertmsg->execute(array($pseudo, $message));
	}
}else
{
	$terror = "Vous devez vous connecter pour pouvoir avoir accès au chat";
}
?>
<html>
	<head>
		<title></title>
		<meta charset="utf-8">
	</head>
	<body>
		<form method="post" action="">
			<input type="text" placeholder="PSEUDO" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>"><br/><br/>
			<textarea type="text" placeholder="MESSAGE" name="message"></textarea> 
			<input type="submit" value="Envoyer">
		</form>
		<?php
		$allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC');
		while($msg = $allmsg->fetch())
		{
		?>
		<b><?php echo $msg['pseudo']; ?> :</b><?php echo $msg['message']; ?><br/>
		<?php
		}
		?>
		<?php if(isset($terror)) { ?>
      <tr>
         <td colspan="2"><?= $terror ?></td>
      </tr>
      <?php } ?>
	</body>

</html>