<?php

class Load {
	

	public function model($yol,$yukle){
		
		$dosya_adi = PDIZIN.'/model/'.$yol.'/'.$yukle.'.php';
		
		 if (file_exists($dosya_adi)){ //var mı diye konrol et 

			 include($dosya_adi);
		     return new $yukle();

	 	} else { //eğer model dosyası yoksa 

	 		echo "DAHİL ETTİĞİNİZ MODEL DOSYASI BULUNAMADI";
	 	}// if file x

	} //function model x



	public function view($yol,$yukle,$data = array()){
     
      $dosya_adi = PDIZIN.'/view/template/'.$yol.'/'.$yukle.'.php';
      
      if (file_exists($dosya_adi)){ //var mı diye konrol et
      	if($data){ 
	     	extract($data);
	     }//if data 
		 	include($dosya_adi);

		} else { //eğer boyle bir dosya yoksa
			echo 'DAHİL ETTİĞİNİZ VİEW DOSYASI BULUNAMADI : <b>'.$yukle.'</b>';
			include(PDIZIN.'/view/template/common/404tmp.php');

		} // if dosya var mı x
	
	} ////function view x


	public function controller($yol,$yukle){
      $dosya_adi = PDIZIN.'/controller/'.$yol.'/'.$yukle.'.php';

      if (file_exists($dosya_adi)){ //var mı diye konrol et 
     	include($dosya_adi);

 		} else { //controller bulunamadıysa
 			include(PDIZIN.'/controller/common/404.php');
 		}//if dosya varsa
	
	} ////function controller x

} //Load x 

$load = new Load();
$isl = $load->model('genel','genel'); //genel fonksiyonları içeren class dosyasını yükledik

?>