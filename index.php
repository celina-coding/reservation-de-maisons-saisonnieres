<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeavenlyHome</title>
  
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Macondo&family=Merienda:wght@400;700&family=Poppins:wght@400;500;600&family=Public+Sans:wght@300;400&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/commun.css">
    <style>
        
        .home{
          position: relative;
          width: 100%;
          height: 60vh;
          background-image: url(img/pexels-binyamin-mellish-106399.jpg);
          background-size: cover;
          background-position: center;
          align-items: center;
          justify-content: flex-start;
          display: flex;
        }
        .home-text{
          color: white;
        }
        
        .availability-form{
          margin-top: -50px;
          z-index:1;
          position: relative;
        }
        .footer-color{
           background-color: rgb(244, 244, 244);
         }
        
    </style>
</head>

<body class="bg-light">
<?php
 include_once 'inc/header.php'
?>

<!-- image -->
<section class="home">
  <div class="home-text">
  </div>
</section>
<!-- le filtre -->
<div class="container availability-form ">
      <div class="row">
        <div class="col-lg-12 bg-white shadow p-3 rounded">
          <h5 class="mb-4">Trouvez votre bonheur</h5>
          <form>
            <div class="row align-items-end">
              <div class="col-lg-2 mb-3">
                <label for="form-label"  style="font-weight: 450;">Date min</label>
                <input type="date" name="date_debut" class="form-control">
                
              </div>
              <div class="col-lg-2 mb-3">
                <label for="form-label"  style="font-weight: 450;">Date max</label>
                <input type="date" name="date_fin" class="form-control">
                
              </div>

               <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 450;">Prix min</label>
                <input type="text" name="prix_min" placeholder="1000" class="form-control shadow-none">
              </div>
              <div class="col-lg-3 mb-3">
                <label class="form-label" style="font-weight: 450;">Prix max</label>
                <input type="text" name="prix_max" placeholder="1000" class="form-control shadow-none">
              </div> 
              <div class="col-lg-2 mb-3 mt-2">
                <button type="submit" class="btn text-white shadow-none custom-bg ">Rechercher</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

<!-- propriétées -->
<h2 class="mt-5 text-center mb-4 fw-bold h-font">Propiétées</h2>

<div class="container">
  <div class="row">
          <?php
          // filtrer selon la date et le prix
          if(isset($_GET['date_debut']) && isset($_GET['date_fin']) && isset($_GET['prix_min']) && isset($_GET['prix_max'])){
            $date_debut=$_GET['date_debut'];
            $date_fin=$_GET['date_fin'];
            $prix_min=$_GET['prix_min'];
            $prix_max=$_GET['prix_max'];
            $filter_query= mysqli_query($conn,"select * from `annonce_table`  where annonce_date_debut between '$date_debut' and '$date_fin' and annonce_prix between '$prix_min' and ' $prix_max' limit 3");
            if(mysqli_num_rows($filter_query)>0){
              foreach($filter_query as $annonce_row){
                echo'<div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow mb-3 " style="width: 300px; margin:auto;">
                 <img src="annonces_img/'.$annonce_row['annonce_image'].'" class="card-img-top" alt="appartement">
                <div class="card-body">
                 <h5 class="card-title">'.$annonce_row['annonce_titre'].'</h5>
                 <span class="badge bg-light text-dark text-wrap lh-base mb-2">'.$annonce_row['annonce_prix'].'DA par nuit
                 </span>

               <div class="disponibilité mb-2">
                <h6 class="mb-1">Disponibilité</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-3">Du '.$annonce_row['annonce_date_debut'].' au '.$annonce_row['annonce_date_fin'].'
                </span>
               </div> 

               <div class="ville mb-2">
                <h6 class="mb-1">Ville</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$annonce_row['annonce_ville'].'
                </span>
               </div>  
              

               <div class="caracteristiques mb-1">
                <h6 class="mb-1">Caractéristiques</h6>
                <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$annonce_row['annonce_nbr_salles_de_bain'].' Salles de bain
                </span>
               <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$annonce_row['annonce_nbr_balcons'].' Balcons
               </span>
               </div>

               <div class="d-flex justify-content-evenly mb-2">
                <a href="#" class="btn btn-sm custom-bg shadow-none text-white ">Réserver</a>
                <a href="details.php?id='.$annonce_row2['annonce_id'].'" class="btn btn-sm btn-outline-dark shadow-none  ">Plus de détails</a>
               
             </div>
            </div>
          </div>
        </div>';
}
            }else{
              echo"<script>alert('Aucune annonce n a été trouvée')</script>";
            } //fin du filtrage

          }else{
            // affichage dynamique des annonces 
            $annonce_query=mysqli_query($conn,"select * from `annonce_table` limit 3") ;
            if(mysqli_num_rows($annonce_query)==0){
             echo"acun produit trouvé";
            }else{
             while($annonce_row=mysqli_fetch_assoc($annonce_query)){
              echo '<div class="col-lg-4 col-md-6">
                     <div class="card border-0 shadow mb-3 " style="width: 300px; margin:auto;">
                      <img src="annonces_img/'.$annonce_row['annonce_image'].'" class="card-img-top" alt="appartement">
                     <div class="card-body">
                      <h5 class="card-title">'.$annonce_row['annonce_titre'].'</h5>
                      <span class="badge bg-light text-dark text-wrap lh-base mb-2">'.$annonce_row['annonce_prix'].'DA par nuit
                      </span>
   
                    <div class="disponibilité mb-2">
                     <h6 class="mb-1">Disponibilité</h6>
                     <span class="badge bg-light text-dark text-wrap lh-base mb-3">Du '.$annonce_row['annonce_date_debut'].' au '.$annonce_row['annonce_date_fin'].'
                     </span>
                    </div> 
   
                    <div class="ville mb-2">
                     <h6 class="mb-1">Ville</h6>
                     <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$annonce_row['annonce_ville'].'
                     </span>
                    </div>  
                   
   
                    <div class="caracteristiques mb-1">
                     <h6 class="mb-1">Caractéristiques</h6>
                     <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$annonce_row['annonce_nbr_salles_de_bain'].' Salles de bain
                     </span>
                    <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$annonce_row['annonce_nbr_balcons'].' Balcons
                    </span>
                    </div>
   
                    <div class="d-flex justify-content-evenly mb-2 ">
                     <a href="#" class="btn btn-sm custom-bg shadow-none text-white ">Réserver</a>
                     <a href="details.php?id='.$annonce_row['annonce_id'].'" class="btn btn-sm btn-outline-dark shadow-none  ">Plus de détails</a>
                    
                  </div>
                 </div>
               </div>
             </div>';
             }
            }
          }
          ?>
             


         </div>
       </div>
    </div>
    </div>
       <div class="col-lg-12 text-center mt-5">
              <a href="proprietes.php" class="btn btn-sm btn-outline-dark rounded fw-bold shadow-none ">Voir plus>>></a>
        </div>
    


<?php
    require('inc/footer.php');
    ?>



<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</body>
</html>