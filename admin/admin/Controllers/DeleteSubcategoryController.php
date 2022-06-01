<?php 
 
$token = $_GET["token"];

$delete_subcategory = mysqli_query($db,"SELECT * FROM shop_subcategories WHERE token = '$token'");

$delete_data_subcategory = mysqli_fetch_array($delete_subcategory);

$delete = mysqli_query($db,"DELETE FROM shop_subcategories WHERE token = '$token'");

if($delete)
{    
    echo '<script type="text/javascript">window.history.go(-1)</script>';
}
else
{

}

?>