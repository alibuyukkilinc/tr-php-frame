<?php

class genel{

  public $seo_url = array();
  public $vt;
  public $onl_vt;
  public $eze_vt;
  public $sayfalama_sonuc = array();
  public $vt_baz_al;

  public function __construct(){
      
      #FEİZA COLLECTION BAĞLANTISI ----------------------------------------------------
  	  $host = HOST;
  	  $dbname = DB_NAME;
  	  $user = DB_USER;
  	  $pass = DB_PASS;

  		try {
  	    $this->vt = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", "{$user}", "{$pass}");
  		 	$this->vt->query("SET NAMES 'utf8'");
  		 	$this->vt->query("SET CHARACTER SET utf8");
  		 	$this->vt->query("SET COLLATION_CONNECTION = 'utf8_turkish_ci'");
        $this->vt->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
  		} catch ( PDOException $e ){
  	     	print $e->getMessage();
  		} //try x

    }//bu fonksiyon çalışınca çalışsın

    public function server() { 
     
  	    echo '<pre>';
  	    print_r($_SERVER);
  	    echo '</pre>';

  	} //public function x

    public function yuzde($a,$b){ 
      if($a > 0 AND $b > 0){
        $c = $a / 100;  
        return floor($b / $c); 
      } else {
        return 0;
      }//if 0 dan buyukse x
  
    }//fnk yuzde x 

    #BUNUN GİBİ BİRDE TEMA POPUP VAR EN ALTA YAZILDI
    public function popup($mesaj){

      $icerik = '<div id="uyarimiz" style="display:none;">'.$mesaj.'</div>';
      echo $icerik;
      echo ("<script>popup('uyarimiz');</script>");

    }//fnk popup x

    public function temizle($string) {
      
      $string = preg_replace("/\s+/", " ", $string);
      $string = trim($string);
      return $string;

    } ///fnk temizle x

    public function zaman($islem,$ham_tarih=NULL) {

      $bul  = array('-');
      $degistir = array('.');
      $tarih = str_replace($bul, $degistir, $ham_tarih);

      $suan_tarih = date('d.m.Y');
      $suan_zaman = date('H:i');
      $suan_saat = date('H');
      $suan_dakika = date('i');
      
      $gelen_tarih = mb_substr($tarih,0,10);
      $gelen_saat = mb_substr($tarih,11,2);
      $gelen_dakika = mb_substr($tarih,14,2);  

      
      if ($islem == 'simdi'){
        return date('d.m.Y H:i');
      } // if islem simdi x

      if($islem == 'nezaman') {
        if($suan_tarih == $gelen_tarih) {
          $saat_hesapla = $suan_saat - $gelen_saat;
            if($saat_hesapla == 0){
                 $dakika_hesapla = $suan_dakika - $gelen_dakika;
                return  $dakika_hesapla.' Dakika Önce';
            } else { // saat eşitse dakika hesapla
                return  $saat_hesapla.' Saat Önce';
            }//if saat x 
          
         } else if ($saat_hesapla == 1){ //Tarih ve zaman eşit değilse
              return 'Dün ' . $gelen_saat;
         } else {
            return $tarih;
         } //if suan tarih x
      }//if islem x

    }//fnk zaman x

    public function tayfun_zaman($zaman){
    $zaman =  strtotime($zaman);
    $zaman_farki = time() - $zaman;
    $saniye = $zaman_farki;
    $dakika = round($zaman_farki/60);
    $saat = round($zaman_farki/3600);
    $gun = round($zaman_farki/86400);
    $hafta = round($zaman_farki/604800);
    $ay = round($zaman_farki/2419200);
    $yil = round($zaman_farki/29030400);
    if( $saniye < 60 ){
      if ($saniye == 0){
        return "Az Önce";
      } else {
        if($saniye < 0){
          $dakika = round(abs($saniye)/60);
          if($dakika > 59){
            return  round($dakika/60).' Saat Sonra';
          } else {
            return $dakika. ' Dakika Sonra';
          }
        } else {
          return $saniye .' Saniye Önce';
        }//if sn x
      }
    } else if ( $dakika < 60 ){
      return $dakika .' Dakika Önce';
    } else if ( $saat < 24 ){
      return $saat.' Saat Önce';
    } else if ( $gun < 7 ){
      return $gun .' Gün Önce';
    } else if ( $hafta < 4 ){
      return $hafta.' Hafta Önce';
    } else if ( $ay < 12 ){
      return $ay .' Ay Önce';
    } else {
      return $yil.' Yıl Önce';
    }
  }//zaman x



