<?php 

class yonetici extends genel {

public $yonetici;
public $yonetici_id;
public $login = false;
public $sifre = 'Forgot My sifre';
public $sayfalamam = array();



public function yonetici_getir($yonetici_id){

    if(!empty($yonetici_id)){

		$uye =  $this->tablo_sql(array('tablo' => 'uyeler','where' => array(array('AND','id','=',$yonetici_id))));
        return $uye[0];

        } else {

        return $this->tablo_sql(array('tablo' => 'uyeler'));
            
        }//if yonetici id x
		

	} //fnk musteri  x



    public  function kontrol($eposta,$sifre){

                $cek = $this->vt->prepare("SELECT * FROM `uyeler` WHERE (eposta=? OR kadi=?) AND sifre=?");
                $giris = $cek->execute(array($eposta,$eposta,md5($sifre)));
                
                if ($giris) {
                    foreach($cek as $row ){
                        $_SESSION['uye_adi'] = $row['adi'];
                        $_SESSION['uye_id'] = $row['id'];
                        $_SESSION['uye_kadi'] = $row['kadi'];
                        $_SESSION['uye_izin'] = $row['izin'];
                        $_SESSION['uye_sifre'] = $sifre;
                        $_SESSION['uye_eposta'] = $row['eposta'];
                        $_SESSION['uye_login'] = true;
                       
                        $this->login = true;
                    } //foreach x
                } //if giris x

                if ($giris) {
                    
                    $update = $this->vt->prepare("UPDATE `uyeler` SET ziyaret_sayisi=(ziyaret_sayisi+?) WHERE (eposta=? OR kadi=?) AND sifre=?");
                    $update->execute(array(1,$eposta,$eposta,$sifre));

                }//if giris x

        } //fnk kontrol


    public function yonetici_islemler($sayfa,$limit){
        
        #TABLOYU SAY
        $say = $this->tablo_say(array('count'=>'id','tablo'=>'uyeler_detay'));

        #SAYFALAMA YAPTIR
        $sayfalama = $this->sayfalama($say,$sayfa,$limit);
        $this->sayfalamam = $sayfalama;


        #SORGU İÇİN AYARLA
        $limit = $sayfalama['nereden'].'-'.$sayfalama['kacar'];

        #SORGULA
        $siparisler = $this->tablo_sql(array('tablo'=>'uyeler_detay','limit'=>$limit,'orderby'=>'tarihi DESC'));

        return $siparisler;

    }//fnk islemler x 



} //class musteriler x





?>