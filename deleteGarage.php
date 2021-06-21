<?php
  
    require_once "core/model/Garage.php";
    require_once "core/utils.php";

    if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
        $garage_id = $_GET['id']; 
  }
     if(!$garage_id){

        die("il faut entrer un id valide en paramtre dans l'url");
     }

// on veut verifier que cet garage existe bien dans la base de données
$modelGarage = new Garage();
$garage = $modelGarage->find($garage_id);


//si le garage n'existe pas
if(!$garage){
    die("ce garage est inexistant");
}
// alors , faire la requete de suppression

$modelGarage->delete($garage_id);

redirect('index.php');