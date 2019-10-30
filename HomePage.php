
<!DOCTYPE html>
<html lang="fr">
    <head>
        
        <?php 
            //ouvirer un session
            session_start();
        ?>  
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
        <title>Home</title>        
    <?php
        // charegement un bibliothèque
        require("FonctionsUtiles.php")  ;
        $cx=connexion();
        //récupérer les paramètres
        $email_login=$_SESSION["email_login"];                               
        $membre_id=RetrouverUnMembreParEmail($email_login, $cx)["MemId"];    
        $_SESSION["membre_id"]=$membre_id;
        VerifierMdp($email_login, 0, $cx);
        $nom=utf8_encode(RetrouverUnMembreParEmail($email_login, $cx)["MemNom"]);
        $_SESSION["nom"]=$nom;
        $prenom=utf8_encode(RetrouverUnMembreParEmail($email_login, $cx)["MemPrenom"]);
        $_SESSION["prenom"]=$prenom;
        $pseudo=utf8_encode(RetrouverUnMembreParEmail($email_login, $cx)["MemPseudo"]);
        $_SESSION["pseudo"]=$pseudo;
        $list_suivre=retrouverSuivre($membre_id, $cx);
        $list_fans=retrouverFans($membre_id, $cx);
        $list_reponses= RetrouverTousReponses($cx); 
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
        
        
        
        
       <!--main partie--> 
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
	                            <h3 class="title"><?php echo $pseudo ?></h3>
                                    <h4><?php echo $prenom."&nbsp".$nom ?></h4>
                                    <h4><?php echo $email_login ?></h>
                                    
                                    
                                    
        <!-- follow et fans-->                                    
                                    <div class="suivre">
                                        <h2>suivre:</h2>
                                          <?php       
                                             while ($nuplets_suivre=mysqli_fetch_array($list_suivre)) {
                                             echo utf8_encode($nuplets_suivre["MemPseudo"]."<br>");
                                             }
                                          //reset le nuplet
                                          mysqli_data_seek($list_suivre, 0);
                                          ?>
                                            <h2>suivi par:</h2>
                                                  <?php       
                                                       while ($nuplets_fans=mysqli_fetch_array($list_fans)) {
                                                           echo utf8_encode($nuplets_fans["MemPseudo"]."<br>");
                                                       }
                                            ?>
                                    </div>
                                    
                                 </div>   
                            </div>  
                        </div>
                    </div>
                
                
                
                
                
                
    <!--div pour commentaires-->
