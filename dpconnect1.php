<!DOCTYPE html>
<?php

$bdd = new PDO('mysql:host=127.0.0.1;dbname=bddece;charset=utf8', 'root', '');
if(isset($_POST['submit_recherche'])){
	header("Location:dpconnect.php");
}
?>


<html>
	<head>
		<meta charset="utf-8" />
		<title>Formulaire</title>
		<link rel="stylesheet" type="text/css" href="Accueil.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
	<p>...</p>
		<div id="corps" align="center">
			<form method="POST" action=""><br/>
				<label>Nouvelle Recherche :</label>
				<input type="submit" value="Valider" name="submit_recherche" id="submit_recherche"/>
			</form>
			<?php 
			if (isset($erreur1))
			{
				echo '<font color="red">'.$erreur1."</font>";
			}
			if (isset($erreur1))
			{
				echo '<font color="red">'.$erreur1."</font>";
			}
			if (isset($erreur2))
			{
				echo '<font color="red">'.$erreur2."</font>";
			}
			if (isset($ok))
			{
				echo '<font color="green">'.$ok."</font>";
			}
			?>
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
			$blaze=$_SESSION['nom'];
			$reponse1 = $bdd->query("SELECT * FROM utilisateur WHERE nom='$blaze'");

			// On affiche chaque entrée une à une
			while ($donnees = $reponse1->fetch())
			{
			?>
				<p>
				<strong>Ami</strong> : <a href=Connection.php><?php echo $donnees['nom']; ?>   <?php echo $donnees['prenom']; ?></a>   <?php echo $donnees['statut']; ?>
			   </p>
			<?php
			}

			
			?>
		</div>
		<div id="menu">
			<div style="border-color: black" id="menu0"><a href="Accueil.html.html" >Accueil</a><div>
			<div style="border-color: black" id="menu1"><a href="Mon reseau.html.html">Mon Réseau</a><div>
			<div style="border-color: black" id="menu2"><a href="Vous.html" >Vous</a><div>
			<div style="border-color: black" id="menu3"><a href="Notifications.html" >Notifications</a><div>
			<div style="border-color: black" id="menu4"><a href="Messages.html" >Messages</a><div>
			<div style="border-color: black" id="menu5"><a href="Emplois.html" >Emplois</a><div>
		</div>
		
	</body>
</html>