<?php include("Controllers/SessionController.php"); error_reporting(0); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Kategori Düzenle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Kategori Düzenle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/EditCategoryController.php"); ?>
	<?php $query_category = mysqli_query($db, "SELECT * FROM shop_categories WHERE token = '$token'"); $data_category = mysqli_fetch_array($query_category); ?>

	<div class="col-12">
	<form name="addcategory" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">


	<div class="col-12">
	<input type="text" name="categoryname" class="form__input" value = "<?php echo $data_category['categoryname'];  ?>" placeholder="Kategori Adı" required="required">
	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="update" value="Kategori Düzenle">
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