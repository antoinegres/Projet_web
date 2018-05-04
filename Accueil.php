<!DOCTYPE html>


<html>
	<head>
		<meta charset="utf-8" />
		<title>Formulaire</title>
		<link rel="stylesheet" type="text/css" href="Accueil.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
	<p>hgh</p>
	
		<div id="corps" align="center">
	
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
			$reponse = $bdd->query('SELECT * FROM publication  ');

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>
				<p>
				<a href=Connection.php> <?php echo publication; ?> </a>
				   <?php echo '<div class="ami">Publication ami N°'.$donnees['idpu'].':</div>'; ?>   
				   <?php echo '<br><br>'.$donnees['doc'].' '; ?>  
				   <?php echo '<br><br><br> <strong> Lieu: </strong>'.$donnees['lieu'].' '; ?> 
				   <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Date: </strong>'.$donnees['date']; ?> 
				   <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Humeur: </strong>'.$donnees['ressenti']; ?> 
				   <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Activite: </strong>'.$donnees['activité']; ?>
				   <br><br>
			   </p>
			<?php
			}

			$reponse->closeCursor(); // Termine le traitement de la requête

			?>
		</div>
		<div id="menu">
			<div style="border-color: black" id="menu0"><a href="Accueil.php" >Accueil</a><div>
			<div style="border-color: black" id="menu1"><a href="dpconnect.php">Mon Réseau</a><div>
			<div style="border-color: black" id="menu2"><a href="Vous.php" >Vous</a><div>
			<div style="border-color: black" id="menu3"><a href="Notifications.html" >Notifications</a><div>
			<div style="border-color: black" id="menu4"><a href="Messages.html" >Messages</a><div>
			<div style="border-color: black" id="menu5"><a href="Emplois.html" >Emplois</a><div>
		</div>
		
	</body>
</html>