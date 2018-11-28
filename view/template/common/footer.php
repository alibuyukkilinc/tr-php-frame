<?php 

	#SAYFALAMA AYARLARI
	if(isset($data['sayfalama'])){ 
	$gorunen_sayfa = 7;
	$urlm = 'common/home';
	if(isset($_GET['location'])){ $urlmiz = explode('/', $_GET['location']); $urlm = $urlmiz[0].'/'.$urlmiz[1]; }

?>
<style type="text/css">
.sayfalama {
  margin: 0;
  padding: 0;
  text-align: center;
  width: 100%;
}

.sayfalama ul {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  vertical-align: baseline;
  background: 0 0;
}
.sayfalama li {
  display: inline;
  margin: 0;
  padding: 0;
}

.sayfalama li a {
  border: 1px solid #efebeb;
  color: #242424;
  text-decoration: none;
  display: inline-block;
  transition: all .8s ease 0s;
  height: 40px;
  line-height:37px;
  margin: 0 1px 0 0;
  padding: 0;
  text-align: center;
  width: 40px;
  margin-top:9px;
  
}
.sayfalama li a:hover {
	background-color: #007bff;
	color: white;
}
.sayfalama li a.active {
	background-color: #007bff !important;
	color: white;
}

</style>
<?php

$get = null;
if(isset($data['sayfalama']['get'])){
  $get = $data['sayfalama']['get'];
}//if sayfalama
?>

<div class="col-md-12">
      <ul class="sayfalama" style="width:100% !important;">
      	<?php if($data['sayfalama']['sayfa'] > 1){ ?>
        <li class="page-item"><a class="page-link" href="<?php echo $urlm; ?>/<?php echo $data['sayfalama']['sayfa']-1; ?><?php if(!empty($get)) { echo $get; } ?>" tabindex="-1"><i class="fa fa-arrow-left"></i></a></li>
        <?php } else { ?> 
		<li class="page-item disabled"><a class="page-link"" tabindex="-1"><i class="fa fa-arrow-left"></i></a></li>
        <?php }//if x ?>

        <li class="page-item"><a class="page-link" href="<?php echo $urlm; ?>/1<?php if(!empty($get)) { echo $get; } ?>">İlk</a></li>

        <?php for($i = $data['sayfalama']['sayfa'] - $gorunen_sayfa; $i < $data['sayfalama']['sayfa'] + $gorunen_sayfa + 1; $i++){ ?>
        	<?php if($i > 0){ ?>
		        <?php if($i == $data['sayfalama']['sayfa']){ ?>
					<li class="page-item active"><a class="page-link" href="#"><?php echo $i; ?><span class="sr-only">(current)</span></a></li>
				<?php } elseif($i <= $data['sayfalama']['ssayisi']) { ?>
					<li class="page-item"><a class="page-link" href="<?php echo $urlm; ?>/<?php echo $i; ?><?php if(!empty($get)) { echo $get; } ?>"><?php echo $i; ?></a></li>
		        <?php }//if sayfalama x ?>
		    <?php } else { ?> 
					<!--<li class="page-item disabled"><a class="page-link">x<span class="sr-only">(current)</span></a></li>-->
		    <?php } //if sayfa byk 0 x ?>
		<?php } //for x ?>

		<!-- son sayfa -->
		<li class="page-item"><a class="page-link">...</a></li>
		<li class="page-item"><a class="page-link" href="<?php echo $urlm; ?>/<?php echo $data['sayfalama']['ssayisi']; ?><?php if(!empty($get)) { echo $get; } ?>"><?php echo $data['sayfalama']['ssayisi']; ?></a></li>
		<?php if($data['sayfalama']['sayfa'] < $data['sayfalama']['ssayisi']){ ?>
			<li class="page-item"><a class="page-link" href="<?php echo $urlm; ?>/<?php echo $data['sayfalama']['sayfa']+1; ?><?php if(!empty($get)) { echo $get; } ?>"><i class="fa fa-arrow-right"></i></a></li>
		<?php } else { ?>
			<li class="page-item disabled"><a class="page-link"><i class="fa fa-arrow-right"></i></a></li>
		<?php } ?>
	</ul>
</div>
<!-- EN YUKARI -->



<div class="clear"></div>
<br>
<br>
<br>



<?php }//if sayfalama x ?>


<style type="text/css">
  #yukari{
  width: 50px;
  height: 50px;
  font-size: 21pt;
  line-height: 39px;
  position: fixed;
  right: 5px;
  bottom: 5px;
  cursor: pointer;
  display: none;
  border-radius: 25px;
  border:2px solid #6C7C89;
  color: #6C7C89;
  text-align: center;
  z-index: 999;
}
</style>
<div id="yukari" title="EN YUKARI ÇIK"><i class="fa fa-arrow-up"></i></div>

<!-- Right Panel -->

