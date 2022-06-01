<?php
    if(isset($_POST["add"]))
    {
        $productname = strip_tags($_POST["productname"]); $color = strip_tags($_POST["color"]); $stock = $_POST['stock']; $barcode = strip_tags($_POST["barcode"]); $price = $_POST['price'];

        $company = $_POST["company"]; $categoryname = $_POST["categoryname"]; $subcategoryname = $_POST["subcategoryname"]; $description = strip_tags(addslashes($_POST["description"])); 
        
        $seokey = strip_tags($_POST["seokey"]); $seodesc = strip_tags(addslashes($_POST["seodesc"]));

        function seflink($link)
        {

            $link = mb_strtolower($link, 'UTF8');

            $link = str_replace(['ı', 'ş', 'ü', 'ğ', 'ç', 'ö',], ['i', 's', 'u', 'g', 'c', 'o',], $link);

            $link = preg_replace('/[^a-z0-9]/', '-', $link);

            $link = preg_replace('/-+/', '-', $link);

            return trim($link, '-');

        }

        $query_product = mysqli_query($db,"SELECT * FROM shop_products WHERE barcode = '$barcode'");

        $data_product = mysqli_fetch_array($query_product,MYSQLI_ASSOC);

        if($data_product == 0)
        {
            if(empty($productname) || empty($color) || empty($stock) || empty($barcode) || empty($price) || empty($company) || empty($categoryname) || empty($subcategoryname) || empty($description))
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
            elseif (!is_numeric($stock) || !is_numeric($price))
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Ürün Stoğu ve Ürün Fiyatı alanları sayısal değerde olmalıdır.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else
            {
                if($_FILES['image']['size'] == 0 || empty($_FILES['image']['tmp_name'])) { }
                else { $random_image = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image = basename($_FILES['image']['name']); move_uploaded_file($_FILES['image']['tmp_name'],  "../public/images/products/" . $random_image . $image); $rule_image = file_get_contents($_FILES['image']['tmp_name']); $query_image = getimagesize($_FILES['image']['tmp_name']); }
        
                if($_FILES['image2']['size'] == 0 || empty($_FILES['image2']['tmp_name'])) { }
                else { $random_image2 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image2 = basename($_FILES['image2']['name']); move_uploaded_file($_FILES['image2']['tmp_name'], "../public/images/products/" . $random_image2 . $image2); $rule_image2 = file_get_contents($_FILES['image2']['tmp_name']); $query_image2 = getimagesize($_FILES['image2']['tmp_name']); }
        
                if($_FILES['image3']['size'] == 0 || empty($_FILES['image3']['tmp_name'])) { }
                else { $random_image3 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image3 = basename($_FILES['image3']['name']); move_uploaded_file($_FILES['image3']['tmp_name'], "../public/images/products/" . $random_image3 . $image3); $rule_image3 = file_get_contents($_FILES['image3']['tmp_name']); $query_image3 = getimagesize($_FILES['image3']['tmp_name']); }
        
                if($_FILES['image4']['size'] == 0 || empty($_FILES['image4']['tmp_name'])) { }
                else { $random_image4 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image4 = basename($_FILES['image4']['name']); move_uploaded_file($_FILES['image4']['tmp_name'], "../public/images/products/" . $random_image4 . $image4); $rule_image4 = file_get_contents($_FILES['image4']['tmp_name']); $query_image4 = getimagesize($_FILES['image4']['tmp_name']); }
        
                if($_FILES['image5']['size'] == 0 || empty($_FILES['image5']['tmp_name'])) { }
                else { $random_image5 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image5 = basename($_FILES['image5']['name']); move_uploaded_file($_FILES['image5']['tmp_name'], "../public/images/products/" . $random_image5 . $image5); $rule_image5 = file_get_contents($_FILES['image5']['tmp_name']); $query_image5 = getimagesize($_FILES['image5']['tmp_name']); }
        
                if($_FILES['image6']['size'] == 0 || empty($_FILES['image6']['tmp_name'])) { }
                else { $random_image6 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image6 = basename($_FILES['image6']['name']); move_uploaded_file($_FILES['image6']['tmp_name'], "../public/images/products/" . $random_image6 . $image6); $rule_image6 = file_get_contents($_FILES['image6']['tmp_name']); $query_image6 = getimagesize($_FILES['image6']['tmp_name']); }
        
                if($_FILES['image7']['size'] == 0 || empty($_FILES['image7']['tmp_name'])) { }
                else { $random_image7 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image7 = basename($_FILES['image7']['name']); move_uploaded_file($_FILES['image7']['tmp_name'], "../public/images/products/" . $random_image7 . $image7); $rule_image7 = file_get_contents($_FILES['image7']['tmp_name']); $query_image7 = getimagesize($_FILES['image7']['tmp_name']); }
        
                if($_FILES['image8']['size'] == 0 || empty($_FILES['image8']['tmp_name'])) { }
                else { $random_image8 = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $image8 = basename($_FILES['image8']['name']); move_uploaded_file($_FILES['image8']['tmp_name'], "../public/images/products/" . $random_image8 . $image8); $rule_image8 = file_get_contents($_FILES['image8']['tmp_name']); $query_image8 = getimagesize($_FILES['image8']['tmp_name']); }

                $link = seflink($_POST["productname"]);
        
                $create_file = touch("../$link-$token.php");
        
                $open_file = fopen("../$link-$token.php", "w");
        
                fwrite($open_file, "<?php include('Controllers/ProductDetailsController.php'); ?>");
            
                fclose($open_file);

                $add_product = mysqli_query($db,"INSERT INTO shop_products (image, image2, image3, image4, image5, image6, image7, image8, productname, color, stock, barcode, price, company, category, subcategory, description, seokey, seodesc, url, date, time, view, buy, token) VALUES ('$random_image$image', '$random_image2$image2', '$random_image3$image3', '$random_image4$image4', '$random_image5$image5', '$random_image6$image6', '$random_image7$image7', '$random_image8$image8', '$productname', '$color', '$stock', '$barcode', '$price', '$company', '$categoryname', '$subcategoryname', '$description', '$seokey', '$seodesc', '$link-$token.php', '$date', '$time', '', '', '$token' )");

                if($add_product)
                {
                    echo '
                    <div class="col-12">
                    <div class="profile__content">		
                    <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
                    <div class="profile__meta profile__meta--green">
                    <h3><span>Ürün ekleme işleminiz başarıyla tamamlanmıştır.</span></h3>			
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
                    <h3><span>Ürün ekleme işleminz sırasında bir hata oluştu, lütfen tekrar deneyin.</span></h3>			
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
            <h3><span>Bu ürün zaten daha önceden eklenmiş.</span></h3>			
            </div>
            </div>
            </div>
            ';
        }
    }
    ?>