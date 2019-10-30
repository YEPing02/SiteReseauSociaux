<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
     <?php
    // charegement un bibliothèque
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //ouvirer un session
    session_start(); 
    //récupérer les paramètres
    $email_login=$_SESSION["email_login"];
    $id_login= RetrouverUnMembreParEmail($email_login, $cx)["MemId"];
    $code_competence=$_GET["choix_competence"];
    $id_mem=$_GET["MemIdVu"];
    ?>    
    </head>
    <body>
        <?php
            $sql="INSERT INTO recommender (MemEmetId,MemRecepId,CompCode) VALUES(?,?,?)";
            $ssql= mysqli_prepare($cx, $sql);
            mysqli_stmt_bind_param($ssql, "iii", $id_login,$id_mem,$code_competence);        
            $execute= mysqli_stmt_execute($ssql);             
            if ($execute !=0)                   //si recommender résussit , faire un echo des codes html pour retour à la page InfoMembre.php 
                                                //en envoyant Idmem par GET(pour la page InfoMembre.php affiche correctement)
            {
              echo '<html><head><meta charset="utf-8"><script type="text/javascript">alert("Rencommende réussit!")</script></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=InfoMembre.php?id_membre=".$id_mem."\">";
            }
            else
            {
                echo("Error SQL". mysqli_error($cx));
            }
        ?>
    </body>
</html>
