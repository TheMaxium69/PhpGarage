<?php

namespace Controllers;


require_once "core/utils.php";
require_once "core/Model/Garage.php";



class Garage
{   
    /**
     * afficher l'accueil du site
     * 
     * 
     */

    public function index(){




                    $modelGarage = new \Model\Garage();


                    //on recupère tous les garages
                    $garages = $modelGarage->findAll();

                    //on fixe le titre de la page
                    $titreDeLaPage = "Garages";

                    //on affiche
                    render( "garages/garages" ,
                            compact('garages', 'titreDeLaPage')  
                        );

    }

    public function show(){
        

    }


    public function suppr(){


    }

}