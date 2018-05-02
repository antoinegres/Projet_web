<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','root');
    $database='bddece';
    $db_handle=mysqli_connect(DB_SERVER,DB_USER,DB_PASS) or die(erreur1);
    $db_found=mysqli_select_db($db_handle,$database) or die(erreur2);

    if($db_found){
        
        //$sql0 = "SELECT * FROM utilisateur";
        //$rep0 = mysqli_query($db_handle,$sql0);
        
        //$sql1 = "INSERT INTO utilisateur (id, nom, prenom, mail, mdp, statut, admin) VALUES(5, 'Paire', 'Benoit', 'benoit.paire@edu.ece.fr', 'papa', 'imaginaire', 0)";
        //$rep1 = mysqli_query($db_handle,$sql1);
        
        //$sql2 = "DELETE FROM utilisateur WHERE utilisateur.id=5";
        //$rep2 = mysqli_query($db_handle,$sql2);
        
        $sql = "SELECT * FROM utilisateur";
        $rep = mysqli_query($db_handle,$sql);
        
        while($data=mysqli_fetch_assoc($rep)){
            echo"id : ".$data["id"]."<br>";
            echo"nom : ".$data["nom"]."<br>";
            echo"prenom : ".$data["prenom"].'<br>';
            echo"mail : ".$data["mail"]."<br>";
            echo"mdp : ".$data["mdp"]."<br>";
            echo"statut : ".$data["statut"]."<br>";
            echo"admin : ".$data["admin"]."<br>";
            echo"<br>";
        }
    }
    else{
        echo'Database not found'; 
    }

    mysqli_close($db_handle);
?>