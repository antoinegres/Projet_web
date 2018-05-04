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
		
        <form method="POST" action="">
            <label for="nom">Déclarer un nouveau poste disponnible: </label>
            <input type="text" name="poste" id="poste" placeholder="Intitulé du poste" />
            <input type="submit" value="Déclarer ce poste diponnible" name="submit" id="submit"/>
        </form>
        
        <?php
         
        if(isset($_POST['submit'])){
            
            if($_POST['poste'])
            {
                
                // On se connecte à MySQL
                define('DB_SERVER','localhost');
                define('DB_USER','root');
                define('DB_PASS','root');
                $database='bddece';
                $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die(erreur1);
                $db_found=mysqli_select_db($db_handle,$database) or die(erreur2);

                if($db_found){
                
                    //$poste="bla";
                    //$idem=5;
                    $poste = $_POST['poste'];
                    $datetime = date("Y-m-d H:i:s");
                    
                    $sql1 = "INSERT INTO emploi(poste, dateem) VALUES(' $poste ', ' $datetime ')";
                    $rep1 = mysqli_query($db_handle,$sql1);     
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
            $sql = "SELECT * FROM emploi ORDER BY dateem DESC";
            $rep = mysqli_query($db_handle,$sql);
            echo "<br><br>Liste emplois:<br><br>" ;
            while($data=mysqli_fetch_assoc($rep)){
            echo"Un poste de ".$data["poste"].", proposé par ".$data["employeur"]." est disponible depuis le ".$data["dateem"];
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