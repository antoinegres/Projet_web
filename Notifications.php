<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Notification</title>
		<link rel="stylesheet" type="text/css" href="Accueil.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		
		<div id="corps">
			<h1> Notifications :</h1>
		
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
			$reponse = $bdd->query('SELECT publieur, date, doc AS type FROM publication UNION SELECT employeur, dateem, poste AS type FROM emploi ORDER BY date DESC ');
			?>
			
			<strong>Mes Notifications :</strong> <br><br> 
			<?php
			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>
				<?php
				if (($donnees['type']=='Photo') || ($donnees['type']=='Video')){
					echo"".$donnees["publieur"]." a publier une nouvelle ".$donnees["type"]." , le ".$donnees["date"].".";
					echo"<br><br>";
				}
				if ($donnees['type']=='Statut')
				{
					echo"".$donnees["publieur"]." a publier un nouveau ".$donnees["type"]." , le ".$donnees["date"].".";
					echo"<br><br>";
				}
				if (($donnees['type']!='Photo') && ($donnees['type']!='Video') && ($donnees['type']!='Statut'))
				{
					echo"".$donnees["publieur"]." a publier un nouveau poste de".$donnees["type"]." , le ".$donnees["date"].".";
					echo"<br><br>";
				}
				?>
				<form method="POST" action=""> 
                    <input type="submit" value="Supprimer" name="submit2" id="submit2"/>
				</form>
			<?php
			}

			$reponse->closeCursor(); // Termine le traitement de la requête

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