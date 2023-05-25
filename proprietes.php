<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Propiétées</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Macondo&family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&family=Public+Sans:wght@300;400&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/commun.css">
</head>
<body class="bg-light" >
    <style>
        
        .footer-color{
           background-color: rgb(244, 244, 244);
         }
         .h-font{
            font-family: 'Merienda', cursive;
         }
    </style>

   <?php
    require('inc/header.php');
    ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font mt-3 text-center ">Propriétés</h2>
        <div class="h-line"></div>
    </div>
    
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-12 mb-lg-0 mb-4">

          <nav class="navbar navbar-expand-lg navbar-light bg-withe rounded shadow">
            <div class="container-fluid flex-lg-column align-items-stretch">
              <h4 class="mt-2">Filtre</h4>
              <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filtre" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
             <div class="collapse navbar-collapse" id="filtre">
                <div class="border ng-light p-3 rounded mb-3">
                  <h5 class="mb-3" style="font-size: 18px;">Trouvez votre bonheur</h5>
                  <form>
                   <label class="form-label">Date début</label>
                   <input type="date" name="date_debut" class="form-control mb-3">

                   <label class="form-label">Date fin</label>
                   <input type="date" name="date_fin" class="form-control mb-3">

                   <label class="form-label">Prix min</label>
                   <input type="text" name="prix_min" placeholder="1000" class="form-control shadow-none mb-3">

                   <label class="form-label">Prix min</label>
                   <input type="text" name="prix_max" placeholder="1000" class="form-control shadow-none mb-3">
                    <div class="col-lg-2 mb-3 mt-2">
                <button type="submit" class="btn text-white shadow-none custom-bg ">Rechercher</button>
              </div>
                </div>
                </form>
              </div>
           </div>
          </nav>
        </div>
      <!-- affichage dynamique des annonces -->
      <div class="col-lg-8 col-md-12 px-4">
       <?php

        if(isset($_GET['date_debut']) && isset($_GET['date_fin']) && isset($_GET['prix_min']) && isset($_GET['prix_max'])){
         $date_debut=$_GET['date_debut'];
         $date_fin=$_GET['date_fin'];
         $prix_min=$_GET['prix_min'];
         $prix_max=$_GET['prix_max'];
         $filter_query2= mysqli_query($conn,"select * from `annonce_table`  where annonce_date_debut between '$date_debut' and '$date_fin' and annonce_prix between '$prix_min' and ' $prix_max' ");
         if(mysqli_num_rows($filter_query2)>0){
          foreach($filter_query2 as $annonce_row2){
           echo'<div class="card mb-4 rounded shadow border-0">
           <div class="row">
            <div class="col-md-5">
             <img src="annonces_img/'.$annonce_row2['annonce_image'].'" class="img-fluid rounded" style="height:100%;">
            </div>

            <div class="col-md-5 px-3">
             <h5 class="mb-2 mt-3">'.$annonce_row2['annonce_titre'].'</h5>

             <div class="disponibilité mb-1">
              <h6 class="mb-1">Disponibilité</h6>
              <span class="badge bg-light text-dark text-wrap lh-base mb-1">Du '.$annonce_row2['annonce_date_debut'].' au '.$annonce_row2['annonce_date_fin'].'
              </span>
             </div>


             <div class="ville mb-1">
              <h6 class="mb-1">Ville</h6>
              <span class="badge bg-light text-dark text-wrap lh-base mb-1">'.$annonce_row2['annonce_ville'].'
              </span>
             </div>

             

             <div class="caracteristiques ">
              <h6 class="mb-1">Caractéristiques</h6>
              <span class="badge bg-light text-dark text-wrap lh-base mb-1 ">'.$annonce_row2['annonce_nbr_salles_de_bain'].' Salles de bain
              </span>
              <span class="badge bg-light text-dark text-wrap lh-base mb-1">'.$annonce_row2['annonce_nbr_balcons'].' Balcons
              </span>
             </div>
            </div>

            <div class="col-md-2 text-align-center mt-3 px-3 mb-3" style="margin-top:80px;">

             <h6 class="mb-2 mt-5">'.$annonce_row2['annonce_prix'].'DA</h6>
             <div class="d-flex justify-content-evenly mb-2">
             <a href="#" class="btn btn-sm custom-bg shadow-none w-100 text-white"style="margin-right:6px;">Réserver</a>
             </div>
             <div class="d-flex justify-content-evenly">
              <a href="details.php?id='.$annonce_row2['annonce_id'].'" class="btn btn-sm btn-outline-dark w-100 shadow-none" style="margin-right:6px;" >Plus de détails</a>
             </div>

            
            </div>


          </div>
          </div>';}
        }else{
          echo"<script>alert('Aucune annonce n a été trouvée')</script>";
        } //fin du filtrage
      }else{
        $annonce_query2=mysqli_query($conn,"select * from `annonce_table`") ;
        if(mysqli_num_rows($annonce_query2)==0){
          echo"aucune annonce trouvé";}else{
            while($annonce_row2=mysqli_fetch_assoc($annonce_query2)){
              echo'
                    <div class="card mb-4 rounded shadow border-0">
                     <div class="row">
                      <div class="col-md-5">
                       <img src="annonces_img/'.$annonce_row2['annonce_image'].'" class="img-fluid rounded" style="height:100%;">
                      </div>

                      <div class="col-md-5 px-3">
                       <h5 class="mb-2 mt-3">'.$annonce_row2['annonce_titre'].'</h5>

                       <div class="disponibilité mb-1">
                        <h6 class="mb-1">Disponibilité</h6>
                        <span class="badge bg-light text-dark text-wrap lh-base mb-1">Du '.$annonce_row2['annonce_date_debut'].' au '.$annonce_row2['annonce_date_fin'].'
                        </span>
                       </div>


                       <div class="ville mb-1">
                        <h6 class="mb-1">Ville</h6>
                        <span class="badge bg-light text-dark text-wrap lh-base mb-1">'.$annonce_row2['annonce_ville'].'
                        </span>
                       </div>


                       <div class="caracteristiques ">
                        <h6 class="mb-1">Caractéristiques</h6>
                        <span class="badge bg-light text-dark text-wrap lh-base mb-1 ">'.$annonce_row2['annonce_nbr_salles_de_bain'].' Salles de bain
                        </span>
                        <span class="badge bg-light text-dark text-wrap lh-base mb-1">'.$annonce_row2['annonce_nbr_balcons'].' Balcons
                        </span>
                       </div>
                      </div>

                      <div class="col-md-2 text-align-center mt-3 px-3 mb-3" style="margin-top:80px;">

                       <h6 class="mb-2 mt-5">'.$annonce_row2['annonce_prix'].'DA</h6>
                       <div class="d-flex justify-content-evenly mb-2">
                       <a href="#" class="btn btn-sm custom-bg shadow-none w-100 text-white"style="margin-right:6px;">Réserver</a>
                       </div>
                       <div class="d-flex justify-content-evenly">
                        <a href="details.php?id='.$annonce_row2['annonce_id'].'" class="btn btn-sm btn-outline-dark w-100 shadow-none" style="margin-right:6px;" >Plus de détails</a>
                       </div>

                      
                      </div>


                    </div>
                    </div>
                   ';
                  }
                }
              }

       ?>
     
         
          

        </div>
      </div>
    </div>
    </div>

    <?php
    require('inc/footer.php');
    ?>
    <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>


<!-- <div class="categories ">
              <h6 class="mb-1">Catégorie</h6>
              <span class="badge bg-light text-dark text-wrap lh-base mb-1">'.$annonce_row2['annonce_categorie'].'
              </span>
             </div> -->