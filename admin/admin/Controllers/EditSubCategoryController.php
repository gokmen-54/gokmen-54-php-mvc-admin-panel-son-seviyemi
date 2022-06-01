<?php 
if(empty($_GET["token"])) { echo '<script type="text/javascript">window.history.go(-1)</script>'; } else { $token = $_GET["token"]; }

if(isset($_POST['updatesub'])){
    
$categoryname = strip_tags($_POST['categoryname']);

$subcategoryname = strip_tags($_POST['subcategoryname']);

if(empty($categoryname) || empty($subcategoryname))
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
    $update_subcategory = mysqli_query($db,"UPDATE shop_subcategories SET categoryname ='$categoryname', subcategoryname = '$subcategoryname' WHERE token = '$token'");

    if($update_subcategory)
    {
        echo '
        <div class="col-12">
        <div class="profile__content">		
        <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
        <div class="profile__meta profile__meta--green">
        <h3><span>Alt Kategori güncelleme işleminiz başarıyla tamamlanmıştır.</span></h3>			
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