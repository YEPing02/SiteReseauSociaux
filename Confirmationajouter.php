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
    $membre_id= RetrouverUnMembreParEmail($email_login, $cx)["MemId"];
    $code_competence=$_GET["choix_competence"];
    $nom_niveau=$_GET["choix_niveau"]; 
    ?>    
    </head>
    <body>
        <?php
            $sql="INSERT INTO posseder (MemId,CompCode,CompNiveau) VALUES(?,?,?)";
            $ssql= mysqli_prepare($cx, $sql);
            mysqli_stmt_bind_param($ssql, "iis", $membre_id,$code_competence,$nom_niveau);        
            $execute= mysqli_stmt_execute($ssql);             
            if ($execute !=0)     //si ajouter résussit , faire un echo des code html et javascript pour alert que l'ajout résusite et retour à la page ModifierInfo.php
            {
              echo '<html><head><meta charset="utf-8"><script type="text/javascript">alert("Compétence ajouté!")</script></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=ModifierInfo.php\">";
            }
            else
            {
                echo("Error SQL". mysqli_error($cx));
            }
        ?>
    </body>
</html>
