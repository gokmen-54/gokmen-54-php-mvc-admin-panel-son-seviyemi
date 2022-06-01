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
    <h2>Ürün Ekle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/AddProductController.php"); ?>

	<div class="col-12">
	<form name="addproduct" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload">1. Ürün Fotoğrafı</label>
	<input id="form__img-upload" name="image" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img" src="#" alt="image">
	</div>
	</div>

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload2">2. Ürün Fotoğrafı</label>
	<input id="form__img-upload2" name="image2" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img2" src="#" alt="image">
	</div>
	</div>

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload3">3. Ürün Fotoğrafı</label>
	<input id="form__img-upload3" name="image3" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img3" src="#" alt="image">
	</div>
	</div>

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload4">4. Ürün Fotoğrafı</label>
	<input id="form__img-upload4" name="image4" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img4" src="#" alt="image">
	</div>
	</div>

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload5">5. Ürün Fotoğrafı</label>
	<input id="form__img-upload5" name="image5" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img5" src="#" alt="image">
	</div>
	</div>

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload6">6. Ürün Fotoğrafı</label>
	<input id="form__img-upload6" name="image6" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img6" src="#" alt="image">
	</div>
	</div>

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload7">7. Ürün Fotoğrafı</label>
	<input id="form__img-upload7" name="image7" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img7" src="#" alt="image">
	</div>
	</div>

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload8">8. Ürün Fotoğrafı</label>
	<input id="form__img-upload8" name="image8" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img8" src="#" alt="image">
	</div>
	</div>

	<div class="col-12">
	<input type="text" name="productname" class="form__input" placeholder="Ürün Adı" required="required">
	</div>

	<div class="col-6">
	<input type="text" name="color" class="form__input" placeholder="Ürün Rengi" required="required">
	</div>


	<div class="col-6">
	<input type="number" name="stock" class="form__input" placeholder="Ürün Stoğu" required="required">
	</div>

	<div class="col-6">
	<input type="text" name="barcode" class="form__input" placeholder="Ürün Barkodu" required="required">
	</div>

	<div class="col-6">
	<input type="number" name="price" step="0.01" class="form__input" placeholder="Ürün Fiyatı" required="required">
	</div>

	<div class="col-12 col-sm-6 col-lg-4">
	<select class="js-example-basic-multiple" id="company" name="company" multiple="multiple" required="required">
	<option value=""></option>
	<?php $query_company = mysqli_query($db,"SELECT * FROM shop_companies"); while($data_company = mysqli_fetch_array($query_company)) { ?>
	<option value="<?php echo $data_company["company"]; ?>"><?php echo $data_company["company"]; ?></option>
	<?php } ?>
	</select>
	</div>

	<div class="col-12 col-sm-6 col-lg-4">
	<select class="js-example-basic-multiple" id="category" name="categoryname" multiple="multiple" required="required">
	<option value="<?php echo $data_category['categoryname']; ?>" selected><?php echo $data_category['categoryname']; ?></option>
    <?php $query_category = mysqli_query($db,"SELECT * FROM shop_categories"); while($data_category = mysqli_fetch_array($query_category)) {  ?>
	<option value="<?php echo $data_category["categoryname"]; ?>"><?php echo $data_category["categoryname"]; ?></option>
    <?php } ?>
	</select>
	</div>

	<div class="col-12 col-sm-6 col-lg-4">
	<select class="js-example-basic-multiple" id="subcategory" name="subcategoryname" multiple="multiple" required="required">
	<option value="<?php echo $data_subcategory['subcategoryname']; ?>" selected><?php echo $data_subcategory['subcategoryname']; ?></option>
    <?php $query_subcategory = mysqli_query($db,"SELECT * FROM shop_subcategories"); while($data_subcategory = mysqli_fetch_array($query_subcategory)) {  ?>
	<option value="<?php echo $data_subcategory["subcategoryname"]; ?>"><?php echo $data_subcategory["subcategoryname"]; ?></option>
    <?php } ?>
	</select>
	</div>

	<div class="col-12">
	<textarea id="text" name="description" class="form__textarea" placeholder="Ürün Açıklaması" required="required"></textarea>
	</div>

	<div class="col-12">
	<input type="text" name="seokey" class="form__input" placeholder="Google Anahtar Kelimeler">
	</div>

	<div class="col-12">
	<textarea id="text" name="seodesc" class="form__textarea" placeholder="Google Description Metni"></textarea>
	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="add" value="Ürünü Ekle">
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