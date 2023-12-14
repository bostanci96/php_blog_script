<?php

## Ayar dosyasını çekiyoruz.
require_once('AdminGiris/host/a.php');

if ($bakim["bakim_mod"]==1) {

if(empty($_SESSION["login"])){		
require(TEMA_YAPIM."/index.php");
}else{
	require(TEMA_INC."/index.php");
}

}else{
	require(TEMA_INC."/index.php");
}

?>