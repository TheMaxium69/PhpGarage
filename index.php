<?php 

//on récupère les librairies nécéssaires

require_once "core/autoloading.php";
$controller = new \Controllers\Garage();
$controller->index();