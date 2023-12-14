<?php
if($_GET["p"]=="fotograf_edit"){
	$fotograf_id 			= p("fotograf_id");
	$fotograf_src 			= p("fotograf_src");
	$fotograf_shortDesc 	= p("fotograf_shortDesc");
	$fotografresim		= sef_link($fotograf_shortDesc);
	if(isset($_POST["fotograf_shortDesc2"])){$fotograf_shortDesc2=p("fotograf_shortDesc2");}else{$fotograf_shortDesc2="";}
	$fotograf_longDesc		= p("fotograf_longDesc");
	$fotograf_href 			= p("fotograf_href");

	$en_fotograf_shortDesc 	= p("en_fotograf_shortDesc");
	if(isset($_POST["en_fotograf_shortDesc2"])){$en_fotograf_shortDesc2=p("en_fotograf_shortDesc2");}else{$en_fotograf_shortDesc2="";}
	$en_fotograf_longDesc		= p("en_fotograf_longDesc");
	$en_fotograf_href 			= p("en_fotograf_href");

	$ar_fotograf_shortDesc 	= p("ar_fotograf_shortDesc");
	if(isset($_POST["ar_fotograf_shortDesc2"])){$ar_fotograf_shortDesc2=p("ar_fotograf_shortDesc2");}else{$ar_fotograf_shortDesc2="";}
	$ar_fotograf_longDesc		= p("ar_fotograf_longDesc");
	$ar_fotograf_href 			= p("ar_fotograf_href");

	$fa_fotograf_shortDesc 	= p("fa_fotograf_shortDesc");
	if(isset($_POST["fa_fotograf_shortDesc2"])){$fa_fotograf_shortDesc2=p("fa_fotograf_shortDesc2");}else{$fa_fotograf_shortDesc2="";}
	$fa_fotograf_longDesc		= p("fa_fotograf_longDesc");
	$fa_fotograf_href 			= p("fa_fotograf_href");
	$resim_baslik = p("resim_baslik");
	$en_resim_baslik = p("en_resim_baslik");
	$ar_resim_baslik = p("ar_resim_baslik");
	$fa_resim_baslik = p("fa_resim_baslik");
	$fotograf_bolum 		= p("fotograf_bolum");
	$fotograf_bolum2 		= p("fotograf_bolum2");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	@$refgaleri 				= $_FILES["refgaleri"]["tmp_name"][0];
	if(!$fotograf_id || !$fotograf_bolum || !$fotograf_shortDesc){
		echo 'bos-deger';
	}else{
		require_once("app-upload/app.upload.php");
		$update =$db->query("UPDATE fotograflar SET
			fotograf_longDesc 	= '$fotograf_longDesc',
			fotograf_shortDesc 	= '$fotograf_shortDesc',
			fotograf_shortDesc2 = '$fotograf_shortDesc2',
			fotograf_href 		= '$fotograf_href',
			en_fotograf_longDesc 	= '$en_fotograf_longDesc',
			en_fotograf_shortDesc 	= '$en_fotograf_shortDesc',
			en_fotograf_shortDesc2 	= '$en_fotograf_shortDesc2',
			en_fotograf_href 		= '$en_fotograf_href',

			fa_fotograf_longDesc 	= '$fa_fotograf_longDesc',
			fa_fotograf_shortDesc 	= '$fa_fotograf_shortDesc',
			fa_fotograf_shortDesc2 	= '$fa_fotograf_shortDesc2',
			fa_fotograf_href 		= '$fa_fotograf_href',
			ar_fotograf_longDesc 	= '$ar_fotograf_longDesc',
			ar_fotograf_shortDesc 	= '$ar_fotograf_shortDesc',
			ar_fotograf_shortDesc2 	= '$ar_fotograf_shortDesc2',
			ar_fotograf_href 		= '$ar_fotograf_href',
			fotograf_bolum 		= '$fotograf_bolum',
			fotograf_bolum2 		= '$fotograf_bolum2',resim_baslik='$resim_baslik',en_resim_baslik='$en_resim_baslik',ar_resim_baslik='$ar_resim_baslik',fa_resim_baslik='$fa_resim_baslik',
			fotograf_durum 		= 1 WHERE fotograf_id='$fotograf_id'");
		if(strlen($dosya)>3){
			require_once("app-upload/fotograf_resim_edit.php");
		}
		if(strlen($refgaleri)>3){
			$last_insert_id = $fotograf_id;
			require_once("app-upload/referans_galeri_add.php");
		}
		if($update->rowCount() || $updateSuccess || $galeriSuccess){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Fotoğraf Ekle
if($_GET["p"]=="fotograf_add"){

	$fotograf_shortDesc 	= p("fotograf_shortDesc");
	$fotografresim		= sef_link($fotograf_shortDesc);
	if(isset($_POST["fotograf_shortDesc2"])){$fotograf_shortDesc2=p("fotograf_shortDesc2");}else{$fotograf_shortDesc2="";}
	$fotograf_longDesc		= p("fotograf_longDesc");
	$fotograf_href 			= p("fotograf_href");
	$fotograf_bolum 		= p("fotograf_bolum");
	$fotograf_bolum2 		= p("fotograf_bolum2");
	$resim_baslik = p("resim_baslik");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	@$dosya2 				= $_FILES["dosya2"]["tmp_name"][0];
	@$refgaleri 				= $_FILES["refgaleri"]["tmp_name"][0];
	if(!$fotograf_shortDesc || !$fotograf_bolum){
		echo 'bos-deger';
	}else{
		$insert =$db->query("INSERT INTO fotograflar SET
			fotograf_longDesc 	= '$fotograf_longDesc',
			fotograf_shortDesc 	= '$fotograf_shortDesc',
			fotograf_shortDesc2 	= '$fotograf_shortDesc2',

			fotograf_href 		= '$fotograf_href',
			fotograf_bolum 		= '$fotograf_bolum',
			fotograf_bolum2 		= '$fotograf_bolum2',resim_baslik='$resim_baslik',
			fotograf_durum 		= 1
			");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			if($last_insert_id){
				require_once("app-upload/app.upload.php");
				require_once("app-upload/fotograf_resim_add.php");
				if(strlen($dosya2)>3){
					require_once("app-upload/katalog_pdf_add.php");
				}
				if(strlen($refgaleri)>3){
					require_once("app-upload/referans_galeri_add.php");
				}
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
#Tek Fotoğraf Sil 
if($_GET["p"]=="tek_foto_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM fotograflar WHERE fotograf_id='$id'");
	if($kontrol->rowCount()){
		$fotograf = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/photos/big/".$fotograf["fotograf_src"];
		$kucukResim = "../images/photos/thumb/".$fotograf["fotograf_src"];
		$pdf 		= "../images/katalog/".$fotograf["fotograf_href"];
		if(is_file($pdf)){unlink($pdf);}
		if(is_file($buyukResim)){unlink($buyukResim);}
		if(is_file($kucukResim)){unlink($kucukResim);}

		$fotograf_bolum = $fotograf["fotograf_bolum"];
		if($fotograf_bolum==2){
			$refControl = $db->query("SELECT * FROM referansresim WHERE resim_fotograf_id='$id'");
			if($refControl->rowCount()){
				foreach($refControl as $refRow){
					$refResimID = $refRow["resim_id"];
					$buyukResim = "../images/photos/big/".$refRow["resim_src"];
					$kucukResim = "../images/photos/thumb/".$refRow["resim_src"];
					if(is_file($buyukResim)){unlink($buyukResim);}
					if(is_file($kucukResim)){unlink($kucukResim);}
					$deleteRef = $db->query("DELETE FROM referansresim WHERE resim_id='$refResimID'");
				}
			}
		}


		$delete = $db->query("DELETE FROM fotograflar WHERE fotograf_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
if($_GET["p"]=="baslikresimguncelleurun"){
	$id = p("id");
	$resim_baslik = p("resim_baslik");
	$en_resim_baslik = p("en_resim_baslik");
	$ar_resim_baslik = p("ar_resim_baslik");
	$fa_resim_baslik = p("fa_resim_baslik");
	$update = $db->query("UPDATE urunresim SET resim_baslik='$resim_baslik',en_resim_baslik='$en_resim_baslik',ar_resim_baslik='$ar_resim_baslik',fa_resim_baslik='$fa_resim_baslik' WHERE resim_id='$id'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo "basarisiz";
	}
}



#Durum Değiştir
if($_GET["p"]=="baslikresimguncelle"){
	$id = p("id");
	$resim_baslik = p("resim_baslik");
	$en_resim_baslik = p("en_resim_baslik");
	$ar_resim_baslik = p("ar_resim_baslik");
	$fa_resim_baslik = p("fa_resim_baslik");
	$update = $db->query("UPDATE fotograflar SET resim_baslik='$resim_baslik',en_resim_baslik='$en_resim_baslik',ar_resim_baslik='$ar_resim_baslik',fa_resim_baslik='$fa_resim_baslik' WHERE fotograf_id='$id'");
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo "basarisiz";
	}
}

if($_GET["p"]=="foto_durum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM fotograflar WHERE fotograf_id='$id'");
	if($kontrol->rowCount()){
		$fotoRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$fotoDurum = $fotoRow["fotograf_durum"];
		if($fotoDurum==1){
			$update = $db->query("UPDATE fotograflar SET fotograf_durum=0 WHERE fotograf_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';
			}
		}else{
			$update = $db->query("UPDATE fotograflar SET fotograf_durum=1 WHERE fotograf_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';
			}
		}
	}
}

#Tek Fotoğraf Sil 
if($_GET["p"]=="tek_refresim_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM referansresim WHERE resim_id='$id'");
	if($kontrol->rowCount()){
		$fotograf = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/photos/big/".$fotograf["resim_src"];
		$kucukResim = "../images/photos/thumb/".$fotograf["resim_src"];
		if(is_file($buyukResim)){unlink($buyukResim);}
		if(is_file($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM referansresim WHERE resim_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}


if($_GET["p"]=="mansetSiraGuncelle"){
	$fotograf_id = p("fotograf_id");
	$sira_no = p("sira_no");
	$update = $db->prepare("UPDATE fotograflar SET foto_sira=:sira_no WHERE fotograf_id=:id");
	$update -> bindParam("sira_no",$sira_no,PDO::PARAM_INT);
	$update -> bindParam("id",$fotograf_id,PDO::PARAM_INT);
	$update -> execute();
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}





if($_GET["p"]=="reklam_edit"){
	$fotograf_id 			= ptirnak("fotograf_id");
	$fotograf_src 			= ptirnak("fotograf_src");
	$fotograf_shortDesc 	= ptirnak("fotograf_shortDesc");
	$fotografresim		= sef_link($fotograf_shortDesc);
	if(isset($_POST["fotograf_shortDesc2"])){$fotograf_shortDesc2=ptirnak("fotograf_shortDesc2");}else{$fotograf_shortDesc2="";}
	$fotograf_longDesc		= ptirnak("fotograf_longDesc");
	$fotograf_href 			= ptirnak("fotograf_href");

	$en_fotograf_shortDesc 	= ptirnak("en_fotograf_shortDesc");
	if(isset($_POST["en_fotograf_shortDesc2"])){$en_fotograf_shortDesc2=ptirnak("en_fotograf_shortDesc2");}else{$en_fotograf_shortDesc2="";}
	$en_fotograf_longDesc		= ptirnak("en_fotograf_longDesc");
	$en_fotograf_href 			= ptirnak("en_fotograf_href");

	$ar_fotograf_shortDesc 	= ptirnak("ar_fotograf_shortDesc");
	if(isset($_POST["ar_fotograf_shortDesc2"])){$ar_fotograf_shortDesc2=ptirnak("ar_fotograf_shortDesc2");}else{$ar_fotograf_shortDesc2="";}
	$ar_fotograf_longDesc		= ptirnak("ar_fotograf_longDesc");
	$ar_fotograf_href 			= ptirnak("ar_fotograf_href");

	$fa_fotograf_shortDesc 	= ptirnak("fa_fotograf_shortDesc");
	if(isset($_POST["fa_fotograf_shortDesc2"])){$fa_fotograf_shortDesc2=ptirnak("fa_fotograf_shortDesc2");}else{$fa_fotograf_shortDesc2="";}
	$fa_fotograf_longDesc		= ptirnak("fa_fotograf_longDesc");
	$fa_fotograf_href 			= ptirnak("fa_fotograf_href");
	$resim_baslik = ptirnak("resim_baslik");
	$en_resim_baslik = ptirnak("en_resim_baslik");
	$ar_resim_baslik = ptirnak("ar_resim_baslik");
	$fa_resim_baslik = ptirnak("fa_resim_baslik");
	$fotograf_bolum 		= ptirnak("fotograf_bolum");
	$fotograf_bolum2 		= ptirnak("fotograf_bolum2");
	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	@$refgaleri 				= $_FILES["refgaleri"]["tmp_name"][0];
	if(!$fotograf_id || !$fotograf_shortDesc){
		echo 'bos-deger';
	}else{
		require_once("app-upload/app.upload.php");
		$update =$db->query("UPDATE reklamlar SET
			fotograf_longDesc 	= '$fotograf_longDesc',
			fotograf_shortDesc 	= '$fotograf_shortDesc',
			fotograf_shortDesc2 = '$fotograf_shortDesc2',
			fotograf_href 		= '$fotograf_href',
			en_fotograf_longDesc 	= '$en_fotograf_longDesc',
			en_fotograf_shortDesc 	= '$en_fotograf_shortDesc',
			en_fotograf_shortDesc2 	= '$en_fotograf_shortDesc2',
			en_fotograf_href 		= '$en_fotograf_href',

			fa_fotograf_longDesc 	= '$fa_fotograf_longDesc',
			fa_fotograf_shortDesc 	= '$fa_fotograf_shortDesc',
			fa_fotograf_shortDesc2 	= '$fa_fotograf_shortDesc2',
			fa_fotograf_href 		= '$fa_fotograf_href',
			ar_fotograf_longDesc 	= '$ar_fotograf_longDesc',
			ar_fotograf_shortDesc 	= '$ar_fotograf_shortDesc',
			ar_fotograf_shortDesc2 	= '$ar_fotograf_shortDesc2',
			ar_fotograf_href 		= '$ar_fotograf_href',
			fotograf_bolum 		= '$fotograf_bolum',
			fotograf_bolum2 		= '$fotograf_bolum2',resim_baslik='$resim_baslik',en_resim_baslik='$en_resim_baslik',ar_resim_baslik='$ar_resim_baslik',fa_resim_baslik='$fa_resim_baslik',
			fotograf_durum 		= 1 WHERE fotograf_id='$fotograf_id'");
	
		if($update->rowCount() ){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}





## Fotoğraf Ekle
if($_GET["p"]=="reklam_ekle"){

	$fotograf_shortDesc 	= ptirnak("fotograf_shortDesc");
	$fotografresim		= sef_link($fotograf_shortDesc);
	if(isset($_POST["fotograf_shortDesc2"])){$fotograf_shortDesc2=ptirnak("fotograf_shortDesc2");}else{$fotograf_shortDesc2="";}
	$fotograf_longDesc		= htmlspecialchars(ptirnak("fotograf_longDesc"));
	$fotograf_href 			= ptirnak("fotograf_href");
	$fotograf_bolum 		= ptirnak("fotograf_bolum");
	$fotograf_bolum2 		= ptirnak("fotograf_bolum2");
	$reklamtype 		= ptirnak("reklamtype");
	$resim_baslik = ptirnak("resim_baslik");

	$dosya 				= $_FILES["dosya"]["tmp_name"][0];
	@$dosya2 				= $_FILES["dosya2"]["tmp_name"][0];
	@$refgaleri 				= $_FILES["refgaleri"]["tmp_name"][0];
	if(!$fotograf_shortDesc){
		echo 'bos-deger';
	}else{
		$insert =$db->query("INSERT INTO reklamlar SET
			fotograf_longDesc 	= '$fotograf_longDesc',
			fotograf_shortDesc 	= '$fotograf_shortDesc',
			fotograf_shortDesc2 	= '$fotograf_shortDesc2',
fa_fotograf_longDesc = '$reklamtype',
			fotograf_href 		= '$fotograf_href',
			fotograf_bolum 		= '$fotograf_bolum',
			fotograf_bolum2 		= '$fotograf_bolum2',resim_baslik='$resim_baslik',
			fotograf_durum 		= 1
			");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			if($last_insert_id){
				require_once("app-upload/app.upload.php");
				require_once("app-upload/reklam_resim_add.php");
			
			}
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

if($_GET["p"]=="tek_reklam_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM reklamlar WHERE fotograf_id='$id'");
	if($kontrol->rowCount()){
		$fotograf = $kontrol->fetch(PDO::FETCH_ASSOC);
		$buyukResim = "../images/reklam/big/".$fotograf["fotograf_src"];
		$kucukResim = "../images/reklam/thumb/".$fotograf["fotograf_src"];
		if(is_file($buyukResim)){unlink($buyukResim);}
		if(is_file($kucukResim)){unlink($kucukResim);}
		$delete = $db->query("DELETE FROM reklamlar WHERE fotograf_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
?>