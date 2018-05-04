<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Vous</title>
		<link rel="stylesheet" type="text/css" href="Accueil.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<p>hgh</p>
		<div id="corps" align="center"><br/><br/>
			<h1>Mon Profil</h1><br/><br/>
			<?php
			
			try
			{
				// On se connecte à MySQL
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=bddece;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
					die('Erreur : '.$e->getMessage());
			}

			// Si tout va bien, on peut continuer
			// On récupère tout le contenu de la table jeux_video
			session_start();
			$blaze1=$_SESSION['mail'];
			$reponse1 = $bdd->query("SELECT * FROM utilisateur WHERE mail='$blaze1'");

			// On affiche chaque entrée une à une
			while ($donnees = $reponse1->fetch())
			{
			?>
				<p>
				<table>
					<tr>
						<td>
							<label for="nom">Nom :</label>
						</td>
						<td>
							<?php echo $donnees['nom']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label for="prenom">Prénom :</label>
						</td>
						<td>
							<?php echo $donnees['prenom']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label for="age">Age :</label>
						</td>
						<td>
							<?php echo $donnees['age']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label for="mail">E-mail :</label>
						</td>
						<td>
							<?php echo $donnees['mail']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label for="statut">Statut :</label>
						</td>
						<td>
							<?php echo $donnees['statut']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<label for="pp">Photo de Profil :</label>
						</td>
						<td>
							<img src=<?php echo $donnees['pp']; ?> width="150" height="150" alt="pp">
						</td>
					</tr>
				</table>
			   </p>
			  <?php
			}
			?>
		</div>
		<div id="menu">
			<div style="border-color: black" id="menu0"><a href="Accueil.php" >Accueil</a><div>
			<div style="border-color: black" id="menu1"><a href="dpconnect.php">Mon Réseau</a><div>
			<div style="border-color: black" id="menu2"><a href="Vous.php" >Vous</a><div>
			<div style="border-color: black" id="menu3"><a href="Notifications.php" >Notifications</a><div>
			<div style="border-color: black" id="menu4"><a href="Messages.html" >Messages</a><div>
			<div style="border-color: black" id="menu5"><a href="Emplois.php" >Emplois</a><div>
		</div>
		
	</body>
</html>