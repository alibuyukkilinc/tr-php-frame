<?php 
ob_start();
session_start(); 
date_default_timezone_set('Europe/Istanbul');

# HATALARI YAZDIR
ini_set('display_errors',1);
ini_set('log_errors',1);
ini_set('error_log','logs/hatalar.log');
error_reporting(E_ALL);

#TEST ARACİ
$olcumyap = false;
$sure_baslangici = microtime(true);

##################################################################################################################################
include('config.php'); //mutlaka alınması gereken dosya

$url = $isl->url($isl->get('location'));

//YÖNETİCİ MODELİNİ GENEL İNDEXTE YÜKLENDİ ÇÜNKÜ PANELİN TÜMÜNDE KULLANILACAK $yonetici
$yonetici = $load->model('genel','yonetici');

#AJAX CONTROLLERLARINA YONLENDİRME YAPMAMASI İÇİN
if($url[0]=='ajax' || $url[0]=='cron'){
  $isl->oturum_kontrol('uye_id',$url[1],PGIRIS,'AJAX');
} else {
  $isl->oturum_kontrol('uye_id',$url[1],PGIRIS,($_SERVER['QUERY_STRING']));
}//if ajax x

#HATA BOYUTU
$hata_boyut = filesize(PDIZIN.'/logs/hatalar.log');//configden sonra alınmalıdr
#HATA TEMİZLE KOMUTU VARSA SİL
if($isl->get('hatalogtemizle')){$yaz = fwrite(fopen(PDIZIN."/logs/hatalar.log","w"),NULL); }//logtemizle x

######################################################## URL YE GORE CONTROLLER YUKLE ############################################

if(empty($_GET)) { //hiç get parametresi yoksa
	
	include(PDIZIN."/controller/common/home.php"); // varsa controlleri dahil et

} //if empty get x


if($isl->get('location')){
	$filename = PDIZIN.'/controller/'.$url[0].'/'.$url[1].'.php'; // tam olarak yolunu belirle
      if(file_exists($filename)){ //var mı diye konrol et
        include($filename); // varsa controlleri dahil et 
      } else { //controller bulunamadıysa
		include(PDIZIN.'/controller/common/404.php');
 	  } //boyle bir dosya varsa if x
} // L varsa if x

######################################################## URL YE GORE CONTROLLER YUKLE ############################################



?>
































<?php ########################################## ölçüm araçı ########################################## ?>

<?php 

if($olcumyap==true){ 

  $sure_bitimi = microtime(true);
  $sure = $sure_bitimi - $sure_baslangici;
  $deger = round(memory_get_peak_usage()/1048576, 2);
  $px = ceil($deger);
  $surepx = ceil($sure);
  $sure_son = mb_substr($sure,0,5);
  $hatapx = ceil($hata_boyut/1024);

?>

<div style="position:fixed; width:104%; opacity:0.85; left:-3%; bottom:0.1px; z-index:999999 !important; font-weight:bold; font-size:15px; height:33px; line-height:33px; text-align:center; color:#FFF; background-color:#000; border-top:1px solid #FFF;">


  <small>Süre : </small><font color="#c90"><?php echo $sure_son; ?> Saniye</font>
  <span style="height:25px;background:#c90;">
    <?php for($i=0; $i < $surepx; $i++){ ?>
    &nbsp;
    <?php } ?>
    </span>

  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <small>Bellek : </small><font color="lightgreen"><?php echo $deger; ?> MB </font>
    <span style="height:25px;background:#090;">
    <?php for($i=0; $i < $px; $i++){ ?>
    &nbsp;
    <?php } ?>
    </span>
  
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <a href="hatalar.log" target="_new" style="color:#FFF !important;"><small>Hatalar : </small></a>
  <font color="red"><?php echo $hata_boyut; ?> B</font>
  <span style="height:25px;background:red;">
    <?php for($i=0; $i < $hatapx; $i++){ ?>
    &nbsp;
    <?php } ?>
  </span>
  <a href="common/home/?hatalogtemizle=1" style="text-decoration:none;color:red;"><small> &nbsp;&nbsp;&nbsp; (Temizle)</small></a>
  
</div>
<?php } ?>

<?php ########################################## ölçüm araçı ########################################## ?>