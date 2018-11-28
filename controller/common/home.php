<?php 


#HEADER BİLGİLERİ
	$baslik_data = array( 
	
		'baslik'        => 'InstaPost | Anasayfa',
		'jquery' 		=> 1,
		'icon' 			=> 1,
		'css'           => 1, //Tüm cssleri iptal eder
		'menu' 			=> 0, //Menüyü kapatır
		'eski_menu' 	=> 1, //Menüyü kapatır
		'ortakjs' 	    => 1,
		'uye' 		    => $yntc_array = $yonetici->yonetici_getir($isl->get_ses('uye_id')),
		'uye_sifre'     => isset($_SESSION['uye_sifre']) ? $_SESSION['uye_sifre'] : 'girisyapilmadi',
		'navigasyon'    => $navigasyon = array(),
	);


$load->view('common','header',$baslik_data); 
// HERSEY AJAX İLE.COM 
?>

<div class="content pt-3">
	<div class="animated fadeIn">

		<h3>BU BİR ÖRNEK SAYFADIR DİLERSENİZ TEMA İÇİN BURAYA DA TEMPLATE EKLEYEREK PROJELERİNİZİ FROND-END TASARIMLARINA UYGUN YAPABİLİRSİNİZ... </h3>

    </div><!-- animated -->
</div><!-- content -->

<?php $load->view('common','footer',$baslik_data); ?>