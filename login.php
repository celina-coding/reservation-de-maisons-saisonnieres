<?php
  include ('dbh.inc.php');
  @session_start();
?> 
<div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
        <h5 class="modal-title d-flex align-items-center">
        <i class="bi bi-person-circle me-2"></i> Se connecter
        </h5>
        <button type="reset" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="mb-3">
          <label for="user_username" class="form-label">Nom</label>
          <input type="text" id="user_username" class="form-control shadow-none mb-2" required="required" name="user_username"/>
      </div>


      <div class="mb-3">
          <label for="user_password" class="form-label">Mot de passe</label>
          <input type="password" id="user_password" class="form-control shadow-none mb-2" required="required" name="user_password" />
      </div>

      <div class="d-flex align-items-center justify-content-between mb-2">
        <button type="submit" value="login" class="btn btn-dark shadow-none me-2" name="user_login">Se coonecter</button>
      </div>
      </div>
      <div class="modal-footer">
      </div>
        </form>
    </div>
  </div>
</div>

<?php
if(isset($_POST['user_login'])){
  $user_username=$_POST['user_username'];
  $user_password=$_POST['user_password'];
  $sql_query="Select * from `user_table` where username='$user_username'";
  $result=mysqli_query($conn,$sql_query);
  $row_data= mysqli_fetch_assoc($result);
  $row_count=mysqli_num_rows($result);
  if($row_count>0){
       $_SESSION['username']=$user_username;
       if(password_verify($user_password,$row_data['user_password'])){
        echo "<script>alert('Login successful ')</script>";
       }else{
        echo "<script>alert('nom et mot de passe invalide')</script>";
       }
  }
  else{
    echo "<script>alert('nom et mot de passe invalide')</script>";
  }

}


?>