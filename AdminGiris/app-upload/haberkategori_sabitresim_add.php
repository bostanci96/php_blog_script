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

		$sira_no	= 1;
		foreach($resimler as $resim){
			$handle = new Upload($resim);

			if($handle->uploaded){
				
				$handle->image_resize = true;
				$handle->image_x = 770;
				$handle->image_ratio_y = true;
				/* resmi yeniden isimlendir */
				$randName 	= substr(base64_encode(uniqid(true)),0,20);
				$newName 	= "sabitmakkatgorsel-".$last_insert_id;
$handle->file_new_name_body = $newName;

				$resim_adi = $handle->file_new_name_body;
				
				$uzanti = $handle->file_src_name_ext;
				$resimAdi = $resim_adi.".".$uzanti;

				/* Resim yükleme izini */
				$handle->allowed = array('image/*');

				/* Büyük resmi yükle */
				$handle->Process("../images/makaleler/big/");
				if($handle->processed){
					$handle->image_resize = true;
					$handle->image_x = 270;
					$handle->image_y = 190;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/makaleler/thumb/");

					$handle->image_resize = true;
					$handle->image_x = 220;
					$handle->image_y = 270;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/makaleler/220x270/");
					$handle->image_resize = true;
					$handle->image_x = 370;
					$handle->image_y = 480;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/makaleler/860x510/");
						$handle->image_resize = true;
					$handle->image_x = 640;
					$handle->image_y = 360;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/makaleler/640x360/");
					$imgInsert = $db->query("UPDATE haberkategori SET 
						kategori_sabitresim = '$resimAdi' WHERE kategori_id='$last_insert_id'");
				}
			}
			$sira_no++;
		}
	}
}						
/* upload */

?>