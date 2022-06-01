<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Kategorileri Görüntüle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Kategori Görüntüle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->

    <div class="col-12 text-center">
    <div class="main__table-wrap">
    <table class="main__table">
    <thead>
    <tr>
    <th>Kategori Adı</th>
    <th>Kategori İşlemleri</th>
    </tr>
    </thead>
    <?php $query_addcategory = mysqli_query($db, "SELECT * FROM shop_categories ORDER by id DESC LIMIT 100"); while($data_addcategory = mysqli_fetch_array($query_addcategory)) { ?>
    <tbody>	
    <tr>
    <td>
    <div class="main__table-text"><?php echo $data_addcategory['categoryname']; ?></div>
    </td>
    <td>
    <div class="main__table-btns">
    <a href="https://turkmahallshop.com/" target="_blank" class="main__table-btn main__table-btn--view" title="Kategori Görüntüle">
    <i class="icon ion-ios-eye"></i>
    </a>
    <a href="edit-category?token=<?php echo $data_addcategory['token']; ?>" class="main__table-btn main__table-btn--edit" title="Kategori Düzenle">
    <i class="icon ion-ios-create"></i>
    </a>
    <a href="#modal-delete-<?php echo $data_addcategory['token']; ?>" class="main__table-btn main__table-btn--delete open-modal" title="Kategori Kaldır">
    <i class="icon ion-ios-trash"></i>
    </a>
    </td>
    </tr>
    </tbody>

    <div id="modal-delete-<?php echo $data_addcategory['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Kategoriyi Kaldır</h6>
    <p class="modal__text">Bu kategoriyi kaldırmak istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='delete-category?token=<?php echo $data_addcategory['token']; ?>'">Kaldır</button>
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