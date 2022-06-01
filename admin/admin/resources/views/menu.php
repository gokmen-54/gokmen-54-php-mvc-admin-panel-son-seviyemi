	<!-- MOBILE HEADER-->
	<header class="header">
	<div class="header__content">
	<a href="index" class="header__logo"><img src="public/img/logo.png" alt="logo"></a>
    
    <!-- MOBILE HAMBURGER MENU -->
    <button type="button" class="header__btn">
    <span></span>
    <span></span>
    <span></span>
    </button>
	<!-- /MOBILE HAMBURGER MENU -->

    </div>
	</header>
	<!-- /MOBILE HEADER-->

	<!-- DESKTOP SIDEBAR -->
	<div class="sidebar">

    <!-- SIDEBAR LOGO -->
    <a href="index" class="sidebar__logo"><img src="public/img/logo.png" alt="logo"></a>
	<!-- /SIDEBAR LOGO -->
		
    <!-- USER INFO -->
    <div class="sidebar__user">
    <div class="sidebar__user-img">
	<img src="public/img/user.svg" alt="user">
	</div>
    <div class="sidebar__user-title">
    <a href="admin" style="color: #FFFFFF;" title="<?php echo $row['fullname']; ?>"><?php 
	if(strlen($row['fullname'])){ echo mb_strtoupper($row['fullname']);} 
	 ?></a>
    <span><?php echo $row['email']; ?></span>
    </div>
    <button type="button" name="logout" onclick="window.location.href='logout'" class="sidebar__user-btn"><i class="ion-ios-power" title="Oturumu Sonlandır"></i></button>
    </div>
    <!-- USER INFO -->

	<!-- /DESKTOP SIDEBAR -->

	<ul class="sidebar__nav">
    <li class="sidebar__nav-item">
    <a href="index" class="sidebar__nav-link"><i class="icon ion-md-home"></i> PANEL ANASAYFA</a>
    </li>

	<li class="dropdown sidebar__nav-item">
	<a class="dropdown-toggle sidebar__nav-link" href="#company-settings" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-md-business"></i> Firma YÖNETİMİ</a>
	<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
	<li><a href="search-company">Firma Ara</a></li>
	<li><a href="add-company">Firma Ekle</a></li>
	<li><a href="view-company">Firmaları Görüntüle</a></li>
	</ul>
	</li>

    <li class="dropdown sidebar__nav-item">
	<a class="dropdown-toggle sidebar__nav-link" href="#product-settings" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-md-pricetags"></i> ÜRÜN YÖNETİMİ</a>
	<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
	<li><a href="search-product">Ürün Ara</a></li>
	<li><a href="add-product">Ürün Ekle</a></li>
	<li><a href="view-product">Ürünleri Görüntüle</a></li>
	</ul>
	</li>

	<li class="dropdown sidebar__nav-item">
	<a class="dropdown-toggle sidebar__nav-link" href="#category-settings" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-ios-list"></i> KATEGORİ YÖNETİMİ</a>
	<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
	<li><a href="add-category">Kategori Ekle</a></li>
	<li><a href="view-category">Kategorileri Görüntüle</a></li>
	<li><a href="add-subcategory">Alt Kategori Ekle</a></li>
	<li><a href="view-subcategory">Alt Kategorileri Görüntüle</a></li>
	</ul>
	</li>

    <li class="dropdown sidebar__nav-item">
	<a class="dropdown-toggle sidebar__nav-link" href="#user-settings" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-ios-contact"></i> BAYİ YÖNETİMİ</a>
	<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
	<li><a href="search-user">Bayi Ara</a></li>
	<li><a href="view-user">Bayileri Görüntüle</a></li>
	</ul>
	</li>

    <li class="dropdown sidebar__nav-item">
	<a class="dropdown-toggle sidebar__nav-link" href="#ad-settings" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-ios-megaphone"></i> REKLAM YÖNETİMİ</a>
	<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
	<li><a href="add-ad">Reklam Ekle</a></li>
	<li><a href="view-ad">Reklamları Görüntüle</a></li>
	</ul>
	</li>

	<li class="dropdown sidebar__nav-item">
	<a class="dropdown-toggle sidebar__nav-link" href="#blog-settings" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-md-list-box"></i> BLOG YÖNETİMİ</a>
	<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
	<li><a href="search-blog">Blog Ara</a></li>
	<li><a href="add-blog">Blog Ekle</a></li>
	<li><a href="view-blog">Blogları Görüntüle</a></li>
	</ul>
	</li>

	<li class="dropdown sidebar__nav-item">
	<a class="dropdown-toggle sidebar__nav-link" href="#form-settings" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ion-md-chatbubbles"></i> FORM YÖNETİMİ</a>
	<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
	<li><a href="view-contact">İletişim Formları</a></li>
	</ul>
	</li>

    <li class="sidebar__nav-item">
	<a href="orders" class="sidebar__nav-link"><i class="ion-ios-wallet"></i> SİPARİŞ YÖNETİMİ</a>
	</li>

	<hr style="visibility: hidden;"><hr style="visibility: hidden;">

	<li class="sidebar__nav-item">
	<a href="admin" class="sidebar__nav-link"><i class="ion-md-contact"></i> YETKİLİ KULLANICI AYARLARI</a>
	</li>

	<li class="dropdown sidebar__nav-item">
	<a class="dropdown-toggle sidebar__nav-link" href="#db-settings" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-md-settings"></i> VERİTABANI TABLO AYARLARI</a>
	<ul class="dropdown-menu sidebar__dropdown-menu scrollbar-dropdown" aria-labelledby="dropdownMenuMore">
	<li><a href="truncate-sql">SQL Yapısını Boşalt</a></li>
	<li><a href="drop-sql">SQL Yapısını Kaldır</a></li>
	<li><a href="backup-sql">SQL Yapısını Yedekle</a></li>
	</ul>
	</li>

	<li class="sidebar__nav-item">
	<a href="logout" class="sidebar__nav-link"><i class="ion-ios-power"></i> OTURUMU SONLANDIR</a>
	</li>

    </ul>
		
    <div class="sidebar__copyright" style="margin-left: auto; margin-right: auto; text-align: center;">
	© 2022 Türkmahall Shop <br> Türkmahall İç ve Dış Tic. Ltd. Şti.</div>
	</div>