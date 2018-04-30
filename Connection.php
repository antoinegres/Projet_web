<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Connection</title>
		<link rel="stylesheet" type="text/css" href="Connection.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
		<h2>Nouvel Utilisateur</h2>
		<form method="POST" action="traitement.php">
			<div id="mes">
				<div id="leftcolumn">
					<p>Situation:</p><br>
					<p>Nom:</p><br>
					<p>Prénom:</p>
					<p><br><br>Age:</p>
					<p><br><br>Adresse mail:</p><br>
					<p>Mot de Passe:</p><br>
					<br><br>
					<input type="submit" value="S'enregistrer" name="submit"/>
				</div>	
				<div id="droite">
					<p><select name="situation" id="place">
						<option value="Etudiant(e) licence ou masteur">Etudiant(e) licence</option>
						<option value="Etudiant(e) masteur">Etudiant(e) masteur</option>
						<option value="Etudiant(e) apprenti dans un entreprise">Etudiant(e) apprenti dans un entreprise</option>
						<option value="Etudiant(e) en cherche de stage">Etudiant(e) en cherche de stage</option>
						<option value="Ensingnant(e)">Enseignant</option>
						<option value="Employé(e)">Employé(e)</option>
					</select></p><br>
					<p><input type="text" name="nom" id="place" placeholder="nom" /></p><br>
					<p><input type="text" name="prenom" id="place" placeholder="prénom"/></p><br>
					<p><input type="number" name="age" id="place" placeholder="age"/></p><br>
					<p><input type="email" name="email" id="place" placeholder="nom.prenom@edu.ece.fr"></p><br>
					<p><input type="password" name="passwd" id="place" placeholder="********"></p>
				</div>
			</div>
			
			<div id="x"><h2>Déjà Inscrit</h2></div>
			<div id="pdroite">
				<div id="leftcolumn">
					<p><br>Adresse mail:</p><br><br>
					<p>Mot de Passe:</p><br>
					<br><br>
					<input type="submit" value="Se Connecter" name="submit1"/>
				</div>	
				<div id="droite"><br>
					<p><input type="email" name="mail" id="place" placeholder="nom.prenom@edu.ece.fr"></p><br><br>
					<p><input type="password" name="mdp" id="place" placeholder="********"></p>
				</div>
			</div>
				
		</form>
	</body>
</html>