<?php
  include ('dbh.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Favoris</title>
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
        .footer-color{
           background-color: rgb(243, 243, 244);
         }
         
    </style>
</head>
<body class="bg-light">
    <?php
    require('inc/header.php');
    ?>
    
  <!-- container -->
  <?php
  require('inc/header.php');
  if(isset($_GET['id']) && isset($_SESSION['username'])){
    $annonce_id=$_GET['id'];
    $username=$_SESSION['username'];
    // verifier si l'annonce existe dans la table des favoris
    $query_select_favoris="select * from `favoris_table` where annonce_id=$annonce_id";
    $result_query_select_favoris=mysqli_query($conn,$query_select_favoris);
    if(mysqli_num_rows($result_query_select_favoris)>0){
      // verifier si l'annonce est deja dans les favoris du user
      $query_favoris_check="select * from `favoris_table` where annonce_id=$annonce_id and username='$username'";
      $result_query_favoris_check=mysqli_query($conn,$query_favoris_check);
      if(mysqli_num_rows($result_query_favoris_check)>0){
        //dans ce cas la l'annonce est deja dans la liste des favoris du user
        echo'<script>alert("annonce deja dans vos favoris")</script>';
      }
    }else{
      //inserer l'id de l'annonce dans la tables des favoris
      $query_insert_favoris="insert into favoris_table (annonce_id,username) values($annonce_id,'$username') ";
      $query_ajout_table_favoris=mysqli_query($conn,$query_insert_favoris); 
    }

  }


?>
  <h2 class="mt-5 text-center mb-4 fw-bold h-font">Vos favoris</h2>

<div class="container">
  <div class="row">
  <?php
  if(!isset($_SESSION['username'])){
    echo '<script>alert("veuillez vous connectez pour remplir votre liste des favoris")</script>';
    echo'<div style="width:70%; height:220px; margin-top:50px;" class="container footer-color p-4 rounded mb-3 shadow fovoris-color w-70" >
    <div class="row">
        <div class="col-lg-12 p-4">
          <div class="text-center">
          <i class="bi bi-heart"></i>
          </div>
          <h5 class="text-center mt-3">Votre liste des favoris est vide!</h5>
        </div>
    </div>
  </div>';
  }else{
    $username=$_SESSION['username'];
    $query_select_annonce_favoris="select annonce_table.* from annonce_table inner join favoris_table on annonce_table.annonce_id=favoris_table.annonce_id where favoris_table.username='$username'";
    $result_query_select_annonce_favoris=mysqli_query($conn,$query_select_annonce_favoris);
    if(mysqli_num_rows($result_query_select_annonce_favoris)>0){
      while($row_annonce_favoris=mysqli_fetch_assoc($result_query_select_annonce_favoris)){
        echo'<div class="col-lg-4 col-md-6">
        <div class="card border-0 shadow mb-3 " style="width: 300px; margin:auto;">
         <img src="annonces_img/'.$row_annonce_favoris['annonce_image'].'" class="card-img-top" alt="appartement">
        <div class="card-body">
         <h5 class="card-title">'.$row_annonce_favoris['annonce_titre'].'</h5>
         <span class="badge bg-light text-dark text-wrap lh-base mb-2">'.$row_annonce_favoris['annonce_prix'].'DA par nuit
         </span>

       <div class="disponibilité mb-2">
        <h6 class="mb-1">Disponibilité</h6>
        <span class="badge bg-light text-dark text-wrap lh-base mb-3">Du '.$row_annonce_favoris['annonce_date_debut'].' au '.$row_annonce_favoris['annonce_date_fin'].'
        </span>
       </div> 

       <div class="ville mb-2">
        <h6 class="mb-1">Ville</h6>
        <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$row_annonce_favoris['annonce_ville'].'
        </span>
       </div>  
      

       <div class="caracteristiques mb-1">
        <h6 class="mb-1">Caractéristiques</h6>
        <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$row_annonce_favoris['annonce_nbr_salles_de_bain'].' Salles de bain
        </span>
       <span class="badge bg-light text-dark text-wrap lh-base mb-3">'.$row_annonce_favoris['annonce_nbr_balcons'].' Balcons
       </span>
       </div>

       <div class="d-flex justify-content-evenly mb-2 ">
                     <a href="supprimer_annonce.php?id='.$row_annonce_favoris['annonce_id'].'" class="btn btn-sm btn-outline-dark shadow-none  ">supprimer</a>
                    
                  </div>

    </div>
  </div>
</div>';
      }

    }else{
      echo'<div style="width:70%; height:220px; margin-top:50px;" class="container footer-color p-4 rounded mb-3 shadow fovoris-color w-70" >
    <div class="row">
        <div class="col-lg-12 p-4">
          <div class="text-center">
          <i class="bi bi-heart"></i>
          </div>
          <h5 class="text-center mt-3">Votre liste des favoris est vide!</h5>
        </div>
    </div>
  </div>';

    }
  }

  ?>
    </div>
       </div>

    <!-- footer -->

    <?php
    require('inc/footer.php');
    ?>
    <!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    
</body>
</html>