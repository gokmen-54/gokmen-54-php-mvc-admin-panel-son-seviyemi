<?php
if(isset($_POST['addcategory']))
{

    $categoryname = $_POST['categoryname'];

    $add_category = mysqli_query($db,"SELECT * FROM shop_categories WHERE categoryname = '$categoryname'");

    $data_category = mysqli_fetch_array($add_category,MYSQLI_ASSOC);

    if($data_category == 0)
    {
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
            $add_category = mysqli_query($db,"INSERT INTO shop_categories (categoryname, token) VALUES ('$categoryname' , '$token')");

            if($add_category)
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
                <div class="profile__meta profile__meta--green">
                <h3><span>Kategori başarıyla eklendi.</span></h3>			
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
                <h3><span>Kategori eklenemedi. Lütfen tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
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
        <h3><span>Bu kategori zaten var.</span></h3>			
        </div>
        </div>
        </div>
        ';
    }




}




?>