<?php include("Controllers/SessionController.php"); error_reporting(0); include("resources/views/header.php"); ?>

<!-- CSS FILES -->
<?php include("resources/css/app.css.php"); ?>

<title>Reklam Ekle - Web Yönetim Paneli Türkmahall Shop</title>
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
						<h2>Reklam Ekle</h2>
						<a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper"
								style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
					</div>
				</div>
				<!-- /MAIN TITLE -->

				<?php include("Controllers/AddAdController.php") ?>

				<div class="col-12">
					<form name="addstory" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
						<div class="row">

							<div class="col-3">
								<div class="form__img">
									<label for="form__img-upload">Story Reklam Fotoğrafı</label>
									<input id="form__img-upload" name="image" type="file" accept=".png, .jpg, .jpeg">
									<img id="form__img" src="#" alt="image">
								</div>
							</div>

							<div class="col-9 col-sm-6 col-lg-9">

								<select class="js-example-basic-multiple" id="company" name="company"
									multiple="multiple" required="required">
									<option value=""></option>
									<?php $query_company = mysqli_query($db,"SELECT * FROM shop_companies"); while($data_company = mysqli_fetch_array($query_company)) { ?>
									<option value="<?php echo $data_company["company"]; ?>">
										<?php echo $data_company["company"]; ?></option>
									<?php } ?>
								</select>

								<input type="text" name="startdate" class="form__input" disabled="disabled"
									title="Başlangıç Tarihi" value="<?php echo date("d.m.Y");?>" required="required">

								<input type="date" name="enddate" class="form__textarea" style="height: 45px;"
									value="<?php echo date("d-m-Y"); ?>" title="Bitiş Tarihi" required="required">

								<textarea id="text" name="description" class="form__textarea" style="height: 203px;"
									placeholder="Reklam Notları"></textarea>

							</div>

							<div class="col-12" style="text-align: center;">
								<input type="submit" class="form__btn" name="add" value="Story Reklamı Ekle">
							</div>

						</div>
					</form>
				</div>
				<?php include("Controllers/AddSectionController.php") ?>
				<div class="col-12">
					<div class="main__title">
						<h2>Section Reklam Ekle</h2>
					</div>
				</div>
				<div class="col-12">
					<form name="addsection" class="form" method="post" enctype="multipart/form-data" autocomplete="off">
						<div class="row">

							<div class="col-12">
								<div class="form__img">
									<label for="form__img-upload2">Section Reklam Fotoğrafı</label>
									<input id="form__img-upload2" name="image2" type="file" accept=".png, .jpg, .jpeg">
									<img id="form__img2" src="#" alt="image">
								</div>
							</div>

							<div class="col-12   ">


							
							<select class="js-example-basic-multiple" id="company2" name="company2"
									multiple="multiple" required="required">
									<option value=""></option>
									<?php $query_section= mysqli_query($db,"SELECT * FROM shop_companies"); while($data_section = mysqli_fetch_array($query_section)) { ?>
									<option value="<?php echo $data_section["company"]; ?>">
										<?php echo $data_section["company"]; ?></option>
									<?php } ?>
								</select>
								

								<input type="text" name="startdate2" class="form__input" disabled="disabled"
									title="Başlangıç Tarihi" value="<?php echo date("d.m.Y");?>" required="required">

								<input type="date" name="enddate2" class="form__textarea" style="height: 45px;"
									value="<?php echo date("d-m-Y"); ?>" title="Bitiş Tarihi" required="required">

								<textarea id="text" name="description2" class="form__textarea" style="height: 203px;"
									placeholder=" Section Reklam Notları"></textarea>

							</div>

							<div class="col-12" style="text-align: center;">
								<input type="submit" class="form__btn" name="add2" value="Section Reklamı Ekle">
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