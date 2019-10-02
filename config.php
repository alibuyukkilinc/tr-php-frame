<?php

//AUTO SETTINGS - OTOMATIK AYARLAR
//echo "<pre>"; print_r($_SERVER);
$otomatik_ayar = true;
$ayar_site = "";//Otomatik Ayar true ise Gerekmez
$ayar_dizin = "";//Otomatik Ayar true ise Gerekmez
$ayar_alt_dizin = "/mvc"; //eğer siteniz alt dizinde ise ekleyiniz /altdizin
$ayar_yonetim_paneli = ""; //Yönetim Paneli dizini
$olcum = false;


//STARTUP SETTINGS - BAŞLANGIÇ AYARLARI
if($otomatik_ayar == true){
	$site  = "http";
	$site .= "://".$_SERVER['SERVER_NAME'].$ayar_alt_dizin;
	$dizin = $_SERVER['DOCUMENT_ROOT'].$ayar_alt_dizin;
} else {
	$site  = $ayar_site.$ayar_alt_dizin;
	$dizin = $ayar_dizin.$ayar_alt_dizin;
} 


//GENERAL CONFIG - GENEL AYARLAR
define("SERVER",$site);
define("DIZIN",$dizin);
define("MDIZIN",$dizin);
define("SITE", $site);
define("MSITE",$site);


//DATABASE CONFIG - VERITABANI AYARLARI
define("HOST", "localhost");
define("DB_NAME","mvc");
define("DB_USER","root");
define("DB_PASS","");


//ADMIN - YÖNETİM PANELİ BİLGİLERİ
define("PANEL", $site.$ayar_yonetim_paneli);
define("PDIZIN", $dizin.$ayar_yonetim_paneli);
define("PGIRIS",  $site.$ayar_yonetim_paneli."/account/login");


//GÖVDE BAĞLANTISI
require_once (PDIZIN.'/core/init.php');


?>