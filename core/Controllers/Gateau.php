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

        \Http::redirect('index.php?controller=gateau&task=index');

    }

    public function show(){



        $gateau_id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $gateau_id = $_GET['id'];
        }

        if(!$gateau_id){
            die("il faut absolument entrer un id dans l'url pour que le script fonctionne");
        }



        $gateau = $this->model->find($gateau_id);


        $modelAnnonce = new \Model\Annonce();
        $annonces = $modelAnnonce->findAllByGarage($gateau_id);

        $titreDeLaPage = $gateau['name'];

        \Rendering::render('gateaux/gateau',
            compact('gateau', 'annonces','titreDeLaPage')
        );
    }

    public function create(){

        if(!empty($_POST['name']) ){
            $name = htmlspecialchars($_POST['name']);
        }

        if(!empty($_POST['gout']) ){
            $gout = htmlspecialchars($_POST['gout']);
        }


        if(!$name || !$gout ){
            die("formulaire mal rempli");
        }


        $this->model->insert($name,$gout);


        \Http::redirect('index.php?controller=gateau&task=index');
    }

}