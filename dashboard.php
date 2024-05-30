<?php
include 'dbconfig.php';
include 'checkuserauth.php';

checkUser();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
</head>

<body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <h2 class="company_name">Shopping Site</h2>
        <ul class="navbar nav">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            <?php
                if($isAdmin==true){
            ?>
            <li class="nav-item">
                <a class="nav-link" href="addProduct.php">New</a>
            </li>
            <?php
                }
                ?>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </nav>
    <div class="container">

        <?php

       
        $sql = $isAdmin==true?"SELECT * FROM products":"SELECT * from products where is_deleted=false";
        $productResult = $conn->query($sql);

        if ($productResult->num_rows > 0) { ?>
            <div class="container p-3"></div>
            <div class="row">

                <?php while ($productRow = $productResult->fetch_assoc()) { ?>
                    
                    <div class="col-md-4 p-3">
                        <div class="card card_style" style="width:280px">
                            <img class="card-img-top img_align" src="<?php echo("assets/img/Product_img/".$productRow['pro_image'])?>"alt="card image">
                            <div class="card body p-3">
                                <h3 class="card-title text_align"><?php echo ($productRow['pro_name']) ?></h3>
                                <p class="card-title text_align"><?php echo ($productRow['pro_price']) ?></p>
                                <b class="card-title text_align"><?php echo ($productRow['pro_category'])?></b>
                                <?php
                                    if($isAdmin==true){
                                        if($productRow["is_deleted"]==1){
                                ?>
                                <a href="editProduct.php?productID=<?php echo($productRow['id'])?>" class="btn btn-warning">Edit</a>
                                <a href="deleteProduct.php?productID=<?php echo($productRow['id'])?>" class="btn btn-danger">Delete</a>

                                <?php
                                        }
                                        else{
                                ?>
                                <div class="alert alert-danger">This Product was deleted</div>
                                <?php }?>
                                <?php
                                    }
                                    else{
                                        ?>
                                        <a href="product1.php?productID=<?php echo($productRow['id'])?>" class="btn btn-primary">See Product</a>
                               <?php
                                    }
                                
                               ?>
                            </div>

                        </div>
                    </div>
                <?php
                } ?>
            </div>
    </div>
<?php
        } else { ?>
    <div class="alert alert-waring">
        <strong>Failed</strong>No products found
    </div>
<?php
        } 
   
    ?>
</body>

</html>