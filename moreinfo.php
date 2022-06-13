<?php
include ('config/db_connect.php');

if(isset($_POST['delete'])){
$id_to_delete = mysqli_real_escape_string($conn,$_POST['id_to_delete']);
$sql = "DELETE FROM burgers WHERE id = $id_to_delete";

if(mysqli_query($conn,$sql)){
 header('Location: index.php');
}else{
    echo 'query error' . mysqli_error($conn);
}

}


if(isset($_GET['id'])){
    $id  = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM burgers WHERE id= $id";
    $result = mysqli_query($conn, $sql);

    $burg = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

    // print_r($burg);
}

?>

<!DOCTYPE html>
<html>
 
<?php include('templates/header.php') ?>


<div class="container center orange-text">
    <?php if($burg): ?>
   <h4> <?php echo htmlspecialchars($burg['title']); ?></h4>
   <p> created by : <?php echo htmlspecialchars($burg['email']); ?> </p>
   <p>on : <?php echo date($burg['created_at']);?></p>
   <h5>Ingredients : </h5>
   <p><?php echo htmlspecialchars($burg['ingredients']); ?></p>

   <form action="moreinfo.php" method="POST">
    <input type="hidden" name="id_to_delete"  value="<?php echo $burg['id']?>">
    <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">

  </form>

   <?php else:?>
      <h5><?php echo htmlspecialchars('oops ! no such burgers exists..')?> <h5>
       
  
    <?php endif ?>
</div>
<!-- <h4>details</h4> -->
<?php include('templates/footer.php') ?>

</html>