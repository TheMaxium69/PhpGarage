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
                $reponseLogin = true;
                $userTab = [
                    "userId" => $user->id,
                    "userName" => $user->username,
                    "userEmail" => $user->email,
                    "userPassword" => $user->password
                ];
                $_SESSION["user"]= $userTab;
        }else{
            $reponseLogin = false;
        }

        return $reponseLogin;
    }

    function isLoggedIn(){
        if(isset($_SESSION['user']) ){
            $reponseIsLoggedIn = true;
        }else{
            $reponseIsLoggedIn = false;
        }

        return $reponseIsLoggedIn;
    }

    function loggout(){
        session_unset();
    }


}
