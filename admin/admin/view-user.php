<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Bayileri Görüntüle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Bayileri Görüntüle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->

    <div class="col-12 text-center">
    <div class="main__table-wrap">
    <table class="main__table">
    <thead>
    <tr>
    <th>Bayi Adı</th>
    <th>Telefon Numarası</th>
    <th>E-Mail Adresi</th>
    <th>Bayi Lokasyonu</th>
    <th>Bayi Adresi</th>
    <th>Eklenme Tarihi</th>
    <th>Eklenme Zamanı</th>
    <th>Bayi İşlemleri</th>
    </tr>
    </thead>

    <?php $query_user = mysqli_query($db, "SELECT * FROM shop_users ORDER by id DESC LIMIT 100"); while($data_user = mysqli_fetch_array($query_user)) { ?>
    <tbody>	
    <tr>
    <td>
    <div class="main__table-text"><?php echo $data_user['company']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_user['phone']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_user['email']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_user['city']; ?></div>
    </td>
    <td>
    <div class="main__table-text"  title="<?php echo $data_user['adress']; ?>"><?php if(strlen($data_user['adress']) < 25) { echo $data_user['adress']; } else { echo substr($data_user['adress'], 0 , 25) . "..."; } ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_user['date']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_user['time']; ?></div>
    </td>
    <td>
    <div class="main__table-btns">
    <?php if($data_user['verify'] == 0) {  ?>
    <a href="#modal-unstatus-<?php echo $data_user['token']; ?>" class="main__table-btn main__table-btn--banned open-modal" title="Bayiyi Yetkilendir">
    <i class="icon ion-ios-lock"></i>
    </a>
    <?php } ?>
    <a href="https://turkmahallshop.com/public/uploads/<?php echo $data_user['file']; ?>" target="_blank" class="main__table-btn main__table-btn--view" title="Vergi Levhasını Görüntüle">
    <i class="icon ion-ios-eye"></i>
    </a>
    <a href="edit-user?token=<?php echo $data_user['token']; ?>" class="main__table-btn main__table-btn--edit" title="Bayiyi Düzenle">
    <i class="icon ion-ios-create"></i>
    </a>
    <a href="#modal-delete-<?php echo $data_user['token']; ?>" class="main__table-btn main__table-btn--delete open-modal" title="Bayiyi Kaldır">
    <i class="icon ion-ios-trash"></i>
    </a>
    </div>
    </td>
    </tr>
    </tbody>

    <div id="modal-delete-<?php echo $data_user['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Bayiyi Kaldır</h6>
    <p class="modal__text">Bu bayiyi kaldırmak istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='delete-user?token=<?php echo $data_user['token']; ?>'">Kaldır</button>
    <button type="button" class="modal__btn modal__btn--dismiss">İptal</button>
    </div>
	</div>

    <?php ?>
	<div id="modal-unstatus-<?php echo $data_user['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Bayiyi Yetkilendir</h6>
    <p class="modal__text">Bu bayiyi yetkilendirmek istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='unban-user?token=<?php echo $data_user['token']; ?>'">Yetkilendir</button>
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