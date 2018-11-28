<?php $arama_value = ''; ?>
<?php $yonetici['izin'] = 1; ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $data['baslik']; ?></title>
    <meta name="description" content="Admin Template">
    <?php if(!isset($data['inital'])){ ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php } ?>
    <!-- arama motorları almasın -->

    <meta name="robots" content="noindex">
      <meta name="googlebot" content="noindex">
      <meta content=”noindex, nofollow”>
      <meta content=”noindex, nofollow “>
      <meta content=”noarchive”>
      <!-- arama motorları almasın -->

    <base href="<?php echo PANEL; ?>/">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <?php if($data['css']===1){ ?>
    <link rel="stylesheet" href="view/css/normalize.css">
    <link rel="stylesheet" href="view/css/bootstrap.min.css?v=1.0">
    <link rel="stylesheet" href="view/css/ek.css?v=5">
    <?php if($data['icon']===1){ ?>
    <link rel="stylesheet" href="view/css/font-awesome.min.css">
    <?php } ?>
    <link rel="stylesheet" href="view/css/themify-icons.css">
    <link rel="stylesheet" href="view/css/flag-icon.min.css">
    <link rel="stylesheet" href="view/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="view/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="view/scss/style.css">
    <link rel="stylesheet" href="view/css/lib/chosen/chosen.min.css">
    <?php } //if css x ?>

    <link href="view/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    
    <?php if($data['jquery']===1){ ?>
    <script type="text/javascript" src="view/js/jquery-3.2.1.min.js"></script>
    <?php } ?>

    <?php if($data['ortakjs']===1){ ?>
    <script type="text/javascript" src="view/js/ortak.js?v=3"></script>
    <?php } ?>



    <?php if(isset($data['lazy'])){ if($data['lazy']===1){ ?>
    <!-- foto detayları için lazy koymamız lazım -->
    <script src="include/lazy/lazyload.min.js"></script>
    <?php } /**/ } /**/ //isset and if x ?>

</head>
<body>