  public function tarihTr($gelen_tarih){
    if(!empty($gelen_tarih)){
      return date("d-m-Y H:i", strtotime($gelen_tarih));
    } else {
      return false;  
    }//if x
  }//fnk tarih x

  public function decimal_yap($miktar){
    //$decimal = floatval(str_replace(',', '.', str_replace('.', '', $miktar)));
    //return $decimal;
    $miktar = str_replace(",",".",$miktar);
            $miktar = preg_replace('/\.(?=.*\.)/', '', $miktar);
            return floatval($miktar);

  }//fnk decimal yap x



  	public function pre($deger){

   		echo "<pre>";
  		print_r($deger);
   		echo "</pre>";

  	}//pre x


    public function get($deger){
    	if(isset($_GET[$deger])){
	  		$filtrele = htmlspecialchars($_GET[$deger], ENT_QUOTES,'UTF-8'); //HTML KODLARI CALİSMAZ
	  		return $filtrele;
	  	} else {
	  		return FALSE;
	  	}

  	}//fnk get x

  	public function post($deger){
		if(isset($_POST[$deger])){
	  		$filtrele = htmlspecialchars($_POST[$deger], ENT_QUOTES,'UTF-8'); //HTML KODLARI CALİSMAZ
	  		return $filtrele;
	  	} else {
	  		return FALSE;
	  	}//if if isset x

  	}//fnk post x

    #SESSION FONKSİYONLARI
    public function set_ses($name,$deger){
    
      $_SESSION[$name] = $deger;

    }//fnk ses x

    public function get_ses($name){
  		if(isset($_SESSION[$name])){
       		return $_SESSION[$name];
   		} else {
   			return FALSE;
   		}//if if isset x
   	}//fnk get_ses x


  #COOKIE FONKSİYONALRI
  public function set_cok($name,$deger,$sure){
    setcookie($name,$deger,time()+$sure);
  }//set_cok x

  public function get_cok($name){
      if(isset($_COOKIE[$name])){
          return $_COOKIE[$name];
      } else {
        return FALSE;
      }//if if isset x
    }//fnk get_ses x



   public function location($url){
    //header("Location :".$url);
    echo "<script>window.location.replace('".$url."');</script>";
    echo "<script>window.location('".$url."');</script>";
   }//js location


   public function oturum_kontrol($name,$url,$adres,$next){
      if($next!='AJAX'){
        if(empty($next)){$next= ('location=common/home');}
        if($url!='login'){
           if(empty($_SESSION[$name])){ 
              $this->location($adres);
              $_SESSION['next'] = $next;
              exit();
           } //adres x
        } //empty if x
      }//if ajax x    
   }//fnk oturum kontrol x

   public function alert($mesaj){
    echo "<script>alert('".$mesaj."');</script>";
   }//js alert x


   public function url_yardimci($url){

    if($url==NULL OR empty($url)){

        $url_array = array('common','home'); //eğer link yoksa url bir commondur.

    } else {//if url array else

      $url_array = explode('/',$url); // gelen parametreyi bol - ile
      return $url_array;

    }//if url array x

   }//fnk url x



   public function url($url){
      #ADMİN PANEL OLDUĞU İÇİN SEO URL YAPISI KALDIRILDI
      $gelen_url_array = $this->url_yardimci($url);
      return $gelen_url_array; //seo url yoksa normal urlyi geri dondur
   } /// public function url x

