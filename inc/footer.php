<?php
   @session_start();
 ?>

<!-- footer -->
<div class="container-fluid footer-color mt-5 ">
  <div class="row">
    <div class="col-lg-4 p-4">
       <h3 class="h-font fw-bold fs-3 mb-3" >Logo</h3>
       <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sequi, animi, ducimus numquam illo eum quos similique consequatur reiciendis aperiam magni iure  </p>
    </div>
    <div class="col-lg-4 p-4 ">
      <h5 class="fw-bold mb-3">Links</h5>
      <?php
      if(isset($_SESSION['username'])){
        echo '<a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3">Acceuil</a><br>
        <a href="favoris.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3">Favoris</a><br>
        <a href="reserve.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3">Réservé</a><br>
        <a href="#" class="d-inline-block mb-2 text-dark text-decoration-none mb-3">Profile</a><br>
      </div>';
      }else{
        echo'<a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3">Acceuil</a><br>
        <a href="favoris.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3">Favoris</a><br>
        <a href="reserve.php" class="d-inline-block mb-2 text-dark text-decoration-none mb-3">Réservé</a><br>
      </div>';
      }
      ?>
      
    <div class="col-lg-4 p-4">
      <h5 class="mb-3 ">Suivez-nous</h5>
      <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
       <i class="bi bi-twitter">twitter</i> 
      </a><br>
      <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
      <i class="bi bi-instagram ">instagram</i> 
      </a><br>
      <a href="#" class="d-inline-block text-dark text-decoration-none mb-2">
      <i class="bi bi-facebook">facebook</i>
      </a><br> 
    </div>
  </div>
</div>