<?php if($data['eski_menu']){ ?>


<style type="text/css">
    
    @media (max-width:768px) {

      .mobil_menu{display:block !important;}
      .menu{display:none;}
      /*.menu_endis{display: none;}*/
      .menu_buton{display:block;}
    
    } /* media x */

    .menu_buton{

        position: fixed;
        z-index: 9;
        opacity: 0.90;
        height: 33px;
        width: 50px;
        padding-top: 17px;
        border-radius: 55px;
        font-size: 18px;
        background: #333;
        text-align: center;
        border: 2px solid #FFF;
    }

    .mobil_menu{display:none;}

</style>


<!--MOBİL MENU  Left Panel -->
<div class="mobil_menu">
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="navbar-brand" href="./">

                   

                    <!--<img src="view/images/logo.png" alt="Logo">-->
                </div>

                <a class="navbar-brand hidden" href="./">
                    <!--<img src="view/images/logo2.png" alt="Logo">-->
                </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
              <ul class="nav navbar-nav">
                    <li class="active">
                      <form action="urun/urunler" method="get" class="form-horizontal">
                        
                        <div class="tepe_ara_btn">
                          
                         </div>
                      </form>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-home"></i>Anasayfa</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-home"></i><a href="common/home">Anasayfaya Git</a></li>
                            <li><i class="fa fa-home"></i><a href="view/tema">Tema</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
</div><!-- mobil menu -->


<style type="text/css">
    .tepe_arama{
        margin-left:3px;
        float: left;
        height:29px;
        width: 263px;
        border:1px solid #CCC;
        font-size: 12px;
    
    }
    .tepe_ara_btn{
        margin-top: 0;
        float: left;
    }



   .menu_tepe_dis{
      display: block;
    }

  @media (max-width:768px) {
    .menu_tepe_dis{
      display: none;
    }
  }

</style>

<!-- MENÜ BÖLÜMÜ -->
<div class="menu_endis">

<div class="menu_tepe_dis">
    <button id="bildirim" type="button" data-toggle="modal" data-target="#bildirimler" class="btn btn-primary btn-sm siyah5 float-right" style="margin-right:5px;">&nbsp;<i class="fa fa-bell"></i>&nbsp;<b>0</b>&nbsp;</button>

  <span class="float-right yazi-beyaz">
    <b>INSTAPOST v1.<a class="yazi-beyaz" href="cron/log-oku">0</a>&nbsp;&nbsp;&nbsp;</b>
    </span>
    <a href="common/home">
    <button type="button"  class="btn btn-success btn-sm float-left yesil3">&nbsp;&nbsp;&nbsp;<b><i class="fa fa-user"></i> <?php echo $data['uye']['adi']; ?></b>&nbsp;&nbsp;&nbsp;</button>
    </a>

    <form action="urun/urunler" method="get" class="form-horizontal">
        <!--<input type="text" id="input1-group2" name="ara" value="<?php //echo $arama_value; ?>" class="tepe_arama" placeholder=" Ürün Kodu ile Arama...">-->
        <div class="tepe_ara_btn"><!--
            <button class="btn btn-primary btn-sm kirmizi"><i class="fa fa-search"></i> Ara</button>
        <button type="button" class="btn btn-primary btn-sm mavi" data-toggle="modal" id="arama_ac" data-target="#aramam">DA</button>
            <button type="button" class="btn btn-primary btn-sm turuncu" data-toggle="modal" data-target="#karekodsys">&nbsp;&nbsp;<i class="fa fa-qrcode" aria-hidden="true"></i>&nbsp;&nbsp;</button>-->
        <a href="common/home"><button type="button" class="btn btn-warning btn-sm mor">&nbsp;&nbsp;<i class="fa fa-home" aria-hidden="true"></i>&nbsp;&nbsp;</button></a>
        &nbsp;
        <span class="yazi-beyaz"> <small>Tarih : </small><b><?php echo date('d-m-y'); ?></b> &nbsp;<small> Saat :  </small><b><?php echo date('H:i'); ?></b></span>
        
        </div>
    </form>
</div><!-- .menu_tepe_dis -->

<!-- MENÜ BAŞLANGICI -->
<div class="clear"></div>
<div class="menu">
   <ul>
      <!--BİR MENÜ YAPISI-->
      <li><a href="common/home"><i class="fa fa-home"></i> Anasayfa</a>
       <!--ALT MENÜ YAPISI-->
        <ul>
          <a href="common/home"><li><i class="fa fa-home"></i> Anasayfaya Git</li></a>
          <a href="view/tema/" target="_new"><li><i class="fa fa-home"></i> Tema</li></a>
        </ul>
      <!--//ALT MENÜ YAPISI-->
      </li>
      <!--<a href="controller/dosya"><li><i class="fa fa-instagram"></i> Örnek Menü</li></a>-->
      <!--//BİR MENÜ YAPISI-->
    </ul>  
    <!-- //MENÜ BAŞLANGICI --> 
</div>  
  
</div>

</div> <!-- class="menu_endis> x -->


<div class="modal fade" id="karekodsys" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel">Keredod Taranınca Yapılcak İşlemi Seçiniz</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                            <table align="center" width="97%"><tr><td>
                                <a href="stok/karekod-olustur" class="kare_buton mavi">
                                <i class="fa fa-qrcode fa-4x" aria-hidden="true"></i>
                                <br><br>
                                  <b>KAREKOD OLUŞTUR</b><small><br>Ürün Etiketi için<br>karekod oluşturur<br></a></small>

                                <a href="stok/stok-ekle" class="kare_buton yesil" target="_new">
                                <i class="fa fa-arrow-right fa-4x" aria-hidden="true"></i>
                                <br><br>
                                  <b>STOKLARA EKLE</b><small><br>Ürün girilmemişse <br>Stok kartı açılır<br></a></small>

                                <a href="stok/stok-ekle?isl=dus" class="kare_buton kirmizi" target="_new">
                                <i class="fa fa-arrow-left fa-4x" aria-hidden="true"></i>
                                <br><br>
                                  <b>STOKLARDAN DÜŞ</b><small><br>Bütün <br>Sitelerden Düşer<br></a></small>

                                <a href="stok/stok-ekle?sayim=1" class="kare_buton mor">
                                <i class="fa fa-qrcode fa-4x" aria-hidden="true"></i>
                                <br><br>
                                  <b>STOK SAYIM MODU</b><small><br>Stok Sayımı<br>Daha Hızlıdır<br></a></small>

                              </td></tr>
                              </table>

                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <button type="button" class="btn btn-primary">Tamam</button>
                            </div>
                        </div>
                    </div>
                </div>

      <?php } //if eski menu x ?> 

           

                <!-- BİLDİRİM MODALI -->
                <div class="modal fade" id="bildirimler" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true" style="display:none;">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="largeModalLabel"> 
                                 Bildirimler
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            	
                            </div><!-- mdoeal body -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                 <a href="yonetici/bildirimler"><button type="button" class="btn btn-success">Tümünü Gör</button></a>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tamam</button>
                            </div>
                        </div>
                    </div>
                </div>


<button style="display:none;" data-toggle="modal" id="arama_ac" data-target="#aramam" class="gizle"><i class="fa fa-qrcode" aria-hidden="true"></i> Karekod Sistemi</button>

<script type="text/javascript">
  
$( document ).ready(function() {

 $("#menuacdiv").mouseover(
  function(){ 
      //$("#arama_ac").click();
    }
  );
});

$(document).keydown(function(e) {

    // ESCAPE key pressed
    if (e.keyCode == 192) {
        window.location.replace('common/home');
    }

    // ESCAPE key pressed
    if (e.charCode == 192) {
        window.location.replace('common/home');
    }

});

</script>
<style type="text/css">
  #menuacdiv {
    width:1px;
    height: 100%;
    position: fixed;
    z-index: 99999 !important;
    left:0px;
  }  
</style>

<div id="menuacdiv">&nbsp;</div>

