<?php
    error_reporting(0);
    $token = $_GET["token"];

    $delete_query = mysqli_query($db,"SELECT * FROM shop_products WHERE token = '$token'");

    $delete_data = mysqli_fetch_array($delete_query);

    unlink('../public/images/products/' . $delete_data['image']); unlink('../public/images/products/' . $delete_data['image2']);

    unlink('../public/images/products/' . $delete_data['image3']); unlink('../public/images/products/' . $delete_data['image4']);
    
    unlink('../public/images/products/' . $delete_data['image5']); unlink('../public/images/products/' . $delete_data['image6']);

    unlink('../public/images/products/' . $delete_data['image7']); unlink('../public/images/products/' . $delete_data['image8']);

    unlink('../' . $delete_data['url']);

    $delete = mysqli_query($db,"DELETE FROM shop_products WHERE token = '$token'");

    if($delete)
    {    
        echo '<script type="text/javascript">window.history.go(-1)</script>';
    }
    else
    {

    }
?>