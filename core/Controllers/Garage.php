<?php

namespace Controllers;

require_once 'core/utils.php';
require_once 'core/Model/Garage.php';
require_once 'core/Model/Annonce.php';



class Garage
{

    /**
     * Affiche l'acceuil du site
     * 
     * 
     */
    public function index()
    {
        //on recupère tous les garages
        $modelGarages = new \Model\Garage();
        $garages = $modelGarages->findAll();

        //on fixe le titre de la page
        $titreDeLaPage = 'Garages';

        //on affiche
        render('garages/garages', compact('garages', 'titreDeLaPage'));
    }

    /**
     * 
     *On affiche un garage par son id
     * 
     */
    public function show()
    {

        $garage_id = null;
        $modelGarage = new \Model\Garage();
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $garage_id = $_GET['id'];
        }

        if (!$garage_id) {
            die("il faut absolument entrer un id dans l'url pour que le script fonctionne");
        }

        $garage = $modelGarage->find($garage_id);

        $modelAnnonce = new \Model\Annonce();
        $annonces = $modelAnnonce->findAllByGarage($garage_id);
        $titreDeLaPage = $garage['name'];

        render('garages/garage', compact('garage', 'annonces', 'titreDeLaPage'));
    }


    /**
     * 
     * On supprime un garage par son id
     * 
     */
    public function suppr()
    {
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $garage_id = $_GET['id'];
        }
        if (!$garage_id) {

            die("il faut entrer un id valide en paramtre dans l'url");
        }

        // on veut verifier que cet garage existe bien dans la base de données
        $modelGarage = new \Model\Garage();
        $garage = $modelGarage->find($garage_id);


        //si le garage n'existe pas
        if (!$garage) {
            die("ce garage est inexistant");
        }
        // alors , faire la requete de suppression

        $modelGarage->delete($garage_id);

        redirect('index.php');
    }
}
