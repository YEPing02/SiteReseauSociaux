
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/HomePage.css"/>
          <link rel="stylesheet" href="css/Resultatrecherche.css">
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
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
           <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>İSTEmezun</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
    crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h"
    crossorigin="anonymous">
  <link rel="shortcut icon" href="img/isteicon.ico" type="image/x-icon">
        <meta charset="UTF-8">
        <title></title>
    <?php
    // charegement un bibliothèque
    require("FonctionsUtiles.php")  ;
    $cx=connexion();
    //ouvirer un session
    session_start(); 
    //récupérer les paramètres
    $email_login=$_SESSION['email_login'];
    $id_login=$_SESSION['membre_id'];//id de membre connecté
    $nom=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemNom"]);
    $prenom=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemPrenom"]);
    $pseudo=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemPseudo"]); 
    $email=utf8_encode(retrouverunMembreparid($id_login, $cx)["MemEmail"]); 
    $code_competence=$_GET['rechercheComp'];
    $list_membres_competence_posseder=rechercheMemParCompPosseder($code_competence, $cx);
    $list_membres_competence_recommende= RechercheMemParCompRecommende($code_competence, $cx);
    $list_membres_competence_pr= RechercheMemParCompPR($code_competence, $cx);

    
    
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

        <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');margin-top: -50px"></div>  
            <div class="main main-raised">
                <div class="profile-content">
                     <div class="container">             
                         <div class=" text-center">
                            <?php
                                    $nom_competence= mysqli_fetch_array(mysqli_query($cx, "SELECT CompNom FROM competences WHERE CompCode=$code_competence"))['CompNom'];    //retrouver le nom de la compétence recherchée
                                    echo "<h1>Compétence recherché : ".$nom_competence."</h1>";
                                  
                            ?>
                             



                            <?php
                            
                            //afficher les memmbre qui possèdent et sont recommendé cette compétence en même temps
                              if(isset($list_membres_competence_pr)){
                                    while ($nuplets_membres_competence_pr=mysqli_fetch_array($list_membres_competence_pr)){
                                        if($nuplets_membres_competence_pr['MemId']!=$id_login){ 
                                        $Pseudo_membre_emet= RetrouverUnMembreParId($nuplets_membres_competence_pr['MemEmetId'], $cx)['MemPseudo'];
                                        echo '<div class="card col-xs-6" style="width: 200px;margin:5px 5px 5px 5px ">'
                                        .'<div class="fotoYukari">'                                               
                                        .'<a  data-toggle="modal" data-target="#openModalImg" data-target="#openModalImg" class="text-dark">'
                                        .'<img  class="img-profile golge mx-auto d-block" src="https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cg_face%2Cq_auto:good%2Cw_300/MTU0NjQzOTk4OTQ4OTkyMzQy/ansel-elgort-poses-for-a-portrait-during-the-baby-driver-premiere-2017-sxsw-conference-and-festivals-on-march-11-2017-in-austin-texas-photo-by-matt-winkelmeyer_getty-imagesfor-sxsw-square.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid" style="margin:10px 0 30px 0">'
                                        .'</a>'
                                        .'</div>'
                                        .'<div class="card-header bg-white p-1">'
                                       .'<br><br><br><br><br><br>';
                                                                                    
                                                                              
                                             echo ' <a href="InfoMembre.php?id_membre='.$nuplets_membres_competence_pr["MemId"].'"><h4 class="text-center">'.utf8_encode($nuplets_membres_competence_pr['MemPseudo']).'</h4></a>';
                                             echo '<h4 class="text-center">Niveau :'
                                             .utf8_encode($nuplets_membres_competence_pr["CompNiveau"])
                                             ."</h4>"    ;
                                              echo '<h4 class="text-center">Recommendé par : '.$Pseudo_membre_emet.'</h4>'  .'</div>' ;
                                             
                                         echo '<div class="d-flex justify-content-around ">'
                .'<a href="#"><i data-toggle="tooltip" title="Linkedin" class="fab fa-linkedin  mb-1 iconLnk" style="font-size: 42px"></i></a>'
                .'<a href="#"><i data-toggle="tooltip" title="Facebook" class="fab fa-facebook-square mb-1 iconFb" style="font-size: 42px"></i></a>'
                .'<a href="#"><i data-toggle="tooltip" title="Twitter" class="fab fa-twitter-square mb-1 iconTw" style="font-size: 42px"></i></a>'
              .'</div>'
                                        
          .'</div>  '  ;
                                            
                                        }
                                    }
                              }
                                    
                                            
                            //afficher les membres qui possèdentcette compétence
                                if(isset($list_membres_competence_posseder)){
                                    while ($nuplets_membres_competence_posseder=mysqli_fetch_array($list_membres_competence_posseder)){
                                        if($nuplets_membres_competence_posseder['MemId']!=$id_login){  
                                        echo '<div class="card col-xs-6" style="width: 200px;margin:5px 5px 5px 5px ">'
                                        .'<div class="fotoYukari">'                                               
                                        .'<a  data-toggle="modal" data-target="#openModalImg" data-target="#openModalImg" class="text-dark">'
                                        .'<img  class="img-profile golge mx-auto d-block" src="https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cg_face%2Cq_auto:good%2Cw_300/MTU0NjQzOTk4OTQ4OTkyMzQy/ansel-elgort-poses-for-a-portrait-during-the-baby-driver-premiere-2017-sxsw-conference-and-festivals-on-march-11-2017-in-austin-texas-photo-by-matt-winkelmeyer_getty-imagesfor-sxsw-square.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid" style="margin:10px 0 30px 0">'
                                        .'</a>'
                                        .'</div>'
                                        .'<div class="card-header bg-white p-1">'
                                          .'<br><br><br><br><br><br>';
                                                                                    
                                                                              
                                             echo ' <a href="InfoMembre.php?id_membre='.$nuplets_membres_competence_posseder["MemId"].'"><h4 class="text-center">'.utf8_encode($nuplets_membres_competence_posseder['MemPseudo']).'</h4></a>';
                                             echo '<h4 class="text-center">Niveau :'
                                             .utf8_encode($nuplets_membres_competence_posseder["CompNiveau"])
                                             ."</h4>"    .'</div>' ;
                                             
                                         echo '<div class="d-flex justify-content-around ">'
                .'<a href="#"><i data-toggle="tooltip" title="Linkedin" class="fab fa-linkedin  mb-1 iconLnk" style="font-size: 42px"></i></a>'
                .'<a href="#"><i data-toggle="tooltip" title="Facebook" class="fab fa-facebook-square mb-1 iconFb" style="font-size: 42px"></i></a>'
                .'<a href="#"><i data-toggle="tooltip" title="Twitter" class="fab fa-twitter-square mb-1 iconTw" style="font-size: 42px"></i></a>'
              .'</div>'
                                        
          .'</div>  '  ;
                                             
                                        }
                                    }
                                    
                                    
                                    
                                    
                                    
                                    
                                //afficher membre étant recommender sur la competence
                                }
                                 if(isset($list_membres_competence_recommende)){
                                    while ($nuplets_membres_competence_recommende=mysqli_fetch_array($list_membres_competence_recommende)){
                                     if($nuplets_membres_competence_recommende['MemId']!=$id_login){
                                         $Pseudo_membre_emet= RetrouverUnMembreParId($nuplets_membres_competence_recommende['MemEmetId'], $cx)['MemPseudo'];
                                       echo '<div class="card col-xs-6" style="width: 200px;margin:5px 5px 5px 5px ">'
                                        .'<div class="fotoYukari">'                                               
                                        .'<a href="InfoMembre.php?id_membre='.$nuplets_membres_competence_recommende["MemId"].'" data-toggle="modal" data-target="#openModalImg" data-target="#openModalImg" class="text-dark">'
                                        .'<img class="img-profile golge mx-auto d-block" src="https://www.biography.com/.image/ar_1:1%2Cc_fill%2Ccs_srgb%2Cg_face%2Cq_auto:good%2Cw_300/MTU0NjQzOTk4OTQ4OTkyMzQy/ansel-elgort-poses-for-a-portrait-during-the-baby-driver-premiere-2017-sxsw-conference-and-festivals-on-march-11-2017-in-austin-texas-photo-by-matt-winkelmeyer_getty-imagesfor-sxsw-square.jpg" alt="Circle Image" class="img-raised rounded-circle img-fluid" style="margin:10px 0 30px 0">'
                                        .'</a>'
                                        .'</div>'
                                        .'<div class="card-header bg-white p-1">'
                                        .'<br><br><br><br><br><br>';
                                                                                                                     
                                         echo ' <a href="InfoMembre.php?id_membre='.$nuplets_membres_competence_recommende["MemId"].'"><h4 class="text-center">'.utf8_encode($nuplets_membres_competence_recommende['MemPseudo']).'</h4></a>';
                                              echo '<h4 class="text-center">Recommendé par : '.$Pseudo_membre_emet.'</h4>'  .'</div>' ;
                                            echo '<div class="d-flex justify-content-around ">'
                .'<a href="#"><i data-toggle="tooltip" title="Linkedin" class="fab fa-linkedin  mb-1 iconLnk" style="font-size: 42px"></i></a>'
                .'<a href="#"><i data-toggle="tooltip" title="Facebook" class="fab fa-facebook-square mb-1 iconFb" style="font-size: 42px"></i></a>'
                .'<a href="#"><i data-toggle="tooltip" title="Twitter" class="fab fa-twitter-square mb-1 iconTw" style="font-size: 42px"></i></a>'
              .'</div>'
            .'</div>'  ;
                                        }
                                    }
                                }

                                ?>
                             
                             
                             
                             
                           
                             
                             
                             
                             
                             
                         </div>                  
                     </div>
                 </div>
             </div>
    </body>
</html>
