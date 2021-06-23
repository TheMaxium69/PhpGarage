<?php

namespace Model;


class Recipe extends Model
{

    protected $table = "recipe";

    /**
     * trouve toutes les annonces liées à un garage
     * par ce meme garage
     *
     * @param integer $gateau_id
     * @return array|bool
     *
     */

    function findAllByGateau(int $gateau_id)
    {



        $resultat =  $this->pdo->prepare('SELECT * FROM recipe WHERE gateau_id = :gateau_id');
        $resultat->execute(["gateau_id"=> $gateau_id]);

        $recipe = $resultat->fetchAll();
        return $recipe;
    }


    /**
     * ajoute une annonce
     *
     * @param string $name
     * @param int $price
     * @param int $garage_id
     * @return void


    function insert(string $name, int $price, int $garage_id) : void
    {

        $maRequeteSaveAnnonce = $this->pdo->prepare("INSERT INTO annonces (name, price, garage_id)
          VALUES (:name, :price, :garage_id)");

        $maRequeteSaveAnnonce->execute([
            'name' => $name,
            'price' => $price,
            'garage_id' => $garage_id

        ]);
    }*/

}
