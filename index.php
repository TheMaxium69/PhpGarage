<?php 

//on récupère les librairies nécéssaires


require_once "core/utils.php";
require_once "core/model/Garage.php";


$modelGarage = new Garage();


//on recupère tous les garages
$garages = $modelGarage->findAll();

//on fixe le titre de la page
$titreDeLaPage = "Garages";

//on affiche
render( "garages/garages" ,
        compact('garages', 'titreDeLaPage')  
      );