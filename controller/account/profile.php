<?php

//$yonetici_id = $isl->get_ses("yonetici_id"); //session alma tanımladığımız id yi aldık.
//$yonetici->yonetici_getir($yonetici_id); //hangi müşteriyi çekecek onu belirttik. 
// YÖNETİCİ ZATEN DAHA ÖNCE SAYFA BALINDA ÇEKİLDİĞİ İÇİN TEKRAR ALMIYORUZ


	$data = array( 
		"site"           => SITE,
		"pdizin"         => PDIZIN,
		"panel"          => PANEL,
		"baslik"         => "NEVA YÖNETİCİ",
		"sirket"         => "NEVA",
		"geri"           => "index.php",
		"sayfa"			 => "Anasayfa",
		"action"		 => PANEL."/account/profile",
		"yonetici"       => $yonetici->yonetici
	);

   $load->view($url[0],$url[1],$data);

?>