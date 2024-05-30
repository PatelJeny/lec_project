<?php
include 'dbconfig.php';
include 'checkuserauth.php';

checkUser();
$showError = false;

if($isAdmin==false){
    header("location: dashboard.php");
}

if(isset($_POST["pro_name"]) && ($_POST["pro_category"])  && ($_POST["pro_price"])){
    $pro_name=$_POST["pro_name"];
    $pro_category=$_POST["pro_category"];
    $pro_price=$_POST["pro_price"];

    $pathToSave="assets/img/Product_img/".basename($_FILES["pro_image"]["name"]);
    if(move_uploaded_file($_FILES["pro_image"]["tmp_name"], $pathToSave)==TRUE){
        $originalFileName= basename($_FILES["pro_image"]["name"]);
        $conn->query("INSERT INTO products (pro_name,pro_category,pro_price,pro_image) VALUES( '$pro_name',' $pro_category','$pro_price',' $originalFileName',)");
        header("Location:dashboard.php");
    }
    else{
        $showError=TRUE;
    }
}
?>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>
<body>
    <div class="jumbotron">
        <h3>Are you adding new product</h3>
    </div>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <div class="form-group">
            <label for="pro_name">Pro_name</label>
            <input name="pro_name" type="text" class="form-control" id="pro_name">
        </div>
        <div class="form-group">
            <label for="pro_category">Pro_category</label>
            <input name="pro_category" type="text" class="form-control" id="pro_category">
        </div>
        <div class="form-group">
            <label for="pro_image">Pro_image</label>
            <input name="pro_image" type="file" class="form-control" id="pro_image">
        </div>
        <div class="form-group">
            <label for="pro_price">Pro_price</label>
            <input name="pro_price" type="text" class="form-control" id="pro_image">
        </div>

        <button type="submit" class="btn btn-warning">Add Product</button> 
        <a href="dashboard.php" class="btn btn-danger">Cancel</a> 
    </form>
    <?php
        if($showError==TRUE){
    ?>
    <P>error while saving product  </P>
    <?php
        }
    ?>
    </div>

</body>
</html>