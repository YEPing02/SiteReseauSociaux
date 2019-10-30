<?php

/* toutes les fonctions desquelles les nom commencent par 'retrouver',
 * reture un list de résultat de requête
 * (sauf que si il y a 'un' dans le nom de la fonction,par exemple retrouverUnmembreparid
 * elle return un seul nuplet parce que la liste contient un seul nuplets,
 * c'est à dire le résultat de la fonction peut être utilisé directement, pas besoin d'utiliser mysqli_getch_array)  */



ini_set('date.timezone','europe/paris');

function Connexion(){  //connxion à la BD
    //connxion à Mysql
    $cx= mysqli_connect("serveur à connecter","compte", "mdp");
    if($cx==null){
       echo("<p>Connexion IMPOSSIBLE!!!</p>");
       return 0;
    }
    else{
       //choisir de la base de données.
        if(mysqli_select_db($cx,"db_21709513_2")==null){
           echo("<p>Connexion IMPOSSIBLE!!!</p>");
           return 0;
        }
    }
    return $cx;
}


function IfExistEmail($email,$connexion){ //vérifier si l'email existe déjà dans BD, si oui, return true,par contre return false
    $sql="SELECT * "
    . "FROM membres "
    . "WHERE LOWER(membres.MemEmail)=LOWER('$email')";
    $ssql= mysqli_query($connexion, $sql);
    $nbNuplets= mysqli_num_rows($ssql);
    if($nbNuplets==0){
       return false;
    }
    else {
        return true;
    }
}


function VerifierMdp($email,$mdp,$connexion){ //vérifier si l'email existe déjà dans BD, si oui, return true,par contre return false
    $sql="SELECT * "
    . "FROM membres "
    . "WHERE LOWER(membres.MemEmail)=LOWER('$email')";
    $ssql= mysqli_query($connexion, $sql);
    $mdp_mem= mysqli_num_rows($ssql)["MemMDP"];
    echo $sql;
    if($mdp==$mdp_mem){
       return true;
    }
    else {
        return false;
    }
}


function IfExistPseudo($pseudo,$connexion){  //vérifier si le pseudo existe déjà dans BD, si oui, return true,par contre return false
    $sql="SELECT * "
    . "FROM membres "
    . "WHERE LOWER(membres.MemPseudo)=LOWER('$pseudo')";
    $ssql= mysqli_query($connexion, $sql);
    $nbNuplets= mysqli_num_rows($ssql);
    if($nbNuplets==0){
       return false;
    }
    else {
        return true;
    }
}


function RetrouverUnMembreParEmail($email,$connexion){  //return un seul nuplet
    $sql="SELECT * "
            . "FROM membres "
            . "WHERE membres.MemEmail='$email'";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return mysqli_fetch_array($ssql);
    }
}


function RetrouverUnMembreParId($id,$connexion){ //return un seul nuplet
    $sql="SELECT * "
            . "FROM membres "
            . "WHERE membres.MemId='$id'";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return mysqli_fetch_array($ssql);
    }
}


function RetrouverEmailParId($id,$connexion){ //return un string email
    $sql="SELECT membres.MemEmail "
            . "FROM membres "
            . "WHERE membres.MemId='$id'";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return  mysqli_fetch_array($ssql)["MemEmail"];;
    }
}


function RetrouverSuivre($id,$connexion){    //ligne de membre
    $sql="SELECT * "
            . "FROM membres "
            . "WHERE membres.MemId IN "
            . "(SELECT suivre.MemSuiviId "
            . "FROM membres,suivre "
            . "WhERE membres.MemId=$id "
            . "AND suivre.MemSuivreId= membres.MemId)";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return $ssql;
    }
}

function RetrouverFans($id,$connexion){   //ligne de membre
      $sql="SELECT * "
            . "FROM membres "
            . "WHERE membres.MemId IN "
            . "(SELECT suivre.MemSuivreId "
            . "FROM membres,suivre "
            . "WhERE membres.MemId=$id "
            . "AND suivre.MemSuiviId= membres.MemId)";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return $ssql;
    }
}

function RetrouverCommentaireInit($id,$connexion){    //return une liste des commentaires initiales d'un membre
     $sql="SELECT * "
             . "FROM commentaires c "
             . "WHERE c.MemId=$id "
             . "And c.COMREPONID =0 ";
     $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return $ssql;
    }
}

function RetrouverUnMembreParCommentaire($commentaire_id,$connexion){
     $sql="SELECT m.* "
             . "FROM commentaires c,membres m "
             . "WHERE c.ComId=$commentaire_id "
             . "And m.MemId=c.MemId";
     $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        $nuplet= mysqli_fetch_array($ssql);
        return $nuplet;
    }
}


function RetrouverReponsesParMemId($memid,$connexion){
      $sql="SELECT * "
              . "FROM commentaires c "
              . "WHERE c.MemId=$memid "
              . "And c.COMREPONID<>0 ";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return $ssql;
    }
}


