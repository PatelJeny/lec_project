<?php

$userID=null;
$isAdmin=false;

function checkUser(){

    global $userID;
    global $isAdmin;
    global $conn;

    if(!isset($_COOKIE["userID"])){
       header("location:index.php");

    }else{
        $userID=$_COOKIE["userID"];
        $userResult=$conn->query("SELECT * FROM customer WHERE id='$userID'");
        $userRow=$userResult->fetch_assoc();

        $isAdmin=$userRow['is_admin']=='0'?false:true;

        if(session_status() !==PHP_SESSION_ACTIVE){
            session_start();
            $_SESSION["name"] =$userRow['name'];
        }
    }
}
?>