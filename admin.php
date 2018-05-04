<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Formulaire</title>
		<link rel="stylesheet" type="text/css" href="Accueil.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	
	<body>
        
        <!--
        <p>aaa</p>
        <h1> Emplois </h1>
		
        <form method="POST" action="">
            <label for="nom">Déclarer un nouveau poste disponnible: </label>
            <input type="text" name="poste" id="poste" placeholder="Intitulé du poste" />
            <input type="submit" value="Déclarer ce poste diponnible" name="submit" id="submit"/>
        </form>
        -->
        
        <br/>
            <h1> Administrateur </h1>
            <form method="POST" action="">
            <table>
                <tr>
                    <td>mail :</td>
                    <td><input type="text" name="mail"/></td>
                </tr>
            </table>
            
            <br>
            <tr>
                <td>
                <input type="submit" value="Ajouter en Administrateur" name= "submit1" id="submit1"/>
                </td>
                <td>
                <input type="submit" value="Supprimer le compte" name= "submit2" id="submit2"/>
                </td>
            </tr>
            </form>
        
        
        <?php
         
    
            if (isset($_POST['submit1'])){
                //echo "nice1<br>";
                
                if($_POST['mail'])
                {

                    //echo "nice2<br>";
                    // On se connecte à MySQL
                    define('DB_SERVER','localhost');
                    define('DB_USER','root');
                    define('DB_PASS','root');
                    $database='bddece';
                    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die(erreur1);
                    $db_found=mysqli_select_db($db_handle,$database) or die(erreur2);

                    if($db_found){
                        
                        $mail = $_POST['mail'];
                        
                        //UPDATE utilisateur SET admin=0 WHERE mail='antoine.gres@edu.ece.fr'
                        $sql1 = "UPDATE utilisateur SET admin=1 WHERE mail='$mail'";
                        $rep1 = mysqli_query($db_handle,$sql1);
                        //echo $_POST['nom']' est maintenant administrateur';
                        echo "<br>Le compte ".$mail." est désormais Administrateur.";
                    }
                    else{
                            echo'Database not found'; 
                        }
                    mysqli_close($db_handle);
                }		
                else
                {
                    echo "Veuillez bien remplir le champ .";
                    //$erreur= "Veuillez remplir tous les champs .";
                }
            }
        
            
            if (isset($_POST['submit2'])){
                
                //echo "nice1bis<br>";
                //if(($_POST['nom']) && ($_POST['prenom']) && ($_POST['mail']))
                if($_POST['mail'])
                {

                    //echo "nice2bis<br>";
                    // On se connecte à MySQL
                    define('DB_SERVER','localhost');
                    define('DB_USER','root');
                    define('DB_PASS','root');
                    $database='bddece';
                    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die(erreur1);
                    $db_found=mysqli_select_db($db_handle,$database) or die(erreur2);

                    if($db_found){

                        $mail = $_POST['mail'];
                    
                        $sql2 = "DELETE FROM utilisateur WHERE utilisateur.mail='$mail'";
                        $rep2 = mysqli_query($db_handle,$sql2);
                        
                        echo "<br>Le compte ".$mail." a bien été supprimé.";
                    }
                    else{
                            echo'Database not found'; 
                        }
                    mysqli_close($db_handle); 

                    //echo "Déclaration envoyé !";
                }		
                else
                {
                    echo "Veuillez bien remplir le champ .";
                    //$erreur= "Veuillez remplir tous les champs .";
                }
                
            }
            
        
        // On se connecte à MySQL
        define('DB_SERVER','localhost');
        define('DB_USER','root');
        define('DB_PASS','root');
        $database='bddece';
        $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die(erreur1);
        $db_found=mysqli_select_db($db_handle,$database) or die(erreur2);

        if($db_found){
            //echo 'nice';
            $sql = "SELECT * FROM utilisateur ORDER BY id";
            $rep = mysqli_query($db_handle,$sql);

            echo "<br><br>Liste utilisateurs:<br><br>" ;
            while($data=mysqli_fetch_assoc($rep)){
                echo" - Nom : ".$data["nom"]." | ";
                echo"   Prenom : ".$data["prenom"]." | ";
                echo"   Admin : ".$data["admin"]." | ";
                echo"   Mail : ".$data["mail"];
                echo"<br><br>";
            }     
        }
        else{
                echo'Database not found'; 
            }
        mysqli_close($db_handle);    
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