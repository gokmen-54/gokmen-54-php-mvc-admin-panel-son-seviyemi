<?php include("resources/views/header.php"); include("Controllers/SessionController.php"); ?>

    <!-- CSS FILES -->
    <?php include("resources/css/app.css.php"); ?>

	<title>Anasayfa - Web Yönetim Paneli Türkmahall Shop</title>
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
    <h2>Anasayfa</h2>
    <a href="sell" class="main__title-link" style="width: 150px;"><i class="ion-ios-paper" style="margin-right: 5px;"></i> FATURA OLUŞTUR</a>
    </div>
    </div>
	<!-- /MAIN TITLE -->

	<!-- STATS -->
	<div class="col-12 col-sm-6 col-xl-3">
    <div class="stats">
    <span>Sisteme Kayıtlı Toplam Firma</span>
    <p><?php $query_company = mysqli_query($db,"SELECT COUNT(*) FROM shop_companies"); $data_company = mysqli_fetch_array($query_company); echo $data_company[0]; ?></p>
    <i class="icon ion-md-business"></i>
    </div>
    </div>
	
	<div class="col-12 col-sm-6 col-xl-3">
    <div class="stats">
    <span>Sisteme Kayıtlı Toplam Ürün</span>
    <p><?php $query_product = mysqli_query($db,"SELECT COUNT(*) FROM shop_products"); $data_product = mysqli_fetch_array($query_product); echo $data_product[0]; ?></p>
    <i class="icon ion-md-pricetags"></i>
    </div>
    </div>

	<div class="col-12 col-sm-6 col-xl-3">
    <div class="stats">
    <span>Sisteme Kayıtlı Toplam Sayfa Ziyareti</span>
    <p><?php $open = @fopen('../counter.txt', 'r'); $counter = @fread($open, filesize('../counter.txt')); @fclose($open); echo $counter; ?></p>
    <i class="icon ion-ios-document"></i>
    </div>
    </div>

	<div class="col-12 col-sm-6 col-xl-3">
    <div class="stats">
    <span>Sisteme Kayıtlı Toplam Bayi</span>
    <p><?php $query_user = mysqli_query($db,"SELECT COUNT(*) FROM shop_users"); $data_user = mysqli_fetch_array($query_user); echo $data_user[0]; ?></p>
	<i class="icon ion-ios-contacts"></i>
    </div>
    </div>

	<div class="col-12 col-sm-6 col-xl-3">
    <div class="stats">
    <span>Sisteme Kayıtlı Toplam Stok</span>
    <p><?php $query_stock = mysqli_query($db,"SELECT SUM(stock) FROM shop_products"); $data_stock = mysqli_fetch_array($query_stock); if($data_stock[0] == 0) { echo 0; } else { echo $data_stock[0]; } ?></p>
    <i class="icon ion-ios-create"></i>
    </div>
    </div>

	<div class="col-12 col-sm-6 col-xl-3">
    <div class="stats">
    <span>Sisteme Kayıtlı Toplam Fatura</span>
    <p>0</p>
    <i class="icon ion-ios-paper"></i>
    </div>
    </div>


	<div class="col-12 col-sm-6 col-xl-3">
    <div class="stats">
    <span>Sisteme Kayıtlı Toplam Kargo Ürünü</span>
    <p>0</p>
    <i class="icon ion-ios-archive"></i>
    </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
    <div class="stats">
    <span>Sisteme Kayıtlı Toplam Sipariş</span>
    <p>0</p>
    <i class="icon ion-ios-wallet"></i>
    </div>
    </div>
	<!-- /STATS -->

    <div class="col-12 col-xl-6">
	<div class="dashbox">
	<div class="dashbox__title">
	<h3><i class="icon ion-ios-home"></i>Son Eklenen 5 Firma</h3>

	<div class="dashbox__wrap">
	<a class="dashbox__refresh" href="index" title="Yenile"><i class="icon ion-ios-refresh"></i></a>
	<a class="dashbox__more" href="view-company" title="Tüm Firmaları Görüntüle">Tümü</a>
	</div>
	</div>

	<div class="dashbox__table-wrap text-center">
	<table class="main__table main__table--dash">
	<thead>
	<tr>
	<th>Firma Ünvanı</th>
	<th>Firma Stoğu</th>
    <th>Satış Miktarı</th>
	<th>Eklenme Tarihi</th>
	<th>Eklenme Saati</th>
	</tr>
	</thead>
	
	<?php $query_company = mysqli_query($db,"SELECT * FROM shop_companies ORDER BY id DESC LIMIT 5"); while($data_company = mysqli_fetch_array($query_company,MYSQLI_ASSOC)) { ?>

	<?php $query_stock = mysqli_query($db,"SELECT SUM(stock) FROM shop_products WHERE company = '".$data_company['company']."'"); $data_stock = mysqli_fetch_array($query_stock,MYSQLI_ASSOC);  ?>

    <tbody>
	<tr>
	<td>
	<div class="main__table-text"><?php echo $data_company['company']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php if($data_stock['SUM(stock)'] == 0) { echo "0"; } else {  echo $data_stock['SUM(stock)']; } ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_company['buy']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_company['date']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_company['time']; ?></div>
	</td>
	</tr>
	</tbody>
	<?php }?>
	</table>
	</div>
	</div>
	</div>
	
    <div class="col-12 col-xl-6">
	<div class="dashbox">
	<div class="dashbox__title">
	<h3><i class="icon ion-ios-cart"></i>Son Eklenen 5 Ürün</h3>

	<div class="dashbox__wrap">
	<a class="dashbox__refresh" href="index" title="Yenile"><i class="icon ion-ios-refresh"></i></a>
	<a class="dashbox__more" href="view-product" title="Tüm Ürünleri Görüntüle">Tümü</a>
	</div>
	</div>

	<div class="dashbox__table-wrap text-center">
	<table class="main__table main__table--dash">
	<thead>
	<tr>
	<th>Ürün Adı</th>
	<th>Ürün Stoğu</th>
    <th>Ürün Fiyatı</th>
	<th>Eklenme Tarihi</th>
	<th>Eklenme Saati</th>
	</tr>
	</thead>
    <tbody>
	<?php $query_last_product = mysqli_query($db,"SELECT * FROM shop_products ORDER BY id DESC LIMIT 5"); while($data_last_product = mysqli_fetch_array($query_last_product)) { ?>
	<tr>
	<td>
	<div class="main__table-text" title="<?php echo $data_last_product['productname']; ?>"><?php if(mb_strlen($data_last_product['productname']) >= 30) { echo substr($data_last_product['productname'], 0 ,30) . "..."; } else { echo $data_last_product['productname']; } ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_last_product['stock']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_last_product['price']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_last_product['date']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_last_product['time']; ?></div>
	</td>
	</tr>
	</tbody>
	<?php }  ?>
	</table>
	
	</div>
	</div>
	</div>

	<div class="col-12 col-xl-6">
	<div class="dashbox">
	<div class="dashbox__title">
	<h3><i class="ion-md-card"></i>Son Eklenen 5 Sipariş</h3>

	<div class="dashbox__wrap">
	<a class="dashbox__refresh" href="index" title="Yenile"><i class="icon ion-ios-refresh"></i></a>
	<a class="dashbox__more" href="view-order" title="Tüm Siparişleri Görüntüle">Tümü</a>
	</div>
	</div>

	<div class="dashbox__table-wrap text-center">
	<table class="main__table main__table--dash">
	<thead>
	<tr>
	<th>Ürün Adı</th>
	<th>Ürün Fiyatı</th>
    <th>Kargo Firması</th>
	<th>Eklenme Tarihi</th>
	<th>Eklenme Zamanı</th>
	</tr>
	</thead>
    <tbody>
	<tr>
	<td>
	<div class="main__table-text">-</div>
	</td>
	<td>
	<div class="main__table-text">-</div>
	</td>
	<td>
	<div class="main__table-text">-</div>
	</td>
	<td>
	<div class="main__table-text">-</div>
	</td>
	<td>
	<div class="main__table-text">-</div>
	</td>
	</tr>
	</tbody>
	</table>
	</div>
	</div>
	</div>

	<div class="col-12 col-xl-6">
	<div class="dashbox">
	<div class="dashbox__title">
	<h3><i class="ion-ios-contacts"></i>Son Eklenen 5 Bayi</h3>

	<div class="dashbox__wrap">
	<a class="dashbox__refresh" href="index" title="Yenile"><i class="icon ion-ios-refresh"></i></a>
	<a class="dashbox__more" href="view-user" title="Tüm Bayileri Görüntüle">Tümü</a>
	</div>
	</div>

	<div class="dashbox__table-wrap text-center">
	<table class="main__table main__table--dash">
	<thead>
	<tr>
	<th>Firma Adı</th>
	<th>E-Mail Adresi</th>
    <th>Telefon Numarası</th>
	<th>Eklenme Tarihi</th>
	<th>Eklenme Zamanı</th>
	</tr>
	</thead>
	<?php $query_last_user = mysqli_query($db,"SELECT * FROM shop_users ORDER BY company DESC LIMIT 5");
	 while($data_last_user = mysqli_fetch_array($query_last_user)) { ?>
    <tbody>
	<tr>
	<td>
	<div class="main__table-text"><?php echo $data_last_user['company']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_last_user['email']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_last_user['phone']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_last_user['date']; ?></div>
	</td>
	<td>
	<div class="main__table-text"><?php echo $data_last_user['time']; ?></div>
	</td>
	</tr>
	</tbody>
	<?php } ?>
	</table>
	</div>
	</div>
	</div>
	<!-- INFO TABLES END -->

    </div>
    </div>
	</main>
	<!-- /MAIN CONTENT -->

	<!-- JS -->
    <?php include("resources/js/app.js.php"); ?>

</body>
</html>