<?php
    $token_sec = $_GET["token"];
    
    $sec_query = mysqli_query($db,"SELECT * FROM shop_sectionads WHERE token = '$token_sec'");
    
    $sec_data = mysqli_fetch_array($sec_query);


    unlink('../public/images/ads/'.$sec_data['image']);

    $delete = mysqli_query($db,"DELETE FROM shop_sectionads WHERE token = '$token_sec'");

    if($delete)
    {    
        echo '<script type="text/javascript">window.history.go(-1)</script>';
    }
    else
    {

    }
?>