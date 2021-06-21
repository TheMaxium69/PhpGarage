<?php

namespace Model;
require_once "core/model/Garage.php";
require_once "core/model/Annonce.php";
require_once "core/utils.php";

$garage_id = null;
$name = null;
$price = null;

if(!empty($_POST['garageId']) && ctype_digit($_POST['garageId']) ){
    $garage_id = $_POST['garageId'];
}

if(!empty($_POST['name']) ){
    $name = htmlspecialchars($_POST['name']);
}

if(!empty($_POST['price']) ){
    $price = htmlspecialchars($_POST['price']);
}

if( !$garage_id || !$name || !$price ){
    die("formulaire mal rempli");
}

$modelGarage = new Garage();

  $garage = $modelGarage->find($garage_id);

  if(!$garage){

    die("garage inexistant");
  }

$modelAnnonce = new Annonce();

$modelAnnonce->insert($name,$price,$garage_id);

redirect('garage.php?id='.$garage_id);