<?php if(isset($data['lazy'])){ if($data['lazy']===1){ ?>
    <script type="text/javascript">
        lazyload();
    </script>
<?php } /**/ } /**/ //isset and if x ?>



    <script src="view/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="view/js/plugins.js"></script>
    <script src="view/js/main.js"></script>


    <script src="view/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="view/js/dashboard.js"></script>
    <script src="view/js/widgets.js"></script>
    <script src="view/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="view/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="view/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="view/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script src="view/js/lib/chosen/chosen.jquery.min.js"></script>

    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>



    <!--İNPUTLAR İÇİN ÇOKLU SEÇİM ARAMA VS-->
    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Malesef, Bulunamadı!",
                width: "100%"
            });
        });
    </script>


<!-- yukarı çık -->
<script type="text/javascript">
      //BU SCPRİT EN YUKARI(TOP) SCPRİTİDİR. ALİ BUYUKKILINC
  $(window).scroll(function(){
    if ($(this).scrollTop() > 333)    // Sayfa ne kadar aşağı kayarsa buton görünsün. 100 sayısı = Kaydırma çubuğunun piksel konumu. Bu sayı değiştirilebilir.
        $("#yukari").fadeIn(500);    // Yukarı çık butonu ne kadar hızla ortaya çıksın. 500 milisaniye = 0,5 saniye. Bu sayı değiştirilebilir.
    else
        $("#yukari").fadeOut(500);    // Yukarı çık butonu ne kadar hızla ortadan kaybolsun. 500 milisaniye = 0,5 saniye. Bu sayı değiştirilebilir.
    });
    $(document).ready(function(){
        $("#yukari").click(function(){    // Yukarı çık butonuna tıklanıldığında aşağıdaki satır çalışır.
            $("html, body").animate({ scrollTop: "0" }, 900);    // Sayfa ne kadar hızla en yukarı çıksın.
            // 0 sayısı sayfanın en üstüne çıkılacağını belirtir.
            // 500 sayısı ne kadar hızla çıkılacağını belirtir. 500 milisaniye = 0,5 saniye. Bu sayı değiştirilebilir.
            return false;
        });
    });


/*FİLTRELEME BÖLÜMÜNDE KOLAY TARİH SEÇMEK İÇİN KULLANILIR */
<?php
  // First day of this month
  $d = new DateTime('first day of this month');
  $bu_ay_basla = $d->format('Y-m-d');

  $d = new DateTime('previous day');
  $dun = $d->format('Y-m-d');

  $d = new DateTime('this day');
  $bugun = $d->format('Y-m-d');

  $ds = new DateTime('first day of next month');
  $bu_ay_bitis = $ds->format('Y-m-d');

  // First day of this month
  $d = new DateTime('first day of last month');
  $gecen_ay_basla = $d->format('Y-m-d');

  $ds = new DateTime('first day of this month');
  $gecen_ay_bitis = $ds->format('Y-m-d');
?>

function tarih_sec(){
  karart();
  $(".tarih_sec").show("slow");
}//fnk tarih sec x

function class_temizle(){
  $("#dun").removeClass("yesil3");
  $("#bugun").removeClass("yesil3");
  $("#buay").removeClass("yesil3");
  $("#gecenay").removeClass("yesil3");
}//fnk class temizle x

 var bu_ay_basla =  "<?php echo $bu_ay_basla; ?>";
 var bugun =  "<?php echo $bugun; ?>";
 var dun =  "<?php echo $dun; ?>";
 var bu_ay_bitis =  "<?php echo $bu_ay_bitis; ?>";
 var gecen_ay_basla =  "<?php echo $gecen_ay_basla; ?>";
 var gecen_ay_bitis =  "<?php echo $gecen_ay_bitis; ?>";

 var btar = $("input[name='baslangic_tarihi']");
 var btstar = $("input[name='bitis_tarihi']");

$("#bugun").click(function() {
  class_temizle();
  $("#bugun").addClass("yesil3");
  btar.val(bugun);
  $(".tarih_sec").hide("slow");
  popkapat();
});

$("#dun").click(function() {
  class_temizle();
  $("#dun").addClass("yesil3");
  btar.val(dun);
  $(".tarih_sec").hide("slow");
  popkapat();
});

$("#buay").click(function() {
  class_temizle();
  $("#buay").addClass("yesil3");
  btar.val(bu_ay_basla);
  btstar.val(bu_ay_bitis);
  $(".tarih_sec").hide("slow");
  popkapat();
});

$("#gecenay").click(function() {
  class_temizle();
  $("#gecenay").addClass("yesil3");
  btar.val(gecen_ay_basla);
  btstar.val(gecen_ay_bitis);
  $(".tarih_sec").hide("slow");
  popkapat();
});

$(".filtre_ac").click(function() {
  $(".filtre_tablo").slideToggle("slow");
});
</script>


</body>
</html>
