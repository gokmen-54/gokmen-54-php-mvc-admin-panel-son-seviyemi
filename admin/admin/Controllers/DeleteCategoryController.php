<?php 
 
$token = $_GET["token"];

$delete_query = mysqli_query($db,"SELECT * FROM shop_categories WHERE token = '$token'");

$delete_data = mysqli_fetch_array($delete_query);

$delete = mysqli_query($db,"DELETE FROM shop_categories WHERE token = '$token'");

if($delete)
{    
    echo '<script type="text/javascript">window.history.go(-1)</script>';
}
else
{

}

?>