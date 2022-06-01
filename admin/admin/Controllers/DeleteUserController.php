<?php

    $token = $_GET["token"];

    $company_query = mysqli_query($db,"SELECT * FROM shop_users WHERE (token) = '$token'");

    $company_data = mysqli_fetch_array($company_query);

    unlink('../public/uploads/' . $company_data['file']); 


    $delete = mysqli_query($db,"DELETE FROM shop_users WHERE (token) = '$token'");

    if($delete)
    {    
        echo '<script type="text/javascript">window.history.go(-1)</script>';
    }
    else
    {

    }
?>