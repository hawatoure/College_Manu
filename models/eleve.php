
<?php
require_once("conf.php"); 
require_once("personne.php");


class Eleve extends Personne{


    public string $date_naissance;

    public static int $nombre = 0;

    function __construct()
    {
        //Incrémenter le nombre des élèves
        self::$nombre ++;
 
    }

    function afficherInfos(){

        echo "<tr>"; 
        echo "<td>" .$this->nom. "</td>"; 
        echo "<td>" .$this->prenom. "</td>";
        echo "<td>" .$this->date_naissance. "</td>";
        echo "</tr>"; 
    }
    // création d'une méthode statique quu concerne le consept d'élèves en général afin de récupérr la liste d'élève
    static function readAll():array{

        global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
        $sql = "SELECT nom, prenom, date_naissance FROM eleves "; // ecriture de la requête sql dans une chaien de caractère
        $statement = $pdo->prepare($sql); // préparation de la requete sql par pdo
        $statement->execute(); // execution de la reqête
        $eleves = $statement->fetchAll(pdo::FETCH_CLASS, "Eleve"); // récupération des résultat de la requête sous forme de tableau associatif
        // fetchAll est nécessaire que dans le SELECT car on récupère des élément de la bdd

        return $eleves;
    }
    // function direBonjour(){
            
    //     parent::direBonjour();
    //     // echo "Bonjour je suis votre professeur. <br>";
    // }
}

