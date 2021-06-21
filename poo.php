<?php




interface Contrat 
{

    public function faireLeCafe();


}



abstract class Personne
{
    public $prenom;

    public $nom;

    protected $age;

    public function __construct($prenom, $nom, $age){

        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->setAge($age);

    }

    public function getAge(){

        return $this->age;
    }
    public function setAge($age){

            if(is_int($age) && $age >= 18 && $age <= 120 ){

                 $this->age = $age;
            }else{

                throw new Exception("l'age d'un employe devrait etre compris entre 18 et 120 ans");
            }

       
    }
}






class Employe extends Personne
{


    public function faireLeCafe(){
            echo "je suis employé et je me fais un nespresso";
    }

        


    public function sePresenter(){
        echo "Bonjour je m'appelle $this->prenom $this->nom et j'ai $this->age ans";
    }

}

class Patron extends Employe
{


    public $cravate;


    public function __construct($prenom, $nom, $age, $cravate){

        parent::__construct($prenom, $nom, $age);
        $this->cravate = $cravate;

    }
        
    public function sePresenter(){
        echo "Salut, moi c'est $this->prenom $this->nom et j'ai $this->age ans et trois BMW";
    }

    public function nouerUneCravate(){

        echo "bonjour je suis $this->prenom $this->nom le patron et je sais nouer ma $this->cravate";
    }


    public function faireLeCafe(){
        echo "je suis un gros patron et moi je bois des vrais cafés italiens";
    }


}



class Stagiaire implements Contrat
{
    public function faireLeCafe(){
        echo "je suis un stagiaire et je fais des vrais cafés a l'italienne pour Bernard";
    }
}

class Concurrent extends Personne
{
    
    public function faireLeCafe(){
        echo " je suis un concurrent et je fais un café moins bon";
    }

}
$concurrent1 = new Concurrent();

$stagiaire1 = new Stagiaire();
echo "<br>";
echo "<br>";
echo "<br>";

$stagiaire1->faireLeCafe();



function demanderDeFaireLeCafe($objet){

        var_dump($objet->faireLeCafe());

}

echo "<br>";
echo "<br>";

demanderDeFaireLeCafe($concurrent1);


echo "<br>";
echo "<br>";
echo "<br>";


$personne1 = new Personne("Jean", "Dusommier", 26);



echo "<br>";
$employe1 = new Employe("Luc", "Dupuis", 56);

$employe2 = new Employe("Marc", "Dupont", 23);

$employe3 = new Employe("Pascal", "Pont", 58);

$employe1->sePresenter(); 
echo "<br>";
$employe2->sePresenter();
echo "<br>";

//$employe1->sePresenter();

echo $employe2->getAge();

$employe2->setAge(18);

echo "<br>";
$employe2->sePresenter();
$employe2->faireLeCafe();



$patron1 = new Patron("Bernard", "Persan", 58, "cravate rouge à diamants");
echo "<br>";
$patron1->sePresenter();
echo "<br>";
$patron1->nouerUneCravate();
echo "<br>";
$patron1->faireLeCafe();

echo "<br>";