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
        <h1> Accueil </h1>
        <br><br>
            
        <div id="corp">
            <form method="POST" action="">
                <h3> Publication </h3>
                <tr>
                    <td><input type="button" value="Choisir un document à publier"
                    </td>
                </tr>
                <br><br>
                <tr>
                <table>
                    <td>Type(Photo, Video ou Statut) :</td>
                        <td><input type="text" id="doc" name="doc"/></td>
                    </tr>
                        <td>Lieu :</td>
                        <td><input type="text" id="lieu" name="lieu"/></td>
                    </tr>
                    <tr>
                        <td>Ressenti:</td>
                        <td><input type="text" id="ressenti" name="ressenti"/></td>
                    </tr>
                    <tr>
                        <td>Activité:</td>
                        <td><input type="text" id="activite" name="activite"/></td>
                    </tr>
                </table>

                <br>

                <tr>
                    Commentaire: <br>
                    <textarea name="commentaire" rows="5" cols="28"></textarea>        
                </tr>

                <br><br>

                <tr>
                    <td>
                    <input type="submit" value="Publier" name="submit" id="submit"/>
                    </td>
                </tr>
                </form>
            </div> 
    
        
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
			if(($_POST['doc']!='Photo') && ($_POST['doc']!='Video') && ($_POST['doc']!='Statut') && ($_POST['doc']) && ($_POST['lieu']) && ($_POST['activite']) && ($_POST['ressenti'])){
				echo "Les informations saisit ne sont pas valides .";
			}
            else
            {
                // echo 'nice';
                // On se connecte à MySQL
                   
				$doc= $_POST['doc'];
				$date= date("Y-m-d H:i:s");
				$lieu= $_POST['lieu'];
				$activite= $_POST['activite'];
				$ressenti= $_POST['ressenti'];
				
                    //echo $_POST['doc'];
                    //echo $_POST['lieu'];
                    //echo $_POST['activité'];
                    //echo $_POST['ressenti'];
                
				$req = $bdd->prepare('INSERT INTO publication (doc, date, lieu, activité, ressenti) VALUES (:doc, :date, :lieu, :activite, :ressenti)');
				$req->execute(array(
					'doc' => $doc,
					'date' => $date,
					'lieu' => $lieu,
					'activite' => $activite,
					'ressenti' => $ressenti
					));
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
			$reponse = $bdd->query('SELECT * FROM publication ORDER BY date DESC');

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
			?>
				<?php
				echo "---------------------------------------------------------------------------------------------------------------------------------<br>";
                echo  $donnees["publieur"]." a ajouté une nouvelle publication: <br>"; 
                echo  "[".$donnees["doc"]."] Lieu: ".$donnees["lieu"].", activité: ".$donnees["activité"].", ressenti:  ".$donnees["ressenti"];
                echo "<br>---------------------------------------------------------------------------------------------------------------------------------";
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