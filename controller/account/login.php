<?php

//YÖNETİCİ MODELİNİ GENEL İNDEXTE YÜKLENDİ ÇÜNKÜ PANELİN TÜMÜNDE KULLANILACAK $yonetici

#YÖNETİCİ ZATEN GİRİŞ YAPTIYSA YÖNLENDİR
if(!empty($isl->get_ses('yonetici_id'))){ $isl->location(PANEL); }

if(!empty($_POST)){

	$kadi = $isl->post('kadi');
	$sifre = $isl->post('sifre');
	$yonetici->kontrol($kadi,$sifre);
	if($isl->get('next')){
		$isl->location(PANEL.'/'.$isl->get('next')); //account sayfasına yönlendir.
	} else {
		$isl->location(PANEL); //account sayfasına yönlendir.
	}
	

}//if post x

	$navigasyon = array();
	#HEADER BİLGİLERİ
	$baslik_data = array( 
	
		'baslik'        => 'Instapostso | Giriş',
		'sirket'        => 'Instapostso',
		'geri'          => '/common/home',
		'sayfa'			=> 'Anasayfa',
		'action'		=> PANEL.'/account/login',
		'jquery' 		=> 1,
		'icon' 			=> 1,
		'css'           => 1, //Tüm cssleri iptal eder
		'menu' 			=> 0, //Menüyü kapatır
		'eski_menu' 	=> 0, //Menüyü kapatır
		'ortakjs' 	    => 1,
		'yonetici' 		=> $yonetici->yonetici_getir($isl->get_ses('yonetici_id')),
		'yonetici_sifre'=> isset($_SESSION['yonetici_sifre']) ? $_SESSION['yonetici_sifre'] : 'girisyapilmadi',
		'navigasyon'    => $navigasyon,
 
	);

	$data = array();

   #BURDA GÖNDERİLENN DATA ADI ÖNEMLİ DEĞİL VİEWE DATA OLRAK GİDER
   $load->view('common','header',$baslik_data);
   $load->view('account','login',$data);
   $load->view('common','footer',$data);
   
?>


