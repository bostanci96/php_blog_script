<?php
date_default_timezone_set('Europe/Istanbul');
$token = substr(md5(uniqid()),0,8);
	$newName 	= str_replace("=","",$token);
## Sayfa Ekle
if($_GET["p"]=="duzsayfa_ekle"){
		$taslak = p("taslak");
		$yayin = p("yayin");
	if ($taslak) {
		$sayfa_durum = 2;
	}elseif ($yayin) {
		$sayfa_durum = 1;
	}
				$sayfa_adi 			= p("sayfa_adi");
	$sayfa_urlcc = p("sayfa_url");
	if (!$sayfa_urlcc) {
		$sayfa_urls = $sayfa_adi;
	}else{
		$sayfa_urls = $sayfa_urlcc;
	}
				$sayfa_url 			= sef_link($sayfa_urls);
			$sayfa_desc 		= p("sayfa_desc");
			$sayfa_icerik 		= ptirnak("sayfa_icerik");
			$secenekHaber 		= p("secenekHaber");
			$tariharalik 		= p("tariharalik");
			$portkat 		= p("portkat");
			$sayfa_goster1 		= p("sayfa_goster1");
			$sayfa_goster2 		= p("sayfa_goster2");
			$resim_baslik 		= p("resim_baslik");
			$sayfa_keyw 		= p("sayfa_keyw");
			$sorucevap 		=  htmlspecialchars(p("sorucevap"));
			$resim_goster 		= p("resim_goster");
			$makale_durum_pop 		= p("makale_durum_pop");
			$sayfa_tarih 		= p("sayfa_tarih")." ".p("sayfa_time");
			$makalekonum_ustslider 		= p("makalekonum_ustslider");
			$makalekonum_mansetyani 		= p("makalekonum_mansetyani");
			$makalekonum_sonyazilar 		= p("makalekonum_sonyazilar");
			$makalekonum_populeryazilar 		= p("makalekonum_populeryazilar");
			$makalekonum_buyukliste 		= p("makalekonum_buyukliste");
			$makalekonum_aramablog 		= p("makalekonum_aramablog");
			$makalekonum_yeni 		= p("makalekonum_yeni");
			$makalekonum_footeryazi 		= p("makalekonum_footeryazi");
			$makalekonum_manset 		= p("makalekonum_manset");
			$makale_inceleme_say 		= p("makale_inceleme_say");
			$makale_yildiz_say 		= p("makale_yildiz_say");
			$makalekonum_astroloji 		= p("makalekonum_astroloji");
			$makale_etiket 		= p("makale_etiket");
				$hashtag 		= p("hashtag");
			$sayfa_yazar 		= p("sayfa_yazar");
					@$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	if(!$sayfa_adi || !$sayfa_tarih || !$sayfa_yazar){
		echo 'bos-deger';
	}else{
		
		$insert =$db->query("INSERT INTO duzsayfa SET
					sayfa_adi 		= '$sayfa_adi',
					sayfa_url 		= '$sayfa_url',
					sayfa_desc 		= '$sayfa_desc',
				sayfa_icerik 	= '$sayfa_icerik',
				secenekHaber 	= '$secenekHaber',
				portkat 	= '$portkat',
				resim_baslik 	= '$resim_baslik',
				sayfa_goster1 	= '$sayfa_goster1',
				sayfa_goster2 	= '$sayfa_goster2',
				sayfa_keyw 	= '$sayfa_keyw',
				tariharalik 	= '$tariharalik',
				sorucevap 	= '$sorucevap',
				resim_goster 	= '$resim_goster',
				makale_durum_pop 	= '$makale_durum_pop',
				sayfa_tarih 	= '$sayfa_tarih',
				makale_inceleme_say 	= '$makale_inceleme_say',
				makale_yildiz_say 	= '$makale_yildiz_say',
				makalekonum_astroloji 	= '$makalekonum_astroloji',
				makale_etiket 	= '$makale_etiket',
				sayfa_yazar 	= '$sayfa_yazar',
				hashtag 	= '$hashtag',
				makalekonum_ustslider 	= '$makalekonum_ustslider',
				makalekonum_mansetyani 	= '$makalekonum_mansetyani',
				makalekonum_sonyazilar 	= '$makalekonum_sonyazilar',
				makalekonum_populeryazilar 	= '$makalekonum_populeryazilar',
				makalekonum_buyukliste 	= '$makalekonum_buyukliste',
				makalekonum_aramablog 	= '$makalekonum_aramablog',
				makalekonum_yeni 	= '$makalekonum_yeni',
				makalekonum_footeryazi 	= '$makalekonum_footeryazi',
				makalekonum_manset 	= '$makalekonum_manset',
				sayfa_durum 	= '$sayfa_durum'");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			if($last_insert_id){
require_once("app-upload/app.upload.php");
				require_once("app-upload/duzsayfa_resim_add.php");
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
## Sayfa Düzenle
if($_GET["p"]=="duzsayfa_edit"){
				$sayfa_id 			= p("sayfa_id");
			$taslak = p("taslak");
		$yayin = p("yayin");
	if ($taslak) {
		$sayfa_durum = 2;
	}elseif ($yayin) {
		$sayfa_durum = 1;
	}
				$sayfa_adi 			= p("sayfa_adi");
	$sayfa_urlcc = p("sayfa_url");
	if (!$sayfa_urlcc) {
		$sayfa_urls = $sayfa_adi;
	}else{
		$sayfa_urls = $sayfa_urlcc;
	}
	$tariharalik 		= p("tariharalik");
				$sayfa_url 			= sef_link($sayfa_urls);
			$sayfa_desc 		= p("sayfa_desc");
			$sayfa_icerik 		= ptirnak("sayfa_icerik");
			$secenekHaber 		= p("secenekHaber");
			$portkat 		= p("portkat");
			$sayfa_goster1 		= p("sayfa_goster1");
			$sayfa_goster2 		= p("sayfa_goster2");
				$makalekonum_ustslider 		= p("makalekonum_ustslider");
			$makalekonum_mansetyani 		= p("makalekonum_mansetyani");
			$makalekonum_sonyazilar 		= p("makalekonum_sonyazilar");
			$makalekonum_populeryazilar 		= p("makalekonum_populeryazilar");
			$makalekonum_buyukliste 		= p("makalekonum_buyukliste");
			$makalekonum_aramablog 		= p("makalekonum_aramablog");
				$makalekonum_astroloji 		= p("makalekonum_astroloji");
			$resim_baslik 		= p("resim_baslik");
				$makale_durum_pop 		= p("makale_durum_pop");
			$sayfa_keyw 		= p("sayfa_keyw");
			$sorucevap 		=  htmlspecialchars(p("sorucevap"));
			$resim_goster 		= p("resim_goster");
			$sayfa_tarih 		= p("sayfa_tarih")." ".p("sayfa_time");
			$makale_inceleme_say 		= p("makale_inceleme_say");
			$makale_yildiz_say 		= p("makale_yildiz_say");
				$makalekonum_yeni 		= p("makalekonum_yeni");
					$makalekonum_manset 		= p("makalekonum_manset");
			$makalekonum_footeryazi 		= p("makalekonum_footeryazi");
	
			$hashtag 		= p("hashtag");
			$makale_etiket 		= p("makale_etiket");
			$sayfa_yazar 		= p("sayfa_yazar");
					$dosya 				= $_FILES["dosya"]["tmp_name"][0];
if(!$sayfa_adi || !$sayfa_tarih || !$sayfa_yazar){
		echo 'bos-deger';
	}else{
		$update =$db->query("UPDATE duzsayfa SET
					sayfa_adi 		= '$sayfa_adi',
					sayfa_url 		= '$sayfa_url',
					sayfa_desc 		= '$sayfa_desc',
				sayfa_icerik 	= '$sayfa_icerik',
				secenekHaber 	= '$secenekHaber',
				portkat 	= '$portkat',
				tariharalik 	= '$tariharalik',
				sorucevap 	= '$sorucevap',
					makalekonum_ustslider 	= '$makalekonum_ustslider',
				makalekonum_mansetyani 	= '$makalekonum_mansetyani',
				makalekonum_sonyazilar 	= '$makalekonum_sonyazilar',
					makale_durum_pop 	= '$makale_durum_pop',
					makalekonum_astroloji 	= '$makalekonum_astroloji',
				makalekonum_populeryazilar 	= '$makalekonum_populeryazilar',
				makalekonum_buyukliste 	= '$makalekonum_buyukliste',
				makalekonum_aramablog 	= '$makalekonum_aramablog',
				makalekonum_yeni 	= '$makalekonum_yeni',
				makalekonum_footeryazi 	= '$makalekonum_footeryazi',
				resim_baslik 	= '$resim_baslik',
				sayfa_goster1 	= '$sayfa_goster1',
				sayfa_goster2 	= '$sayfa_goster2',
				sayfa_keyw 	= '$sayfa_keyw',
				resim_goster 	= '$resim_goster',
				sayfa_tarih 	= '$sayfa_tarih',
				hashtag 	= '$hashtag',
				makale_inceleme_say 	= '$makale_inceleme_say',
				makale_yildiz_say 	= '$makale_yildiz_say',
				makalekonum_manset 	= '$makalekonum_manset',
				makale_etiket 	= '$makale_etiket',
				sayfa_yazar 	= '$sayfa_yazar',
				sayfa_durum 	= '$sayfa_durum' WHERE sayfa_id='$sayfa_id'");
		require_once("app-upload/app.upload.php");
		if(strlen($dosya)>3){
			
			require_once("app-upload/duzsayfa_resim_edit.php");
		}
		if($update->rowCount() || $updateSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Tek Sayfa Sil
if($_GET["p"]=="duzsayfa_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM duzsayfa WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$kontrolRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/duzsayfa/big/".$kontrolRow["sayfa_resim"];
		$kucukResim = "../images/duzsayfa/thumb/".$kontrolRow["sayfa_resim"];
		if(is_file($buyukResim)){unlink($buyukResim);}
		if(is_file($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM duzsayfa WHERE sayfa_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
if($_GET["p"]=="duzsayfaonay"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM duzsayfa WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["sayfa_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE duzsayfa SET sayfa_durum=0 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}else{
			$update = $db->query("UPDATE duzsayfa SET sayfa_durum=1 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';exit();
			}
		}
	}
}
if($_GET["p"]=="duzsayfaonay2"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM duzsayfa WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["sayfa_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE duzsayfa SET sayfa_durum=2 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}else{
			$update = $db->query("UPDATE duzsayfa SET sayfa_durum=2 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}
	}
}
if($_GET["p"]=="duzyazilartarihguncelle"){
	$sayfa_tarih 		= p("sayfa_tarih")." ".p("sayfa_time");
	 $id = $_POST["id"];
$saydir = count($id);
for ($i=0; $i < $saydir ; $i++) { 
$ids = $id[$i];
	$kontrol = $db->query("SELECT * FROM duzsayfa WHERE sayfa_id='$ids'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
			$update = $db->query("UPDATE duzsayfa SET sayfa_tarih='$sayfa_tarih' WHERE sayfa_id='$ids'");
			if($update->rowCount()){
			
			}else{
				echo 'basarisiz';exit();
			}
		}
	}
	if ($i = $saydir) {
				echo 'basarili';
				}
}
if($_GET["p"]=="duzsayfahit_bosalt"){
		$delete = $db->query("UPDATE duzsayfa SET yazi_gunluk_hit=0");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	
}
?>