<div class="row">
    <div class="col-md-12">
        <!--rédiger commentaire-->  
        <div class="rediger">
            <h1>comenter : </h1>
                <form accept-charset="ISO-8859-1" method="get" action="ConfirmerComenter.php">
                    <textarea rows ='3' cols ='50' name ='commentaire' required='required'> </textarea>
                    <input  type="submit" value="Publier">                
                </form>             
        </div>    
        <div class="panel-group" id="accordion">  
            
        <!--affichage de mes commentaires-->
            <h3 class="text-center"><strong>vos comentaires</strong></h3>
                <section class="comment-list">
                    <?php
        //commentaires init
                        $list_commentaires_Init=RetrouverCommentaireInit($membre_id,$cx);
                        if(isset( $list_commentaires_Init)){
                            while ($nuplets_commentaires_init=mysqli_fetch_array($list_commentaires_Init)){// retrouver une commentaires init
                                echo  '<article class="row" >'
                                    .   '<div class="col-md-2 col-sm-2 hidden-xs">'
                                    .       '<figure class="thumbnail">'
                                    .           '<img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />'
                                    .           '<figcaption class="text-center">'.$pseudo.'</figcaption>'
                                    .       '</figure> '
                                    .   '</div>'                                 //afficher l'avatar
                                    .   '<div class="col-md-10 col-sm-10">'
                                    .       '<div class="panel-body">'
                                    .           '<header class="text-left">'
                                    .           '<time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>'.date("d/m/y", strtotime($nuplets_commentaires_init['ComDate'])).'</time>' //date commentaire
                                    .           '</header>'
                                    .           '<div class="comment-post">'.utf8_encode($nuplets_commentaires_init["ComContenu"])     //contenu
                                    .           '</div>'
                                    .       '</div>'
                                    .   '<p class="text-right">';                  
                                if (IfLike($membre_id, $nuplets_commentaires_init["ComId"],$cx)){// si j'ai déjà aimé cette commentaires
                                    echo    "<button  class='like' id='com".$nuplets_commentaires_init["ComId"]."'>j'aime</button>&nbsp".NombreAprrecier($nuplets_commentaires_init['ComId'],$cx);
                                }  
                                else{  // si non
                                    echo    "<button  class='unlike' id='com".$nuplets_commentaires_init["ComId"]."'>j'aime</button>&nbsp".NombreAprrecier($nuplets_commentaires_init['ComId'],$cx);
                                }     // function  like
                                echo        '<a href="#collapseOne'.$nuplets_commentaires_init["ComId"].'" data-toggle="collapse" data-parent="#accordion"  class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a>'// repondre
                                    .   '</p>';
                                // repondre et like
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
                                    .   '</div>'         
                                    . '</article>'   ;  
                                
             //  audesus afficher une commentaire init  , apres tous les reponses de celleci                                
                                $array_reponses=RetrouverTousReponsesParCommentaire($nuplets_commentaires_init["ComId"],$cx,$array_reponses=array()); 
                                if(isset($array_reponses)){
                                    for($i=0;$i<count($array_reponses);$i++){// retrouver une reponse
                                        afficherUnReponse($membre_id, $array_reponses[$i]["ComParentId"], $array_reponses[$i]['ComId'], $cx);
                                    }  
                                }

                            }
                        }
                        
                        //tous réponses de l'utilisateur
                     
                         $liste_reponses= RetrouverReponsesParMemId($membre_id,$cx); 
                                if(isset($liste_reponses)){
                                    while($nuplets_reponses= mysqli_fetch_array($liste_reponses)){// retrouver une reponse
                                        afficherUnReponse($membre_id, $nuplets_reponses["ComReponId"], $nuplets_reponses['ComId'], $cx);
                                    }  
                                }
        ?>  
                </section>
         <!--audessus tous les commentaire concernant l'utilisateur-->
                <hr>
                <h1>comentaires des autres</h1>          
                    <?php        
             //afficher tous les commentaires des autres qui sont suivi par l'utilisateur
                        if (isset($list_suivre)) {
                            while ($nuplets_suivre=mysqli_fetch_array($list_suivre)) {   // pour chaque  follwed
                            //commentailres init                
                                $list_commentaires_Init_suivre=RetrouverCommentaireInit($nuplets_suivre['MemId'],$cx);
                                if(isset( $list_commentaires_Init_suivre)){
                                    while ($nuplets_commentaires_init_suivre=mysqli_fetch_array($list_commentaires_Init_suivre)){// retrouver une commentaires init
                                        echo  '<article class="row" >'
                                            .   '<div class="col-md-2 col-sm-2 hidden-xs">'
                                            .         '<figure class="thumbnail">'
                                            .             '<img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />'
                                            .             '<figcaption class="text-center">'.$nuplets_suivre["MemPseudo"].'</figcaption>'
                                            .         '</figure> '
                                            .     '</div>'                                 //afficher l'avatar
                                            .     '<div class="col-md-10 col-sm-10">'
                                            .          '<div class="panel-body">'
                                            .         '<header class="text-left">'
                                            .              '<time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>'.date("d/m/y", strtotime($nuplets_commentaires_init_suivre['ComDate'])).'</time>' //date commentaire
                                            .          '</header><div class="comment-post">'.utf8_encode($nuplets_commentaires_init_suivre["ComContenu"]).'</p>'       //contenu
                                            .     '</div>'
                                            .   '</div>'
                                            .   '<p class="text-right">';                  
                                        if (IfLike($membre_id, $nuplets_commentaires_init_suivre["ComId"],$cx)){// si j'ai déjà aimé cette commentaires
                                            echo    "<button  class='like' id='com".$nuplets_commentaires_init_suivre["ComId"]."'>j'aime</button>&nbsp".NombreAprrecier($nuplets_commentaires_init_suivre['ComId'],$cx);
                                        }  
                                        else{  // si non
                                            echo    "<button  class='unlike' id='com".$nuplets_commentaires_init_suivre["ComId"]."'>j'aime</button>&nbsp".NombreAprrecier($nuplets_commentaires_init_suivre['ComId'],$cx);
                                        }     // function  like
                                        echo        '<a href="#collapseOne'.$nuplets_commentaires_init_suivre["ComId"].'" data-toggle="collapse" data-parent="#accordion"  class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a>'// repondre
                                            .   '</p>';
                                            // repondre et like
                                           // zone de rédiger
                                        echo  '<div id="collapseOne'.$nuplets_commentaires_init_suivre["ComId"].'" class="post-footer panel-collapse collapse">'
                                            .        '<div class="input-group">'
                                            .           '<input  id="'.$nuplets_commentaires_init_suivre["ComId"].'" name="reponse" class="form-control  reponse" placeholder="Add a comment" type="text">'
                                            .            '<span class="input-group-addon">'
                                            .                '<a id=a'.$nuplets_commentaires_init_suivre["ComId"].' class="clicksend">'
                                            .                    '<i class="fa fa-edit"></i>'
                                            .                 '</a>'
                                            .            '</span>'
                                            .       '</div>'
                                            .     '</div>'  
                                            .   '</div>'      
                                            . '</article>'  ;                            
                         //  audesus afficher une commentaire init  , apres tous les reponses de celleci                                       
                                        $array_reponses_suivre=RetrouverTousReponsesParCommentaire($nuplets_commentaires_init_suivre["ComId"],$cx);
                                        if(isset($array_reponses_suivre)){
                                            for($i=0;$i<count($array_reponses_suivre);$i++){// retrouver une reponse   
                                                //faire afficher
                                                afficherUnReponse($membre_id, $array_reponses_suivre[$i]["ComParentId"], $array_reponses_suivre[$i]['ComId'], $cx);
                                            }
                                        }
                                    }
                                } 
                            }
                        }
                        // la fonction audessous est pour réinitialiser list_suivre pour le réutiliser après 
                        // (parce que, quand je fini la boucle mysqli_fetch_array, la list_suivre contient aucune de nuplets)
                        mysqli_data_seek($list_suivre, 0);
                        ?>  
                
        </div> 
    </div>
