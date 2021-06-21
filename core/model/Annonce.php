<?php

namespace Model;

require_once 'core/Model/Model.php';


class Annonce extends Model
{

    protected $table = 'annonces';
    /**
     *
     *trouver une annonce par son appartenant a un garage(id)
     *renvoi un tableau contenant des annonces ou un booleen is inexistant
     * @param integer $garage_id
     *@return array|bool
     *
     */
    public function findAllByGarage(int $garage_id)
    {
        $resultat = $this->pdo->prepare(
            'SELECT * FROM annonces WHERE garage_id = :garage_id'
        );
        $resultat->execute(['garage_id' => $garage_id]);

        $annonces = $resultat->fetchAll();
        return $annonces;
    }

    /**
     *insert une annonce corespondant a un garage
     *on ajoute les values $name pour le nom
     *@param string $name
     *@param integer $price
     * @param integer $garage_id
     *@return void
     *
     */
    public function insert(string $name, int $price, int $garage_id): void
    {
        $maRequeteSaveAnnonce = $this->pdo
            ->prepare("INSERT INTO annonces (name, price, garage_id) 
    VALUES (:name, :price, :garage_id)");

        $maRequeteSaveAnnonce->execute([
            'name' => $name,
            'price' => $price,
            'garage_id' => $garage_id,
        ]);
    }
}