function RetrouverTousReponses($connexion){        //return toues les réponses existant dans BD(les commentaires qui ont la clé étrangère ComReponId)
      $sql="SELECT * "
              . "FROM commentaires c "
              . "WHERE c.COMREPONID is not null ";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return $ssql;
    }
}


function RetrouverTousCompetences($connexion){
       $sql="SELECT * FROM competences c";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return $ssql;
    }
}


function RetrouverCompetencesPossede($membreid,$connexion){
       $sql="SELECT p.*,c.CompNom "
               . "FROM competences c,posseder p "
               . "WHERE p.Memid=$membreid "
               . "AND c.CompCode=p.CompCode";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return $ssql;
    }
}


function RetrouverCompetencesRecommende($id,$connexion){
       $sql="SELECT r.*,c.CompNom "
               . "FROM competences c,recommender r "
               . "WHERE r.MemRecepid=$id "
               . "AND c.CompCode=r.CompCode";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion));
        return false;
    }
    else{
        return $ssql;
    }
}



function RechercheMemParCompRecommende($id_competence,$connexion){             //rechercher tous les membre qui sont recommendés sur  la compétence indiquée
    $sql="SELECT m.MemId,m.MemPseudo,m.MemEmail,m.MemNom,m.MemPrenom,r.MemEmetId
               FROM competences c, recommender r,membres m
               WHERE c.CompCode = $id_competence
               AND c.compcode=r.CompCode
               AND r.MemRecepId=m.MemId
               AND  m.MemId not in
               (SELECT p.MemId
               FROM competences c1,posseder p
               WHERE c1.CompCode =$id_competence
               AND c1.compcode=p.CompCode)";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion)."b");
        return false;
    }
    else{
        return $ssql;
    }
}

function RechercheMemParCompPR($id_competence,$connexion){             //rechercher tous les membre qui sont recommendés et possède sur  la compétence indiquée
    $sql="SELECT m.MemId,m.MemPseudo,m.MemEmail,m.MemNom,m.MemPrenom,r.MemEmetId,p.CompNiveau
               FROM competences c, recommender r,membres m,posseder p
               WHERE c.CompCode = $id_competence
               AND c.compcode=r.CompCode
               AND r.MemRecepId=m.MemId
               AND p.MemId=r.MemRecepId
               AND  m.MemId in
               (SELECT p.MemId
               FROM competences c1,posseder p
               WHERE c1.CompCode =$id_competence
               AND c1.compcode=p.CompCode)";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion)."b");
        return false;
    }
    else{
        return $ssql;
    }
}

function RechercheMemParCompPosseder($id_competence,$connexion){            //rechercher tous les membre qui possèdent la compétence indiquée sans recommende
           $sql="SELECT m.MemId,m.MemPseudo,m.MemEmail,m.MemNom,m.MemPrenom,p.CompNiveau
               FROM competences c, posseder p,membres m
               WHERE c.CompCode = $id_competence
               AND c.compcode=p.CompCode
               AND p.MemId=m.MemId
               AND  m.MemId not in
               (SELECT r.MemRecepId
               FROM competences c1,recommender r
               WHERE c1.CompCode =$id_competence
               AND c1.compcode=r.CompCode)";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion)."a");
        return false;
    }
    else{
        return $ssql;
    }
}



 function NombreAprrecier($ComId,$connexion){    //compter le nombre toutal d'aapprécier d'une commentaire
      $sql="SELECT Count(a.MemId) as nb "
              . "FROM apprecier a "
              . "WHERE a.ComId=$ComId";
    $ssql= mysqli_query($connexion, $sql);
    if($ssql==null){
        echo(mysqli_error($connexion)."a");
        return false;
    }
    else{
        return mysqli_fetch_array($ssql)['nb'];
    }
 }

 function IfLike($MemId,$ComId,$connexion){      //vérifier si un membre appréci une commentaire
    $sql="SELECT COUNT(*) as nb "
           . "FROM apprecier a "
           . "WHERE a.ComId=$ComId "
           . "AND a.MemId=$MemId";
    $ssql= mysqli_query($connexion, $sql);
    $nb_nuplets= mysqli_fetch_array($ssql)['nb'];
    if($ssql==null){
        echo(mysqli_error($connexion)."a");
        return false;
    }
    else{
        if($nb_nuplets==0){
            return false;
        }
        else {
            return true;
        }
    }
 }

