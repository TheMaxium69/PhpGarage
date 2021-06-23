<?php

namespace Controllers;


class Recipe extends Controller
{

    protected $modelName = \Model\Recipe::class;



    /**
     *
     * supprimer une annonce
     */
    public function supp(){


        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $recipe_id = $_GET['id'];
        }
        if(!$recipe_id){
            die("il faut entrer un id valide en paramtre dans l'url");
        }



        $recipe = $this->model->find($recipe_id);



        if(!$recipe){
            die("cette recette est inexistante");
        }


        $this->model->delete($recipe_id);

        \Http::redirect('index.php?controller=gateau&task=index');
    }


    /**
     * enregistrer une annonce
     *
     *

    public function save(){


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

        $modelGarage = new \Model\Garage();

        $garage = $modelGarage->find($garage_id);

        if(!$garage){

            die("garage inexistant");
        }



        $this->model->insert($name,$price,$garage_id);

        \Http::redirect('index.php?controller=garage&task=show&id='.$garage_id);


    }
     */


}