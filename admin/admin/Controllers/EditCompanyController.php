    
<?php

if(empty($_GET["token"])) { echo '<script type="text/javascript">window.history.go(-1)</script>'; } else { $token = $_GET["token"]; }

if(isset($_POST["update"]))
{
$company = strip_tags($_POST["company"]); $owner = strip_tags($_POST["owner"]); $phone = $_POST['phone']; $email = strip_tags($_POST["email"]); $adress = strip_tags(addslashes($_POST["adress"]));

$website = strip_tags($_POST["website"]); $facebook = strip_tags($_POST["facebook"]); $twitter = strip_tags($_POST["twitter"]); $instagram = strip_tags($_POST["instagram"]); 


if(empty($company) || empty($owner) || empty($phone) || empty($email) || empty($adress) )
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
else if(!is_numeric($phone))
{
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Telefon alanları sayısal değerde olmalıdır.</span></h3>			
    </div>
    </div>
    </div>
    ';
}
else if (!preg_match_all("/@/",$email))
{
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Kullanıcı E-Mail Adresi alanı @ işareti içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
}
else if(!empty($website) && !preg_match_all("/http/",$website))
{
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Firma Web Sitesi alanı http:// veya https:// ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
}
else if(!empty($website) && !preg_match_all("/com/",$website) && !preg_match_all("/net/",$website) && !preg_match_all("/org/",$website))
{
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Firma Web Sitesi alanı .com , .net , veya .org  içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
}
else if(!empty($facebook) && !preg_match_all("/http/",$facebook))
{
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Firma Facebook Sitesi alanı http:// veya https:// ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
}
else if(!empty($facebook) && !preg_match_all("/com/",$facebook) && !preg_match_all("/net/",$facebook) && !preg_match_all("/org/",$facebook)){
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Firma Facebook Sitesi alanı .com , .net , veya .org  içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
} 
else if(!empty($twitter) && !preg_match_all("/http/",$twitter))
{
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Firma Twitter Sitesi alanı http:// veya https:// ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
}
else if(!empty($twitter) && !preg_match_all("/com/",$twitter) && !preg_match_all("/net/",$twitter) && !preg_match_all("/org/",$twitter)){
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Firma Twitter Sitesi alanı .com , .net , veya .org  içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
} 
else if(!empty($instagram) && !preg_match_all("/http/",$instagram))
{
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Firma Instagram Sitesi alanı http:// veya https:// ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
}
else if(!empty($instagram) && !preg_match_all("/com/",$instagram) && !preg_match_all("/net/",$instagram) && !preg_match_all("/org/",$instagram)){
    echo '
    <div class="col-12">
    <div class="profile__content">		
    <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
    <div class="profile__meta profile__meta--red">
    <h3><span>Firma Instagram Sitesi alanı .com , .net , veya .org  içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
    </div>
    </div>
    </div>
    ';
} 
else
{
    $query = mysqli_query($db,"SELECT * FROM shop_companies WHERE token = '$token'"); $data = mysqli_fetch_array($query);

    if(!isset($_FILES['logo']) || $_FILES['logo']['error'] == UPLOAD_ERR_NO_FILE) { $update_logo = mysqli_query($db,"UPDATE shop_companies SET logo = '".$data['logo']."' WHERE token = '$token'"); }
    else { $random_logo = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $logo = basename($_FILES['logo']['name']); move_uploaded_file($_FILES['logo']['tmp_name'],  "../public/images/company/" . $random_logo . $logo); $rule_logo = file_get_contents($_FILES['logo']['tmp_name']); $query_logo = getimagesize($_FILES['logo']['tmp_name']); $update_logo = mysqli_query($db,"UPDATE shop_companies SET logo = '$random_logo$logo' WHERE token = '$token'"); }


    if(!isset($_FILES['banner']) || $_FILES['banner']['error'] == UPLOAD_ERR_NO_FILE) { $update_banner = mysqli_query($db,"UPDATE shop_companies SET banner = '".$data['banner']."' WHERE token = '$token'"); }
    else { $random_banner = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $banner = basename($_FILES['banner']['name']); move_uploaded_file($_FILES['banner']['tmp_name'], "../public/images/company/" . $random_banner . $banner); $rule_banner = file_get_contents($_FILES['banner']['tmp_name']); $query_banner = getimagesize($_FILES['banner']['tmp_name']); $update_banner = mysqli_query($db,"UPDATE shop_companies SET banner = '$random_banner$banner' WHERE token = '$token'");}

    $update_company = mysqli_query($db,"UPDATE shop_companies SET company = '$company', owner = '$owner', phone = '$phone', email = '$email', adress = '$adress', website = '$website', facebook = '$facebook', twitter = '$twitter', instagram = '$instagram' WHERE token = '$token'");

    if($update_company)
    {
        echo '
        <div class="col-12">
        <div class="profile__content">		
        <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
        <div class="profile__meta profile__meta--green">
        <h3><span>Firma güncelleme işleminiz başarıyla tamamlanmıştır.</span></h3>			
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
        <h3><span>Firma güncelleme işleminz sırasında bir hata oluştu, lütfen tekrar deneyin.</span></h3>			
        </div>
        </div>
        </div>
        ';
        }
    }
}

?>