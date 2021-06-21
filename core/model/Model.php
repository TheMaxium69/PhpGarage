<?php

namespace Model;

require_once 'core/database.php';
abstract class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = getPdo();
    }
    /**
     * retourne un tableau contenant tous les items de
     * la table garages ou annonces
     *
     * @return array
     * 
     */
    public function findAll(): array
    {
        $resultat = $this->pdo->query("SELECT * FROM {$this->table}");

        $item = $resultat->fetchAll();

        return $item;
    }

    /**
     *
     *trouver un item par son id
     *renvoi un tableau un tableau contenant un item ou un booleen
     *@param integer $item_id
     *@return array|bool
     *
     */
    public function find(int $id)
    {
        $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id =:id");

        $maRequete->execute(['id' => $id]);

        $item = $maRequete->fetch();

        return $item;
    }
    /**
     *supprime un item via son id
     *@param int $id
     *@return void
     *
     */
    public function delete(int $id): void
    {
        $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

        $maRequete->execute(['id' => $id]);
    }
}
