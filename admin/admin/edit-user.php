<?php include("Controllers/SessionController.php"); error_reporting(0); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Bayi Düzenle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Bayi Düzenle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/EditUserController.php"); ?>

	
	<?php $query = mysqli_query($db, "SELECT * FROM shop_users WHERE token = '$token'"); $data = mysqli_fetch_array($query); ?>

	<div class="col-12">
	<form name="updateproduct" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">


	<div class="col-12">
	<input type="text" name="company" class="form__input" value="<?php echo $data['company']; ?>" placeholder="Bayi Adı" required="required">
	</div>

	<div class="col-6">
	<input type="text" name="email" class="form__input" value="<?php echo $data['email']; ?>" placeholder="Email" required="required">
	</div>


	<div class="col-6">
	<input type="number" name="phone" class="form__input" value="<?php echo $data['phone']; ?>" placeholder="Telefon Numarası" required="required">
	</div>

	<div class="col-6">
	<input type="text" name="date" class="form__input" value="<?php echo $data['date']; ?>" placeholder="Eklenme Tarihi" required="required">
	</div>

	<div class="col-6">
	<input type="text" name="time" step="0.01" class="form__input" value="<?php echo $data['time']; ?>" placeholder="Eklenme Zamanı" required="required">
	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="update" value="Ürünü Güncelle">
	</div>

	</div>
	</form>
	</div>

    </div>
    </div>

	</main>
	<!-- /MAIN CONTENT -->

	<!-- JS -->
    <?php include("resources/js/app.js.php"); ?>

</body>
</html>