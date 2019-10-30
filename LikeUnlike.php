<?php
    // charegement un bibliothèque
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //ouvirer un session
    session_start(); 
    //récupérer les paramètres
    $id_login= $_SESSION["membre_id"];   
    
    if(isset($_POST['liked'])){//si je click sur j'aime alors j'ajoute les données dans BD
        $get_id=$_POST['Comid'];
        $commentaire_id=(int)$get_id;
        echo $get_id;
        $sql="INSERT INTO apprecier (MemId,Comid) VALUES($id_login,$commentaire_id)";
        echo $sql;
            $ssql= mysqli_query($cx, $sql);               
            if ($ssql !=0)
            {
              echo $commentaire_id.'liked';
            }
            else
            {
                echo("Error SQL". mysqli_error($cx));
            }
    }
        if(isset($_POST['unliked'])){//si je click sur je n'aime pas alors j'ajoute les données dans BD
        $get_id=$_POST['Comid'];
       $commentaire_id=(int)$get_id;
        $sql="DELETE FROM apprecier WHERE MemId=$id_login AND ComId=$commentaire_id";
            $ssql= mysqli_query($cx, $sql);
          if ($ssql !=0)
            {
                echo $commentaire_id.'unliked';
            }
            else
            {
                echo("Error SQL". mysqli_error($cx));
    }
    }

        ?>
