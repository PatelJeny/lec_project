<?php
include 'dbconfig.php';
include 'checkuserauth.php';

checkUser();

$productID=null;
$showError=false;

if($_GET["productID"]){
    $productID=$_GET["productID"];
}
else{
    header("location:dashboard.php");
}
?>

<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST["review_id"] && $_POST["rating"] && $_POST["comment"]){
        $reviewID=$_POST["review_id"];
        $rating=$_POST["rating"];
        $comment=$_POST["comment"];

        $sql="UPDATE review SET rating='$rating',comment=' $comment' WHERE id=' $reviewID'";
        
        if(!($conn->query($sql)===true)){
            $showError=true;
        }
        else{
            header("location:dashboard.php");
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/product1.css">
</head>
<body>
    <?php
        $sql="SELECT * FROM products where id='$productID'";
        $productResult=$conn->query($sql);
        $productRow=$productResult->fetch_assoc();
    ?>
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
                <img class="product_img" src="assets/img/Product_img/<?php echo($productRow["pro_image"]) ?>">
            </div>
            <div class="col-md-4">
                <h3><?php echo($productRow["pro_name"]) ?></h3>
                <p><?php echo($productRow["pro_category"]) ?></p>
                <p><b><?php echo($productRow["pro_price"]) ?></b></p>
                <p><?php echo($productRow["pro_description"]) ?></p>
            <hr>
            <?php
                $givenReviewResult=$conn->query("SELECT * FROM review WHERE user_id='$userID' AND product_id='$productID'");
                $reviewRow=$givenReviewResult->fetch_assoc();
            ?>
            <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <input type="hidden" name="review_id" value="<?php echo($reviewRow["id"])?>">
            <div class="form-group">
                <label for="rating_dropdown">Select Rating</label>
                <select name="rating" id="ratings_dropdown">
                    <option <?php if($reviewRow["rating"]=="1") ?> value="1">1/5</option>
                    <option <?php if($reviewRow["rating"]=="2") ?> value="2">2/5</option>
                    <option <?php if($reviewRow["rating"]=="3") ?> value="3">3/5</option>
                    <option <?php if($reviewRow["rating"]=="4") ?> value="4">4/5</option>
                    <option <?php if($reviewRow["rating"]=="5") ?> value="5">5/5</option>
                </select>
                <textarea name="comment" class="form-control" rows="4" id="comment" required></textarea>
            </div>
            <button type="submit" class="btn btn-warning">Update My Review</button>
            <a href="dashboard.php" class="btn btn-danger">Cancel</a> 
        </form>
        <?php
        if($showError==true){?>
        <div class="alert alert-danger">
            <strong>Failed!</strong>Couldn't Update Your Review , Please Try Again
        </div>
        <?php
        }
     ?>   
            </div>
        </div>
    </div>
</body>
</html>