   public function seo_url($url){

    $gelen_url_array = $this->url_yardimci($url);
    
    $cek = $this->vt->prepare ("SELECT * FROM `seo` WHERE seo_url=?");
    $cek->execute(array($gelen_url_array[0]));
    $array = $cek->fetchAll(PDO::FETCH_ASSOC);
    $ksayisi = $cek->rowCount();
    $this->vt=null;
    
    if($ksayisi > 0) { //YANİ SEO URLYE DAİR BİRŞEYLER VARSA ONA GÖRE DAVRAN
        
        return $array;

    } else {

        return FALSE; //seo url yoksa normal urlyi geri dondur

    }//if ksayisi x

   } /// public function seo_url x
   

   public function seo($s) {
       $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç','(',')','/',':',',');
       $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','_','_','');
       $s = str_replace($tr,$eng,$s);
       $s = strtolower($s);
       $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
       $s = preg_replace('/\s+/', '_', $s);
       $s = preg_replace('|-+|', '_', $s);
       $s = preg_replace('/#/', '', $s);
       $s = str_replace('.', '', $s);
       $s = trim($s, '_');
     return $s;

    } //fnk seo x

  #SQL ÇEKİRDEK FONKSİYONLAR
  public function sql_vt_sec($data=array()){

      #HANGİ VERİTABANI BAĞLANTISI İLE İŞLEM YAPACAĞINI BELİRLE
      $dtb = $this->vt;//normalde colelction bağlantısı
      if(isset($data['vt'])){
        switch ($data['vt']) {
          case 'vt': $dtb = $this->vt; break;
          case 'onl_vt': $dtb = $this->onl_vt; break;
          case 'eze_vt': $dtb = $this->eze_vt; break;
        }//switch
      }//if x
      return $dtb;

  }//fnk sql vt sec x

  public function sql_olustur($data=array()){
    
    #DEĞİŞKENLER
    $where = false;
    $sql = '';
    $execute_array = array();
    $vt_baz_al = $data['tablo'];
  

    #WHERE DEĞERLERİNİ İŞLE
      if(isset($data['where'])){
        #SERİ ÇOKLU WHERE DEĞERİ VARSA
        if(is_array($data['where'])){
          #(Gönderiliş Sırası Sor - İsaret Örneğin :  deger = array('AND','stok_adet','<','30',baz_al(LeftJoındlerde lazım)) gibi)
          foreach ($data['where'] as $key => $value) {
            #EĞER BAZ ALINAN TABLO GİRİLMİŞSE ONU BAZ ALSIN ÖZELLİKLE FİLTRELEME İÇİN KULLANILUR

            if(isset($value[4])){ $vt_baz_al = $value[4]; }
            
            #İLK ELEMEAN İSE
            if($key===0 AND $value[0]!='BETWEEN'){
              $sql .= " WHERE `{$vt_baz_al}`.`{$value[1]}` {$value[2]} ?";
              $execute_array[] = $value[3];
              $where = true; 
            #BETWEEN VARSA
            } else if($value[0]=='BETWEEN') {
              if($where===true){ $symm='AND'; } else { $symm='WHERE'; }
              $sql .= " {$symm} `{$vt_baz_al}`.`{$value[1]}` BETWEEN ? AND ?";
              $execute_array[] = $value[2];
              $execute_array[] = $value[3];
              $where = true; 
            #SONRAKİ ELEMANLAR İSE
            } else {   
                $sql .= " {$value[0]} `{$vt_baz_al}`.`{$value[1]}` {$value[2]} ?";
                $execute_array[] = $value[3];
                $where = true;
            }//if ilk eleman x

          }//foreach where x
  
        } //is array x

      }//if where x

      $vt_baz_al = $data['tablo'];

      #EĞER FİLTRELEME YOKSA STANDART SIRALAMA
      if(!isset($data['filtre'])){

        if(isset($data['orderby'])){
            $sql .= " ORDER BY `{$vt_baz_al}`.".$data['orderby'];
        }//order by x

      #FİLTRELEME VARSA ONA GÖRE SIRALAMA VE VERİLERİ ÇEKME
      } else {

        if(isset($data['filtre']['search'])){
          if($where===true){ $symm='AND'; } else { $symm='WHERE'; }
          $sql .= " {$symm} `{$vt_baz_al}`.`{$data['filtre']['search']}` LIKE ?";
          $execute_array[] = '%'.$data['filtre']['src_deger'].'%';
        }//search

        if(isset($data['filtre']['orderby'])){
            $sql .= " ORDER BY `{$vt_baz_al}`.".$data['filtre']['orderby'];
        }//order by x

      }//if filter x


      #ZAMAN DILIMLERINIE EKLE
      if(isset($data['bugun'])){
        if($where===true){
          $sql .= " AND DATE({$data['bugun']}) = CURDATE()";
        } else {
          $sql .= " WHERE DATE({$data['bugun']}) = CURDATE()";
        }//if where true x
      }//if data bugun x

      if(isset($data['buhafta'])){
        if($where===true){
          $sql .= " AND YEARWEEK({$data['buhafta']}) = YEARWEEK(CURDATE())";
        } else {
          $sql .= " WHERE YEARWEEK({$data['buhafta']}) = YEARWEEK(CURDATE())";
        }//if where true x
      }//if data buay x

      if(isset($data['buay'])){
        if($where===true){
          $sql .= " AND MONTH({$data['buay']}) = MONTH(CURDATE())";
        } else {
          $sql .= " WHERE MONTH({$data['buay']}) = MONTH(CURDATE())";
        }//if where true x
      }//if data buay x


      if(isset($data['gecenay'])){
        if($where===true){
          $sql .= " AND MONTH({$data['gecenay']}) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
        } else {
          $sql .= " WHERE MONTH({$data['gecenay']}) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)";
        }//if where true x
      }//if data buay x

      if(isset($data['busene'])){
        if($where===true){
          $sql .= " AND YEAR({$data['busene']}) = YEAR(CURDATE())";
        } else {
          $sql .= " WHERE YEAR({$data['busene']}) = YEAR(CURDATE())";
        }//if where true x
      }//if data buay x

      if(isset($data['limit'])){
        $degerler = explode('-', $data['limit']);
        $sql .= "  LIMIT ?,?";
        $execute_array[] = intval($degerler[0]);
        $execute_array[] = intval($degerler[1]);

      }//if limit x

      //echo $sql;

      return array('sql'=>$sql,'execute'=>$execute_array);

  }//fnk sql oluştır



