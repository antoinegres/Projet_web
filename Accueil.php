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
                    <td>Doc (temporaire) :</td>
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
         
        if(isset($_POST['submit'])){
            //echo 'nice0';
            if(($_POST['doc']) && ($_POST['lieu']) && ($_POST['activite']) && ($_POST['ressenti']))
            {
                // echo 'nice';
                // On se connecte à MySQL
                define('DB_SERVER','localhost');
                define('DB_USER','root');
                define('DB_PASS','root');
                $database='bddece';
                $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die(erreur1);
                $db_found=mysqli_select_db($db_handle,$database) or die(erreur2);

                if($db_found){
                    
                    $doc = $_POST['doc'];
                    $date = date("Y-m-d H:i:s");
                    $lieu= $_POST['lieu'];
                    $activite= $_POST['activite'];
                    $ressenti= $_POST['ressenti'];
                    
                    //echo $_POST['doc'];
                    //echo $_POST['lieu'];
                    //echo $_POST['activité'];
                    //echo $_POST['ressenti'];
                    
                    $sql1 = "INSERT INTO publication(doc, date, lieu, activité, ressenti) VALUES(' $doc ', ' $date ', ' $lieu ', ' $activite ', ' $ressenti ')";
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
            echo "<br><br>";
            //echo 'nice';
            $sql = "SELECT * FROM publication ORDER BY date DESC";
            $rep = mysqli_query($db_handle,$sql);
            echo "<br><br><h3>Liste publications:</h3>" ;
            while($data=mysqli_fetch_assoc($rep)){
                echo "---------------------------------------------------------------------------------------------------------------------------------<br>";
                echo  $data["publieur"]." a ajouté une nouvelle publication: <br>"; 
                echo  "[".$data["doc"]."] Lieu: ".$data["lieu"].", activité: ".$data["activité"].", ressenti:  ".$data["ressenti"];
                echo "<br>---------------------------------------------------------------------------------------------------------------------------------";
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