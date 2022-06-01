<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Reklamları Görüntüle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Story Reklamlarını Görüntüle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->

    <div class="col-12 text-center">
    <div class="main__table-wrap">
    <table class="main__table">
    <thead>
    <tr>
    <th>Firma Adı</th>
    <th>Reklam Başlangıç Tarihi</th>
    <th>Reklam Bitiş Tarihi</th>
    <th>Reklam Notları</th>
    <th>Reklam Görüntülenmesi</th>
    <th>Reklam İşlemleri</th>
    </tr>
    </thead>

    <?php $query_ads = mysqli_query($db,"SELECT * FROM shop_storyads ORDER by id DESC LIMIT 100"); while($data_ads = mysqli_fetch_array($query_ads,MYSQLI_ASSOC)) { ?>
    <tbody>	
    <tr>
    <td>
    <div class="main__table-text"><?php echo $data_ads['company']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_ads['startdate']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_ads['enddate']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_ads['description']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_ads['view']; ?></div>
    </td>
    <td>
    <div class="main__table-btns">
    <a href="edit-ad?token=<?php echo $data_ads['token']; ?>" class="main__table-btn main__table-btn--edit" title="Reklamı Düzenle">
    <i class="icon ion-ios-create"></i>
    </a>
    <a href="#modal-delete-<?php echo $data_ads['token']; ?>" class="main__table-btn main__table-btn--delete open-modal" title="Reklamı Kaldır">
    <i class="icon ion-ios-trash"></i>
    </a>
    </td>
    </tr>
    </tbody>
    

    <div id="modal-delete-<?php echo $data_ads['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Reklamı Kaldır</h6>
    <p class="modal__text">Bu reklamı kaldırmak istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='delete-ad?token=<?php echo $data_ads['token']; ?>'">Kaldır</button>
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
    <main class="main">
    <div class="container-fluid">
    <div class="row">

    <!-- MAIN TITLE -->
    <div class="col-12">
    <div class="main__title">
    <h2>Section Reklamlarını Görüntüle</h2>
    </div>
    </div>
	<!-- /MAIN TITLE -->

    <div class="col-12 text-center">
    <div class="main__table-wrap">
    <table class="main__table">
    <thead>
    <tr>
    <th>Firma Adı</th>
    <th>Reklam Başlangıç Tarihi</th>
    <th>Reklam Bitiş Tarihi</th>
    <th>Reklam Notları</th>
    <th>Reklam Görüntülenmesi</th>
    <th>Reklam İşlemleri</th>
    </tr>
    </thead>
    
    <?php $query_section = mysqli_query($db,"SELECT * FROM shop_sectionads ORDER by id DESC LIMIT 100"); while($data_section = mysqli_fetch_array($query_section,MYSQLI_ASSOC)) { ?>
    <tbody>	
    <tr>
    <td>
    <div class="main__table-text"><?php echo $data_section['company']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_section['startdate']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_section['enddate']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_section['description']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_section['view']; ?></div>
    </td>
    <td>
    <div class="main__table-btns">
    <a href="edit-ad?token=<?php echo $data_section['token']; ?>" class="main__table-btn main__table-btn--edit" title="Reklamı Düzenle">
    <i class="icon ion-ios-create"></i>
    </a>
    <a href="#modal-delete-<?php echo $data_section['token']; ?>" class="main__table-btn main__table-btn--delete open-modal" title="Reklamı Kaldır">
    <i class="icon ion-ios-trash"></i>
    </a>
    </td>
    </tr>
    </tbody>
    

    <div id="modal-delete-<?php echo $data_section['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Reklamı Kaldır</h6>
    <p class="modal__text">Bu reklamı kaldırmak istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='delete-section?token=<?php echo $data_section['token']; ?>'">Kaldır</button>
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

	<!-- JS -->
    <?php include("resources/js/app.js.php"); ?>
</body>
</html>