/*trouver tous les réponses concernant une commentaire initiale et entregistrer tous les réponse dans un tableau
 *chque réponse est entregistrée comme une structure, les attributs sont:comId,MemId,ComContenu et ComparentId
*donc ce sera un tableau qui contient beaucoup de tableau  */
 function RetrouverTousReponsesParCommentaire($ComParentId=0,$connexion,$array_reponse=array()){
    $sql="SELECT * "           //requête qui affiche des lignes de commentaires
        . "FROM commentaires "
        . "WHERE ComReponId=$ComParentId ";
    $ssql=mysqli_query($connexion,$sql);
    if(isset($ssql)){              //si la requête fonctionne bien
        while ($nuplets= mysqli_fetch_array($ssql)) {  //pour chaque reponses d'une parent comenntaire
            $membres=RetrouverUnMembreParCommentaire($nuplets["ComId"],$connexion);    //tout d'abord on va retrouver le membre qui a repondé
            $reponse=array( "MemId"=>$membres["MemId"],
                            "ComContenu"=>$nuplets["ComContenu"],
                            "ComId"=>$nuplets["ComId"],
                            "ComParentId"=>$nuplets["ComReponId"]);  //enregistrer cette réponse dans un tableau(comme une variable structurée)
            $array_reponse[]=$reponse;  //ajouter cette réponse dans tableau array_reponse

            $array_reponse=RetrouverTousReponsesParCommentaire($reponse["ComId"],$connexion,$array_reponse);
            // après on regarde cette réponse comme commentaire parent pour trouver une sous-réponse
            //et return le tableau dans lequel on a déjà les réponses
        }
            return $array_reponse;
        }
        else{
            return $array_reponse;
        }
 }


 function ifm1suivrem2($memid1,$memid2,$connexion){    //vérifier si membre1 suit le membre2
         $sql="SELECT * "
            . "FROM suivre "
            . "WHERE MemSuivreId=$memid1 "
            . "AND MemSuiviId=$memid2";
    $ssql= mysqli_query($connexion, $sql);
    $nbNuplets= mysqli_num_rows($ssql);
    if($nbNuplets==0){
       return false;
    }
    else {
        return true;
    }
 }

/*function pour afficher une réponse, c'est à dire echo les codes html afin d'afficher tous les éléments pour une seule répone*/
 function afficherUnReponse($id_login,$commentaire_parent_id,$commentaire_child_id,$connexion){   //id_login pour botton like
                        $commentaire= mysqli_fetch_array(mysqli_query($connexion, "SELECT * FROM commentaires WHERE ComId=$commentaire_child_id"));
                        $membre_repondre=RetrouverUnMembreParCommentaire($commentaire_child_id, $connexion);// qui repondre
                        $membre_recevoir=RetrouverUnMembreParCommentaire($commentaire_parent_id, $connexion);// qui recoit
                        echo '<article class="row"  style="margin: 20px 0 0 30px;">'    // margin pour dinstinguer commentaire et reponse
                            . '<div class="col-md-2 col-sm-2 hidden-xs">'
                            . '<figure class="thumbnail">'
                            . '<img class="img-responsive" src="http://www.tangoflooring.ca/wp-content/uploads/2015/07/user-avatar-placeholder.png" />'
                            . '<figcaption class="text-center">'.$membre_repondre["MemPseudo"].'</figcaption>'
                            . '</figure> '
                            . '</div>'                                                                                                   //afficher l'avatar et pseudo
                            . '<div class="col-md-10 col-sm-10">'
                            . '<div class="panel-body">'
                            . '<header class="text-left">'
                            .'<div class="comment-user"><i class="fa fa-user"></i>Réponse à '.$membre_recevoir['MemPseudo'].'</div>'
                            . '<time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i>'.date("d/m/y", strtotime($commentaire['ComDate'])).'</time>' //date commentaire
                            . '</header><div class="comment-post">'.utf8_decode($commentaire["ComContenu"])                              //contenu
                            . '</div></div>'
                            . '<p class="text-right">';
                        if (IfLike($id_login, $commentaire["ComId"],$connexion)){// si j'ai déjà aimé cette commentaires
                            echo "<button  class='like' id='com".$commentaire["ComId"]."'>j'aime</button>&nbsp".NombreAprrecier($commentaire['ComId'],$connexion);
                        }
                        else{  // si non
                            echo "<button  class='unlike' id='com".$commentaire["ComId"]."'>j'aime</button>&nbsp".NombreAprrecier($commentaire['ComId'],$connexion);
                        }     // function  like
                        echo '<a href="#collapseOne'.$commentaire["ComId"].'" data-toggle="collapse" data-parent="#accordion"  class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a>'// repondre
                        . '</p>';                                                                                                                    // zone de rédiger un réponse
                        echo '<div id="collapseOne'.$commentaire["ComId"].'" class="post-footer panel-collapse collapse">'
                            . '<div class="input-group">'
                                . '<input   id="'.$commentaire["ComId"].'" name="reponse" class="form-control  reponse" placeholder="Add a comment" type="text">'
                                    . '<span class="input-group-addon">'
                                        . '<a  id=a'.$commentaire["ComId"].' class="clicksend">'
                                            . '<i class="fa fa-edit">'
                                        . '</i>'
                                    . '</a>'
                                . '</span>'
                            . '</div>'
                        . '</div>'
                                . '</div>'
                        . '</article>' ;
                    }


    ?>
