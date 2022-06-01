<?php
    error_reporting(0);
    $token = $_GET["token"];

    $delete_query = mysqli_query($db,"SELECT * FROM shop_blog WHERE token = '$token'");

    $delete_data = mysqli_fetch_array($delete_query);

    unlink('../public/images/blog/' . $delete_data['image']);
    
    unlink('../blog/' . $delete_data['url']);




    $delete = mysqli_query($db,"DELETE FROM shop_blog WHERE token = '$token'");

    if($delete)
    {    
        echo '<script type="text/javascript">window.history.go(-1)</script>';
    }
    else
    {

    }
?>