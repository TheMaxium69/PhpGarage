<?php



abstract class Personne
{

       protected $nom;
    
       protected $age;

        public function __construct($nom, $age){
                $this->nom = $nom;
                $this->age = $age;
        }

        public function sePresenter(){
            echo "bonjour je m'appelle {$this->nom} et j'ai {$this->age} ans";
        }


}

interface ContratPatisserie
{
    public function faireUneTarte();

}

class Patissier extends Personne implements ContratPatisserie
{
    public $rouleau;

        public function __construct($nom, $age, $rouleau){

            parent::__construct($nom, $age);    
            $this->rouleau = $rouleau;
        }


    public function faireUneTarte(){
        echo "voila une tarte aux pommes faite avec mon {$this->rouleau}";
    }


}



interface ContratCuisine
{
    public function faireUneOmelette();

}




class Cuisinier extends Personne implements ContratCuisine
{
    public $couteau;

        public function __construct($nom, $age, $couteau){

            parent::__construct($nom, $age);    
            $this->couteau = $couteau;
        }


    public function faireUneOmelette(){
        echo "voila une omelette faite avec mon {$this->couteau}";
    }


}

class Chef extends Cuisinier
{
    public function __construct($nom, $age, $couteau){

        parent::__construct($nom, $age, $couteau); 
    }
    public function faireUneOmelette(){
        echo "voila une bien meilleure omelette de chef faite avec mon {$this->couteau}";
    }
  
}


class Mamie extends Personne implements ContratCuisine, ContratPatisserie

{

        public $rouleau;

         public $couteau;

         public function __construct($nom, $age, $rouleau, $couteau){

                    parent::__construct($nom, $age);   
                    $this->couteau = $couteau;
                    $this->rouleau = $rouleau;
         }

    public function faireUneTarte(){
        echo "voila une super tarte aux pommes de mamie faite avec mon {$this->rouleau}";
    }


    public function faireUneOmelette(){
        echo "voila une encore meilleure omelette de mamie faite avec mon {$this->couteau}";
    }
  

}


$patissier = new Patissier("Bob", 32, "rouleau en bois");

$patissier->faireUneTarte();
echo"<br>";
$patissier->sePresenter();
echo"<br>";
$cuisinier = new Cuisinier("Luc", 56, "couteau pas trop mal");

$cuisinier->faireUneOmelette();
$cuisinier->sePresenter();

$chef = new Chef("Patricia", 29, "couteau Chef en acier de Damas");
echo"<br>";
$chef->sePresenter();
echo"<br>";
$chef->faireUneOmelette();

echo"<br>";

$mamie = new Mamie("Bertine", 700, "rouleau en acier", "couteau forgé au moyen age");

$mamie->sePresenter();
echo"<br>";
$mamie->faireUneOmelette();
echo"<br>";
$mamie->faireUneTarte();

$mamie->age = 650;

$mamie->sePresenter();