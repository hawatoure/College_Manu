<?php

class Personne{
    public string $nom;
    public string $prenom;

    // function __construct(string $nom, string $prenom)
    // {
    //     // echo "J'ai créé un une personne. <br>";
    //     $this->nom = $nom;
    //     $this->prenom = $prenom;
    // }
    function direBonjour(){
        echo "Bonjour, je m'appelle"." " . $this->prenom . " " . $this->nom . " et je suis née le " . $this->date_naissance . "<br><br>";

    }
}

?>