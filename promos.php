<?php 
    // inclusion de la class Eleve
    require_once("models/promo.php");

   // "  :: " permet d'appeler une méthode static et " -> " d'appeler une méthode non static

    // Appel de la méthode statique readAll() de notre class élève, qui nous permet de charger la list de tous les élèves
    $liste = Promo::readAllPromo();

    // echo "<pre>";
    //     var_dump($liste);
    // echo "</pre>";

?>
<?php
include("inc/head.php");

?>
<title>Liste des Promotion</title>

<?php
include("inc/header.php");

?>
    <main>
        <div class="container">
            <h1 class="text-center">Liste des promotions</h1> 

            <table class="table border text-center">
                <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                  
                    <th>Classe</th>
                    <th>Niveau</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                

            <?php

                foreach ($liste as $promo){
                    $promo->afficherInfosPromos();
                }       

            ?>
                    
            </table>

        </div>




    </main>




<?php
include("inc/footer.php");

?>