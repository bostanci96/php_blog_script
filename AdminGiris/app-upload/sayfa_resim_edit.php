<?php
$toplam		= count($_FILES["dosya"]["tmp_name"]);
$formatlar	= array("image/png","image/jpeg","image/jpg","image/gif" , "image/webp" ,"image/svg+xml");

for($i=0; $i<$toplam; $i++){
	$dosya_tipi		= $_FILES["dosya"]["type"][$i];
	if(in_array($dosya_tipi,$formatlar)){
		$resimler = array();
		foreach ($_FILES['dosya'] as $k => $l) {
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
				$resimGenislik = $handle->image_src_x;
				if($resimGenislik>1920){
					$handle->image_resize = true;
					$handle->image_x = 1920;
					$handle->image_ratio_y = true;
				}
				/* resmi yeniden isimlendir */
				$randName 	= substr(base64_encode(uniqid(true)),0,20);
				$newName 	= str_replace("=","",$randName);
		$handle->file_new_name_body = $newName;

				$resim_adi = $handle->file_new_name_body;
				
				$uzanti = $handle->file_src_name_ext;
				$resimAdi = $resim_adi.".".$uzanti;

				/* Resim yükleme izini */
				$handle->allowed = array('image/*');

				/* Büyük resmi yükle */
				$handle->Process("../images/sayfalar/big/");
				if($handle->processed){
					$handle->file_overwrite = true;
					$handle->image_resize = true;
					$handle->image_x = 360;
					$handle->image_y = 210;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/sayfalar/thumb/");
$handle->image_resize = true;
					$handle->image_x = 640;
					$handle->image_y = 360;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/sayfalar/640x360/");
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
					$handle->Process("../images/sayfalar/860x510/");
					$handle->Process("../images/sayfalar/220x270/");
					$imgupdate = $db->query("UPDATE sayfalar SET
						sayfa_resim 	= '$resimAdi' WHERE sayfa_id='$sayfa_id'");
					$updateSuccess = true;
				}
			}
		}
	}
}						
/* upload */

?>