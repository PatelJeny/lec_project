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
    if($_POST["product_id"] && $_POST["rating"] && $_POST["comment"]){
        $productID=$_POST["product_id"];
        $rating=$_POST["rating"];
        $comment=$_POST["comment"];

        $sql="INSERT INTO review (product_id,user_id,rating,comment) VALUES ('$productID','$userID','$rating','$comment')";
        
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
    <h2 class="company_name"><?= "Hello ".$_SESSION["name"]  ?></h2>
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
            
            <form method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>">
            <input type="hidden" name="product_id" value="<?php echo($productID)?>">
            <div class="form-group">
                <label for="rating_dropdown">Select Rating</label>
                <select name="rating" id="ratings_dropdown">
                    <option value="1">1/5</option>
                    <option value="1">2/5</option>
                    <option value="1">3/5</option>
                    <option value="1">4/5</option>
                    <option value="1">5/5</option>
                </select>
                <textarea name="comment" class="form-control" rows="4" id="comment" required></textarea>
            </div>

            <?php
                $sql="SELECT * FROM review WHERE product_id='$productID' AND user_id='$userID'";
                $productResult=$conn->query($sql);
                if($productResult->num_rows==0){    
            ?>
            <input type="submit"  class="btn btn-primary" value="Post Your Review">
                <?php
                }
                else{ ?>
                <a href="<?="editReview.php?productID=".$productID ?>" class="btn btn-warning">Post Your Review </a>
                <?php
            }
        ?>
            <a href="dashboard.php" class="btn btn-danger">Cancel</a>
                   
                   
                    
                  
            
        </form>
        <?php
        if($showError==true){?>
        <div class="alert alert-danger">
            <strong>Failed!</strong>Couldn't Save Your Review , Please Try Again
        </div>
        <?php
        }
     ?>   
            </div>
        </div>
    </div>
</body>
</html>