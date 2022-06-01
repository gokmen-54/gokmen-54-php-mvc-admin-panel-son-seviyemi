<?php
if(isset($_POST["add2"])){

    $company2 = $_POST['company2'];
    $startdate2 = date("d.m.Y");
    $enddate2 = date("d.m.Y",strtotime($_POST["enddate2"]));
    $description2 = strip_tags(addslashes($_POST["description2"]));

    $query_ads2 = mysqli_query($db,"SELECT * FROM shop_sectionads WHERE company = '$company2'");

    $data_ads2 = mysqli_fetch_array($query_ads2,MYSQLI_ASSOC);

    
    if($data_ads2 == 0){
        if(empty($company2) || empty($enddate2))
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
            
            if($_FILES['image2']['size'] == 0 || empty($_FILES['image2']['tmp_name'])) { }
            else { $random_ads2 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $ads2 = basename($_FILES['image2']['name']); move_uploaded_file($_FILES['image2']['tmp_name'],  "../public/images/ads/" . $random_ads2 . $ads2); $rule_ads2 = file_get_contents($_FILES['image2']['tmp_name']); $query_ads2 = getimagesize($_FILES['image2']['tmp_name']); }

            $add_ads2 = mysqli_query($db,"INSERT INTO shop_sectionads (image, company, startdate, enddate, description, view ,token) VALUES ('$random_ads2$ads2', '$company2', '$startdate2', '$enddate2', '$description2', '$view2', '$token')");

            if($add_ads2){
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
                <div class="profile__meta profile__meta--green">
                <h3><span>Section reklamı başarıyla eklendi.</span></h3>			
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
                <h3><span>Section reklamı eklenemedi. Lütfen tekrar deneyin.</span></h3>			
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

