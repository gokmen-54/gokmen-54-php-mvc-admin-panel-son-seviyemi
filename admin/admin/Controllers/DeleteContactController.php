<?php

    $token = $_GET["token"];

    $contact_query = mysqli_query($db,"SELECT * FROM shop_contacts WHERE token = '$token'");

    $contact_data = mysqli_fetch_array($contact_query);

    $delete = mysqli_query($db,"DELETE FROM shop_contacts WHERE token = '$token'");

    if($delete)
    {    
        echo '<script type="text/javascript">window.history.go(-1)</script>';
    }
    else
    {

    }
?>