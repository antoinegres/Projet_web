<!DOCTYPE html>


<?php
			try
			{
				// On se connecte à MySQL
				$bdd = new PDO('mysql:host=127.0.0.1;dbname=test;charset=utf8', 'root', '');
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
					die('Erreur : '.$e->getMessage());
			}

			// Si tout va bien, on peut continuer

			// On récupère tout le contenu de la table jeux_video
			$reponse = $bdd->query('SELECT * FROM profil');

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>
				<p>
				<strong>Ami</strong> : <div id="nom" align="center"> <?php echo $donnees['nom']; ?> </div> <div id="prenom" align="center"> <?php echo $donnees['prenom']; ?> </div> <div id="statut" align="center"> <?php echo $donnees['statut']; ?> </div> <div id="email" align="center"> <?php echo $donnees['email']; ?> </div>  
			   </p>
			<?php
			}

			$reponse->closeCursor(); // Termine le traitement de la requête

			?>



<html>
	<head>
		<meta charset="utf-8" />
		<title>Profil</title>
		<link rel="stylesheet" type="text/css" href="Profil.css"/>
	</head>
	
	<body>
			
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