<?php
if(isset($_POST['addsubcategory']))
{
    $categoryname = $_POST['categoryname'];
    
    $subcategoryname = $_POST['subcategoryname'];


    
    $query_product = mysqli_query($db,"SELECT * FROM shop_subcategories WHERE subcategoryname = '$subcategoryname'");

    $data_product = mysqli_fetch_array($query_product,MYSQLI_ASSOC);

    if($data_product == 0)
    {
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
            $add_subcategory = mysqli_query($db,"INSERT INTO shop_subcategories (categoryname, subcategoryname, token) VALUES ('$categoryname','$subcategoryname', '$token')");

            if($add_subcategory)
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

}




?>