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
				$resimGenislik = $handle->image_src_x;
				if($resimGenislik>339){
					$handle->image_resize = true;
					$handle->image_x 	  = 339;
					$handle->image_ratio_y= true;
				}
				$handle->file_overwrite = true;
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
				$handle->Process("../images/menuPhotos/");
				if($handle->processed){
					$imgupdate = $db->query("UPDATE menuler SET 
						menu_resim = '$resimAdi' WHERE menu_id='$menu_id'");
					$updateSuccess = true;
				}
			}
		}
	}
}						
/* upload */

?>