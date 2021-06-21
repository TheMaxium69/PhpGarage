<?php

namespace Controllers;

require_once 'core/utils.php';
require_once 'core/Model/Garage.php';
require_once 'core/Model/Annonce.php';
class Annonce
{
    /**
     * crée une annonce via son id
     * 
     * 
     */
    public function create()
    {

        $garage_id = null;
        $name = null;
        $price = null;

        if (!empty($_POST['garageId']) && ctype_digit($_POST['garageId'])) {
            $garage_id = $_POST['garageId'];
        }

        if (!empty($_POST['name'])) {
            $name = htmlspecialchars($_POST['name']);
        }

        if (!empty($_POST['price'])) {
            $price = htmlspecialchars($_POST['price']);
        }

        if (!$garage_id || !$name || !$price) {
            die('formulaire mal rempli');
        }

        $model = new \Model\Garage();
        $garage = $model->find($garage_id);

        if (!$garage) {
            die('garage inexistant');
        }

        $model = new \Model\Annonce();
        $$annonce = $model->insert($name, $price, $garage_id);
        redirect('garage.php?id=' . $garage_id);
    }

    /**
     * supprime une annonce via son id
     * 
     * 
     */ public function delete()
    {


        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $annonce_id = $_GET['id'];
        }
        if (!$annonce_id) {
            die("il faut entrer un id valide en paramtre dans l'url");
        }
        $model = new \Model\Annonce();
        $annonce = $model->find($annonce_id);
        //si l annonce n'existe pas
        if (!$annonce) {
            die('cette annonce est inexistante');
        }

        $garage_id = $annonce['garage_id'];

        $model = new \Model\Annonce();
        $annonce = $model->delete($annonce_id);

        redirect('garage.php?id=' . $garage_id);
    }
}
