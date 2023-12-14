<?php
$toplam		= count($_FILES["dosya2"]["tmp_name"]);
$formatlar	= array("image/png","image/jpeg","image/jpg","image/gif" , "image/webp" ,"image/svg+xml");

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

		foreach($resimler as $resim){
			$handle = new Upload($resim);
			if($handle->uploaded){
				$handle->file_overwrite = true;
				/* resmi yeniden isimlendir */
				$randName 	= substr(base64_encode(uniqid(true)),0,20);
				$newName 	= "sabitmakkatgorsel-".$cat_id;
	$handle->file_new_name_body = $newName;

				$resim_adi = $handle->file_new_name_body;
				
				$uzanti = $handle->file_src_name_ext;
				$resimAdi = $resim_adi.".".$uzanti;

				/* Resim yükleme izini */
				$handle->allowed = array('image/*');

				/* Büyük resmi yükle */
				$handle->Process("../images/makaleler/big/");
				if($handle->processed){
						$handle->file_overwrite = true;
					$handle->image_resize = true;
					$handle->image_x = 360;
					$handle->image_y = 210;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/makaleler/thumb/");
	$handle->file_overwrite = true;
					$handle->image_resize = true;
					$handle->image_x = 640;
					$handle->image_y = 360;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/makaleler/640x360/");
					$handle->file_overwrite = true;
					$handle->image_resize = true;
					$handle->image_x = 220;
					$handle->image_y = 270;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->image_resize = true;
					$handle->image_x = 370;
					$handle->image_y = 480;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
							
					$handle->Process("../images/makaleler/860x510/");
					$handle->Process("../images/makaleler/220x270/");
					$imgupdate = $db->query("UPDATE haberkategori SET 
						kategori_sabitresim = '$resimAdi' WHERE kategori_id='$cat_id'");
					$updateSuccess2 = true;
				}
			}
		}
	}
}						
/* upload */

?>