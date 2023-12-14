<?php
$broadCrumb = $kategoriRow[$lehce."kategori_adi"];
$ustKatQuery = $db->query("SELECT * FROM kategoriler WHERE kategori_id='$kategori_ust_id'");
if($ustKatQuery->rowCount()){
	$ustKatRow = $ustKatQuery->fetch(PDO::FETCH_ASSOC);
	$broadCrumb = '<li class="list-inline-item breadcrumb-item"><a href="'.LURL.'kategoriler/'.$ustKatRow["kategori_url"].'/">'.$ustKatRow[$lehce."kategori_adi"].'</a> </li> '.$broadCrumb;

	$ustID2 	= $ustKatRow["kategori_ust_id"];
	if($ustID2!=0){
		$ustKatQuery2 = $db->query("SELECT * FROM kategoriler WHERE kategori_id='$ustID2'");
		if($ustKatQuery2->rowCount()){
			$ustKatRow2 = $ustKatQuery2->fetch(PDO::FETCH_ASSOC);
			$broadCrumb = '<li class="list-inline-item breadcrumb-item"><a href="'.LURL.'kategoriler/'.$ustKatRow2["kategori_url"].'/">'.$ustKatRow2[$lehce."kategori_adi"].'</a> </li> '.$broadCrumb;
		}
	}
}
$broadCrumb = '<li class="list-inline-item breadcrumb-item"><a href="'.LURL.'"  title="'. $blok["baslik5"].'"> '. $blok["baslik22"].' </a></li><li class="list-inline-item breadcrumb-item"><a href="'.LURL.'urunler/">'.$blok["baslik22"].' </a></li>';
?>

