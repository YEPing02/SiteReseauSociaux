<!DOCTYPE html>
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
    $membre_email=$_SESSION["email_login"];
    $membre_id= RetrouverUnMembreParEmail($membre_email, $cx)['MemId'];
    $code_competence=$_GET["CompCode"]; 
    ?>    
    </head>
    <body>
        <?php
            $sql="DELETE FROM posseder WHERE CompCode=$code_competence AND MemId=$membre_id";
            $ssql= mysqli_query($cx, $sql);                           
            if ($ssql !=0)        //si supprimer résussit , faire un echo des code html et javascript pour alert que la suppression résusite et retour à la page ModifierInfo.php
            {
                echo '<html><head><meta charset="utf-8"><script type="text/javascript">alert("Compétence supprimé!")</script></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=ModifierInfo.php\">";
 
            }
            else
            {
                echo("Error SQL". mysqli_error($cx));
            }
    
        ?>
    </body>
</html>
