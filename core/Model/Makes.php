<?php

namespace Model;


class Makes extends Model
{

    protected $table = "makes";


    function insert(int $tab_id, string $tab_name)
    {

        if ($tab_name == "gateau_id") {

            $maRequeteInsertMakesGateau = $this->pdo->prepare("INSERT INTO `makes`(`gateau_id`) VALUES (:tab_id)");

            $maRequeteInsertMakesGateau->execute([
                'tab_id' => $tab_id
            ]);
        } else if ($tab_name = "recipe_id") {

                $maRequeteInsertMakesRecipe = $this->pdo->prepare("INSERT INTO `makes`(`recipe_id`) VALUES (:tab_id)");

                $maRequeteInsertMakesRecipe->execute([
                    'tab_id' => $tab_id
                ]);

        }
    }

    function count(int $idgateau)
    {
        $maRequeteCountRecipeMakes =  $this->pdo->prepare("SELECT COUNT(*) FROM `makes` WHERE `gateau_id`=:gateau_id");
        $maRequeteCountRecipeMakes->execute(["gateau_id"=> $idgateau]);

        $makesRecipeNb = $maRequeteCountRecipeMakes->fetchColumn();
        return $makesRecipeNb;

    }
}
