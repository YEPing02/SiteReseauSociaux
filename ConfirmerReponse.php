<?php
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //ouvirer un session
    session_start();
    //récupérer email et mot de passe  
    $id_parent_commentaire=$_GET['comid'];
    $contenu_reponse=$_GET['reponse'];
    $date_repondre=date('YmdHis');
    $id_login=$_SESSION["membre_id"];
    $url_precedent=$_SERVER['HTTP_REFERER'];
    //ajouter données dans BD
     $sql="INSERT INTO commentaires (ComReponId,ComContenu,ComDate,MemId) VALUES(?,?,?,?)";
            $ssql= mysqli_prepare($cx, $sql);
            mysqli_stmt_bind_param($ssql, "isdi", $id_parent_commentaire, utf8_encode($contenu_reponse), $date_repondre,$id_login);        
            $execute= mysqli_stmt_execute($ssql); 
      
          if ($execute !=0)              //si repondre résussit , faire un echo des code html  retour à la page HomePage.php 
            {             
              echo '<html><head><meta charset="utf-8"></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=$url_precedent\">";
            }
            else
            {
                echo("Error SQL". mysqli_error($cx));
            }
   
?>

