<?php


namespace Controllers;



class Makes extends Controller
{

    protected $modelName = \Model\Makes::class;

    public function add(){

        if (!empty($_GET['idrecipe'])){
            $recipe_id = $_GET['idrecipe'];
            $this->model->insert($recipe_id, "recipe_id");
        } else if (!empty($_GET['idgateau'])){
            $gateau_id = $_GET['idgateau'];
            $this->model->insert($gateau_id, "gateau_id");
        } else {
            echo "tu fais quoi ?";
        }

        \Http::redirect('index.php?controller=gateau&task=show&id='.$_GET['idgateau']);
    }

}