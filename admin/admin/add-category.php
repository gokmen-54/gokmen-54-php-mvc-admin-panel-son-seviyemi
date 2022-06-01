<?php include("Controllers/SessionController.php"); error_reporting(0); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Kategori Ekle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Kategori Ekle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/AddCategoryController.php"); ?>

	<div class="col-12">
	<form name="addcategory" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">


	<div class="col-12">
	<input type="text" name="categoryname" class="form__input" placeholder="Kategori Adı" required="required">
	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="addcategory" value="Kategori Ekle">
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