
<?php
require_once("conf.php"); 
require_once("personne.php");




// CLASS ENSEIGNANT
class Professeur extends Personne{

    public string $email;
    
    public static int $nombre = 0;

    function __construct()
    {
        //Incrémenter le nombre des élèves
        self::$nombre ++;
 
    }


    function presenter(){
        echo "M." . $this->nom . " ". $this->prenom . " " . $this->email;
    }

    function afficherInfosP(){

        echo "<tr>"; 
        echo "<td>" .$this->nom. "</td>"; 
        echo "<td>" .$this->prenom. "</td>";
        echo "<td>" .$this->email. "</td>";
        echo "</tr>"; 
    }

    static function readAllProf():array{

        global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
        $sql = "SELECT nom, prenom, email FROM professeurs";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $professeurs = $statement->fetchAll(PDO::FETCH_CLASS, "Professeur");

        return $professeurs;
    }
    // méthode permettant le chargement d'un professeur en fonction de son id
    static function readOne(int $id):Professeur{

        global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
        // Utilisation d'un paramèttre nommer :id afin de se protéger des injections sql
        $sql = "SELECT nom, prenom, email FROM professeurs WHERE id_professeur = :id ";
        $statement = $pdo->prepare($sql);
        // va permettre de connecter un paramèttre donner (:id) et une variable($id) qui sont de type int
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        //Récupération du résultat de la requête sous forme d'un objet professeur
        $statement->setFetchMode(PDO::FETCH_CLASS, "Professeur");
        $professeurs = $statement->fetch();

        return $professeurs;
    }


}

