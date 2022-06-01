<?php include("Controllers/SessionController.php"); error_reporting(0); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Alt Kategori Düzenle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Alt Kategori Düzenle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/EditSubCategoryController.php"); ?>
	<?php $query_subcategory = mysqli_query($db, "SELECT * FROM shop_subcategories WHERE token = '$token'"); $data_subcategory = mysqli_fetch_array($query_subcategory); ?>

	<div class="col-12">
	<form name="addsubcategory" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">

	<div class="col-12 col-sm-6 col-lg-4">
	<select class="js-example-basic-multiple" id="category" name="categoryname" multiple="multiple" required="required">
	<option value="<?php echo $data_subcategory['categoryname']; ?>" selected><?php echo $data_subcategory['categoryname']; ?></option>
	<?php $query_subcategory = mysqli_query($db,"SELECT * FROM shop_categories"); while($data_subcategory = mysqli_fetch_array($query_subcategory)) { ?>
	<option value="<?php echo $data_subcategory['categoryname']; ?>"><?php echo $data_subcategory['categoryname']; ?></option>
	<?php } ?>
	</select>
	</div>

    <?php $query_subcategory = mysqli_query($db, "SELECT * FROM shop_subcategories WHERE token = '$token'"); $data_subcategory = mysqli_fetch_array($query_subcategory); ?>

    <div class="col-6">
	<input type="text" name="subcategoryname" class="form__input" value = "<?php echo $data_subcategory['subcategoryname'];  ?>" placeholder="Alt Kategori Adı" required="required">
	</div>


	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="updatesub" value="Alt Kategori Düzenle">
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