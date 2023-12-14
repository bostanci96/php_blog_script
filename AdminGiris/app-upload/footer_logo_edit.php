<?php
$toplam		= count($_FILES["footer_logo"]["tmp_name"]);
$formatlar	= array("image/png","image/jpeg","image/jpg","image/gif", "image/webp" ,"image/svg+xml");

for($i=0; $i<$toplam; $i++){
	$dosya_tipi		= $_FILES["footer_logo"]["type"][$i];
	if(in_array($dosya_tipi,$formatlar)){
		$resimler = array();
		foreach ($_FILES['footer_logo'] as $k => $l) {
			foreach ($l as $i => $v) {
				if (!array_key_exists($i, $resimler))
					$resimler[$i] = array();
				$resimler[$i][$k] = $v;
			}
		}

		foreach($resimler as $resim){
			$handle = new Upload($resim);

			if($handle->uploaded){
				$handle->file_overwrite = true;
				/* resmi yeniden isimlendir */
				$newName 	= "footer_logo";
					$handle->file_new_name_body = $newName;

				$resim_adi = $handle->file_new_name_body;
				
				$uzanti = $handle->file_src_name_ext;
				$resimAdi = $resim_adi.".".$uzanti;



				/* Resim yükleme izini */
				$handle->allowed = array('image/*');

				/* Büyük resmi yükle */
				$handle->Process("../images/");
				$imgupdate = $db->query("UPDATE ayarlar SET footer_logo='$resimAdi'");
				$updateSuccess = true;
			}
		}
	}
}						
/* upload */

?>