</div>
<script type="text/javascript">
    
//jquery quand toute la page est loaded  
    $(document).ready(function(){ 
      //fonction pour réaliser répondre
        $(".clicksend").click(function(){      // fonction active quand clicker sur boutton reply 
            var comIda =$(this).attr("id");    //récupérer ID de boutton enraison de ne pouvoir pas identifier une ID contenant que les nombre, j'ajoute string 'com'
            var comId=comIda.substring(1);     //obtenir le comId qui contien que des chiffre
            var contenu= $('input#'+comId).val();  
            var get='ConfirmerReponse.php?comid='+comId+'&reponse='+contenu;    //ajouter les contenu de commentaire dans le href de la balise <a>  par méthode GET pour que la page suivante puisse récupérer le contenu
            $('a#'+comIda).attr('href',get);                                    //pour que la page suivante puisse récupérer le contenu
        });
        
        //ci-dessous pour boutton aimer , technique ajax pour éviter actualisation toute la page chaque fois
        //
         //si l'utilisateur n'a pas encore aimé la commentaire
        $(".unlike").click(function(){            
             var comIdcom = $(this).attr("id");
            var comId=comIdcom.substring(3);
            $.ajax({                 // une requête ajax pour actualiser que le style du boutton like et mettre à jour BD quand je click sur boutton
                url:'LikeUnlike.php',
                type:'POST',
                async: true,
                data:{
                    "comid":comId,
                    "liked":1
                },
                success:function(d){
                    console.log(d);
                    $("#"+comId).attr("class","like");                                                                 
                }
            });
            window.location.reload();   // pour actualiser le style du boutton mais c'est pas nécéssaire et meilleur solution(on a encore des problème avec ajax....)
        });
           //si l'utilisateur a déjà aimé la commentaire
           // pareil mais faire inverse 
        $(".like").click(function(){ 
            var comIdcom = $(this).attr("id");
            var comId=comIdcom.substring(3);
            alert(comId);
            $.ajax({              
                url:'LikeUnlike.php',
                type:'POST',
                async: true,
                data:{
                    "comid":comId,
                    "unliked":1
                },
                success:function(d){
                    console.log(d);
                    $("#"+comId).attr("class","unlike");   
                }
            });
             window.location.reload();
        });   
    });
</script> 
    </body>
</html>

      