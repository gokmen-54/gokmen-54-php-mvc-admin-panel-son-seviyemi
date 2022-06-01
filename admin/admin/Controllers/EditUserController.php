    
<?php

if(empty($_GET["token"])) { echo '<script type="text/javascript">window.history.go(-1)</script>'; } else { $token = $_GET["token"]; }

if(isset($_POST["update"]))
{
$company = strip_tags($_POST["company"]); $email = strip_tags($_POST["email"]); $phone = strip_tags($_POST["phone"]); $date = strip_tags($_POST["date"]); $time = strip_tags($_POST["time"]);


if(empty($company) || empty($email) || empty($phone) || empty($date) || empty($time) )
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
elseif (!is_numeric($phone))
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
else
{
    $query = mysqli_query($db,"SELECT * FROM shop_users WHERE token = '$token'"); $data = mysqli_fetch_array($query);

    $update_company = mysqli_query($db,"UPDATE shop_users SET company = '$company', email = '$email', phone = '$phone', date = '$date', time = '$time' WHERE token = '$token'");

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