<?php 

include ('config/db_connect.php');
//writing query for pizzas
$sql= 'SELECT title, ingredients, id FROM burgers ORDER BY created_at';
// make query
$result = mysqli_query($conn, $sql);
//print_r($result)  NOT USABLE FORMAT;
// fetch the resulting row as an array
$burgers = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

// print_r($burgs);

//print_r(explode(',',$burgs[0]['ingredients']));

?>
<!DOCTYPE html>
<?php include ('templates/header.php') ?>

<h4 class='center grey-text'>Lets have Burgers!!</h4>

<div class="container">
    <div class="row">
        <?php foreach ($burgers as $burg) :?>

                <div class="col s6 md3 ">
                    <div class="card z-depth-0">
                        <img src="img/burg1.svg" alt="burg" class="burgpic">
                        <div class="card-content center orange-text">
                            <h5><?php echo htmlspecialchars($burg['title']);?></h5>
                            <ul>
                                <?php foreach (explode(',',$burg['ingredients']) as $ing_item):?>
                                <li><?php echo htmlspecialchars($ing_item)?></li>    
                                <?php endforeach; ?>
                                </ul>
                            <!-- <div><//?php echo htmlspecialchars($burg['ingredients']);?></div> -->
                        </div>
                        <div class="card-action right-align">
                            <a href="moreinfo.php?id=<?php echo $burg['id'];?>" class="brand-text">more info</a>
                        </div>
                    </div>
                </div>

        <?php endforeach; ?>
    </div>
</div>


<?php include ('templates/footer.php') ?>
<!-- <p>hi mom!</p> -->
</html>