  public function tablo_say($data=array()){

      if(isset($data['cache'])){
        
        if($this->get_cok($data['cname'])){
          return $this->get_cok($data['cname']);
          exit();
        }//if get cok x

      }//if cache x

      #VERİ TABANINI SEÇ collection/online/ezerafet
      $dtb = $this->sql_vt_sec($data);


      $sql = "SELECT COUNT({$data['count']}) FROM `{$data['tablo']}` ";

      #EĞER LEFT JOIN VARSA
      if(isset($data['tablo2'])){
        
        $sql = "SELECT COUNT(`{$data['tablo']}`.`{$data['count']}`) FROM `{$data['tablo']}`  LEFT JOIN `{$data['tablo2']}` ON (`{$data['tablo']}`.`{$data['tablo_stn']}`=`{$data['tablo2']}`.`{$data['tablo2_stn']}`) ";

      }//if left joın x 
      
      $sql_gelen = $this->sql_olustur($data);
      $sql .= $sql_gelen['sql'];

      #echo $sql; $this->pre($execute_array);

      $sql_sorgula = $dtb->prepare($sql);
      $sql_sorgula->execute($sql_gelen['execute']);
      $sayisi = $sql_sorgula->fetchColumn();

      //var_dump($sql).'<br>';

      if(isset($data['cache'])){
        $this->set_cok($data['cname'],$sayisi,$data['cache']);
      }//if cache x

      return $sayisi;
      

    }//fnk say x

    

