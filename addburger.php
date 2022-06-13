<?php

include ('config/db_connect.php');

$title=$email=$ingredients='';
$errors = array('email'=>'','title'=>'','ingredients'=>'',);

if(isset($_POST['submit'])){
// echo htmlspecialchars($_POST['email']);
// echo htmlspecialchars($_POST['title']);
// echo htmlspecialchars($_POST['ingredients']);
if(empty($_POST['email'])){
    $errors['email']='An email is required </br>';
}
else{
    $email = $_POST['email'];
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email']= "email must be valid";
    }
 }


if(empty($_POST['title'])){
    $errors['title']='A title is required </br>';
}
else{
    $title=$_POST['title'];
    // echo htmlspecialchars($_POST['title']);
    if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
      $errors['title']= "title must be letters and spaces only";
    }
}


if(empty($_POST['ingredients'])){
    $errors['ingredients']='An ingredient is required </br>';
}
else{
    $ingredients = $_POST['ingredients'];
   // echo htmlspecialchars($_POST['ingredients']);
   if(!preg_match('/^([a-zA-Z\s]+)(,\s,*[a-zA-Z\s]*)*$/', $ingredients)){
    $errors['ingredients']= "should be comma separated list";
   }
}


if(array_filter($errors)){

}
else{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

    //Create SQL

    $sql = "INSERT INTO burgers(title,email,ingredients)VALUES('$title','$email','$ingredients')";

 
//save to database  check success
    if(mysqli_query($conn, $sql)){
       
    }
    else{
        echo 'query error' . mysqli_error($conn);
    }


//form valid
header('Location:index.php');
}
}
?>

<!DOCTYPE html>
<html>
<?php include ('templates/header.php')?>

<section class="container grey-text">
    
    <h4 class="center">Add a burg!</h4>

    <form class="white" action="addburger.php"  method="POST">
    <img src="img/burg1.svg" alt="burg" class="burgpic">
                     
        <label> Your Email :</label>
        <input  type="text" name="email" value="<?php echo htmlspecialchars($email)?>">
        <div class="red-text"><?php echo $errors['email']?></div>

        <label> Burger type :</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($title)?>">
        <div class="red-text"><?php echo $errors['title']?></div>
    
        <label> Ingredients (separate with comma's):</label>
        <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients)?>">
        <div class="red-text"><?php echo $errors['ingredients']?></div>

        <div class="center">
        <input type="submit" name="submit" value="order" class="btn brand z-depth-0">
        </div>
   
    </form>    

</section>

<?php include ('templates/footer.php')?>

</html>