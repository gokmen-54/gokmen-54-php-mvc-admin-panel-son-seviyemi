<?php

    //Veritabanı bağlantı bilgileri
    define('DB_SERVER', '94.73.151.178');
    define('DB_USERNAME', 'u9234616_portal');
    define('DB_PASSWORD', '2022Turkmahall!');
    define('DB_DATABASE', 'u9234616_portal');

    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    //Veritabanı evrensel dil ayarı
    mysqli_query($db, "SET NAMES 'UTF8'");

    //Veritabanı saat ve tarih ayarı
    date_default_timezone_set('Europe/Istanbul');
	
	//Varsayılan Fonksiyonlar
	$date = date("d.m.Y");
	$time = date("H:i:s");

    /* setlocale(LC_TIME,'TURKISH'); 
    iconv('latin5','utf-8', strftime('%A, %e %B %Y')); */

    $url = basename(substr($_SERVER["PHP_SELF"], 0, -4));

    $token = substr(str_shuffle("a0b1c2d3e4f5g6h7i8j9"), 0, 19);
    
?>