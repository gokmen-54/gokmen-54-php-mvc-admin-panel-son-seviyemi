<?php

if(isset($_POST["add"]))
{

    $company = $_POST['company'];
    $startdate = date("d.m.Y");
    $enddate = date("d.m.Y",strtotime($_POST["enddate"]));
    $description = strip_tags(addslashes($_POST["description"]));

    $query_ads = mysqli_query($db,"SELECT * FROM shop_storyads WHERE company = '$company'");

    $data_ads = mysqli_fetch_array($query_ads,MYSQLI_ASSOC);

    
    if($data_ads == 0){
        if(empty($company) || empty($enddate))
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
            
            if($_FILES['image']['size'] == 0 || empty($_FILES['image']['tmp_name'])) { }
            else { $random_ads = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $ads = basename($_FILES['image']['name']); move_uploaded_file($_FILES['image']['tmp_name'],  "../public/images/ads/" . $random_ads . $ads); $rule_ads = file_get_contents($_FILES['image']['tmp_name']); $query_ads = getimagesize($_FILES['image']['tmp_name']); }

            $add_ads = mysqli_query($db,"INSERT INTO shop_storyads (image, company, startdate, enddate, description, view ,token) VALUES ('$random_ads$ads', '$company', '$startdate', '$enddate', '$description', '$view', '$token')");

            if($add_ads){
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
                <div class="profile__meta profile__meta--green">
                <h3><span>Reklam başarıyla eklendi.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else{
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Reklam eklenemedi. Lütfen tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
        }

    }
    else{
        echo '
        <div class="col-12">
        <div class="profile__content">		
        <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
        <div class="profile__meta profile__meta--red">
        <h3><span>Bu reklam zaten var.</span></h3>			
        </div>
        </div>
        </div>
        ';
    }
}

?>



