<?php 
if(empty($_GET["token"])) { echo '<script type="text/javascript">window.history.go(-1)</script>'; } else { $token_sec = $_GET["token"]; }

if(isset($_POST["update2"])){

    $company = strip_tags($_POST["company"]);
    $enddate = date("d.m.Y",strtotime($_POST["enddate"]));
    $description = strip_tags(addslashes($_POST["description"]));

    if(empty($company) || empty($enddate) || empty($description))
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
    else{
        $query_ads = mysqli_query($db,"SELECT * FROM shop_sectionads WHERE token = '$token_sec'"); $data_ads = mysqli_fetch_array($query_ads);

        if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) { $update_image = mysqli_query($db,"UPDATE shop_storyads SET image = '".$data_ads['image']."' WHERE token = '$token_ads'"); }  
        else { $random_image = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image = basename($_FILES['image']['name']); move_uploaded_file($_FILES['image']['tmp_name'],  "../public/images/ads/" . $random_image . $image); $rule_image = file_get_contents($_FILES['image']['tmp_name']); $query_image = getimagesize($_FILES['image']['tmp_name']); $update_image = mysqli_query($db,"UPDATE shop_sectionads SET image = '$random_image$image' WHERE token = '$token_sec'"); }

        $update_ads = mysqli_query($db,"UPDATE shop_sectionads SET company = '$company', enddate = '$enddate', description = '$description' WHERE token = '$token_sec'");

        if($update_ads)
        {
            echo '
            <div class="col-12">
            <div class="profile__content">		
            <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
            <div class="profile__meta profile__meta--green">
            <h3><span>Reklam başarıyla güncellendi.</span></h3>			
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
            <div class="profile__meta profile__meta--red">
            <h3><span>Reklam güncellenirken bir hata oluştu. Lütfen tekrar deneyin.</span></h3>			
            </div>
            </div>
            </div>
            ';
        }
    }


}
?>