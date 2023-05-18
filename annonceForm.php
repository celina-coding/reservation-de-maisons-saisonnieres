<?php
  include ('dbh.inc.php');
?>
<div class="modal fade" id="annonceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
        <i class='bi bi-house-add'></i> Ajouter une annonce 
        </h5>
        <button type="reset" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
          <label for="annonce_title" class="form-label">Titre</label>
          <input type="text" id="annonce_title" class="form-control shadow-none mb-2" required="required" name="annonce_title"/>
      </div>
      <div class="mb-3">
          <label for="annonce_prix" class="form-label">Prix</label>
          <input type="text" id="annonce_prix" class="form-control shadow-none mb-2" required="required" name="annonce_prix"/>
      </div>

      <div class="mb-3">
        <label for="annonce_image" class="form-label">Photo</label>
        <input type="file" id="annonce_image" class="form-control shadow-none mb-2" required="required" name="annonce_image" /> 
      </div>

      <div class="mb-3">
       <label for="annonce_categorie" class="form-label">Catégorie</label>
       <select name="annonce_categorie"class="form-select shadow-none">
          <?php
             $categorie_query=mysqli_query($conn,"select * from `categories`");
             if(mysqli_num_rows($categorie_query)>0){
               while($row_categorie= mysqli_fetch_assoc($categorie_query)){
                  $categorie_name=$row_categorie['categorie_name'];
                  $categories_id=$row_categorie['categories_id'];
                  echo "<div>
                           <option value ='$categories_id'>$categorie_name
                        </div>";}}
          ?>
          </select>
          <!-- <label for="annonce_categorie" class="form-label">Catégorie</label>
          <select name="annonce_categorie"class="form-select shadow-none">
            <option value="villa">Villa</option>
            <option value="chalet">Chalet</option>
            <option value="appartement">Appartement</option>
            <option value="studio">Studio</option>
          </select> -->
      </div>

      <div class="mb-3">
          <label for="annonce_nbr_chambres" class="form-label">Nombre de chambres</label>
          <input type="text" id="annonce_nbr_chambres" class="form-control shadow-none mb-2" required="required" name="annonce_nbr_chambres"/>
      </div>

      <div class="mb-3">
          <label for="annonce_nbr_salle_de_bain" class="form-label">Nombre de salles de bain</label>
          <input type="text" id="annonce_nbr_salle_de_bain" class="form-control shadow-none mb-2" required="required" name="annonce_nbr_salle_de_bain"/>
      </div>

      <div class="mb-3">
          <label for="annonce_nbr_de_balcons" class="form-label">Nombre de balcons</label>
          <input type="text" id="annonce_nbr_de_balcons" class="form-control shadow-none mb-2" required="required" name="annonce_nbr_de_balcons"/>
      </div>


      <div class="mb-3">
          <label for="annonce_ville" class="form-label">Ville</label>
          <input type="text" id="annonce_ville" class="form-control shadow-none mb-2" required="required" name="annonce_ville"/>
      </div>

      <div class="mb-3">
          <label for="annonce_date_debut" class="form-label">Date début</label>
          <input type="date" id="annonce_date_debut" class="form-control shadow-none mb-2" required="required" name="annonce_date_debut"/>
      </div>

      <div class="mb-3">
          <label for="annonce_date_fin" class="form-label">Date fin</label>
          <input type="date" id="annonce_date_fin" class="form-control shadow-none mb-2" required="required" name="annonce_date_fin"/>
      </div>




      <div class="d-flex align-items-center justify-content-between mb-2">
        <button type="submit" value="ajout" class="btn btn-dark shadow-none me-2" name="annonce_ajout">Ajouter mon annonce</button>
      </div>
      </div>
      <div class="modal-footer">
      </div>
        </form>
    </div>
  </div>
</div>

<?php

if(isset($_POST['annonce_ajout'])){
  $annonce_title=$_POST['annonce_title'];
  $annonce_prix=$_POST['annonce_prix'];
  $annonce_image=$_FILES['annonce_image']['name'];
  $annonce_image_tmp=$_FILES['annonce_image']['tmp_name'];
  $annonce_categorie=$_POST['annonce_categorie'];
  $annonce_nbr_chambres=$_POST['annonce_nbr_chambres'];
  $annonce_nbr_salle_de_bain=$_POST['annonce_nbr_salle_de_bain'];
  $annonce_nbr_de_balcons=$_POST['annonce_nbr_de_balcons'];
  $annonce_ville=$_POST['annonce_ville'];
  $annonce_date_debut=date('Y-m-d', strtotime($_POST['annonce_date_debut']));
  $annonce_date_fin=date('Y-m-d', strtotime($_POST['annonce_date_fin']));

  // select query
  $select_annonce_query = "Select annonce_titre from `annonce_table` where annonce_titre='$annonce_title'";
  $result_annonce = mysqli_query($conn,$select_annonce_query);
  $rows_count = mysqli_num_rows($result_annonce);
  if($rows_count>0){
    echo"<script>alert('Le titre existe déja')</script>";
  }else{
    move_uploaded_file($annonce_image_tmp,"annonces_img/$annonce_image");
    //insert query
    $insert_annonce_query = "insert into `annonce_table`(annonce_titre,annonce_prix,annonce_image,annonce_categorie,annonce_nbr_chambres,annonce_nbr_salles_de_bain,annonce_nbr_balcons,annonce_ville,annonce_date_debut,annonce_date_fin) values('$annonce_title',$annonce_prix,'$annonce_image','$annonce_categorie','$annonce_nbr_chambres','$annonce_nbr_salle_de_bain',' $annonce_nbr_de_balcons','$annonce_ville','$annonce_date_debut','$annonce_date_fin')";

    $sql_annonce_execute=mysqli_query($conn,$insert_annonce_query);
  }
}
  
?>