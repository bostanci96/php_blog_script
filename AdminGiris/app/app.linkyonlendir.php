<?php
if($_GET["p"]=="linkyonlendirme_ekle"){

	$link_yonlendirilecek 			= p("link_yonlendirilecek");
	$link_yonlenen = p("link_yonlenen");
	
	if(!$link_yonlendirilecek || !$link_yonlenen){
		echo 'bos-deger';
	}else{
		
		$insert =$db->query("INSERT INTO linkyonlendirme SET 
			link_yonlendirilecek 		= '$link_yonlendirilecek',
			link_yonlenen 		= '$link_yonlenen',
			link_durum 	= 1");
		if($insert->rowCount()){
			$last_insert_id = $db->lastInsertId();
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}

## Sayfa Düzenle
if($_GET["p"]=="linkyonlendirme_edit"){
	$link_id 			= p("link_id");
		$link_yonlendirilecek 			= p("link_yonlendirilecek");
	$link_yonlenen = p("link_yonlenen");
	
	if(!$link_yonlendirilecek || !$link_yonlenen){
		echo 'bos-deger';
	}else{
		$update =$db->query("UPDATE linkyonlendirme SET 
			link_yonlendirilecek 		= '$link_yonlendirilecek',
			link_yonlenen 		= '$link_yonlenen',
			link_durum 	= 1 WHERE link_id='$link_id'");
		
		if($update->rowCount() ){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}

	}
}



if($_GET["p"]=="tek_link_sil"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM linkyonlendirme WHERE link_id='$id'");
	if($kontrol->rowCount()){
		$kontrolRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$delete = $db->query("DELETE FROM linkyonlendirme WHERE link_id='$id'");
		if($delete->rowCount()){
			echo 'basarili';
		}else{
			echo 'basarisiz';
		}
	}
}
if($_GET["p"]=="link_durum_degis"){
	$id = p("id");
	$kontrol = $db->query("SELECT * FROM linkyonlendirme WHERE link_id='$id'");
	if($kontrol->rowCount()){
		$uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
		$uyeDurum = $uyeRow["link_durum"];
		if($uyeDurum==1){
			$update = $db->query("UPDATE linkyonlendirme SET link_durum=0 WHERE link_id='$id'");
			if($update->rowCount()){
				echo 'yasaklama-basarili';exit();
			}
		}else{
			$update = $db->query("UPDATE linkyonlendirme SET link_durum=1 WHERE link_id='$id'");
			if($update->rowCount()){
				echo 'yasak-kaldirildi';exit();
			}
		}
	}
}

?>