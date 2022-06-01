<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); error_reporting(0); ?>

<!-- CSS FILES -->
<?php include("resources/css/app.css.php"); ?>

<title>Blog Ekle - Web Yönetim Paneli Türkmahall Shop</title>
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
	<h2>Blog Ekle</h2>
	<a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
	</div>
	</div>
	<!-- /MAIN TITLE -->

	<?php include("Controllers/AddBlogController.php"); ?>

	<div class="col-12">
	<form name="addblog" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">

	<div class="col-12">
	<div class="form__img">
	<label for="form__img-upload">Blog Fotoğrafı</label>
	<input id="form__img-upload" name="image" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img" src="#" alt="image">
	</div>
	</div>

	<div class="col-12">
	<input type="text" name="title" class="form__input" placeholder="Blog Başlığı" required="required">
	</div>

	<div class="col-12">
	<textarea name="blog" class="summernote" id="summernote" required="required"></textarea>
	</div>

	<div class="col-12">
	<br>
	<input type="text" name="seokey" class="form__input" placeholder="Google Anahtar Kelimeler">
	</div>

	<div class="col-12">
	<textarea id="text" name="seodesc" class="form__textarea" placeholder="Google Description Metni"></textarea>
	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="add" value="Blog Ekle ">
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
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
	<script>$('#summernote').summernote({placeholder: 'Blog Metni',tabsize: 10,height: 740}); $(".js-example-tokenizer").select2({tags: true,tokenSeparators: [',', ' ']})</script>
</body>

</html>