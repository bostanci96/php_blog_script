<?php
session_start();
ob_start();


$dbHost  	= "localhost";
$dbName 	= "ozelblog";
$dbUser 	= "ozelblog";
$dbPass 	= "Bd9as8_5";

try{
	$db = new PDO("mysql:host=".$dbHost.";dbname=".$dbName.";charset=utf8",$dbUser,$dbPass);
	$db->query("SET CHARACTER SET UTF8");
	$db->query("SET NAMES 'utf8'");
}catch(PDOException $e){
	print $e->getMessage();
	die();
}
$ayar = $db->query("SELECT * FROM ayarlar")->fetch(PDO::FETCH_ASSOC);
$bakim = $db->query("SELECT * FROM bakim")->fetch(PDO::FETCH_ASSOC);

$tablobaslangic = $ayar["tablobaslangic"];
$tablobitis = $ayar["tablobitis"];
define("PATH",realpath("."));


define("URL",$ayar["site_url"]);


define("TEMA_URL",URL."tema/");

define("TEMA_INC","tema/");

define("ADMIN_URL",URL."AdminGiris/");
define("TEMA_YAPIM","tema/bakim/");
define("YAPIM_AST",URL."tema/bakim/yapim/");
					
define("SITE",TRUE);
define("HBURL","mk");
define("GBURL","gk");
define("HABER","makale/");
define("GALERİ","galeri/");
define("ASTRO","astroloji/");
define("SAYFA","sayfa/");
define("YAZAR","yazar/");
define("DUZSAYFA","detay/");
require_once("f.php");
?>
