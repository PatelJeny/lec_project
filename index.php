<?php
include 'dbconfig.php';
include 'checkuserauth.php';

if(isset($_COOKIE["userID"])){
    header("location:dashboard.php");
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
    <link rel="stylesheet" href="assets/css/index.css">
</head>

<body>
    <?php
    $showError = false;
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if ($_POST["email"] && $_POST["password"]) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            
            $sql = "SELECT * FROM customer where email='$email' AND password='$password'";
            $result = $conn->query($sql);
            if($result->num_rows>0){
            $row = $result->fetch_assoc();
                setcookie("userID",$row['id'], time()+(86400));
                header("location:dashboard.php");
            } else {
                $showError = true;
            }
        } else {
            echo ("failed");
            die();
        }
    }
    ?>
    <div class="jumbotron">
        <h1>My website</h1>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus totam placeat laudantium optio, eos iure dicta voluptas repellat non? Ipsa esse corrupti soluta animi nemo eius cumque minima repellat autem.</p>
    </div>
    <div class="container card container-login">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
                <label for="LABEL_USER_EMAIL">Email</label>
                <input type="text" name="email" id="LABEL_USER_EMAIL" class="form-control">
            </div>
            <div class="form-group">
                <label for="LABEL_USER_PASSWORD">Password</label>
                <input type="password" name="password" id="LABEL_USER_PASSWORD" class="form-control">
            </div>
            <div class="form-group text_align_center">
                <input type="submit" class="btn btn-info">
                <a href="signup.php" class="btn btn-secondary">Signup</a>
            </div>
            <?php
            if ($showError == true) { ?>
                <div class="alert alert-danger">
                    <strong>Failed</strong>In correct credentials
                </div>
            <?php
            }
            ?>
        </form>
    </div>
</body>

</html>