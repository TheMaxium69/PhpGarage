<?php

namespace Model;

use PDO;

class User extends Model
{

    protected $table = "users";

    public $id;
    public $username;
    public $password;
    public $email;

    function findByUsername(string $username)
    {
        $resultat =  $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $resultat->execute([
            "username"=> $username
        ]);

        $user = $resultat->fetchObject();

        return $user;
    }

    function login(string $username, string $password)
    {
        $user = $this->findByUsername($username);

        if($user && $user->password == $password){
                $userTab = [
                    "id" => $user->id,
                    "name" => $user->username,
                    "email" => $user->email,
                    "password" => $user->password
                ];
                $_SESSION["user"]= $userTab;
                return true;
        }else{
            return false;
        }
    }

    function isLoggedIn(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user']; 
            if($user['id']){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    function loggout(){
        session_unset();
    }


}
