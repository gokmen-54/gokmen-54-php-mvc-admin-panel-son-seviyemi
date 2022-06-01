<?php 
if(empty($_GET["token"])) { echo '<script type="text/javascript">window.history.go(-1)</script>'; } else { $token_blog = $_GET["token"]; }

if(isset($_POST["update"])){

    $title = strip_tags($_POST["title"]);

    $blog = $_POST["blog"];

    $seodesc = strip_tags($_POST["seodesc"]);

    $seokey = strip_tags($_POST["seokey"]);


    $query_blog = mysqli_query($db,"SELECT * FROM shop_blog WHERE title = '$title'");


        if(empty($title) || empty($blog))
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

            $query_blog = mysqli_query($db,"SELECT * FROM shop_blog WHERE token = '$token_blog'"); $data_blog = mysqli_fetch_array($query_blog);


            if(!isset($_FILES['image']) || $_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) { $update_image = mysqli_query($db,"UPDATE shop_blog SET image = '".$data_blog['image']."' WHERE token = '$token_blog'"); }  
            else { $random_image = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image = basename($_FILES['image']['name']); move_uploaded_file($_FILES['image']['tmp_name'],  "../public/images/blog/" . $random_image . $image); $rule_image = file_get_contents($_FILES['image']['tmp_name']); $query_image = getimagesize($_FILES['image']['tmp_name']); $update_image = mysqli_query($db,"UPDATE shop_blog SET image = '$random_image$image' WHERE token = '$token_blog'"); }
                
        
            $update_blog = mysqli_query($db,"UPDATE shop_blog SET title = '$title', blog = '$blog', seodesc = '$seodesc', seokey = '$seokey' WHERE token = '$token_blog'");

            if($update_blog)
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
                <div class="profile__meta profile__meta--green">
                <h3><span>Blog başarıyla güncellendi.</span></h3>			
                </div>
                </div>
                </div>';
                          
                
            }
            else 
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Blog güncellenemedi, lütfen tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>';

            }
        }     
    }


else
{
    /* Butona basılmadığında yapılacak işlemler */ 
}


?>