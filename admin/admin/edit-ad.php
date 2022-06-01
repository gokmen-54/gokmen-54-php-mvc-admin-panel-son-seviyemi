<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); error_reporting(0); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Reklamı Düzenle - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Reklamı Düzenle</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/EditAdController.php"); ?>

    <?php $query_ads = mysqli_query($db,"SELECT * FROM shop_storyads WHERE token = '$token_ads'"); $data_ads = mysqli_fetch_array($query_ads,MYSQLI_ASSOC); ?>

	<div class="col-12">
	<form name="editstoryads" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">

	<div class="col-3">
	<div class="form__img">
	<label for="form__img-upload">Story Reklam Fotoğrafı</label>
	<input id="form__img-upload" name="image" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img" src="https://turkmahallshop.com/public/images/ads/<?php echo $data_ads['image']; ?>" alt="image">
	</div>
	</div>

	<div class="col-9 col-sm-6 col-lg-9">

	<select name="company" class="js-example-basic-multiple" id="company" multiple="multiple" required="required">
	<option value="<?php echo $data_ads['company']; ?>" selected="selected"><?php echo $data_ads['company']; ?></option>
	<?php $query_company = mysqli_query($db,"SELECT * FROM shop_companies"); while($data_company = mysqli_fetch_array($query_company)) { ?>
	<option value="<?php echo $data_company['company']; ?>"><?php echo $data_company['company']; ?></option>
	<?php } ?>
	</select>

	<input type="text" name="startdate" class="form__input" disabled="disabled" title="Başlangıç Tarihi" value="<?php echo $data_ads['startdate']; ?>" required="required">

	<input type="date" name="enddate" class="form__textarea" style="height: 45px;" value="<?php echo $enddate = date("Y-m-d",strtotime($data_ads['enddate'])); ?>" title="Bitiş Tarihi" required="required">

	<textarea id="text" name="description" class="form__textarea" style="height: 203px;" placeholder="Reklam Notları"><?php echo $data_ads['description']; ?></textarea>

	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="update" value="Reklamı Güncelle">
	</div>

	</div>
	</form>
	</div>
	<div class="col-12">
    <div class="main__title">
    <h2>Section Reklamı Düzenle</h2>
    </div>
    </div>
	<!-- /MAIN TITLE -->
	
	<?php include("Controllers/EditSectionController.php"); ?>

    <?php $query_sec = mysqli_query($db,"SELECT * FROM shop_sectionads WHERE token = '$token_sec'"); $data_sec = mysqli_fetch_array($query_sec,MYSQLI_ASSOC); ?>

	<div class="col-12">
	<form name="editsectionads" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
	<div class="row">

	<div class="col-12">
	<div class="form__img">
	<label for="form__img-upload2">Section Reklam Fotoğrafı</label>
	<input id="form__img-upload2" name="image" type="file" accept=".png, .jpg, .jpeg">
	<img id="form__img2" src="https://turkmahallshop.com/public/images/ads/<?php echo $data_sec['image']; ?>" alt="image">
	</div>
	</div>

	<div class="col-12">

	<select name="company" class="js-example-basic-multiple" id="company2" multiple="multiple" required="required">
	<option value="<?php echo $data_sec['company']; ?>" selected="selected"><?php echo $data_sec['company']; ?></option>
	<?php $query_section = mysqli_query($db,"SELECT * FROM shop_companies"); while($data_section = mysqli_fetch_array($query_section)) { ?>
	<option value="<?php echo $data_section['company']; ?>"><?php echo $data_section['company']; ?></option>
	<?php } ?>
	</select>

	<input type="text" name="startdate" class="form__input" disabled="disabled" title="Başlangıç Tarihi" value="<?php echo $data_sec['startdate']; ?>" required="required">

	<input type="date" name="enddate" class="form__textarea" style="height: 45px;" value="<?php echo $enddate = date("Y-m-d",strtotime($data_sec['enddate'])); ?>" title="Bitiş Tarihi" required="required">

	<textarea id="text" name="description" class="form__textarea" style="height: 203px;" placeholder="Reklam Notları"><?php echo $data_sec['description']; ?></textarea>

	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="update2" value="Section Reklamı Güncelle">
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