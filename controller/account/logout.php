<?php

$cikis = $load->model("logout"); //manuel controller olarak customer modelini load ettik 

$data = array( 
		"dizin"      => DIZIN,
		"site"       => SITE,
		"msite"      => MSITE,
		"title"      => "NEVA STYLE COLLECTIONS | LOGOUT",
		"url"        => PANEL,
		"next"       => "index.php",
);

header("Location:" . PANEL);

?>