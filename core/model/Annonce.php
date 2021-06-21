<?php

require_once "core/model/Model.php";

class Annonce extends Model
{



/**
 * trouve toutes les annonces liées à un garage
 * par ce meme garage
 * 
 * @param integer $garage_id
 * @return array|bool
 * 
 */

function findAllByGarage(int $garage_id)
{

 

  $resultat =  $this->pdo->prepare('SELECT * FROM annonces WHERE garage_id = :garage_id');
  $resultat->execute(["garage_id"=> $garage_id]);
   
  $annonces = $resultat->fetchAll();
  return $annonces;
}


/**
 * trouve une annonce par son id
 * 
 * @param integer $id
 * @return array|bool
 */
function find(int $id) 
{


$maRequete = $this->pdo->prepare("SELECT * FROM annonces WHERE id =:id");

$maRequete->execute(['id' => $id]);

$item = $maRequete->fetch();

return $item;


}
/**
 * supprime une annonce via son ID
 * 
 * @param integer $id
 * @return void
 */

function delete(int $id) : void
{

  
  $garage_id = $annonce['garage_id'];


  $maRequete = $this->pdo->prepare("DELETE FROM annonces WHERE id =:id");
  
  $maRequete->execute(['id' => $id]);
  
}



/**
 * ajoute une annonce
 * 
 * @param string $name
 * @param int $price
 * @param int $garage_id
 * @return void
 */

function insert(string $name, int $price, int $garage_id) : void
{
 
  $maRequeteSaveAnnonce = $this->pdo->prepare("INSERT INTO annonces (name, price, garage_id) 
  VALUES (:name, :price, :garage_id)");

    $maRequeteSaveAnnonce->execute([
    'name' => $name,
    'price' => $price,
    'garage_id' => $garage_id

    ]);
}

}