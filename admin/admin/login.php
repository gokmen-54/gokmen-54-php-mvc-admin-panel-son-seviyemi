<?php include("Controllers/DatabaseController.php"); include("resources/views/header.php"); include("Controllers/AuthController.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Giriş Yap - Web Yönetim Paneli Türkmahall Shop</title>
</head>
<body>
	<div class="sign section--bg" data-bg="public/img/login.webp">
	<div class="container">
	<div class="row">
	<div class="col-12">
	<div class="sign__content">

	<form name="login" class="sign__form" method="post" autocomplete="off">
	<a href="login" class="sign__logo"><img src="public/img/logo.png" alt="logo"></a>
	<?php include("Controllers/LoginController.php"); ?>
	<div class="sign__group">
	<input type="text" name="username" class="sign__input text-center" placeholder="Kullanıcı Adı" required="required">
	</div>
	<div class="sign__group">
	<input type="password" name="password" class="sign__input text-center" placeholder="Kullanıcı Şifresi" required="required">
	</div>					
	<input type="submit" class="sign__btn" name="login" value="Giriş Yap">
	</form>

	</div>
	</div>
	</div>
	</div>
	</div>

    <!-- JS FILES -->
   <?php include("resources/js/app.js.php"); ?>
	
</body>
</html>