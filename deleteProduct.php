<?php
include 'dbconfig.php';
include 'checkuserauth.php';

checkUser();
if ($isAdmin == false) {
    header("location:dashboard.php");
}
if (isset($_GET["productID"])) {
    $productID = $_GET["productID"];
    $conn->query("UPDATE products SET is_deleted=true where id = '$productID'");
}
header("location:dashboard.php");
?>