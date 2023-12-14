<?php
	#Tek Üye Sil 

if($_GET["p"]=="tek_uye_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM uyeler WHERE uye_id='$id'");
	if($kontrol->rowCount()){
		$delete = $db->query("DELETE FROM uyeler WHERE uye_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

#Durum Değiştir

if($_GET["p"]=="uye_durum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM uyeler WHERE uye_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["uye_onay"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE uyeler SET uye_onay=0 WHERE uye_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';
			}
		}else{
			$update = $db->query("UPDATE uyeler SET uye_onay=1 WHERE uye_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';
			}
		}
	}
}


#Üye Ekle
if($_GET["p"]=="uye_add"){
	$uye_ad 		= p("uye_ad");
	$uye_soyad 		= p("uye_soyad");
	$uye_eposta 	= p("uye_eposta");
	$uye_telefon 	= p("uye_telefon");
	$uye_sabit 		= p("uye_sabit");
	$uye_rutbe 		= p("uye_rutbe");
	$uye_kadi 		= p("uye_kadi");
	$uye_url 		= xatsef_link(p("uye_url"));
	$uye_kadisecimi 		= p("uye_kadisecimi");
	$uye_sifre 		= md5(p("uye_sifre"));
	$uye_sifre_2 	= md5(p("uye_sifre_tekrar"));
	$uye_pin 	= md5(p("uye_pin"));
	if (!$uye_url) {
	if ($uye_kadisecimi=0) {
	$uye_url =	xatsef_link($uye_kadi);
	}else{
		$adsx = $uye_ad." ".$uye_soyad;
		$uye_url =	xatsef_link($adsx);
	}
	}
	
	if(!$uye_ad || !$uye_soyad || !$uye_eposta || !$uye_sifre || !$uye_sifre_2 || !$uye_pin ){
		echo 'bos-deger';
	}elseif($uye_sifre!=$uye_sifre_2){
		echo 'sifreler-uyusmuyor';
	}elseif (!filter_var($uye_eposta, FILTER_VALIDATE_EMAIL)) {
		echo 'gecersiz-eposta';
	}else{
		$mailCheck = $db->query("SELECT * FROM uyeler WHERE uye_eposta='$uye_eposta'");
		if($mailCheck->rowCount()){
			echo 'eposta-alinmis';
		}else{
			$insert = $db->query("INSERT into uyeler SET
				uye_ad 		= '$uye_ad',
				uye_soyad 	= '$uye_soyad',
				uye_eposta 	= '$uye_eposta',
				uye_sifre 	= '$uye_sifre',
				uye_telefon = '$uye_telefon',
				uye_sabit 	= '$uye_sabit',
				uye_rutbe 	= '$uye_rutbe',
				uye_pin 	= '$uye_pin',
				uye_url 	= '$uye_url',
				uye_kadi 	= '$uye_kadi',
				uye_kadisecimi 	= '$uye_kadisecimi',
				uye_onay 	= 1");
			if($insert->rowCount()){
				echo 'basarili';
			}else{
				echo 'basarisiz';
			}
		}
	}
}

#Üye Güncelle

if($_GET["p"]=="uye_edit"){
	$uye_id 		= p("uye_id");
	$uye_ad 		= p("uye_ad");
	$uye_soyad 		= p("uye_soyad");
	$uye_eposta 	= p("uye_eposta");
	$uye_sifre 		= md5(p("uye_sifre"));
	$uye_sifre_2 	= md5(p("uye_sifre_tekrar"));
	$uye_telefon 	= p("uye_telefon");
	$uye_sabit 		= p("uye_sabit");
	$uye_rutbe 		= p("uye_rutbe");
	$uye_kadi 		= p("uye_kadi");
	$uye_url 		= sef_link(p("uye_url"));
	$uye_kadisecimi 		= p("uye_kadisecimi");
	if (!$uye_url) {
	if ($uye_kadisecimi=0) {
	$uye_url =	sef_link($uye_kadi);
	}else{
		$adsx = $uye_ad." ".$uye_soyad;
		$uye_url =	sef_link($adsx);
	}
	}
	if(!$uye_id || !$uye_ad || !$uye_soyad || !$uye_eposta){
		echo 'bos-deger';

	}elseif($uye_sifre!=$uye_sifre_2){
		echo 'sifreler-uyusmuyor';
	}elseif (!filter_var($uye_eposta, FILTER_VALIDATE_EMAIL)) {
		echo 'gecersiz-eposta';
	}else{
		$insert = $db->query("UPDATE uyeler SET 
			uye_ad 		= '$uye_ad',
			uye_soyad 	= '$uye_soyad',
			uye_eposta 	= '$uye_eposta',
			uye_rutbe 	= '$uye_rutbe',
			uye_url 	= '$uye_url',
				uye_kadi 	= '$uye_kadi',
				uye_kadisecimi 	= '$uye_kadisecimi',
			uye_telefon = '$uye_telefon',
			uye_sabit 	= '$uye_sabit' WHERE uye_id='$uye_id'");
		if($insert->rowCount()){
			echo 'basarili';
		}else{
			echo 'degisiklik-yok';
		}
	}
}
if($_GET["p"]=="uye_edit_sifre"){
	$uye_id 		= p("uye_id");
	$uye_sifre 		= md5(p("uye_sifre"));
	$uye_sifre_2 	= md5(p("uye_sifre_tekrar"));
	if(!$uye_id || !$uye_sifre || !$uye_sifre_2){
		echo 'bos-deger';

	}elseif($uye_sifre!=$uye_sifre_2){
		echo 'sifreler-uyusmuyor';
	}else{
		$insert = $db->query("UPDATE uyeler SET 
		uye_sifre =	'$uye_sifre' 
		 WHERE uye_id='$uye_id'");
		if($insert->rowCount()){
			echo 'basarili';
		}else{
			echo 'degisiklik-yok';
		}
	}
}
?>