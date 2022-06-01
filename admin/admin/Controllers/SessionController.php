<?php

include("Controllers/DatabaseController.php");

session_start();

$username = $_SESSION['SHOP_ADMIN'];

$query = mysqli_query($db,"SELECT * FROM shop_admin WHERE username = '$username'");

$row = mysqli_fetch_array($query, MYSQLI_ASSOC);

$login = $row['username'];

$url = basename(substr($_SERVER['PHP_SELF'], 0, -4));

if(!isset($_SESSION['SHOP_ADMIN']))
{
   header("location: login");

   die();
}
else
{
    
}

?>