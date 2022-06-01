<?php
    if(isset($_POST["add"]))
    {
        $company = strip_tags($_POST["company"]); $owner = strip_tags(mb_strtoupper($_POST["owner"])); $phone = $_POST["phone"]; $email = strip_tags($_POST["email"]); $adress = strip_tags(addslashes($_POST["adress"]));
        
        $website = strip_tags($_POST["website"]); $facebook = strip_tags($_POST["facebook"]); $twitter = strip_tags($_POST["twitter"]); $instagram = strip_tags($_POST["instagram"]);

        function seflink($link)
        {

            $link = mb_strtolower($link, 'UTF8');

            $link = str_replace(['ı', 'ş', 'ü', 'ğ', 'ç', 'ö', 'I', 'İ', 'Ş', 'Ü', 'Ğ', 'Ç', 'Ö'], ['i', 's', 'u', 'g', 'c', 'o', 'i', 'i', 's', 'u', 'g', 'c', 'o'], $link);

            $link = preg_replace('/[^a-z0-9]/', '-', $link);

            $link = preg_replace('/-+/', '-', $link);

            return trim($link, '-');

        }

        $query_company = mysqli_query($db,"SELECT * FROM shop_companies WHERE company = '$company'");

        $data_company = mysqli_fetch_array($query_company,MYSQLI_ASSOC);

        if($data_company == 0)
        {
            if(empty($company))
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Bayi Adı ve Ünvanı alanı boş bırakılamaz, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            elseif (!is_numeric($phone))
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Bayi Telefon Numarası alanı sayısal değerde olmalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else if(strlen($phone) != 11)
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Bayi Telefon Numarası alanı 11 haneden oluşmalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else if (substr($phone, 0, 1) != 0)
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Bayi Telefon Numarası alanı 0 ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else if(!empty($website) && !preg_match_all("/http/",$website))
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Firma Web Sitesi alanı http:// veya https:// ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else if(!empty($website) && !preg_match_all("/com/",$website) && !preg_match_all("/net/",$website) && !preg_match_all("/org/",$website))
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Firma Web Sitesi alanı .com , .net , veya .org  içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else if(!empty($facebook) && !preg_match_all("/http/",$facebook))
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Firma Facebook Sitesi alanı http:// veya https:// ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else if(!empty($facebook) && !preg_match_all("/com/",$facebook) && !preg_match_all("/net/",$facebook) && !preg_match_all("/org/",$facebook)){
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Firma Facebook Sitesi alanı .com , .net , veya .org  içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            } 
            else if(!empty($twitter) && !preg_match_all("/http/",$twitter))
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Firma Twitter Sitesi alanı http:// veya https:// ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else if(!empty($twitter) && !preg_match_all("/com/",$twitter) && !preg_match_all("/net/",$twitter) && !preg_match_all("/org/",$twitter)){
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Firma Twitter Sitesi alanı .com , .net , veya .org  içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            } 
            else if(!empty($instagram) && !preg_match_all("/http/",$instagram))
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Firma Instagram Sitesi alanı http:// veya https:// ile başlamalıdır, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            else if(!empty($instagram) && !preg_match_all("/com/",$instagram) && !preg_match_all("/net/",$instagram) && !preg_match_all("/org/",$instagram)){
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>Firma Instagram Sitesi alanı .com , .net , veya .org  içermelidir, lütfen gerekli alanı düzenleyip tekrar deneyin.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
            
            else
            {
                if($_FILES['logo']['size'] == 0 || empty($_FILES['logo']['tmp_name'])) 
                { 
                    echo '
                    <div class="col-12">
                    <div class="profile__content">		
                    <div class="profile__avatar"><img src="public/img/info.png" alt="info"></div>
                    <div class="profile__meta">
                    <h3><span style="color: #FFA500;">Firma Logosu eklenmedi, bu işlemi daha sonra Firma Yönetimi paneli altından yapabilirsiniz.</span></h3>			
                    </div>
                    </div>
                    </div>
                    ';
                }
                else 
                { 
                    $random_logo = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $logo = basename($_FILES['logo']['name']); move_uploaded_file($_FILES['logo']['tmp_name'],  "../public/images/company/" . $random_logo . $logo); $rule_logo = file_get_contents($_FILES['logo']['tmp_name']); $query_logo = getimagesize($_FILES['logo']['tmp_name']); 
                }
        
                if($_FILES['banner']['size'] == 0 || empty($_FILES['banner']['tmp_name'])) 
                { 
                    echo '
                    <div class="col-12">
                    <div class="profile__content">		
                    <div class="profile__avatar"><img src="public/img/info.png" alt="info"></div>
                    <div class="profile__meta">
                    <h3><span style="color: #FFA500;">Firma Banner Fotoğrafı eklenmedi, bu işlemi daha sonra Firma Yönetimi paneli altından yapabilirsiniz.</span></h3>			
                    </div>
                    </div>
                    </div>
                    ';
                }
                else 
                { 
                    $random_banner = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19); $banner = basename($_FILES['banner']['name']); move_uploaded_file($_FILES['banner']['tmp_name'], "../public/images/company/" . $random_banner . $banner); $rule_banner = file_get_contents($_FILES['banner']['tmp_name']); $query_banner = getimagesize($_FILES['banner']['tmp_name']); 
                }

                $link = seflink($_POST["company"]);
        
                $create_file = touch("../company/$link.php");
        
                $open_file = fopen("../company/$link.php", "w");
        
                fwrite($open_file, "<?php include('../Controllers/CompanyController.php'); ?>");
            
                fclose($open_file);
        
                $add_company = mysqli_query($db,"INSERT INTO shop_companies (logo, banner, company, owner, phone, email, adress, website, facebook, twitter, instagram, url, date, time, view, buy, token) VALUES ('$random_logo$logo', '$random_banner$banner', '$company', '$owner', '$phone', '$email', '$adress', '$website', '$facebook', '$twitter', '$instagram', '$link.php', '$date', '$time', '', '', '$token')");

                if($add_company)
                {
                    echo '
                    <div class="col-12">
                    <div class="profile__content">		
                    <div class="profile__avatar"><img src="public/img/success.png" alt="info"></div>
                    <div class="profile__meta profile__meta--green">
                    <h3><span>Firma ekleme işleminiz başarıyla tamamlanmıştır.</span></h3>			
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
                    <h3><span>Firma ekleme işleminz sırasında bir hata oluştu, lütfen tekrar deneyin.</span></h3>			
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
            <h3><span>Bu Firma zaten daha önceden eklenmiş.</span></h3>			
            </div>
            </div>
            </div>
            ';
        }
    }
    ?>