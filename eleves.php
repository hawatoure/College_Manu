<?php 
    // inclusion de la class Eleve
    require_once("models/eleve.php");

   // "  :: " permet d'appeler une méthode static et " -> " d'appeler une méthode non static

    // Appel de la méthode statique readAll() de notre class élève, qui nous permet de charger la list de tous les élèves
    $eleves = Eleve::readAll();




    // echo "<pre>";
    //     var_dump($eleves);
    // echo "</pre>";

?>
<?php
include("inc/head.php");

?>
<title>Liste des élèves</title>

<?php
include("inc/header.php");

?>
    <main>
        <div class="container">
            <h1 class="text-center">Liste des élèves </h1> 

            <table class="table border text-center">
                <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de naissance</th>
                </tr>
                

            <?php

                foreach ($eleves as $eleve){
                    $eleve->afficherInfos();
                }       

            ?>
                    
            </table>

        </div>

        




    </main>




<?php
include("inc/footer.php");

?>