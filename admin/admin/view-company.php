<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Firmaları Görüntüle - Web Yönetim Paneli Türkmahall Shop</title>
</head>
<body>
    <!-- MENU -->
    <?php include("resources/views/menu.php"); ?>
    <!-- /MENU -->

	<!-- MAIN CONTENT -->
	<main class="main">
    <div class="container-fluid">
    <div class="row">

    <!-- MAIN TITLE -->
    <div class="col-12">
    <div class="main__title">
    <h2>Firma Görüntüle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
    
    <div class="col-12 text-center">
    <div class="main__table-wrap">
    <table class="main__table">
    <thead>
    <tr>
    <th>Firma Adı Ve Ünvanı</th>
    <th>Firma Sahibinin Adı Soyadı</th>
    <th>Telefon Numarası</th>
    <th>Email Adresi</th>
    <th>Açık Adresi</th>
    <th>Web Sitesi</th>
    <th>Facebook Linki</th>
    <th>Twitter Linki</th>
    <th>Instagram Linki</th>
    <th>Firma İşlemleri</th>
    </tr>
    </thead>

    <?php $query_company = mysqli_query($db, "SELECT * FROM shop_companies ORDER by id DESC LIMIT 100"); while($data_company = mysqli_fetch_array($query_company)) { ?>
    <tbody>	
    <tr>
    <td>
    <div class="main__table-text"><?php echo $data_company['company']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo mb_strtoupper($data_company['owner']); ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_company['phone']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_company['email']; ?></div>
    </td>
    <td>
    <div class="main__table-text"  title="<?php echo $data_company['adress']; ?>"><?php if(strlen($data_company['adress']) < 25) { echo $data_company['adress']; } else { echo substr($data_company['adress'], 0 , 25) . "..."; } ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_company['website']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_company['facebook']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_company['twitter']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_company['instagram']; ?></div>
    </td>
    <td>
    <div class="main__table-btns">
    <a href="https://turkmahallshop.com/company/<?php echo substr($data_company['url'],0 , -4); ?>" target="_blank" class="main__table-btn main__table-btn--view" title="Firma Görüntüle">
    <i class="icon ion-ios-eye"></i>
    </a>
    <a href="edit-company?token=<?php echo $data_company['token']; ?>" class="main__table-btn main__table-btn--edit" title="Firma Düzenle">
    <i class="icon ion-ios-create"></i>
    </a>
    <a href="#modal-delete-<?php echo $data_company['token']; ?>" class="main__table-btn main__table-btn--delete open-modal" title="Firma Kaldır">
    <i class="icon ion-ios-trash"></i>
    </a>
    </td>
    </tr>
    </tbody>

    <div id="modal-delete-<?php echo $data_company['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Firma Kaldır</h6>
    <p class="modal__text">Bu Firma kaldırmak istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='delete-company?token=<?php echo $data_company['token']; ?>'">Kaldır</button>
    <button type="button" class="modal__btn modal__btn--dismiss">İptal</button>
    </div>
	</div>

    <?php } ?>

    </table>
    </div>
    </div>

    </div>
    </div>
	</main>
	<!-- /MAIN CONTENT -->

	<!-- JS -->
    <?php include("resources/js/app.js.php"); ?>
</body>
</html>