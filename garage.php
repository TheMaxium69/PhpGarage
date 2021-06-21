<?php
namespace Model;

require_once "core/model/Garage.php";
require_once "core/model/Annonce.php";
require_once "core/model/User.php";
require_once "core/utils.php";



$garage_id = null;

if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

      $garage_id = $_GET['id'];
}
  
if(!$garage_id){
    die("il faut absolument entrer un id dans l'url pour que le script fonctionne");
}


$modelGarage = new Garage();
$garage = $modelGarage->find($garage_id);



$modelAnnonce = new Annonce();
$annonces = $modelAnnonce->findAllByGarage($garage_id);
/* 
$modelUser = new User();

$modelUser->delete(3);

$toutesMesUsers = $modelUser->findAll();

var_dump($toutesMesUsers);

die(); */


  $titreDeLaPage = $garage['name'];

 render('garages/garage',
        compact('garage', 'annonces','titreDeLaPage')       
);