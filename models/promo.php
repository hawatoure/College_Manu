
<?php
require_once("conf.php"); 
require_once("professeur.php");



class Promo{
        public int $id_classes;
        public string $nom;
        public int $niveau;
        public $id_professeur;
        public Professeur $prof_principal;
        

    function afficherInfosPromos(){

        // echo "<tr>"; 
        // echo "<td>" .$this->id_classes. "</td>"; 
        echo "<td>" .$this->nom. "</td>"; 
        echo "<td>" .$this->niveau. "</td>";
        echo "<td>" .$this->prof_principal->nom. "</td>"; 
        echo "<td>" .$this->prof_principal->prenom. "</td>"; 
        echo "<td>" .$this->prof_principal->email. "</td>"; 
        echo "<td><a href=\"promoDetails.php?id=".$this->id_classes."\"><button class='btn bg-success p-2 text-white bg-opacity-75' >Afficher</button> </a></td>"; 
        echo "</tr>"; 
    }
    // création d'une méthode statique quu concerne le consept d'élèves en général afin de récupérr la liste d'élève
    static function readAllPromo():array{

        global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
        $sql = "SELECT * FROM classes "; // ecriture de la requête sql dans une chaine de caractère
        $statement = $pdo->prepare($sql); // préparation de la requete sql par pdo
        $statement->execute(); // execution de la reqête
        $liste = $statement->fetchAll(pdo::FETCH_CLASS, "Promo"); // récupération des résultat de la requête sous forme de tableau associatif
        // fetchAll est nécessaire que dans le SELECT car on récupère des élément de la bdd

        foreach($liste as $promo){
            // chargeons les informations du professeur principal grâce à la propriété id_professeur de mon objet promo
    
            $prof_principal = Professeur::readOne($promo->id_professeur);
            //Enregistrer les informations du professeur principal  dans la propriété prof_principal
            $promo->prof_principal = $prof_principal;
        }
        return $liste;
    }
    static function readOne(int $id):Promo{

        global $pdo; //permet d'allez cherche la variable $pdo à l'extérieur de la fonction (portée global)
        // Utilisation d'un paramèttre nommer :id afin de se protéger des injections sql
        $sql = "SELECT * FROM classes WHERE id_classes = :id ";
        $statement = $pdo->prepare($sql);
        // va permettre de connecter un paramèttre donner (:id) et une variable($id) qui sont de type int
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
        //Récupération du résultat de la requête sous forme d'un objet professeur
        $statement->setFetchMode(PDO::FETCH_CLASS, "Promo");
        $promo = $statement->fetch();
        // $sql = "SELECT classes.nom, niveau, professeurs.nom, prenom, email FROM classes 
        // INNER JOIN professeurs ON professeurs.id_professeur = classes.id_professeur 
        // WHERE id_classes = :id ";
        $prof_principal = Professeur::readOne($promo->id_professeur);
        //Enregistrer les informations du professeur principal  dans la propriété prof_principal
        $promo->prof_principal = $prof_principal;

        return $promo;
    }



  
}

