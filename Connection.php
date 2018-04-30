<!DOCTYPE html>

<?php
$bdd = new PDO('mysql:host=127.0.0.1; dbname=maclasse','root','');
if(isset($_POST['submit'])){
	if(($_POST['nom']) && ($_POST['prenom']) && ($_POST['age']) && ($_POST['mail']) && ($_POST['mdp']))
	{
		$nom = htmlspecialchars($_POST['nom']);
		$prenom = htmlspecialchars($_POST['prenom']);
		$mail = htmlspecialchars($_POST['mail']);
		$age = $_POST['age'];
		$mdp = $_POST['mdp'];
		$statut = $_POST['statut'];
		$administrateur= 0;
		$insert_auteur=$bdd->prepare('INSERT INTO test (Nom,Prenom,E-mail,Mot de Passe, Age,Statut,Administrateur) VALUES(?,?,?,?,?,?,?)');
		$insert_auteur->execute(array($nom, $prenom, $mail, $mdp, $age, $statut,0));
		$erreur1="Votre compte a bien été créé.";
	}		
	else
	{
		$erreur= "Veuillez remplir tous les champs .";
	}
}


?>


<html>
	<head>
		<meta charset="utf-8" />
		<title>Connection</title>
		<link rel="stylesheet" type="text/css" href="Connection.css"/>
	</head>
	
	<body>
		<div id="gauche" align="center">
			<h2>Nouvel Utilisateur</h2>
			<br><br><br>
			<form method="POST" action="">
				<table>
					<tr>
						<td>
							<label for="nom">Nom :</label>
						</td>
						<td>
							<input type="text" name="nom" id="nom" placeholder="Nom" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="prenom">Prénom :</label>
						</td>
						<td>
							<input type="text" name="prenom" id="prenom" placeholder="Prénom" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="age">Age :</label>
						</td>
						<td>
							<input type="number" name="age" id="age" placeholder="Age" />
						</td>
					</tr>
					<tr>
						<td>
							<label for="mail">E-mail :</label>
						</td>
						<td>
							<input type="email" name="mail" id="mail" placeholder="nom.prenom@edu.ece.fr">
						</td>
					</tr>
					<tr>
						<td>
							<label for="mdp">Mot De Passe :</label>
						</td>
						<td>
							<input type="password" name="mdp" id="mdp" placeholder="********">
						</td>
					</tr>
					<tr>
						<td>
							<label for="statut">Statut :</label>
						</td>
						<td>
							<select name="statut" id="statut">
								<option value="Etudiant(e) licence ou masteur">Etudiant(e) licence</option>
								<option value="Etudiant(e) masteur">Etudiant(e) masteur</option>
								<option value="Etudiant(e) apprenti dans un entreprise">Etudiant(e) apprenti dans un entreprise</option>
								<option value="Etudiant(e) en cherche de stage">Etudiant(e) en cherche de stage</option>
								<option value="Ensingnant(e)">Enseignant</option>
								<option value="Employé(e)">Employé(e)</option>
							</select>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td><br/><input type="submit" value="S'enregistrer" name="submit" id="submit"/></td>
					</tr>
				</table>
			</form>
			<?php 
			if (isset($erreur))
			{
				echo '<font color="red">'.$erreur."</font>";
			}
			if (isset($erreur1))
			{
				echo '<font color="green">'.$erreur1."</font>";
			}
			?>
		</div>
		<div id="droite" align="center">
			<h2>Connection</h2>
			<br><br><br>
			<form method="POST" action="">
				<table>
					<tr>
						<td>
							<label for="mail_connection">E-Mail :</label>
						</td>
						<td>
							<input type="email" name="mail_connection" id="mail_connection" placeholder="nom.prenom@edu.ece.fr">
						</td>
					</tr>
					<tr>
						<td>
							<label for="mdp_connection">Mot de Passe :</label>
						</td>
						<td>
							<input type="password" name="mdp_connection" id="mdp_connection" placeholder="********">
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td><br/><input type="submit" value="Se Connecter" name="submit_connection" id="submit_connection"/></td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>