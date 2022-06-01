<?php 
if(empty($_GET["token"])) { echo '<script type="text/javascript">window.history.go(-1)</script>'; } else { $token = $_GET["token"]; }

if(isset($_POST['update'])){

$categoryname = strip_tags($_POST['categoryname']);

if(empty($categoryname))
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
else
{ 
    $update_category = mysqli_query($db,"UPDATE shop_categories SET categoryname = '$categoryname' WHERE token = '$token'");

    if($update_category)
    {
        echo '
        <div class="col-12">
        <div class="profile__content">		
        <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
        <div class="profile__meta profile__meta--green">
        <h3><span>Kategori güncelleme işleminiz başarıyla tamamlanmıştır.</span></h3>			
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
        <h3><span>Kategori güncelleme işleminiz sırasında bir hata oluştu, lütfen tekrar deneyin.</span></h3>			
        </div>
        </div>
        </div>
        ';
    }
}

}
?>