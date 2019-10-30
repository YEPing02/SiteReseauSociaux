<?php
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //ouvirer un session
    session_start();
    //récupérer email et mot de passe  
    $contenu_commentaire=$_GET['commentaire'];
    $date_commentaire=date('YmdHis');
    $id_login=$_SESSION["membre_id"];
    $zero=0;  //parentID pour comentaire init
    //ajouter données dans BD
     $sql="INSERT INTO commentaires (ComContenu,ComReponId,ComDate,MemId) VALUES(?,?,?,?)";
            $ssql= mysqli_prepare($cx, $sql);
            mysqli_stmt_bind_param($ssql, "sidi", $contenu_commentaire,$zero, $date_commentaire,$id_login);        
            $execute= mysqli_stmt_execute($ssql);             
            if ($execute !=0)   // si l'ajout de la commentaire réussi, nous retourons à la page homepage directement
            {
              echo '<html><head><meta charset="utf-8"></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=HomePage.php\">";
            }
            else
            {
                echo("Error SQL". mysqli_error($cx));
    }
    
?>


