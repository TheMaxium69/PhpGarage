<?php

namespace Model;

class Gateau extends Model
{

    protected $table = "gateaux";


    /**
     * @param string $name
     * @param string $gout
     *
     * ajout d'un gateau
     * methode qui ajoute un gateau en utilisant le post du formulaire du geteau qui a été rucpere dans le controleur
     */
    function insert(string $name, string $gout) : void
    {

        $maRequeteCreateGateau = $this->pdo->prepare("INSERT INTO gateaux (name, gout) 
          VALUES (:name, :gout)");

        $maRequeteCreateGateau->execute([
            'name' => $name,
            'gout' => $gout,
        ]);
    }

}
