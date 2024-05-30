<?php
include 'dbconfig.php';
?>
<html>

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <?php
    $showError=false;
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if($_POST["name"] && $_POST["email"] && $_POST["password"]){
            $name=$_POST["name"];
            $email=$_POST["email"];
            $password=$_POST["password"];

            $sql="INSERT INTO customer (name,email,password) VALUES('$name',' $email','$password')";
            if(!($conn->query($sql))===true){
                $showError=true;
            }
        }else{
            echo("Failed");
            die();
        }
    }
    ?>
    <div class="jumbotron">
        <h1>Create Your Account</h1>
        <p>We need some of information to create your account</p>
    </div>
    <div class="container card container-login">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="LABEL_USER_NAME">Name:</label>
                <input type="text" name="name" class="form-control" id="LABEL_USER_NAME">
            </div>
            <div class="form-group">
                <label for="LABEL_USER_EMAIL">Email:</label>
                <input type="text" name="email" class="form-control" id="LABEL_USER_EMAIL">
            </div>
            <div class="form-group">
                <label for="LABEL_USER_PASSWORD">Password:</label>
                <input type="password" name="password" class="form-control" id="LABEL_USER_PASSWORD">
            </div>
            <div class="form-group text_align_center">
                <input type="submit" class="btn btn-primary">
            </div>
            <?php
            if($showError==true){
            ?>
            <div class="alert alert-danger">
                <strong>Failed</strong>Already Exist, Try to login
            </div>
            <?php
            }?>
        </form>
    </div>
</body>

</html>