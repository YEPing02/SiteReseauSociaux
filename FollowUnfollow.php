<?php
    // charegement un bibliothèque
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //ouvirer un session
    session_start(); 
    //récupérer les paramètres
    $id_login= $_SESSION["membre_id"];   
    $id_membre=$_GET['id_membre'];
    
  
    //si je click sur follow alors j'ajoute les données dans BD
    if(isset($_GET['followed'])){     
        $sql="INSERT INTO suivre (MemSuivreId,MemSuiviid) VALUES(?,?)";
        $ssql= mysqli_prepare($cx, $sql);
        mysqli_stmt_bind_param($ssql, "ii", $id_login,$id_membre);        
        $execute= mysqli_stmt_execute($ssql);             
        if ($execute !=0)                                               //retour à la page InfoMembre
        {
              echo '<html><head><meta charset="utf-8"></head></html>'
            ."<meta http-equiv=\"refresh\" content=\"0;url=InfoMembre.php?id_membre=$id_membre\">";  
        }
        else
        {
            echo("Error SQL". mysqli_error($cx));
        }
    }
    
    
    //si je click sur unfollow alors j'ajoute les données dans BD  
    if(isset($_GET['unfollowed'])){        
        $sql="DELETE FROM suivre WHERE MemSuivreId=$id_login AND MemSuiviId=$id_membre ";
        $ssql= mysqli_query($cx, $sql);  
        if($ssql==null){
            echo(mysqli_error($cx)."a");
            return false;       
        }
        else{                                                           //retour à la page InfoMembre             
            echo '<html><head><meta charset="utf-8"></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=InfoMembre.php?id_membre=$id_membre\">";     
        }
    }
        ?>
