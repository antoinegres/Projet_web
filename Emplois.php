<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Formulaire</title>
		<link rel="stylesheet" type="text/css" href="Accueil.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
        <p>aaa</p>
        <h1> Emplois </h1>
		<div id="corps">
        <form method="POST" action="">
            <label for="nom">Déclarer un nouveau poste disponnible: </label>
            <input type="text" name="poste" id="poste" placeholder="Intitulé du poste" />
            <input type="submit" value="Déclarer ce poste diponnible" name="submit" id="submit"/>
        </form>
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
			if(isset($_POST['submit'])){
            //echo 'nice0';
            if($_POST['poste'])
            {
                // echo 'nice';
                // On se connecte à MySQL
                   
				$poste = $_POST['poste'];
                $datetime = date("Y-m-d H:i:s");
				
                    //echo $_POST['doc'];
                    //echo $_POST['lieu'];
                    //echo $_POST['activité'];
                    //echo $_POST['ressenti'];
                
				$req = $bdd->prepare('INSERT INTO emploi(poste, dateem) VALUES(:poste , :datetime )');
				$req->execute(array(
					'poste' => $poste,
					'datetime' => $datetime
					));
            }		
            else
            {
                echo "Veuillez bien remplir le champ .";
                //$erreur= "Veuillez remplir tous les champs .";
            }
        
			}	
			

		
            
        ?>
		<br/><br/>
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
			$reponse = $bdd->query('SELECT * FROM emploi ORDER BY dateem DESC');
			?>
			<br/><br/>
			<strong>Liste emplois</strong> :<br><br> 
			<?php
			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>
				<?php
				echo"Un poste de ".$donnees["poste"].", proposé par ".$donnees["employeur"]." est disponible depuis le ".$donnees["dateem"];
				echo"<br><br>";
				?>
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