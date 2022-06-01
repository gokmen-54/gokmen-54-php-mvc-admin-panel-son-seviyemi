<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Blogları Görüntüle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Blogları Görüntüle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->

    <div class="col-12 text-center">
    <div class="main__table-wrap">
    <table class="main__table">
    <thead>
    <tr>
    <th>Blog Başlığı</th>
    <th>Eklenme Tarihi</th>   
    <th>Eklenme Zamanı</th> 
    <th>Kategori İşlemleri</th>
    </tr>
    </thead>
    <?php $query_viewblog = mysqli_query($db, "SELECT * FROM shop_blog ORDER by id DESC LIMIT 100"); while($data_viewblog = mysqli_fetch_array($query_viewblog)) { ?>
    <tbody>	
    <tr>
    <td>
    <div class="main__table-text"><?php echo $data_viewblog['title']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_viewblog['date']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_viewblog['time']; ?></div>
    </td>
    <td>
    <div class="main__table-btns">
    <a href="https://turkmahallshop.com/blog/<?php echo substr($data_viewblog['url'],0 ,-4); ?>" target="_blank" class="main__table-btn main__table-btn--view" title="Bloğu Görüntüle">
    <i class="icon ion-ios-eye"></i>
    </a>
    <a href="edit-blog?token=<?php echo $data_viewblog['token']; ?>" class="main__table-btn main__table-btn--edit" title="Bloğu Düzenle">
    <i class="icon ion-ios-create"></i>
    </a>
    <a href="#modal-delete-<?php echo $data_viewblog['token']; ?>" class="main__table-btn main__table-btn--delete open-modal" title="Bloğu Kaldır">
    <i class="icon ion-ios-trash"></i>
    </a>
    </td>
    </tr>
    </tbody>

    <div id="modal-delete-<?php echo $data_viewblog['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Bloğu Kaldır</h6>
    <p class="modal__text">Bu bloğu kaldırmak istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='delete-blog?token=<?php echo $data_viewblog['token']; ?>'">Kaldır</button>
    <button type="button" class="modal__btn modal__btn--dismiss">İptal</button>
    </div>
	</div>
<?php }?>

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