    public function tablo_topla($data=array()){

      if(isset($data['cache'])){
        
        if($this->get_cok($data['cname'])){
          return $this->get_cok($data['cname']);
          exit();
        }

      }//if cache x

     
      #VERİ TABANINI SEÇ collection/online/ezerafet
      $dtb = $this->sql_vt_sec($data);


      $sql = "SELECT SUM({$data['sum']}) FROM `{$data['tablo']}` ";

     
      $sql_gelen = $this->sql_olustur($data);
      $sql .= $sql_gelen['sql'];

      $sql_sorgula = $dtb->prepare($sql);
      $sql_sorgula->execute($sql_gelen['execute']);
      $sayisi = $sql_sorgula->fetchColumn();

      

      if(isset($data['cache'])){
        $this->set_cok($data['cname'],$sayisi,$data['cache']);
      }//if cache x

      if(empty($sayisi)){
         return 0;
      } else {
         return $sayisi;
      }//if sayisi x
     
    }//fnk say x



    public function tablo_sql($data=array()){

      if(isset($data['cache'])){
        
        if($this->get_cok($data['cname'])){
          return $this->get_cok($data['cname']);
          exit();
        }

      }//if cache x

      #VERİ TABANINI SEÇ collection/online/ezerafet
      $dtb = $this->sql_vt_sec($data);

      #EĞER YILDIZ TANIMLANMIŞSA
      $yildiz = '*';
      if(isset($data['yildiz'])){
         $yildiz = $data['yildiz'];
      }//if yıldız x


      $sql = "SELECT {$yildiz} FROM `{$data['tablo']}` ";

      #EĞER LEFT JOIN VARSA
      if(isset($data['tablo2'])){
        
        $sql .= "LEFT JOIN `{$data['tablo2']}` ON (`{$data['tablo']}`.`{$data['tablo_stn']}`=`{$data['tablo2']}`.`{$data['tablo2_stn']}`) ";

      }//if left joın x 


      $sql_gelen = $this->sql_olustur($data);
      $sql .= $sql_gelen['sql'];


      //echo $sql; $this->pre($sql_gelen['execute']);

      $sql_sorgula = $dtb->prepare($sql);
      $sql_sorgula->execute($sql_gelen['execute']);
      $sonucu = $sql_sorgula->fetchAll(PDO::FETCH_ASSOC);

      //var_dump($sql).'<br>';

      if(isset($data['cache'])){
        $this->set_cok($data['cname'],$sayisi,$data['cache']);
      }//if cache x

      //$this->pre($execute_array);
    if(empty($sonucu)){
         return false;
      } else {
         return $sonucu;
      }//if sayisi x
     
    }//fnk say x


    public function sql($data=array()){

      #VERİ TABANINI SEÇ collection/online/ezerafet
      $dtb = $this->sql_vt_sec($data);
      
      if(isset($data['sql'])){
        $sql_yazi = $data['sql'];
      }//if sql x

      if(isset($data['exc'])){
        $sql_exc = $data['exc'];
      }//if exc x

      $sql_sorgula = $dtb->prepare($sql_yazi);
      $sql_sorgula->execute($sql_exc);
      $sonucu = $sql_sorgula->fetchAll(PDO::FETCH_ASSOC);

      if(empty($sonucu)){
         return false;
      } else {
         return $sonucu;
      }//if sayisi x


    }//fnk x 


    public function tablo_guncelle($data){

      $sql = "UPDATE `{$data['tablo']}` SET ";
      $execute_array = array();
      $i = 1;

      foreach ($data['guncelle'] as $key => $value) {

        if($i==1){//Eğer ilk elemansa
            $sql.= $key." = :".$key;
            $execute_array[$key] = $value;
        } else {//sonraki elemanlar ise
            $sql.= ", ".$key." = :".$key;
            $execute_array[$key] = $value;
        }
  
        $i++;

      }//foreach x

      foreach ($data['where'] as $wkey => $wvalue) {
        
        $sql.= " WHERE ".$wkey." = :".$wkey;
        $execute_array[$wkey] = $wvalue;

      }


      #VERİ TABANINI SEÇ collection/online/ezerafet
      $dtb = $this->sql_vt_sec($data);

      $sql_guncelle = $dtb->prepare($sql);
      $sql_guncelle->execute($execute_array);
      //echo $dtb;

      //echo $sql; $this->pre($execute_array);

    }//tablo_guncelle x


