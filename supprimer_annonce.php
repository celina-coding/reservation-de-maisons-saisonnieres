<?php
  include ('dbh.inc.php');
?>

<?php
if(isset($_GET['id'])){
    $annonce_id=$_GET['id'];
    $username=$_SESSION['username'];
    $query_supprimer_annonce_favoris="delete from `favoris_table` where annonce_id=$annonce_id";
    $result_query_supprimer_annonce_favoris=mysqli_query($conn,$query_supprimer_annonce_favoris);
    if($result_query_supprimer_annonce_favoris){
        header("location: favoris.php");
    }
}



?>