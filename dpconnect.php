<!DOCTYPE html>
<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=bddece;charset=utf8', 'root', '');
if(isset($_POST['submit_recherche'])){
	if(($_POST['recherche_nom']) && ($_POST['recherche_prenom'])){
		
		$recherche_nom= htmlspecialchars($_POST['recherche_nom']);
		$recherche_prenom= htmlspecialchars($_POST['recherche_prenom']);
		$req = $bdd->prepare("SELECT * FROM utilisateur WHERE nom= ? AND prenom= ?");
		$req -> execute(array($recherche_nom, $recherche_prenom));
		$connect = $req->rowCount();
		$_SESSION['nom']=$recherche_nom;
		if($connect>0){
			$ok="Connection réussie!!!";
			header("Location:dpconnect1.php");
		}
		else
		{
			$erreur2= "Aucun résultat ne correspond au nom et prénom saisie";
		}
	}
	else
	{
		$erreur1= "Veuillez remplir tous les champs .";
	}
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
	<p>hgh</p>
		<div id="corps" align="center">
			<form method="POST" action=""><br/>
				<label>Rechercher un Contact :</label>
				<input type="text" name="recherche_nom" id="recherche_nom" placeholder="Nom" />
				<input type="text" name="recherche_prenom" id="recherche_prenom" placeholder="Prénom" />
				<input type="submit" value="Rechercher" name="submit_recherche" id="submit_recherche"/>
			</form>
			<form method="POST" action="dpconnect1.php"><br/>
			</form>
			<?php 
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
			$reponse = $bdd->query('SELECT * FROM utilisateur  ');

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>
				<p>
				<strong>Ami</strong> : <a href=Connection.php><?php echo $donnees['nom']; ?>   <?php echo $donnees['prenom']; ?></a>   <?php echo $donnees['statut']; ?>
			   </p>
			<?php
			}

			$reponse->closeCursor(); // Termine le traitement de la requête

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