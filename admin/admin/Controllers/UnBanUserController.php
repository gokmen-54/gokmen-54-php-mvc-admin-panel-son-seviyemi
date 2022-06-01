<?php

    $token = $_GET["token"];

    $update_query = mysqli_query($db,"UPDATE shop_users SET verify = 1 WHERE token = '$token'");

    if($update_query)
    {
        

        header("location: view-user");
    }
    else
    {
        echo "HATA";
    }

?>