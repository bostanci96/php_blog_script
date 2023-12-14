<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
@$sayfaadi = $_POST['sayfaadi'];
@$baslangictarihi = $_POST['baslangictarihi'];
@$baslangicbitis = $_POST['baslangicbitis'];
@$limit = $_POST['limit'];
$limit ="";
?>
<div class="content-header row">
</div>
<div class="content-body">
	<!-- Dashboard Analytics Start -->
	<div class="content-wrapper">
		
		<div class="content-body">
			<!-- Statistics card section start -->
			<section id="statistics-card">
				<div class="row">
					<div class="col-lg-1 col-sm-1 col-12"></div>
					<div class="col-lg-3 col-sm-6 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<form method="post" action="">
									<b>Kayıtları Aktar &rarr;</b>
									<select name="sayfaadi">
										<option <?php echo $sayfaadi == "duzsayfa" ? 'selected' : null; ?> value="duzsayfa">Düz Sayfalar</option>
										<option <?php echo $sayfaadi == "makalegaleri" ? 'selected' : null; ?> value="makalegaleri">Galeriler</option>
										<option <?php echo $sayfaadi == "makaleler" ? 'selected' : null; ?> value="makaleler">Yazılar</option>
									</select>
									<button type="submit" class="btn btn-warning"> Aktar </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-1 col-12"></div>
					<?php

if ($sayfaadi) {
		if ($sayfaadi=="makaleler") {
										$kategoritab ="INNER JOIN haberkategori ON kategori_id=portkat" ;
										$Klink=HBURL;
										$link=HABER;
										$sayresklasor ="makaleler";
										$kisakod = "m";
										}else if ($sayfaadi=="makalegaleri") {
										$kategoritab ="INNER JOIN galerikategori ON kategori_id=portkat" ;
										$Klink=GBURL;
										$sayresklasor ="makalegaleri";
										$link=GALERİ;
										$kisakod = "g";
										}else{
										$kategoritab ="" ;
										$link=DUZSAYFA;
										$sayresklasor ="duzsayfa";
										$kisakod = "d";
										}
function exportExcel($filename='ExportExcel',$columns=array(),$data=array(),$replaceDotCol=array()){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/plain; charset=utf-8'); 
    header("Content-disposition: attachment; filename=".$filename.".xls");
    echo "\xEF\xBB\xBF"; // UTF-8 BOM
      
    $say=count($columns);
      
    echo '<table border="1"><tr>';
    foreach($columns as $v){
        echo '<th style="background-color:#FFA500">'.trim($v).'</th>';
    }
    echo '</tr>';
  
    foreach($data as $val){
        echo '<tr>';
        for($i=0; $i < $say; $i++){
  
            if(in_array($i,$replaceDotCol)){
                echo '<td>'.str_replace('.',',',$val[$i]).'</td>';
            }else{
                echo '<td>'.$val[$i].'</td>';
            }
        }
        echo '</tr>';
    }

    return 1;

}

/* TANIMLAMALAR */
 
$columns=array();
 
$data=array();
 
/*
 $replaceDotCol
 Decimal kolonlardaki noktayı (.) virgüle (,) dönüştürüelecek kolon numarası belirtilmelidir.
 Örneğin; Kolon 4'ün verilerinde nokta değilde virgül görülmesini istiyorsanız
 ilgili kolonun array key numarasını belirtmelisiniz. İlk kolonun key numarası 0'dır.
*/
$replaceDotCol=array(3); 
 
 
/* Sütun Başlıkları */
$columns=array(
    'Sayfa Id',
    'Ekleme Tarihi',
    'Sayfa Adı',
    'Kategori Adı',
    'Sayfa Url',
    'Yazar',
    'Etiketler',
    'Total Hit'
);
              

$kquery = $db->query("SELECT * FROM ".$sayfaadi." ".$kategoritab." INNER JOIN uyeler ON uye_id=sayfa_yazar ORDER BY sayfa_tarih DESC ");

foreach($kquery as $verirow):
if ($verirow["uye_kadisecimi"]==1) {
										$yazaradi = $verirow["uye_kadi"];
										}else{
										$yazaradi = $verirow["uye_ad"]." ".$verirow["uye_soyad"];
										}

    $data[]=array(
        $verirow['sayfa_id'],
        $verirow['sayfa_tarih'],
        $verirow['sayfa_adi'],
        $verirow['kategori_adi'],
        URL.$link.$verirow["sayfa_url"],
        $yazaradi,
        $verirow['makale_etiket'],
        $verirow['yazi_total_hit']
    );
endforeach;
 
exportExcel($ayar["site_title"],$columns,$data,$replaceDotCol);
}




					 ?> 
				</div>
			
		</section>
	</div>
</div>
</div>
<script>
	$(document).ready(function() {
		$('.datatable').dataTable({
			"bSort":false
		});
	});
	
	
</script>