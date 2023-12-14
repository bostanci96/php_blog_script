<?php
$toplam		= count($_FILES['refgaleri']["tmp_name"]);
$formatlar	= array("image/png","image/jpeg","image/jpg","image/gif" , "image/webp" ,"image/svg+xml");

for($i=0; $i<$toplam; $i++){
	$dosya_tipi		= $_FILES['refgaleri']["type"][$i];
	if(in_array($dosya_tipi,$formatlar)){
		$resimler = array();
		foreach ($_FILES['refgaleri'] as $k => $l) {
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
				$handle->Process("../images/photos/big/");
				if($handle->processed){
					$handle->image_resize = true;
					$handle->image_x = 240;
					$handle->image_y = 240;
					$handle->image_ratio_crop=true;
					$handle->file_new_name_body = $newName;
					$handle->Process("../images/photos/thumb/");
					$imgInsert = $db->query("INSERT INTO referansresim SET 
						resim_src = '$resimAdi',
						resim_fotograf_id='$last_insert_id'");
					$galeriSuccess = true;
				}
			}
			$sira_no++;
		}
	}
}						
/* upload */

?>