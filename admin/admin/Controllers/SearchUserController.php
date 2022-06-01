<?php

    if(isset($_POST["search"]))
    {
        $company = $_POST["company"];


        if(empty($company))
        {
            echo '
            <div class="col-12">
            <div class="profile__content">		
            <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
            <div class="profile__meta profile__meta--red">
            <h3><span>Bayi arama formu boş bırakılamaz.</span></h3>			
            </div>
            </div>
            </div>
            ';
        }
        else if(!empty($company))
        {
            $query_search = mysqli_query($db,"SELECT * FROM shop_users WHERE company LIKE '%$company%' ORDER BY token DESC");
            

            if(mysqli_num_rows($query_search) > 0)
            {
                while($data_search = mysqli_fetch_array($query_search))
                {
                    error_reporting(0);
                    
                    $table .= '
                    <tbody>
                    <tr>
                    <td>
                    <div class="main__table-text">'.$data_search['company'].'</div>
                    </td>
                    <td>
                    <div class="main__table-text">'.$data_search['email'].'</div>
                    </td>
                    <td>
                    <div class="main__table-text">'.$data_search['phone'].'</div>
                    </td>
                    <td>
                    <div class="main__table-text">'.$data_search['date'].'</div>
                    </td>
                    <td>
                    <div class="main__table-text">'.$data_search['time'].'</div>
                    </td>
                    <td>

                    <div class="main__table-btns" style="background-color: #212028;">
                    <a href="https://turkmahallshop.com/public/uploads/'.$data_search['file'].'" target="_blank" class="main__table-btn main__table-btn--view" title="Bayi Görüntüle">
                    <i class="icon ion-ios-eye"></i>
                    </a>
                    <a href="edit-user?token='.$data_search['token'].'" class="main__table-btn main__table-btn--edit" title="Firma Düzenle">
                    <i class="icon ion-ios-create"></i>
                    </a>
                    <a href="#modal-delete-'.$data_search['token'].'" class="main__table-btn main__table-btn--delete open-modal" title="Bayi Kaldır">
                    <i class="icon ion-ios-trash"></i>
                    </a>
                    </td>
                    </tr>
                    </tbody>
                                
                    </div>               
                    
                    <!-- KULLANICIYI KALDIR -->
                    <div id="modal-delete-'.($data_search['token']).'" class="zoom-anim-dialog mfp-hide modal">
                    <h6 class="modal__title">Bayi Kaldır</h6>
                    <p class="modal__text">Bu Bayiyi kaldırmak istediğinizden emin misiniz ?</p>
                    <div class="modal__btns">                                  
                    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='."'delete-product?token="."".$data_search['token']."'".'">Kaldır</button>
                    <button type="button" class="modal__btn modal__btn--dismiss">İptal</button>
                    </div>
                    </div>
                    <!-- KULLANICIYI KALDIR -->
                    ';
                    
                } 
            }
            else
            {
                echo '
                <div class="col-12">
                <div class="profile__content">		
                <div class="profile__avatar"><img src="public/img/error.png" alt="info"></div>
                <div class="profile__meta profile__meta--red">
                <h3><span>"'.$company.'" aramanıza uygun bayi bulunamadı.</span></h3>			
                </div>
                </div>
                </div>
                ';
            }
        }
        
    }
 
?>