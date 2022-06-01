<?php include("Controllers/SessionController.php"); error_reporting(0); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Firma Düzenle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Firma Düzenle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/EditCompanyController.php"); ?>
    <?php $query = mysqli_query($db, "SELECT * FROM shop_companies WHERE token = '$token'"); $data_company = mysqli_fetch_array($query); ?>

	<div class="col-12">
	<form name="addcompany" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload">Firma Logosu</label>
	<input id="form__img-upload" name="logo" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img" src="https://turkmahallshop.com/public/images/company/<?php echo $data_company['logo']; ?>" alt="image">
	</div>
	</div>

	<div class="col-9">
	<div class="form__img">
	<label for="form__img-upload2">Firma Banner Fotoğrafı</label>
	<input id="form__img-upload2" name="banner" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img2" src="https://turkmahallshop.com/public/images/company/<?php echo $data_company['banner']; ?>" alt="image">
	</div>
	</div>

	<div class="col-6">
	<input type="text" name="company" class="form__input" value="<?php echo $data_company['company']; ?>" placeholder="Firma Adı ve Ünvanı" required="required">
	</div>

	<div class="col-6">
	<input type="text" name="owner" class="form__input" value="<?php echo $data_company['owner']; ?>" placeholder="Firma Sahibinin Adı ve Soyadı">
	</div>

	<div class="col-6">
	<input type="number" name="phone" class="form__input" value="<?php echo $data_company['phone']; ?>" inputmode="numeric" pattern="[0-9]*" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11" placeholder="Firma Telefon Numarası">
	</div>

	<div class="col-6">
	<input type="email" name="email" class="form__input" value="<?php echo $data_company['email']; ?>" placeholder="Firma E-Mail Adresi">
	</div>

	<div class="col-12">
	<textarea id="text" name="adress" class="form__textarea" placeholder="Firma Açık Adresi"><?php echo $data_company['adress']; ?></textarea>
	</div>

	<div class="col-6">
	<input type="text" name="website" class="form__input" value="<?php echo $data_company['website']; ?>" placeholder="Firma Web Sitesi">
	</div>

	<div class="col-6">
	<input type="text" name="facebook" class="form__input" value="<?php echo $data_company['facebook']; ?>" placeholder="Firma Facebook Linki">
	</div>

	<div class="col-6">
	<input type="text" name="twitter" class="form__input" value="<?php echo $data_company['twitter']; ?>" placeholder="Firma Twitter Linki">
	</div>

	<div class="col-6">
	<input type="text" name="instagram" class="form__input" value="<?php echo $data_company['instagram']; ?>" placeholder="Firma Instagram Linki">
	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="update" value="Firmayı Güncelle">
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