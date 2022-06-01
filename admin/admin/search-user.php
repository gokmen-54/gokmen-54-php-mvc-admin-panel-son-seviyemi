<?php include("Controllers/SessionController.php"); include("resources/views/header.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Bayi Ara - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Bayi Ara</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->

    <?php include("Controllers/SearchUserController.php"); ?>


    <div class="col-12">
	<form name="search" class="form" method="post" autocomplete="off">
	<div class="row">

	<div class="col-12">
	<input type="text" name="company" class="form__input text-center" required="required" placeholder="Bayi Adı">
	</div>

	<div class="col-12" style="text-align: center;">
	<input type="submit" class="form__btn" name="search" value="Bayi Ara">
	</div>

    </div>
    </div>

    </form>
    </div>

    <?php error_reporting(0); 
    if($table) 
    { 
        echo '
        <div class="col-24">
        <div class="dashbox">
        <div class="dashbox__title">
        <h3><i class="ion-ios-contact"></i>Arama Sonuçları</h3>
    
        <div class="dashbox__wrap">
        <a class="dashbox__refresh" href="search-user" title="Yenile"><i class="icon ion-ios-refresh"></i></a>
        <a class="dashbox__more" href="view-product" title="Tüm Bayileri Görüntüle">Tümü</a>
        </div>
        </div>
    
        <div class="dashbox__table-wrap text-center">
        <table class="main__table main__table--dash">
        <thead>
        <tr>
        <th>Bayi Adı</th>
        <th>email</th>
        <th>Telefon No</th>
        <th>Eklenme Tarihi</th>
        <th>Eklenme Zamanı</th>
        <th>Bayi İşlemleri</th>
        </tr>
        </thead>
        '.$table.'
        </td>
        </tr>
        </tbody>
        </table>
        </div>
        </div>
        </div>
        '; 
    } else { } ?>
    



    </div>
    </div>
	</main>
	<!-- /MAIN CONTENT -->

	<!-- JS -->
    <?php include("resources/js/app.js.php"); ?>
</body>
</html>