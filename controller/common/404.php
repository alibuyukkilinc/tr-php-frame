<?php // 404 PHP CONTROLLLER

$data =array(
	"adres" => $isl->get('location')
	);

   $load->view('common','404',$data);


?>

