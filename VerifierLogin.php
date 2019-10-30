<?php
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //ouvirer un session
    session_start();
    //récupérer email et mot de passe  
    $_SESSION["email_login"]=$_GET["email_login"];
    $_SESSION["mdp_login"]=$_GET["password_login"];
                                                                    //Si un membre n'enregistre pas encore, il faut s'inscrire
    if (!ifExistEmail( $_SESSION["email_login"],$cx)){
           echo '<html><head><meta charset="utf-8"><script type="text/javascript">alert("Email n\'existe pas, vous devez vous inscrire!")</script></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=Login.html\">";
    }
    else {    //si email existe, on vérifie mot de passes
        if(VerifierMdp($_SESSION["email_login"],  $_SESSION["mdp_login"], $cx)){
        header("location: HomePage.php");}
        else    {
            echo '<html><head><meta charset="utf-8"><script type="text/javascript">alert("Mot de passe incorrecte!!")</script></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=Login.html\">";
        }
    }
?>

