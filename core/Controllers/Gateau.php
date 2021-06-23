<?php


namespace Controllers;



class Gateau extends Controller
{

    protected $modelName = \Model\Gateau::class;


    /**
     * afficher l'accueil du site
     *
     *
     */

    public function index()
    {


        //on recupère tous les garages
        $gateaux = $this->model->findAll();

        //on fixe le titre de la page
        $titreDeLaPage = "Gateaux";

        //on affiche
        \Rendering::render("gateaux/gateaux",
            compact('gateaux', 'titreDeLaPage')
        );

    }

    public function suppr(){


        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $gateau_id = $_GET['id'];
        }
        if(!$gateau_id){

            die("il faut entrer un id valide en paramtre dans l'url");
        }

        // on veut verifier que cet garage existe bien dans la base de données
        $gateau = $this->model->find($gateau_id);


        //si le garage n'existe pas
        if(!$gateau){
            die("ce gateau est inexistant");
        }
        // alors , faire la requete de suppression

        $this->model->delete($gateau_id);

        \Http::redirect('index.php');

    }
}