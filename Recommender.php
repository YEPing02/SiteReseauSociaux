<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script type="text/javascript" src="InfoMembre.js"></script>
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
                <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
                <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
                <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                <link rel="stylesheet" href="css/infomembre.css"/>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Informations Membre</title>
         <?php
    // charegement un bibliothèque
    require("FonctionsUtiles.php");
    $cx=connexion();
    //ouvirer un session
    session_start(); 
    //récupérer les paramètres
    $email_login=$_SESSION['email_login'];
    $id_login=$_SESSION['membre_id'];//id de membre connecté
    $id_membre=$_GET['id_membre'];//id de membre vu
    
       $nom=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemNom"]);
    $prenom=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemPrenom"]);
    $pseudo=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemPseudo"]); 
    
    
    $nom_recherche=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemNom"]);
    $prenom_rencherche=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemPrenom"]);
    $pseudo_rencherche=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemPseudo"]);
    $email_rencherche=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemEmail"]);
    $email=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemEmail"]); 
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
                       <p class="dropdown-item" > <?php echo $nom."&nbsp".$prenom."";?></p>
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
        
      
    <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');"></div>
        
    <div class="main main-raised">
	<div class="profile-content">
            <div class="container">
                <div class="row">
	            <div class="col-md-6 ml-auto mr-auto">
                        <div class="profile">    
                            <div class="avatar">
	                            <img src="https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cg_face%2Cq_auto:good%2Cw_300/MTU0NjQzOTk4OTQ4OTkyMzQy/ansel-elgort-poses-for-a-portrait-during-the-baby-driver-premiere-2017-sxsw-conference-and-festivals-on-march-11-2017-in-austin-texas-photo-by-matt-winkelmeyer_getty-imagesfor-sxsw-square.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid">
	                    </div>
                                  <!--info basic-->
                            <div class="name">
	                            <h3 class="title"><?php echo $pseudo_rencherche ?></h3>
                                    <h6><?php echo $prenom_rencherche."&nbsp".$nom_recherche ?></h6>
                                    <h6><?php echo $email_rencherche ?></h6>
                            </div>
                
         <!--choisir compétences-->
                            <div class="description text-center">
                                <h3><strong>Choisir la compétences: </strong> </h3>
                                <form method="get" action='ConfirmerRecommende.php'>
                                    <input hidden name="MemIdVu" value="<?php echo $id_membre ?>">
                                    <select name="choix_competence">
                                    <?php
                                         $list_competences= RetrouverTousCompetences($cx);                             
                                            while($nuplets_competences=mysqli_fetch_array($list_competences)){   
                                                $competence_code=$nuplets_competences["CompCode"];
                                                echo "<option value=$competence_code>";
                                                echo utf8_encode($nuplets_competences["CompNom"]);
                                                echo "</option>";            
                                            }                
                                    ?>
                                    </select>
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="btnRecommender">Recommender</button>
                                </form>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
