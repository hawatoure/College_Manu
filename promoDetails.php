<?php

require_once("models/promo.php");



include("inc/head.php");


// afficher les information en fonction  de son TD. 
//Indice: $_GET
//Indice: créer une méthode readOne() dans la classe Promo
//Afficher les informations de tous les élèves de cette promotion sous forme de tableau

?>
<title>Détail de la promotion </title>

<?php
include("inc/header.php");

?>
    <?php

       $promo = Promo::readOne($_GET["id"]);

      
       

      ?>

        <div class="container align-center p-3 ">
            <h1 class="text-center">Détails de la promotions</h1> 

     
                

            <div class="col align-center p-3 ">
              <table class="table border text-center p-3 ">
                <tr>
                  <tr class="bg-success p-3 text-white bg-opacity-75 fs-0.5">
                      <th>Classe</th>
                      <td><?= $promo->nom ?></td>
                  </tr>
                  <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Niveau</th>
                      <td><?= $promo->niveau ?></td>
                  </tr>
                  <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Professeur principal</th>
                      <td><?= $promo->prof_principal->nom . $promo->prof_principal->prenom ?></td>
          
                  </tr>
                  <tr class="bg-success p-2 text-white bg-opacity-75 fs-0.5">
                      <th>Mail</th>
                      <td><?= $promo->prof_principal->email ?></td>
               
                </tr>
                  
              </table>
            </div>
   
    


            
                    
            

        </div>





<?php
include("inc/footer.php");

?>