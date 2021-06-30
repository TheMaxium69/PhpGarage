<?php

namespace Controllers;


class User extends Controller
{

    protected $modelName = \Model\User::class;


    public function login(){
        $reponse = null;

        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $usernameLogin = $_POST['username'];
            $passwordLogin = $_POST['password'];
                $resultLogin = $this->model->login($usernameLogin, $passwordLogin);
                if($resultLogin){
                    \Http::redirect('index.php?controller=gateau&task=index&info=login');
                }else{
                    $reponse = "Erreur de connexion";
                }
        }    
            $titreDeLaPage = "Connection";
            \Rendering::render('users/login', compact('reponse', 'titreDeLaPage'));
    }

    public function loggout(){
        $this->model->loggout();
    
        \Http::redirect('index.php?controller=gateau&task=index');
    }


    public function index(){
            $LoggedIn = $this->model->isLoggedIn();
            if($LoggedIn){
                $titreDeLaPage = "Profil";
                \Rendering::render('users/profil', compact('titreDeLaPage'));
            }else{
                \Http::redirect('index.php?controller=gateau&task=index');
            }

    }

    public function signup(){
        $LoggedIn = $this->model->isLoggedIn();
        if($LoggedIn){
            \Http::redirect('index.php?controller=gateau&task=index');
        }else{
            $reponse = null;

            if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirm'])){

                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $passwordConfirm = $_POST['passwordConfirm'];

                $reponse = $this->model->signup($username, $email, $password, $passwordConfirm);

                if(!$reponse){
                    \Http::redirect('index.php?controller=gateau&task=index&info=signup');
                }
            }
            
            $titreDeLaPage = "Inscription";
            \Rendering::render('users/signup', compact('reponse', 'titreDeLaPage'));
        }

    }

}