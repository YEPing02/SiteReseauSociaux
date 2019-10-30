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
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
    $id_membre=$_GET['id_membre'];
    
    
    $nom=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemNom"]);
    $prenom=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemPrenom"]);
    $pseudo=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemPseudo"]); 
    $email=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemEmail"]); 
    
    $nom_recherche=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemNom"]);
    $prenom_rencherche=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemPrenom"]);
    $pseudo_rencherche=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemPseudo"]);
    $email_rencherche=utf8_encode(retrouverunMembreparid($id_membre, $cx)["MemEmail"]);
    
    
    
    $list_suivre=retrouverSuivre($id_membre, $cx);
    $list_fans=retrouverFans($id_membre, $cx);
    $list_commentairesInit= RetrouverCommentaireInit($id_membre, $cx);
    $list_reponses= RetrouverTousReponses($cx);
    //enregistre les reponses dans un tableau
    $i=0;
    while($nuplets_reponses= mysqli_fetch_array($list_reponses)) {
        $Array_reponses[$i]=$nuplets_reponses;
        $i++;
    }   
    //$reponse=RetrouverTousReponsesParCommentaire(4,$cx);
    ?>
    </head>
   <body class="profile-page">
       <!-- navigateur-->
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
        
      
    <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');margin-top: -50px"></div>
        
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
                                    <h6><?php echo $email ?></h6>
                                    
                                    
                                      <!--button pour suivre-->       
             <?php
                if(ifm1suivrem2($id_login, $id_membre, $cx)){
                 echo "<a href='FollowUnfollow.php?unfollowed=1&id_membre=$id_membre' ><button type='button' class='btn btn-success'>Following</button></a>";// following
                    }
                else {
                    echo "<a href='FollowUnfollow.php?followed=1&id_membre=$id_membre' ><button type='button' class='btn btn-success'>Follow</button></a>";// following// not following
                }
            ?>                                                  
                
                  
                  <!--boutton pour recommender-->
                  <a href="Recommender.php?id_membre=<?php echo $id_membre ?>" > <button type='button' class='btn btn-danger'>Recommende</button></a>
	                        </div>  
                               
                            </div>        
                         </div> 
                    </div>
                
                
                
                
         <!--info compétences-->
                <div class="description text-center">
                    <h3><strong>Compétences: </strong> </h3>
                        <?php
        //afficher  competences possedé
        $list_competence_posseder=RetrouverCompetencesPossede($id_membre, $cx);    
            if(isset($list_competence_posseder)){
                while ($nuplets_competence_posseder=mysqli_fetch_array($list_competence_posseder)){
                echo "<span class='tags'>"
                    .utf8_encode($nuplets_competence_posseder['CompNom'])
                        ."("
                        .utf8_encode($nuplets_competence_posseder['CompNiveau'])
                        .")"."</span>";
            }
            //afficher  competences recommendée
            }
               $list_competence_recommende=RetrouverCompetencesRecommende($id_membre, $cx);
                   if(isset($list_competence_recommende)){
                while ($nuplets_competence_recommende=mysqli_fetch_array($list_competence_recommende)){
                echo "<span class='tags'>"
                    .utf8_encode($nuplets_competence_recommende['CompNom'])
                        ."(recommendé)</span>";
            }
            //afficher  competences recommendée
            }
        ?>
        </div>

       <br>    <br> 
         
         
        <!--commentaires et réponse-->
      <div class="row">
     <div class="col-md-12">
         <h3 class="text-center"><strong>Commentaires: </strong> </h3>
        <section class="comment-list">
        <?php
        //commentaires init
        $list_commentairesInit=RetrouverCommentaireInit($id_membre,$cx);
         if(isset( $list_commentairesInit)){
              while ($nuplets_commentaires_init=mysqli_fetch_array($list_commentairesInit)){
                  $membre= RetrouverUnMembreParCommentaire($nuplets_commentaires_init['ComId'], $cx);
                   echo '<article class="row">'
                    . '<div class="col-md-2 col-sm-2 hidden-xs">'
                         . '<figure class="thumbnail">'
                          . '<img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />'
                 . '<figcaption class="text-center">'.$membre['MemPseudo'].'</figcaption>'
                 . '</figure> '
                . '</div>'         
                . '<div class="col-md-10 col-sm-10">'
                   . '<div class="panel-body">'
                   . '<header class="text-left">'
                   . '<time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>'.date("d/m/y", strtotime($nuplets_commentaires_init['ComDate'])).'</time>'
                   . '</header><div class="comment-post">'.utf8_encode($nuplets_commentaires_init["ComContenu"]).'</p>'
                   . '</div></div>';
                           
        
                    //bouton repondre
                   if(ifm1suivrem2($id_login, $id_membre, $cx)){ //si l'utilisateur a suivi ce membre, il peut répondre directement 
                   echo '<p class="text-right">'
                   . '<a href="#collapseOne'.$nuplets_commentaires_init["ComId"].'" data-toggle="collapse" data-parent="#accordion"  class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a>'
                   . '</p>'; 
                    // zone de rédiger
                    echo    '<div id="collapseOne'.$nuplets_commentaires_init["ComId"].'" class="post-footer panel-collapse collapse">'
                                    .       '<div class="input-group">'
                                    .           '<input  id="'.$nuplets_commentaires_init["ComId"].'" name="reponse" class="form-control  reponse" placeholder="Add a comment" type="text">'
                                    .               '<span class="input-group-addon">'
                                    .                   '<a id=a'.$nuplets_commentaires_init["ComId"].' class="clicksend">'
                                    .                       '<i class="fa fa-edit"></i>'
                                    .                   '</a>'
                                    .               '</span>'
                                    .       '</div>'
                                    .       '</div>'
                                    .   '</div>';      
                   }
                   else { // si non il ne peut pas répondre
                       echo "<br><br>";
                   }
                   echo '</article>'   ;
              }
         }
        
         // réponses
         $list_reponses=RetrouverReponsesParMemId($id_membre,$cx)   ;
          if(isset( $list_reponses)){
              while ($nuplets_reponses=mysqli_fetch_array($list_reponses)){
                 $membre= RetrouverUnMembreParCommentaire($nuplets_reponses['ComId'], $cx); //commenteur
                 $membre_recevoir=RetrouverUnMembreParCommentaire($nuplets_reponses['ComReponId'], $cx);// recever
                   echo '<article class="row" style="margin-left:100px;">'
                           . '<div class="col-md-2 col-sm-2 hidden-xs">'
                                   . '<figure class="thumbnail">'
                                        . '<img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />'
                           . '<figcaption class="text-center">'.$membre['MemPseudo'].'</figcaption>'
                                  . '</figure> '
                           . '</div>';
                echo '<div class="col-md-10 col-sm-10">'
                   . '<div class="panel-body">'
                   . '<header class="text-left">
                       
                       <div class="comment-user"><i class="fa fa-user"></i>Réponse à '.$membre_recevoir['MemPseudo'].'</div>'
                        
                   . '<time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>'.date("d/m/y", strtotime($nuplets_reponses['ComDate'])).'</time>'
                   . '</header><div class="comment-post">'.utf8_decode($nuplets_reponses["ComContenu"]).'</p>'
                   . '</div></div>';
                             //bouton repondre
                   if(ifm1suivrem2($id_login, $id_membre, $cx)){ //si l'utilisateur a suivi ce membre, il peut répondre directement 
                   echo '<p class="text-right">'
                   . '<a href="#collapseOne'.$nuplets_reponses["ComId"].'" data-toggle="collapse" data-parent="#accordion"  class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a>'
                   . '</p>'; 
                    // zone de rédiger
                    echo    '<div id="collapseOne'.$nuplets_reponses["ComId"].'" class="post-footer panel-collapse collapse">'
                                    .       '<div class="input-group">'
                                    .           '<input  id="'.$nuplets_reponses["ComId"].'" name="reponse" class="form-control  reponse" placeholder="Add a comment" type="text">'
                                    .               '<span class="input-group-addon">'
                                    .                   '<a id=a'.$nuplets_reponses["ComId"].' class="clicksend">'
                                    .                       '<i class="fa fa-edit"></i>'
                                    .                   '</a>'
                                    .               '</span>'
                                    .       '</div>'
                                    .       '</div>'
                                    .   '</div>'; 
                   }
                   else{ // si non il ne peut pas répondre
                       echo "<br><br>"; 
                   }                         
                   echo '</article>'   ;  
         }
         
          }
      
        ?>  
            </section>
        </div>
          </div>
        
<script type="text/javascript">   
//jquery quand toute la page est loaded 
 $(document).ready(function(){ 
      //fonction pour réaliser répondre
        $(".clicksend").click(function(){      // fonction active quand clicker sur boutton reply 
            var comIda =$(this).attr("id");    //récupérer ID de boutton enraison de ne pouvoir pas identifier une ID contenant que les nombre, j'ajoute string 'com'
            var comId=comIda.substring(1);  //obtenir le comId qui contien que des chiffre
            var contenu= $('input#'+comId).val();  
            var get='ConfirmerReponse.php?comid='+comId+'&reponse='+contenu;    //ajouter les contenu de commentaire dans le href de la balise <a>  par méthode GET pour que la page suivante puisse récupérer le contenu
            $('a#'+comIda).attr('href',get);                                    //pour que la page suivante puisse récupérer le contenu
        });
    });
</script>
    </body>
</html>
