<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
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
<body bg-light>
<?php
    require('inc/header.php');
    ?>

<h2 class="mt-5 text-center mb-4 fw-bold h-font">Détails </h2>

<div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-12 px-4">
                <div class="card border-0 shadow mb-3 " style="width: 300px; margin:auto;">
                 <img src="annonces_img/pexels-chait-goli-1918291.jpg" class="card-img-top" alt="appartement">
                <div class="card-body">
                 <h5 class="card-title">50 m2 Maison de vacances</h5>
                 <span class="badge bg-light text-dark text-wrap lh-base mb-2"> 3200 DA par nuit
                 </span>

               <div class="disponibilité mb-2">
                <h6 class="mb-1">Disponibilité</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-3">Du 2023-05-13 au 2023-05-30
                </span>
               </div> 

               <div class="ville mb-2">
                <h6 class="mb-1">Ville</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-3">Béjaia
                </span>
               </div>  

               <div class="categories mb-2 ">
              <h6 class="mb-1">Catégorie</h6>
              <span class="badge bg-light text-dark text-wrap lh-base mb-1">Appartement
              </span>
             </div>
              

               <div class="caracteristiques mb-2">
                <h6 class="mb-1">Caractéristiques</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-3">2 Chambres
               </span>
                <span class="badge bg-light text-dark text-wrap lh-base mb-3">1 Salle de bain
                </span>
               <span class="badge bg-light text-dark text-wrap lh-base mb-3">2 Balcons
               </span>
               </div>

               <div class="email_proprietaire mb-2">
                <h6 class="mb-1">Email du propriétaire</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-3">celinafeghou@gmail.com
                </span>
               </div> 

               <div class="d-flex justify-content-evenly mb-2">
                <a href="#" class="btn btn-sm custom-bg shadow-none text-white ">Réserver</a>
                <a href="favoris.php" class="btn btn-sm btn-outline-dark shadow-none  ">Ajouter aux favoris</a>
             </div>
            </div>
          </div>
        </div>
        </div>
       </div>
    </div>
    </div>
    







<?php
    require('inc/footer.php');
    ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>
</html>