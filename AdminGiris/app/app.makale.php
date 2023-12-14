<?php
date_default_timezone_set('Europe/Istanbul');
$token = substr(md5(uniqid()),0,8);
	$newName 	= str_replace("=","",$token);
## Sayfa Ekle
if($_GET["p"]=="makale_ekle"){
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
		$sayfa_urls = $sayfa_adi."-".$newName;
	}else{
		$sayfa_urls = $sayfa_urlcc."-".$newName;
	}
				$sayfa_url 			= sef_link($sayfa_urls);
			$sayfa_desc 		= p("sayfa_desc");
			$sayfa_icerik 		= ptirnak("sayfa_icerik");
			$secenekHaber 		= p("secenekHaber");
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
		
		$insert =$db->query("INSERT INTO makaleler SET
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
				resim_goster 	= '$resim_goster',
				sorucevap 	= '$sorucevap',
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
		if (!$dosya){
						$sabitresim = $db->query("SELECT * FROM haberkategori WHERE kategori_id='$portkat' ")->fetch(PDO::FETCH_ASSOC);
						$resimAdi = $sabitresim["kategori_sabitresim"];
						$imgInsert = $db->query("UPDATE makaleler SET sayfa_resim = '$resimAdi' WHERE sayfa_id = '$last_insert_id'");
					}else{
require_once("app-upload/app.upload.php");
				require_once("app-upload/makale_resim_add.php");
					}
					
			
				
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
## Sayfa Düzenle
if($_GET["p"]=="makale_edit"){
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
				$sayfa_url 			= sef_link($sayfa_urls);
			$sayfa_desc 		= p("sayfa_desc");
			$sayfa_icerik 		= ptirnak("sayfa_icerik");
			$secenekHaber 		= p("secenekHaber");
			$portkat 		= p("portkat");
			$sayfa_goster1 		= p("sayfa_goster1");
			$sorucevap 		=  htmlspecialchars(p("sorucevap"));

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
		$update =$db->query("UPDATE makaleler SET
					sayfa_adi 		= '$sayfa_adi',
					sayfa_url 		= '$sayfa_url',
					sayfa_desc 		= '$sayfa_desc',
				sayfa_icerik 	= '$sayfa_icerik',
				secenekHaber 	= '$secenekHaber',
				portkat 	= '$portkat',
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
			
			require_once("app-upload/makale_resim_edit.php");
		}
		if($update->rowCount() || $updateSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Sayfa Fotoğrafı Sil
if($_GET["p"]=="makale_foto_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM pageimages WHERE resim_id='$id'");
	if($kontrol->rowCount()){
		foreach($kontrol as $imgGetir){
			$buyukResim = "../images/makaleler/big/".$imgGetir["img"];
			$kucukResim = "../images/makaleler/thumb/".$imgGetir["img"];
			if(is_file($buyukResim)){unlink($buyukResim);}
			if(is_file($kucukResim)){unlink($kucukResim);}
		}
		$delete = $db->query("DELETE FROM pageimages WHERE resim_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Toplu Sayfa Sil
/*
if($_GET["p"]=="makale_sayfa_sil"){
	@$sayfaPost = $_POST["id"];
	if(!$sayfaPost){
		echo 'bos-deger';
	}else{
		foreach($sayfaPost as $sayfaID){
			$kontrol = $db->query("SELECT * FROM makaleler WHERE sayfa_id='$sayfaID'");
			if($kontrol->rowCount()){
				$imgKontrol = $db->query("SELECT * FROM pageimages WHERE pageId='$sayfaID'");
				if($imgKontrol->rowCount()){
					foreach($imgKontrol as $imgGetir){
						$imgID = $imgGetir["resim_id"];
						$buyukResim = "../images/makaleler/big/".$imgGetir["img"];
						$kucukResim = "../images/makaleler/thumb/".$imgGetir["img"];
						if(is_file($buyukResim)){unlink($buyukResim);}
						if(is_file($kucukResim)){unlink($kucukResim);}
						$deleteImg = $db->query("DELETE FROM pageimages WHERE resim_id='$imgID'");
					}
				}else{
					//
				}
				$delete = $db->query("DELETE FROM makaleler WHERE sayfa_id='$sayfaID'");
			}else{
			}
		}
		echo 'basarili';
	}
}*/
#Tek Sayfa Sil
if($_GET["p"]=="makale_sayfa_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM makaleler WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$kontrolRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/makaleler/big/".$kontrolRow["sayfa_resim"];
		$kucukResim = "../images/makaleler/thumb/".$kontrolRow["sayfa_resim"];
		if(is_file($buyukResim)){unlink($buyukResim);}
		if(is_file($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM makaleler WHERE sayfa_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
if($_GET["p"]=="makaleonay"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM makaleler WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["sayfa_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE makaleler SET sayfa_durum=0 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}else{
			$update = $db->query("UPDATE makaleler SET sayfa_durum=1 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';exit();
			}
		}
	}
}

if($_GET["p"]=="makalelertarihguncelle"){
	$sayfa_tarih 		= p("sayfa_tarih")." ".p("sayfa_time");
	 $id = $_POST["id"];
$saydir = count($id);
for ($i=0; $i < $saydir ; $i++) { 
$ids = $id[$i];
	$kontrol = $db->query("SELECT * FROM makaleler WHERE sayfa_id='$ids'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
			$update = $db->query("UPDATE makaleler SET sayfa_tarih='$sayfa_tarih' WHERE sayfa_id='$ids'");
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



if($_GET["p"]=="makaleonay2"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM makaleler WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["sayfa_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE makaleler SET sayfa_durum=2 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}else{
			$update = $db->query("UPDATE makaleler SET sayfa_durum=2 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}
	}
}
if($_GET["p"]=="hit_bosalt"){
		$delete = $db->query("UPDATE makaleler SET yazi_gunluk_hit=0");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	
}
## Sayfa Düzenle
if($_GET["p"]=="burc_edit"){
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
				$sayfa_url 			= sef_link($sayfa_urls);
			$sayfa_desc 		= p("sayfa_desc");
			$sayfa_icerik 		= p("sayfa_icerik");
			$secenekHaber 		= p("secenekHaber");
			$portkat 		= p("portkat");
			$sayfa_goster1 		= p("sayfa_goster1");
			$resim_goster 		= p("resim_goster");
			$sayfa_goster2 		= p("sayfa_goster2");
			$en_sayfa_adi 		= p("en_sayfa_adi");
			$en_sayfa_desc 		= p("en_sayfa_desc");
			$en_sayfa_icerik 		= p("en_sayfa_icerik");
			$tariharalik 		= p("tariharalik");
			$ar_sayfa_adi 		= p("ar_sayfa_adi");
			$ar_sayfa_desc 		= p("ar_sayfa_desc");
			$ar_sayfa_icerik 		= p("ar_sayfa_icerik");
			$fa_sayfa_adi 		= p("fa_sayfa_adi");
			$fa_sayfa_desc 		= p("fa_sayfa_desc");
			$fa_sayfa_icerik 		= p("fa_sayfa_icerik");
			$en_sayfa_keyw 		= p("en_sayfa_keyw");
			$ar_sayfa_keyw 		= p("ar_sayfa_keyw");
			$fa_sayfa_keyw 		= p("fa_sayfa_keyw");
			$en_resim_baslik 		= p("en_resim_baslik");
			$ar_resim_baslik 		= p("ar_resim_baslik");
				$makalekonum_ustslider 		= p("makalekonum_ustslider");
			$makalekonum_mansetyani 		= p("makalekonum_mansetyani");
			$makalekonum_sonyazilar 		= p("makalekonum_sonyazilar");
			$makalekonum_populeryazilar 		= p("makalekonum_populeryazilar");
			$makalekonum_buyukliste 		= p("makalekonum_buyukliste");
			$makalekonum_aramablog 		= p("makalekonum_aramablog");
			$resim_baslik 		= p("resim_baslik");
				$makale_durum_pop 		= p("makale_durum_pop");
			$sayfa_keyw 		= p("sayfa_keyw");
			$sayfa_tarih 		= p("sayfa_tarih")." ".p("sayfa_time");
			$makale_inceleme_say 		= p("makale_inceleme_say");
			$makale_yildiz_say 		= p("makale_yildiz_say");
				$makalekonum_yeni 		= p("makalekonum_yeni");
			$makalekonum_footeryazi 		= p("makalekonum_footeryazi");
	
			$makale_etiket 		= p("makale_etiket");
			$sayfa_yazar 		= p("sayfa_yazar");
					$dosya 				= $_FILES["dosya"]["tmp_name"][0];
							$dosya2 				= $_FILES["dosya2"]["tmp_name"][0];
if(!$sayfa_adi || !$sayfa_tarih || !$sayfa_yazar){
		echo 'bos-deger';
	}else{
		$update =$db->query("UPDATE burclar SET
					sayfa_adi 		= '$sayfa_adi',
					sayfa_url 		= '$sayfa_url',
					sayfa_desc 		= '$sayfa_desc',
				sayfa_icerik 	= '$sayfa_icerik',
				secenekHaber 	= '$secenekHaber',
				resim_goster 	= '$resim_goster',
				portkat 	= '$portkat',
					makalekonum_ustslider 	= '$makalekonum_ustslider',
				makalekonum_mansetyani 	= '$makalekonum_mansetyani',
				makalekonum_sonyazilar 	= '$makalekonum_sonyazilar',
					makale_durum_pop 	= '$makale_durum_pop',
				makalekonum_populeryazilar 	= '$makalekonum_populeryazilar',
				makalekonum_buyukliste 	= '$makalekonum_buyukliste',
				makalekonum_aramablog 	= '$makalekonum_aramablog',
				makalekonum_yeni 	= '$makalekonum_yeni',
				makalekonum_footeryazi 	= '$makalekonum_footeryazi',
				resim_baslik 	= '$resim_baslik',
				sayfa_goster1 	= '$sayfa_goster1',
				sayfa_goster2 	= '$sayfa_goster2',
			en_sayfa_adi = '$en_sayfa_adi',
			en_sayfa_desc = '$en_sayfa_desc',
			en_sayfa_icerik = '$en_sayfa_icerik',
			tariharalik = '$tariharalik',
			ar_sayfa_adi = '$ar_sayfa_adi',
			ar_sayfa_desc = '$ar_sayfa_desc',
			ar_sayfa_icerik = '$ar_sayfa_icerik',
			fa_sayfa_adi = '$fa_sayfa_adi',
			fa_sayfa_desc = '$fa_sayfa_desc',
			fa_sayfa_icerik = '$fa_sayfa_icerik',
			en_sayfa_keyw = '$en_sayfa_keyw',
			ar_sayfa_keyw = '$ar_sayfa_keyw',
			fa_sayfa_keyw = '$fa_sayfa_keyw',
			en_resim_baslik = '$en_resim_baslik',
			ar_resim_baslik = '$ar_resim_baslik',
				sayfa_keyw 	= '$sayfa_keyw',
				sayfa_tarih 	= '$sayfa_tarih',
				makale_inceleme_say 	= '$makale_inceleme_say',
				makale_yildiz_say 	= '$makale_yildiz_say',
				makale_etiket 	= '$makale_etiket',
				sayfa_yazar 	= '$sayfa_yazar',
				sayfa_durum 	= '$sayfa_durum' WHERE sayfa_id='$sayfa_id'");
		require_once("app-upload/app.upload.php");
		if(strlen($dosya)>3){
			
			require_once("app-upload/burc_resim_edit.php");
		}
		if(strlen($dosya2)>3){
			
			require_once("app-upload/burc_resimicon_edit.php");
		}
		if($update->rowCount() || $updateSuccess|| $updateSuccess2){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
if($_GET["p"]=="burconay"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM burclar WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["sayfa_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE burclar SET sayfa_durum=0 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}else{
			$update = $db->query("UPDATE burclar SET sayfa_durum=1 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';exit();
			}
		}
	}
}
if($_GET["p"]=="burconay2"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM burclar WHERE sayfa_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["sayfa_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE burclar SET sayfa_durum=2 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}else{
			$update = $db->query("UPDATE burclar SET sayfa_durum=2 WHERE sayfa_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}
	}
}
if($_GET["p"]=="burc_hit_bosalt"){
		$delete = $db->query("UPDATE burclar SET yazi_gunluk_hit=0");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	
}
?>