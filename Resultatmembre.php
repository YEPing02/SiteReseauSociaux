<?php
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //ouvirer un session
    session_start();

    $pseudo_recherche=$_GET["pseudomem"];
    $id_login=$_SESSION['membre_id'];
    
    $sql="SELECT * "
              . "FROM membres  "
              . "WHERE lower(MemPseudo)=lower('$pseudo_recherche') ";
    $ssql= mysqli_query($cx, $sql);       
    if($ssql==null){
        echo(mysqli_error($cx)."a");
        return false;       
    }
    else{  
        
        if(($nuplet_membre= mysqli_fetch_array($ssql))!=null){
            echo '<html><head><meta charset="utf-8"></head></html>'
                ."<meta http-equiv=\"refresh\" content=\"0;url=InfoMembre.php?id_membre=".$nuplet_membre["MemId"]."\">";
        }
        else{
            echo '<html><head><meta charset="utf-8"><script type="text/javascript">alert("Pseudo n\'existe pas!")</script></head>'
                .'<meta http-equiv=\"refresh\" content=\"0;url="HomePage.php\"></html>';
            header("location: HomePage.php");
        }
    }
?>

