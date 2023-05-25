<?php
  include ('dbh.inc.php');
?>

<div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
        <i class="bi bi-person-lines-fill me-2"></i> S'inscrire 
        </h5>
        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <span class="badge bg-light text-dark text-wrap lh-base mb-3">remarque : vos coordonnées doivent correspondre à votre pièce d'identité
        </span>
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                  <label for="user_username" class="form-label">Nom</label>
                  <input type="text" id="user_username" class="form-control shadow-none mb-2" required="required" name="user_username"/>

                  <label for="user_email" class="form-label">Adresse mail</label>
                  <input type="email" id="user_email" class="form-control shadow-none mb-2" required="required" name="user_email"/>

                  <label for="user_adress" class="form-label">Adresse</label>
                  <input type="text" id="user_adresse" class="form-control shadow-none mb-3" required="required" name="user_adresse"/>


                  <label for="user_image" class="form-label">Photo</label>
                  <input type="file" id="user_image" class="form-control shadow-none mb-2" required="required" name="user_image" /> 


                  <label for="user_password" class="form-label">Mot de passe</label>
                  <input type="password" id="user_password" class="form-control shadow-none mb-2" required="required" name="user_password" />


                  <label for="conf_user_password" class="form-label">Confirmer le mot de passe</label>
                  <input type="password" id="conf_user_password" class="form-control shadow-none mb-3" required="required" name="conf_user_password"/>

                  <div class="text-center">
                    <button type="submit" value="Register"  class="btn btn-dark shadow-none mb-3 mt-3  col-lg-12" name="user_register">S'inscrire</button>
                  </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
      </div>
        </form>
    </div>
  </div>
</div>

<!-- php code -->
<?php
if(isset($_POST['user_register'])){
  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
  $conf_user_password=$_POST['conf_user_password'];
  $user_adresse=$_POST['user_adresse'];
  $user_image=$_FILES['user_image']['name'];
  $user_image_tmp=$_FILES['user_image']['tmp_name'];
  
  // select query
  $select_query="Select * from `user_table` where username='$user_username' or user_email='$user_email'";
  $result = mysqli_query($conn,$select_query);
  $rows_count = mysqli_num_rows($result);
  if($rows_count>0){
    echo"<script>alert('nom ou email existe déja')</script>";
  }else if($user_password!=$conf_user_password){
    echo"<script>alert('Les mots de passe ne correspondent pas')</script>";
  }
  
  else{
  // insert query
  move_uploaded_file($user_image_tmp,"user_img/$user_image");
  $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_addresse) values('$user_username','$user_email','$hash_password','$user_image','$user_adresse')";
  // execution of the query
  $sql_execute=mysqli_query($conn,$insert_query);

  }
  
}

?>