<?php   
  require_once "core/model/Annonce.php";
  require_once "core/utils.php";

if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
      $annonce_id = $_GET['id'];
}
if(!$annonce_id){
  die("il faut entrer un id valide en paramtre dans l'url");
}

$modelAnnonce = new Annonce();

$annonce = $modelAnnonce->find($annonce_id);



if(!$annonce){
    die("cette annonce est inexistante");
}


$modelAnnonce->delete($annonce_id);

redirect('garage.php?id='.$annonce['garage_id']);