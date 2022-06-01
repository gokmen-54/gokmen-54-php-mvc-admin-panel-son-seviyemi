<?php 

if(isset($_POST['add']))
{
    $title = $_POST["title"];

    $blog = addslashes($_POST["blog"]);
    
    $seodesc = addslashes($_POST["seodesc"]);

    $seokey = $_POST["seokey"];



    function seflink($link)
    {

        $link = mb_strtolower($link, 'UTF8');

        $link = str_replace(['ı', 'ş', 'ü', 'ğ', 'ç', 'ö',], ['i', 's', 'u', 'g', 'c', 'o',], $link);

        $link = preg_replace('/[^a-z0-9]/', '-', $link);

        $link = preg_replace('/-+/', '-', $link);

        return trim($link, '-');

    }

    $query_blog = mysqli_query($db,"SELECT * FROM shop_blog WHERE title = '$title'");

    $data_blog = mysqli_fetch_array($query_blog);

    if($data_blog == 0)
    {

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

            if($_FILES['image']['size'] == 0 || empty($_FILES['image']['tmp_name'])) { }
            else { $random_image = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image = basename($_FILES['image']['name']); move_uploaded_file($_FILES['image']['tmp_name'],  "../public/images/blog/" . $random_image . $image); $rule_image = file_get_contents($_FILES['image']['tmp_name']); $query_image = getimagesize($_FILES['image']['tmp_name']); }
            
            $link = seflink($_POST["title"]);
        
            $create_file = touch("../blog/$link-$token.php");
        
            $open_file = fopen("../blog/$link-$token.php", "w");
        
            fwrite($open_file, "<?php include('../Controllers/BlogDetailsController.php'); ?>");
            
            fclose($open_file);

            $add_blog = mysqli_query($db,"INSERT INTO shop_blog (image, title, blog, seokey, seodesc, url, date, time, view, token) VALUES ('$random_image$image', '$title' ,'$blog' ,'$seokey','$seodesc', '$link-$token.php', '$date', '$time', '', '$token')");

            if($add_blog)
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
                <div class="profile__meta profile__meta--green">
                <h3><span>Blog başarıyla eklendi.</span></h3>			
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
                <h3><span>Blog eklenemedi. Lütfen tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>';

            }
        }     
    }
    else
    {
        echo '
        <div class="col-12">
        <div class="profile__content">		
        <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
        <div class="profile__meta profile__meta--red">
        <h3><span>Bu isimde daha önceden eklenen bir blog mevcut.</span></h3>			
        </div>
        </div>
        </div>
        ';
    }
}
else
{
    /* Butona basılmadığında yapılacak işlemler */ 
}

?>
