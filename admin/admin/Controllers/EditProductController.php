    
<?php

if(empty($_GET["token"])) { echo '<script type="text/javascript">window.history.go(-1)</script>'; } else { $token = $_GET["token"]; }

if(isset($_POST["update"]))
{
$productname = strip_tags($_POST["productname"]); $color = strip_tags($_POST["color"]); $stock = $_POST['stock']; $barcode = strip_tags($_POST["barcode"]); $price = $_POST['price'];

$company = $_POST["company"]; $category = $_POST["category"]; $subcategory = $_POST["subcategory"]; $description = strip_tags(addslashes($_POST["description"])); 

$seokey = strip_tags($_POST["seokey"]); $seodesc = strip_tags(addslashes($_POST["seodesc"]));

if(empty($productname) || empty($color) || empty($stock) || empty($barcode) || empty($price) || empty($company) || empty($category) || empty($subcategory) || empty($description))
{
  echo '
  <div class="col-12">
  <div class="profile__content">		
  <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
  <div class="profile__meta profile__meta--red">
  <h3><span>Lütfen tüm alanların doldurulduğundan emin olun ve tekrar deneyin.</span></h3>			
  </div>
  </div>
  </div>
  ';
}
elseif (!is_numeric($stock) || !is_numeric($price))
{
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Ürün Stoğu ve Ürün Fiyatı alanları sayısal değerde olmalıdır.</span></h3>			
    </div>
    </div>
    </div>
    ';
}
else
{
    $query = mysqli_query($db,"SELECT * FROM shop_products WHERE token = '$token'"); $data = mysqli_fetch_array($query);

    if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) { $update_image = mysqli_query($db,"UPDATE shop_products SET image = '".$data['image']."' WHERE token = '$token'"); }
    else { $random_image = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image = basename($_FILES['image']['name']); move_uploaded_file($_FILES['image']['tmp_name'],  "../public/images/products/" . $random_image . $image); $rule_image = file_get_contents($_FILES['image']['tmp_name']); $query_image = getimagesize($_FILES['image']['tmp_name']); $update_image = mysqli_query($db,"UPDATE shop_products SET image = '$random_image$image' WHERE token = '$token'"); }

    if(!isset($_FILES['image2']) || $_FILES['image2']['error'] == UPLOAD_ERR_NO_FILE) { $update_image2 = mysqli_query($db,"UPDATE shop_products SET image2 = '".$data['image2']."' WHERE token = '$token'"); }
    else { $random_image2 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image2 = basename($_FILES['image2']['name']); move_uploaded_file($_FILES['image2']['tmp_name'], "../public/images/products/" . $random_image2 . $image2); $rule_image2 = file_get_contents($_FILES['image2']['tmp_name']); $query_image2 = getimagesize($_FILES['image2']['tmp_name']); $update_image2 = mysqli_query($db,"UPDATE shop_products SET image2 = '$random_image2$image2' WHERE token = '$token'");}

    if(!isset($_FILES['image3']) || $_FILES['image3']['error'] == UPLOAD_ERR_NO_FILE) { $update_image3 = mysqli_query($db,"UPDATE shop_products SET image3 = '".$data['image3']."' WHERE token = '$token'"); }
    else { $random_image3 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image3 = basename($_FILES['image3']['name']); move_uploaded_file($_FILES['image3']['tmp_name'], "../public/images/products/" . $random_image3 . $image3); $rule_image3 = file_get_contents($_FILES['image3']['tmp_name']); $query_image3 = getimagesize($_FILES['image3']['tmp_name']); $update_image3 = mysqli_query($db,"UPDATE shop_products SET image3 = '$random_image3$image3' WHERE token = '$token'"); }

    if(!isset($_FILES['image4']) || $_FILES['image4']['error'] == UPLOAD_ERR_NO_FILE) { $update_image4 = mysqli_query($db,"UPDATE shop_products SET image4 = '".$data['image4']."' WHERE token = '$token'"); }
    else { $random_image4 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image4 = basename($_FILES['image4']['name']); move_uploaded_file($_FILES['image4']['tmp_name'], "../public/images/products/" . $random_image4 . $image4); $rule_image4 = file_get_contents($_FILES['image4']['tmp_name']); $query_image4 = getimagesize($_FILES['image4']['tmp_name']); $update_image4 = mysqli_query($db,"UPDATE shop_products SET image4 = '$random_image4$image4' WHERE token = '$token'"); }

    if(!isset($_FILES['image5']) || $_FILES['image5']['error'] == UPLOAD_ERR_NO_FILE) { $update_image5 = mysqli_query($db,"UPDATE shop_products SET image5 = '".$data['image5']."' WHERE token = '$token'"); }
    else { $random_image5 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image5 = basename($_FILES['image5']['name']); move_uploaded_file($_FILES['image5']['tmp_name'], "../public/images/products/" . $random_image5 . $image5); $rule_image5 = file_get_contents($_FILES['image5']['tmp_name']); $query_image5 = getimagesize($_FILES['image5']['tmp_name']); $update_image5 = mysqli_query($db,"UPDATE shop_products SET image5 = '$random_image5$image5' WHERE token = '$token'"); }

    if(!isset($_FILES['image6']) || $_FILES['image6']['error'] == UPLOAD_ERR_NO_FILE) { $update_image6 = mysqli_query($db,"UPDATE shop_products SET image6 = '".$data['image6']."' WHERE token = '$token'"); }
    else { $random_image6 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image6 = basename($_FILES['image6']['name']); move_uploaded_file($_FILES['image6']['tmp_name'], "../public/images/products/" . $random_image6 . $image6); $rule_image6 = file_get_contents($_FILES['image6']['tmp_name']); $query_image6 = getimagesize($_FILES['image6']['tmp_name']); $update_image6 = mysqli_query($db,"UPDATE shop_products SET image6 = '$random_image6$image6' WHERE token = '$token'"); }

    if(!isset($_FILES['image7']) || $_FILES['image7']['error'] == UPLOAD_ERR_NO_FILE) { $update_image7 = mysqli_query($db,"UPDATE shop_products SET image7 = '".$data['image7']."' WHERE token = '$token'"); }
    else { $random_image7 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image7 = basename($_FILES['image7']['name']); move_uploaded_file($_FILES['image7']['tmp_name'], "../public/images/products/" . $random_image7 . $image7); $rule_image7 = file_get_contents($_FILES['image7']['tmp_name']); $query_image7 = getimagesize($_FILES['image7']['tmp_name']); $update_image7 = mysqli_query($db,"UPDATE shop_products SET image7 = '$random_image7$image7' WHERE token = '$token'"); }

    if(!isset($_FILES['image8']) || $_FILES['image8']['error'] == UPLOAD_ERR_NO_FILE) { $update_image8 = mysqli_query($db,"UPDATE shop_products SET image8 = '".$data['image8']."' WHERE token = '$token'"); }
    else { $random_image8 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image8 = basename($_FILES['image8']['name']); move_uploaded_file($_FILES['image8']['tmp_name'], "../public/images/products/" . $random_image8 . $image8); $rule_image8 = file_get_contents($_FILES['image8']['tmp_name']); $query_image8 = getimagesize($_FILES['image8']['tmp_name']); $update_image8 = mysqli_query($db,"UPDATE shop_products SET image8 = '$random_image8$image8' WHERE token = '$token'"); }

    $update_product = mysqli_query($db,"UPDATE shop_products SET productname = '$productname', 

    color = '$color', stock = '$stock', barcode = '$barcode', price = '$price', company = '$company', category = '$category', subcategory = '$subcategory', description = '$description', seokey = '$seokey', seodesc = '$seodesc'  WHERE token = '$token'");

  if($update_product)
  {
      echo '
      <div class="col-12">
      <div class="profile__content">		
      <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
      <div class="profile__meta profile__meta--green">
      <h3><span>Ürün güncelleme işleminiz başarıyla tamamlanmıştır.</span></h3>			
      </div>
      </div>
      </div>
      ';
  }
  else
  {
      echo '
      <div class="col-12">
      <div class="profile__content">		
      <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
      <div class="profile__meta profile__meta--green">
      <h3><span>Ürün güncelleme işleminz sırasında bir hata oluştu, lütfen tekrar deneyin.</span></h3>			
      </div>
      </div>
      </div>
      ';
    }
  }
}

?>