   public function tablo_guncelle_v1($data){

      $sql = "UPDATE `{$data['tablo']}` SET ";
      $execute_array = array();
      $i = 1;

      if(isset($data['guncelle'])){ foreach ($data['guncelle'] as $key => $value) {

        if($i==1){//Eğer ilk elemansa

            $sql.= $key." = ?";
            $execute_array[] = $value;
        } else {//sonraki elemanlar ise
            $sql.= ", ".$key." = ?";
            $execute_array[] = $value;
        }
  
        $i++;

       }}//foreach ve if x



      if(isset($data['ekle'])){ foreach ($data['ekle'] as $key => $value) {

        if($i==1){//Eğer ilk elemansa

            $sql.= $key." = (".$key." + ?)";
            $execute_array[] = $value;
        } else {//sonraki elemanlar ise
            $sql.= ", ".$key." = (".$key." + ?)";
            $execute_array[] = $value;
        }
  
        $i++;

      }}//foreach ve if x

      if(isset($data['cikar'])){ foreach ($data['cikar'] as $key => $value) {

        if($i==1){//Eğer ilk elemansa

            $sql.= $key." = (".$key." - ?)";
            $execute_array[] = $value;
        } else {//sonraki elemanlar ise
            $sql.= ", ".$key." = (".$key." - ?)";
            $execute_array[] = $value;
        }
  
        $i++;

      }}//foreach ve if x


      #VERİ TABANINI SEÇ collection/online/ezerafet
      $dtb = $this->sql_vt_sec($data);
      $gelen_sql = $this->sql_olustur($data);

      #GELEN EXECUTELERI ISLE
      foreach ($gelen_sql['execute'] as $value) {
        $execute_array[] = $value;
      }

      # GELEN SQL BIRLESTIR
      $sql .= $gelen_sql['sql'];

      #SORGUYU GONDER
      $sql_guncelle = $dtb->prepare($sql);
      $sql_guncelle->execute($execute_array);
      //echo $dtb;
      
      //echo $sql; 
      //$this->pre($execute_array);

    }//tablo_guncelle x


    public function tablo_sil($data){

      $sql = "DELETE FROM `{$data['tablo']}` ";
      $execute_array = array();
      $i = 1;

      foreach ($data['where'] as $wkey => $wvalue) {
        
        $sql.= " WHERE ".$wkey." = :".$wkey;
        $execute_array[$wkey] = $wvalue;

      }//foreach x


      #VERİ TABANINI SEÇ collection/online/ezerafet
      $dtb = $this->sql_vt_sec($data);

      $sql_guncelle = $dtb->prepare($sql);
      $sql_guncelle->execute($execute_array);
      //echo $dtb;

      //echo $sql; $this->pre($execute_array);

    }//tablo_sil x


    public function tablo_ekle($data){

      $sql = "INSERT INTO `{$data['tablo']}` ";
      $execute_array = array();
      $i = 1;
      $sql_oncesi = "";
      $sql_sonrasi = "";

      foreach ($data['ekle'] as $key => $value) {

        if($i==1){//Eğer ilk elemansa
            $sql_oncesi .= "( ";
            $sql_oncesi .= $key;
            
            $sql_sonrasi .= "( ";
            $sql_sonrasi .= ":".$key;
            
            $execute_array[$key] = $value;

        } else {//sonraki elemanlar ise
       
            $sql_oncesi .= ", ";
            $sql_oncesi .= $key;

            $sql_sonrasi .= ", ";
            $sql_sonrasi .= ":".$key;

            $execute_array[$key] = $value;
        }
  
        $i++;

      }//foreach x

      $sql_oncesi .= ") ";
      $sql .= $sql_oncesi;
      $sql .= "VALUES ";
      $sql_sonrasi .= ") ";
      $sql .= $sql_sonrasi;

      #VERİ TABANINI SEÇ collection/online/ezerafet
      $dtb = $this->sql_vt_sec($data);

      $sql_guncelle = $dtb->prepare($sql);
      $sql_guncelle->execute($execute_array);
      $last_id = $dtb->lastInsertId();
      return $last_id;
      //echo $dtb;

      //echo $sql; $this->pre($execute_array);

    }//tablo_guncelle x


