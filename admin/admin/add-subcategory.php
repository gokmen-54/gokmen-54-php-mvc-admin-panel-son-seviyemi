<?php include("Controllers/SessionController.php"); error_reporting(0); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Ürün Ekle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Alt Kategori Ekle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/AddSubcategoryController.php"); ?>

	<div class="col-12">
	<form name="subcategory" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">

	<div class="col-12 col-sm-6 col-lg-6">
	<select class="js-example-basic-multiple" id="category" name="categoryname" multiple="multiple" required="required">
	<option value=""></option>
    <?php $query_category = mysqli_query($db,"SELECT * FROM shop_categories"); while($data_category = mysqli_fetch_array($query_category)) { ?>
	<option value="<?php echo $data_category["categoryname"]; ?>"><?php echo $data_category["categoryname"]; ?></option>
    <?php } ?>
	</select>
	</div>

	<div class="col-6">
	<input type="text" name="subcategoryname" class="form__input" placeholder="Alt Kategori Adı" required="required">
	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="addsubcategory" value="Alt Kategori Ekle">
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