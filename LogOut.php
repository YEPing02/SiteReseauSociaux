<?php
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //dédruire la session, retrouver les données en connexion prochaine
    session_destroy();
    header("location: Login.html");
?>

