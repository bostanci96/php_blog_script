<?php
$toplam		= count($_FILES["dosya2"]["tmp_name"]);
$formatlar	= array("application/pdf", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword", "application/vnd.ms-excel");
			

for($i=0; $i<$toplam; $i++){
	$dosya_tipi		= $_FILES["dosya2"]["type"][$i];
	if(in_array($dosya_tipi,$formatlar)){
		$resimler = array();
		foreach ($_FILES['dosya2'] as $k => $l) {
			foreach ($l as $i => $v) {
				if (!array_key_exists($i, $resimler))
					$resimler[$i] = array();
				$resimler[$i][$k] = $v;
			}
		}

		$sira_no	= 1;
		foreach($resimler as $resim){
			$handle = new Upload($resim);
			if($handle->uploaded){

				/* resmi yeniden isimlendir */
				$randName 	= substr(base64_encode(uniqid(true)),0,20);
				$newName 	= sef_link($fotograf_shortDesc);
				$handle->file_new_name_body = $newName;
				$resim_adi = $handle->file_new_name_body;

				/* Resim Uzantısını Alma */
				if ($dosya_tipi=="application/pdf") {
					$uzanti = "pdf";
				}else if ($dosya_tipi=="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
					$uzanti = "xlsx";
				}else if ($dosya_tipi=="application/vnd.openxmlformats-officedocument.wordprocessingml.document") {
					$uzanti = "docx";
				}else if ($dosya_tipi=="application/msword") {
					$uzanti = "doc";
				}else if ($dosya_tipi=="application/vnd.ms-excel") {
					$uzanti = "xls";
				}
				
				$resimAdi = $newName.".".$uzanti;
				/* Resim yükleme izini */
				$handle->allowed = array('application/*');
				/* Büyük resmi yükle */
				$handle->Process("../images/katalog/");
				if($handle->processed){
					$imgInsert = $db->query("UPDATE fotograflar SET 
						fotograf_href = '$resimAdi' WHERE fotograf_id='$last_insert_id'");
				}
			}
			$sira_no++;
		}
	}
}						
/* upload */

?>