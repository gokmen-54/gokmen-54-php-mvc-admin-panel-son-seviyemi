<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Ürünleri Görüntüle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Ürünleri Görüntüle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->

    <div class="col-12 text-center">
    <div class="main__table-wrap">
    <table class="main__table">
    <thead>
    <tr>
    <th>Ürün Adı</th>
    <th>Ürün Rengi</th>
    <th>Ürün Stoğu</th>
    <th>Ürün Barkodu</th>
    <th>Ürün Fiyatı</th>
    <th>Satıcı Firma</th>
    <th>Ürün Kategorisi </th>
    <th>Ürün Alt Kategorisi</th>
    <th>Görüntülenme</th>
    <th>Ürün İşlemleri</th>
    </tr>
    </thead>

    <?php $query_product = mysqli_query($db, "SELECT * FROM shop_products ORDER by id DESC LIMIT 100"); while($data_product = mysqli_fetch_array($query_product)) { ?>
    <tbody>	
    <tr>
    <td>
    <div class="main__table-text"><?php echo $data_product['productname']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_product['color']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_product['stock']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_product['barcode']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_product['price'] . " TL"; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_product['company']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_product['category']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_product['subcategory']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_product['view'] . " Görüntülenme"; ?></div>
    </td>
    <td>
    <div class="main__table-btns">
    <a href="https://turkmahallshop.com/<?php echo substr($data_product['url'],0 , -4); ?>" target="_blank" class="main__table-btn main__table-btn--view" title="Ürünü Görüntüle">
    <i class="icon ion-ios-eye"></i>
    </a>
    <a href="edit-product?token=<?php echo $data_product['token']; ?>" class="main__table-btn main__table-btn--edit" title="Ürünü Düzenle">
    <i class="icon ion-ios-create"></i>
    </a>
    <a href="#modal-delete-<?php echo $data_product['token']; ?>" class="main__table-btn main__table-btn--delete open-modal" title="Ürünü Kaldır">
    <i class="icon ion-ios-trash"></i>
    </a>
    </td>
    </tr>
    </tbody>

    <div id="modal-delete-<?php echo $data_product['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Ürünü Kaldır</h6>
    <p class="modal__text">Bu ürünü kaldırmak istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='delete-product?token=<?php echo $data_product['token']; ?>'">Kaldır</button>
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