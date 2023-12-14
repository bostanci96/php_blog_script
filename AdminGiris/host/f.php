<?php 

function p($par,$st=false){
	return str_replace(array("'", "\""), array("&#39;", "&quot;"), trim($_POST[$par]));
	if($st){
		return str_replace(array("'", "\""), array("&#39;", "&quot;"), addslashes(htmlspecialchars($_POST[$par])));
	}else{
		return str_replace(array("'", "\""), array("&#39;", "&quot;"), addslashes(trim($_POST[$par])));
	}
}
function ptirnak($par,$st=false){
	return str_replace(array("'"), array("&#39;"), trim($_POST[$par]));
	if($st){
		return str_replace(array("'"), array("&#39;"), addslashes(htmlspecialchars($_POST[$par])));
	}else{
		return str_replace(array("'"), array("&#39;"), addslashes(trim($_POST[$par])));
	}
}
function hicptirnak($par,$st=false){
	return trim($_POST[$par]);
	if($st){
		return addslashes(htmlspecialchars($_POST[$par]));
	}else{
		return addslashes(trim($_POST[$par]));
	}
}
function etiket_url_donustur($post){
	$parcala = str_word_count($post,1," ıİüÜöÖğĞçÇşŞ1234567890");
	$dizi = '';
	foreach($parcala as $etiket){
		$etiket = sef_link($etiket);
		$dizi.=$etiket.",";
	}
	$dizi = rtrim($dizi,",");
	return $dizi;
}
function GetIP(){
	if(getenv("HTTP_CLIENT_IP")) {
		$ip = getenv("HTTP_CLIENT_IP");
	} elseif(getenv("HTTP_X_FORWARDED_FOR")) {
		$ip = getenv("HTTP_X_FORWARDED_FOR");
		if (strstr($ip, ',')) {
			$tmp = explode (',', $ip);
			$ip = trim($tmp[0]);
		}
	} else {
		$ip = getenv("REMOTE_ADDR");
	}
	return $ip;
}
function alert($string){
	echo '<h4 class="alert_error">'.$string.'</h4>';
}
function getir($baslangic, $son, $cekilmek_istenen) {
    @preg_match_all('/' . preg_quote($baslangic, '/') . '(.*?)' . preg_quote($son, '/') . '/i', $cekilmek_istenen, $m);
    return @$m[1];
}


function success($string){
	echo '<h4 class="alert_success">'.$string.'</h4>';
}
function g($par){
	return strip_tags(trim(addslashes($_GET[$par])));
}

function kisalt($par,$uzunluk=600){
	if(strlen($par)>$uzunluk){
		$par = mb_substr($par, 0 , $uzunluk,"UTF-8")."...";
	}
	return $par;
}

function go($par,$time=0){
	if($time==0){
		header("Location:{$par}");
	}else{
		header("Refresh:$time; url={$par}");
	}
}

function session($par){
	if($_SESSION[$par]){
		return $_SESSION[$par];
	}else{
		return false;
	}
}

function cookie($par)
{
	if(isset($_COOKIE[$par]))
	{
		return $_COOKIE[$par];
	}
	else
	{
		return false;
	}
}

function ss($par){
	return stripslashes($par);
}



function session_olustur($par){
	foreach($par as $anahtar => $deger){
		$_SESSION[$anahtar] = $deger;
	}
}

function sef_link($string)
{
	$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
	$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
	$string = strtolower(str_replace($find, $replace, $string));
	$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
	$string = trim(preg_replace('/\s+/', ' ', $string));
	$string = str_replace(' ', '-', $string);
	$string = str_replace('.', '',$string);
	return $string;
}
function xatsef_link($string)
{
	$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
	$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
	$string = strtolower(str_replace($find, $replace, $string));
	$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
	$string = trim(preg_replace('/\s+/', ' ', $string));
	$string = str_replace(' ', '-', $string);
	$string = str_replace('_', '-', $string);
	$string = str_replace('.', '',$string);
	return $string;
}

function ters_sef_link($string)
{
	$find = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
	$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', '+', '#');
	$string = strtolower(str_replace($find, $replace, $string));

	$string = trim(preg_replace('/\s+/', ' ', $string));
	$string = str_replace('-', ' ', $string);
	$string = str_replace('.', '',$string);
	return $string;
}


function tarih($par){
	$ay			= substr($par,5,2);
	$eski_ay  = array("01","02","03","04","05","06","07","08","09","10","11","12");
	$yeni_ay  = array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");
	return substr($par,8,2).' '.str_replace($eski_ay,$yeni_ay,$ay).' '.substr($par,0,4);
}
function related_tarihxx($par){
	$ay			= substr($par,5,2);
	$eski_ay  = array("01","02","03","04","05","06","07","08","09","10","11","12");
	$yeni_ay  = array("01","02","03","04","05","06","06","08","09","10","11","12");
	return substr($par,0,4)."-".str_replace($eski_ay,$yeni_ay,$ay).'-'.substr($par,8,2);
}
function bugunungunu($par){
	$gunler= array(0=>"Paz",1=>"Pzt",2=>"Sal",3=>"Çar",4=>"Per",5=>"Cum",6=>"Cmt");
	return $gunler[$par];
}


function ckeditor($editorName="editor1"){
	
	echo "<script type='text/javascript' language='javascript'>
	CKEDITOR.replace('".$editorName."',{

		filebrowserBrowseUrl : '".ADMIN_URL."app-assets/libs/browser/browse.php',
filebrowserImageBrowseUrl : '".ADMIN_URL."app-assets/libs/browser/browse.php?type=Images',
filebrowserUploadUrl : '".ADMIN_URL."app-assets/libs/uploader/upload.php',
filebrowserImageUploadUrl : '".ADMIN_URL."app-assets/libs/uploader/upload.php?type=Images',


</script>";
}


function reskup($tag,$str){

$text = $str;

preg_match_all('@<'.$tag.'>(.*?)</'.$tag.'>@si', $text, $sonuc); 
$toplamtag = count($sonuc[0])-1;
$sayi = 0;
for ($i=0; $i <= $toplamtag; $i++) { 

	$explode = explode("<".$tag.">", $sonuc[0][$i]);
	$explodes = explode("</".$tag.">", $explode[1]);
	$text = str_replace($sonuc[0][$i], "<".$tag." id=".sef_link($explodes[0])." >".$explodes[0]."</".$tag.">", $text);
	$sayi++;
}
return $text ;

}
?>