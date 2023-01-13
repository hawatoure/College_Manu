<?php

require_once("models/professeur.php");

$professeurs = Professeur::readAllProf();
include("inc/head.php");




?>
<title>Liste des professeurs</title>

<?php
include("inc/header.php");

?>
    <main>
    
      <!--To do : Afficher la list de tous les professeurs, en utilisant un ficher models/professeur.php
    contenant une class Professeur (comme nous l'avons fait pour les élèves) -->


    <div class="container">
            <h1 class="text-center">Liste des professeurs </h1> 

            <table class="table border text-center">
                <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                </tr>
                

            <?php

                foreach ($professeurs as $professeur){
                    $professeur->afficherInfosP();
                }       

            ?>
                    
            </table>

        </div>




    </main>




<?php
include("inc/footer.php");

?>