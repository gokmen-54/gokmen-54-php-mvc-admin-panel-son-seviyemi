<?php

    $token = $_GET["token"];

    $company_query = mysqli_query($db,"SELECT * FROM shop_companies WHERE token = '$token'");

    $company_data = mysqli_fetch_array($company_query);

    unlink('../public/images/company/' . $company_data['logo']);

    unlink('../public/images/company/' . $company_data['banner']); 

    unlink('../company/' . $company_data['url']);

    $delete = mysqli_query($db,"DELETE FROM shop_companies WHERE token = '$token'");

    if($delete)
    {    
        echo '<script type="text/javascript">window.history.go(-1)</script>';
    }
    else
    {

    }
?>