    public function sayfalama($ksayisi,$sayfa=1,$kacar=60) {

        #HATALARIN ÖNÜNE GEÇMEK İÇİN
        if(empty($ksayisi)){ $ksayisi = 1; }
        if(empty($ksayisi)){ $ksayisi = 1; }
        if(empty($ksayisi)){ $ksayisi = 60; }

        $ssayisi = ceil($ksayisi/$kacar);
        $nereden = ($sayfa*$kacar)-$kacar;

        #SONUÇLARI ARRAYA ATA 
        $sonuc = array('ksayisi'=>$ksayisi,'ssayisi'=>$ssayisi,'nereden'=>$nereden,'kacar'=>$kacar,'sayfa'=>$sayfa);
        $this->sayfalama_sonuc = $sonuc;

        return $sonuc;

      } /// fnk sayfalama x



    public function tablo_bosalt($tablo){
    
    $cek = $this->vt->prepare("TRUNCATE TABLE {$tablo}");
    $bosalt = $cek->execute();
    
    if($bosalt){ 
      return 1;
     } else { 
      return 0;
     } // if bosalt x

    } // fnk tablo_bosalt x


    public function sorgu($sql,$param=array()) {
   
      $cek = $this->vt->prepare("{$sql}");
      $sorgula = $cek->execute($param);
      
      if($sorgula){ 
        return $cek;
       } else { 
        return false;
       } // if bosalt x

    } // fnk sorgu x

    public function uyeislem($uye_id,$uye_adi,$islem_yeri,$yapilan_islem){

      $ekle=$this->vt->prepare("INSERT INTO uyeler_detay (uye_id,uye_adi,islem,ne_yapildi) VALUES (?,?,?,?)");
      $ekle->execute(array($uye_id,$uye_adi,$islem_yeri,$yapilan_islem));

   }//function uye islem


    public function bildirim_ekle($uye_id,$uye_adi,$urun_kodu,$yapilan_islem,$tur){

      $ekle=$this->vt->prepare("INSERT INTO bildirimler (uye_id,uye_adi,kod,bildirim,tur) VALUES (?,?,?,?,?)");
      $ekle->execute(array($uye_id,$uye_adi,$urun_kodu,$yapilan_islem,$tur));

   }//function uye islem


  public function dosya_sil($tam_adres){
    if(file_exists($tam_adres)){//Hata olmaması için fotoğraf var mı bakılsın
      unlink($tam_adres);//Varsa Fotoğrafı sil
    }// if file var mı x
  }//fnk urun foto sil x


  public function isl($yazi,$tur){

    $yazim = strip_tags($yazi);

    $d1 = array('a','b','c','ç','d','e','f','g','ğ','h','ı','i','j','k','l','m','n','o','ö','p','r','s','ş','t','u','ü','v','y','z');

    $d2 = array('35*|*','36*|*','37*|*','38*|*','39*|*','40*|*','41*|*','42*|*','43*|*','44*|*','45*|*','46*|*','47*|*','48*|*','49*|*','50*|*','51*|*','52*|*','53*|*','54*|*','55*|*','56*|*','57*|*','58*|*','59*|*','60*|*','61*|*','62*|*','63*|*');
    
    
    $d3 = array('63*|*','62*|*','61*|*','60*|*','59*|*','58*|*','57*|*','56*|*','55*|*','54*|*','53*|*','52*|*','51*|*','50*|*','49*|*','48*|*','47*|*','46*|*','45*|*','44*|*','43*|*','42*|*','41*|*','40*|*','39*|*','38*|*','37*|*','36*|*','35*|*');

    $d4 = array('z','y','v','ü','u','t','ş','s','r','p','ö','o','n','m','l','k','j','i','ı','h','ğ','g','f','e','d','ç','c','b','a');

    if($tur==1) {
      return $dg1 = str_replace($d1, $d2, $yazim);
      //return str_replace($d3, $d4, $dg1);
    }//if tur x

    if($tur==2) {
      return $dg1 = str_replace($d3, $d4, $yazim);
      //return str_replace($d4, $d3, $dg1);
    }//if tur x

  }//if str temizle x


} //genel

?>