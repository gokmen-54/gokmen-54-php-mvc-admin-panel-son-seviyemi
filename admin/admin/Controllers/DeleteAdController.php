<?php
    $token_ads = $_GET["token"];
    
    $ads_query = mysqli_query($db,"SELECT * FROM shop_storyads WHERE token = '$token_ads'");
    
    $ads_data = mysqli_fetch_array($ads_query);

    unlink('../public/images/ads/' . $ads_data['image']);

    $delete = mysqli_query($db,"DELETE FROM shop_storyads WHERE token = '$token_ads'");

    if($delete)
    {    
        echo '<script type="text/javascript">window.history.go(-1)</script>';
    }
    else
    {

    }
?>