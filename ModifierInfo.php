<!DOCTYPE html>
<html>
    <head>
                <link rel="stylesheet" type="text/css" href="css/HomePage.css"/>
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" id="bootstrap-css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">      
        <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">      
        <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/HomePage.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    $membre_id=RetrouverUnMembreParEmail($email_login, $cx)["MemId"];
    $pseudo=RetrouverUnMembreParEmail($email_login, $cx)["MemPseudo"];
      $nom=RetrouverUnMembreParEmail($email_login, $cx)["MemNom"];
        $prenom=RetrouverUnMembreParEmail($email_login, $cx)["MemPrenom"];
    $list_competences_possede=RetrouverCompetencesPossede($membre_id, $cx);
    $list_competences_recommende=RetrouverCompetencesRecommende($membre_id, $cx);
    $list_competences=RetrouverTousCompetences($cx);
    ?>
    </head>
    <body class="profile-page">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                 <li class="nav-item dropdown">
                    <p class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <?php echo $pseudo; ?> 
                    </p>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <p class="dropdown-item" > <?php echo "email:&nbsp".$email_login; ?></p>
                      <p class="dropdown-item" > <?php echo utf8_encode($nom)."&nbsp".utf8_encode($prenom)."";?></p>
                      <div class="dropdown-divider"></div>
                      <a class="nav-link" href="ModifierInfo.php" target="_self">Modifier vos info</a>
                    </div>
                 </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="HomePage.php">Home <span class="sr-only">(current)</span></a>
                  </li>  
                   <li class="nav-item active">
                    <a class="nav-link" href="LogOut.php">Log out <span class="sr-only">(current)</span></a>
                  </li>  
                </ul>
                 <!--recherche membre-->
                <form class="form-inline my-2 my-lg-0" method="GET" action="Resultatmembre.php">
                    <p>recherche membre :&nbsp
                        <input type="text" name="pseudomem"> 
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnRecherche" >Recherche</button>
                </form>
               <!--recherche competence-->
                <form class="form-inline my-2 my-lg-0" method="GET" action="Resultatrecherche.php">
                    <p>recherche competence :&nbsp
                        <select name='rechercheComp'>
                     <?php
                     $list_tous_competences=RetrouverTousCompetences($cx);
                        while($nulpets_tous_competences= mysqli_fetch_array($list_tous_competences)){
                            echo "<option value='".$nulpets_tous_competences['CompCode']."'>".$nulpets_tous_competences['CompNom']."</option>";
                        }
       
                    ?>
                            </select>
                          
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnRecherche" >Recherche</button>
                </form>
            </div>
        </nav>
        
        <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');margin-top: -50px"></div>  
            <div class="main main-raised">
                <div class="profile-content">
                     <div class="container">             
                         <div class="description text-center">                       
                            <h1>Competences:</h1>
                               <h2>Possédez</h2>
                               <?php
                                   while ($nuplets_competences_possede=mysqli_fetch_array($list_competences_possede)) {
                                       echo utf8_encode($nuplets_competences_possede["CompNom"]."&nbsp".$nuplets_competences_possede["CompNiveau"]."<a href='ConfirmationSupprimer.php?CompCode=".$nuplets_competences_possede["CompCode"]."'><input type='button' value='Supprimer'></a>"."<br>");
                                   }
                               ?>
                               <h2>Recommendé</h2>
                               <?php
                                   while ($nuplets_competences_recommende=mysqli_fetch_array($list_competences_recommende)) {
                                       //retrouver le menbre qui recommende
                                       $email_membre_recommende=retrouverEmailParId($nuplets_competences_recommende["MemEmetId"], $cx);
                                       $pseudo_membre_recommende=RetrouverUnMembreParEmail($email_membre_recommende, $cx)["MemPseudo"];
                                       echo utf8_encode($nuplets_competences_recommende["CompNom"]."&nbsp (recommend&eacute par&nbsp".$pseudo_membre_recommende.")<br>");
                                   }
                               ?>
                               <!--Ajouter les competences-->
                                <h2>Ajouter</h2>
                               <form method="get" action='Confirmationajouter.php'>
                                   <select name="choix_competence">
                                   <?php                                     
                                      while($nuplets_competences=mysqli_fetch_array($list_competences)){   
                                          $competence_code=$nuplets_competences["CompCode"];
                                          echo "<option value=$competence_code>";
                                          echo utf8_encode($nuplets_competences["CompNom"]);
                                          echo "</option>";            
                                      }                
                                  ?>
                                   </select>         
                                   <select name="choix_niveau">
                                         <option value="1">débutant</option>           
                                         <option value="2">junior</option>
                                         <option value="3">confirmé</option>
                                         <option value="4">expert</option>
                                   </select>
                                    <input type="submit" name="confirmer" value="Ajouter">
                               </form>
                                    <a href='HomePage.php'><input type=button value='Retour'></a>
                            </div>                  
                     </div>
                 </div>
             </div>
                                    
    </body>   
</html>
