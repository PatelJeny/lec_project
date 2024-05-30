<?php
include 'dbconfig.php';
include 'checkuserauth.php';

checkUser();

if($isAdmin==false){
    header("location:dashboard.php");
}
$productID=null;

if(isset($_GET["productID"])){
    $productID=$_GET["productID"];
}
else if(isset($_POST["pro_id"]) && isset($_POST["pro_name"])&& isset($_POST["pro_category"]) && isset($_POST["pro_image"]) ){
    $productID=$_POST["pro_id"];
    $pro_name=$_POST["pro_name"];
    $pro_category=$_POST["pro_category"];
    $pro_image=$_POST["pro_image"];

    echo("UPDATE products SET pro_name='$pro_name',pro_category=' $pro_category',pro_image=' $pro_image' WHERE id='$productID'");

    $conn->query("UPDATE products SET pro_name='$pro_name',pro_category=' $pro_category',pro_image=' $pro_image' WHERE id='$productID'");
    header("location:dashboard.php");
    
}
else{
    header("location:dashboard.php");
}
$productResult= $conn->query("SELECT * FROM products WHERE id='$productID'");
$productRow=$productResult->fetch_assoc();
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
    <div class="jumbotron">
        <h3>Are You Editing Product <?= $productRow["pro_category"] ?></h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="product_img" src="assets/img/Product_img/<?=$productRow["pro_image"] ?>">
            </div>
            <div class="col-md-6">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <input type="hidden" name="pro_id" value="<?= $productID ?>">
                <div class="form-group">
                    <label for="pro_name">Pro_name</label>
                    <input name="pro_name" value=<?=$productRow["pro_name"] ?> type="text" class="form-control" id="pro_name"> 
                </div>
                <div class="form-group">
                    <label for="pro_category">Pro_category</label>
                    <input name="pro_category" value=<?= $productRow["pro_category"] ?> type="text" class="form-control" id="pro_category">
                </div>
                <div class="form-group">
                    <label for="pro_image">URL</label>
                    <input name="pro_image" value=<?= $productRow["pro_image"] ?> type="text" class="form-control" id="pro_image">
                </div>
                <button type="submit" class="btn btn-warning" >Update Product</button>
                <a href="dashboard.php" class="btn btn-danger">Cancel</a>
            </form>
            </div>
        </div>
    </div>
</body>
</html>