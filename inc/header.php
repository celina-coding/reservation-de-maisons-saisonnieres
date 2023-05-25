 <?php
   session_start();
 ?>
 <!-- navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top" >
  <div class="container-fluid">
    <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="#">HeavenlyHome</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php
          if(isset($_SESSION['username'])){
            echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Acceuil</a></li>';
            echo'<li class="nav-item"><a class="nav-link "href="proprietes.php">Propriétées</a></li>';
            echo'<li class="nav-item">
            <a class="nav-link " href="favoris.php">Favoris</a></li>';
            echo'<li class="nav-item">
            <a class="nav-link " href="reserve.php">Réservé</a></li>';
            echo'<li class="nav-item">
            <a class="nav-link " href="#">Profile</a>
          </li>';
          }
          else{
            echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Acceuil</a></li>';
            echo'<li class="nav-item"><a class="nav-link "href="proprietes.php">Propriétées</a></li>';
            echo'<li class="nav-item">
            <a class="nav-link " href="favoris.php">Favoris</a></li>';
            echo'<li class="nav-item">
            <a class="nav-link " href="reserve.php">Réservé</a></li>';
          }
        ?>
      </ul> 
      <div class="d-flex">
        <?php
           if(isset($_SESSION['username'])){
            echo "<button type='button' class='btn btn-outline-dark shadow-none me-lg-2 me-3' data-bs-toggle='modal' data-bs-target='#annonceModal'> <i class='bi bi-house-add'></i> Publier une annonce</button>";
           echo "<button type='button'class='btn btn-outline-dark shadow-none me-lg-2 me-3'><a href='logout.php' class='text-decoration-none'>Se déconnecter</a></button>";
           }else{
            echo"<button type='button' class='btn btn-outline-dark shadow-none me-lg-2 me-3' data-bs-toggle='modal' data-bs-target='#loginModal'>Se connecter</button>";
            echo"<button type='button' class='btn btn-outline-dark shadow-none me-lg-2 me-3' data-bs-toggle='modal' data-bs-target='#registerModal'>S'inscrire</button>";
           }
        ?>
        </div>
       </div>
     </div>
   </nav>

<?php
 include_once 'login.php'
?>

<!-- registerModal -->
<?php
include_once 'register.php'
?>
<?php
 include_once 'annonceForm.php'
?>