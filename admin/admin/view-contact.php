<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Formları Görüntüle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Formları Görüntüle</h2>
    </div>
    </div>
	<!-- /MAIN TITLE -->

    <div class="col-12 text-center">
    <div class="main__table-wrap">
    <table class="main__table">
    <thead>
    <tr>
    <th>İsim Soyisim</th>
    <th>E-Mail</th>
    <th>Telefon</th>
    <th>Mesaj</th>
    <th>Form İşlemleri</th>
    </tr>
    </thead>

    <?php $query_contact = mysqli_query($db, "SELECT * FROM shop_contacts ORDER by id DESC LIMIT 100"); while($data_contact = mysqli_fetch_array($query_contact)) { ?>
    <tbody>	
    <tr>
    <td>
    <div class="main__table-text"><?php echo $data_contact['fullname']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_contact['contactemail']; ?></div>
    </td>
    <td>
    <div class="main__table-text"><?php echo $data_contact['phone']; ?></div>
    </td>
    <td>
    <div class="main__table-text"  title="<?php echo $data_contact['message']; ?>"><?php if(strlen($data_contact['message']) < 25) { echo $data_contact['message']; } else { echo substr($data_contact['message'], 0 , 25) . "..."; } ?></div>
    </td>
    <td>
    <div class="main__table-btns">
    <a href="#modal-delete-<?php echo $data_contact['token']; ?>" class="main__table-btn main__table-btn--delete open-modal" title="Formu Kaldır">
    <i class="icon ion-ios-trash"></i>
    </a>
    </td>
    </tr>
    </tbody>

    <div id="modal-delete-<?php echo $data_contact['token']; ?>" class="zoom-anim-dialog mfp-hide modal">
    <h6 class="modal__title">Formu Kaldır</h6>
    <p class="modal__text">Bu formu kaldırmak istediğinizden emin misiniz?</p>
    <div class="modal__btns">
    <button type="button" class="modal__btn modal__btn--apply" onclick="window.location.href='delete-contact?token=<?php echo $data_contact['token']; ?>'">Kaldır</button>
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