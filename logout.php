<?php
    setcookie("userID","",time()-3600);
    session_destroy();
    header("location:index.php");
?>