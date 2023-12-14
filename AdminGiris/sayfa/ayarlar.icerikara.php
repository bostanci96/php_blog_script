<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
$limit ="";
@$sayfaadi = $_POST['sayfaadi'];
@$baslangictarihi = $_POST['baslangictarihi'];
@$baslangicbitis = $_POST['baslangicbitis'];
@$limit = $_POST['limit'];

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
					<div class="col-lg-10 col-sm-10 col-12">
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<form method="post" action="">
									<b>Kayıtlarda Ara &rarr;</b>
									<select name="sayfaadi">
										<option <?php echo $sayfaadi == "duzsayfa" ? 'selected' : null; ?> value="duzsayfa">Düz Sayfalar</option>
										<option <?php echo $sayfaadi == "makalegaleri" ? 'selected' : null; ?> value="makalegaleri">Galeriler</option>
										<option <?php echo $sayfaadi == "makaleler" ? 'selected' : null; ?> value="makaleler">Yazılar</option>
									</select>
									<b>Başlangıç Tarihi &rarr;</b>
									<input type="date"  name="baslangictarihi" value="<?php echo $baslangictarihi;  ?>" placeholder="">
									<b>Bitiş Tarihi &rarr;</b>
									<input type="date"  name="baslangicbitis" value="<?php echo $baslangicbitis;  ?>" placeholder="">
									<b>Arama Limiti &rarr;</b>
									<input type="number" name="limit" value="<?php echo $limit;  ?>" placeholder="">
									<button type="submit" class="btn btn-warning"> ARA </button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-lg-1 col-sm-1 col-12"></div>
					
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="mb-0">Listelenen Kayıtlar</h4>
							</div>
							<div class="card-content">
								<div class="actions action-btns float-right " style="width: 32%">
					<div class="dt-buttons btn-group w-100">
						<div class="p-0 w-100">
						<input type="date" class="form-control" id="sayfa_tarih" value="<?php echo date('Y-m-d'); ?>"  placeholder="" name="sayfa_tarih">
						</div>
						<div class="p-0 w-100">

						<input type="time" class="form-control" id="sayfa_time" value="<?php echo date('H:i'); ?>"  placeholder="" name="sayfa_time">
					</div>
					<div class="p-0 w-100">

					<button id="test"class="btn btn-outline-primary mr-2"   tabindex="0" aria-controls="DataTables_Table_0"><span>Tarihi Güncelle</span></button></div>
					 </div>
					</div>
								<table class="table">
									<thead>
										<tr>
											<th > <input id="selectAll" type='checkbox' /></th>
											<th>ID</th>
											<th>Tarih</th>
											<th>Kategori</th>
											<th>Başlık</th>
											<th>Görsel</th>
											<th>Hit</th>
											<th>Günlük Hit</th>
											<th>Durum</th>
											<th>Yazar</th>
											<th>Kısa Kod</th>
											<th>İşlemler</th>
										</tr>
									</thead>
									
								
									<tbody>
										<?php
											
										if ($sayfaadi=="makaleler") {
										$kategoritab ="INNER JOIN haberkategori ON kategori_id=portkat" ;
										$Klink=HBURL;
										$link=HABER;
										$sayresklasor ="makaleler";
										$makale_sayfa_sil ="makale_sayfa_sil";
										$makaleonay ="makaleonay";
										$makaleonay2 ="makaleonay2";
										$sayfa_edit2 ="sayfa_edit2";
										$kisakod = "m";
										$makaletarihguncelle="makalelertarihguncelle";
										}else if ($sayfaadi=="makalegaleri") {
										$kategoritab ="INNER JOIN galerikategori ON kategori_id=portkat" ;
										$Klink=GBURL;
										$sayresklasor ="makalegaleri";
										$link=GALERİ;
										$makale_sayfa_sil ="galeri_sayfa_sil";
										$makaleonay ="galerionay";
										$makaleonay2 ="galerionay2";
										$sayfa_edit2 ="galeri_edit";
										$kisakod = "g";
										$makaletarihguncelle="galerilertarihguncelle";
										}else{
										$kategoritab ="" ;
										$link=DUZSAYFA;
										$sayresklasor ="duzsayfa";
										$makale_sayfa_sil ="duzsayfa_sil";
										$makaleonay ="duzsayfaonay";
										$makaleonay2 ="duzsayfaonay2";
										$sayfa_edit2 ="duzsayfa_edit";
										$kisakod = "d";
										$makaletarihguncelle="duzyazilartarihguncelle";
										}
if($limit){
										$uyeQuery = $db->query("SELECT * FROM ".$sayfaadi." ".$kategoritab." INNER JOIN uyeler ON uye_id=sayfa_yazar WHERE sayfa_tarih BETWEEN '".$baslangictarihi."' AND '".$baslangicbitis."' ORDER BY sayfa_tarih DESC LIMIT ".$limit." ");
										$uyeQuery->rowCount();
									
											foreach($uyeQuery as $uyeRow){
														if ($uyeRow["uye_kadisecimi"]==1) {
										$yazaradi = $uyeRow["uye_kadi"];
										}else{
										$yazaradi = $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];
										}
										?>
										<tr id="<?php echo $uyeRow["sayfa_id"];?>">
											<td><input type='checkbox' /></td>
											<td ><?php echo $uyeRow["sayfa_id"];?></td>
											<td><?php echo $uyeRow["sayfa_tarih"];?></td>
											<td><a target="_blank" href="<?php echo URL.$Klink."/".$uyeRow["kategori_id"].'/'.$uyeRow["kategori_url"];?>"><?php echo $uyeRow["kategori_adi"];?></a></td>
											<td><a target="_blank" href="<?php echo URL.$link.$uyeRow["sayfa_url"];?>"><?php echo $uyeRow["sayfa_adi"];?></a></td>
											<td><img src="<?PHP echo URL;?>images/<?php echo $sayresklasor; ?>/thumb/<?php echo $uyeRow["sayfa_resim"];?>" style="width:50px"></td>
											<td><?php echo $uyeRow["yazi_total_hit"];?></td>
											<td><?php echo $uyeRow["yazi_gunluk_hit"];?></td>
											<td>    <?php
												if($uyeRow["sayfa_durum"]==1){ ?>
												<div class="chip chip-success">
													<div class="chip-body">
														<div class="chip-text">Aktif</div>
													</div>
												</div>   <?php
												}elseif($uyeRow["sayfa_durum"]==2){ ?>
												<div class="chip chip-secondery">
													<div class="chip-body">
														<div class="chip-text">Taslak</div>
													</div>
												</div>
												<?php }else {?>
												<div class="chip chip-danger">
													<div class="chip-body">
														<div class="chip-text">Pasif</div>
													</div>
												</div>
												<?php }?>
											</td>
											
											<td><a target="_blank" href="<?php echo URL.YAZAR; ?><?php echo $uyeRow["uye_id"]; ?>/<?php echo sef_link($yazaradi); ?>"><?php echo $yazaradi; ?></a></td>
											<td>[{=<?php echo $kisakod; ?>:<?php echo $uyeRow["sayfa_id"];?>=}]</td>
											<td > <div class="dropdown dropright">
												<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												İşlemler
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="index.php?sayfa=<?php echo $sayfa_edit2; ?>&id=<?php echo $uyeRow["sayfa_id"];?>">Görüntüle / Düzenle</a>
													<?php if ($_SESSION["uye_rutbe"] != 4) { ?>
													<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $uyeRow["sayfa_id"];?>);">
														<?php if($uyeRow["sayfa_durum"]==1){echo 'Yazıyı Gizle';}else{echo 'Yazıyı Yayına Al';}?>
													</a>
													
													<?php if($uyeRow["sayfa_durum"]!=2){ ?>	<a class="dropdown-item"  onclick="durumDegis2(<?php echo $uyeRow["sayfa_id"];?>);" >Yazıyı Taslağa Çek</a> <?php } ?>
													<?php } ?>
													<?php if ($_SESSION["uye_rutbe"] == 0) { ?>	<a class="dropdown-item"  onclick="TekSil(<?php echo $uyeRow["sayfa_id"];?>);" >Yazıyı Sil</a><?php } ?>
												</div>
											</div>
										</td>
									</tr>
									<?php  } } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
</div>

<script>
	$('#selectAll').click(function (e) {
    $(this).closest('table').find('td input:checkbox').prop('checked', this.checked);
});
	$(document).ready(function() {
		$('.datatable').dataTable({
			"bSort":false
		});
	});
	
	function TekSil(sayfaId){
swal({
title: "Emin misin?",
text: "Bu yazıyı kurtaramayacaksınız!",
type: "warning",
showCancelButton: true,
confirmButtonColor: '#DD6B55',
confirmButtonText: 'Evet eminim!',
cancelButtonText: "Hayır, iptal et!",
closeOnConfirm: false,
closeOnCancel: false
},
function(isConfirm){
if (isConfirm){
$.post('ajax.php?p=<?php echo $makale_sayfa_sil ?>', {id: sayfaId}, function (data) {
if(data=="basarili"){
sweetAlert({
title	: "Başarılı",
text 	: "Yazı başarılı bir şekilde silinmiştir.",
type	: "success"
},
function(){
window.location.reload(true);
});
return false;
}else if(data=="basarisiz"){
swal("Başarısız","Silinemedi","error");
return false;
}
});
} else {
swal("İptal edildi", "Yazınız güvende :)", "error");
return false;
}
});
}
function durumDegis(sayfaid){
$.post('ajax.php?p=<?php echo $makaleonay ?>', {id: sayfaid}, function (data) {
if(data=="yasaklama-basarili"){
sweetAlert({
title	: "Başarılı",
text 	: "Yazı başarılı bir şekilde gizlendi.",
type	: "success"
},
function(){
window.location.reload(true);
});
return false;
}else if(data=="yasak-kaldirildi"){
sweetAlert({
title	: "Başarılı",
text 	: "Yazı başarılı bir şekilde aktifleştirildi.",
type	: "success"
},
function(){
window.location.reload(true);
});
return false;
}else if(data=="basarisiz"){
swal("Başarısız","Silinemedi","error");
return false;
}
});
}
function durumDegis2(sayfaid){
$.post('ajax.php?p=<?php echo $makaleonay2 ?>', {id: sayfaid}, function (data) {
if(data=="yasaklama-basarili"){
sweetAlert({
title	: "Başarılı",
text 	: "Yazı başarılı bir şekilde taslağa alındı.",
type	: "success"
},
function(){
window.location.reload(true);
});
return false;
}else if(data=="basarisiz"){
swal("Başarısız","Silinemedi","error");
return false;
}
});
}



$('#test').click(function(){
  var ids = $(':checkbox:checked').map(function() {
    var id = $(this).closest('tr').prop('id');
      return id;
    }).get();
  var sayfa_tarih = "#sayfa_tarih";
  var sayfa_time = "#sayfa_time";
		var sayfa_tarih2 = $(sayfa_tarih).val();
		var sayfa_time2 = $(sayfa_time).val();
$.post('ajax.php?p=<?php echo $makaletarihguncelle; ?>', {sayfa_tarih: sayfa_tarih2,sayfa_time: sayfa_time2,id: ids}, function (data) {
if(data=="basarili"){
sweetAlert({
title	: "Başarılı",
text 	: "Yazılar başarılı bir şekilde güncellendi.",
type	: "success"
},
function(){
window.location.reload(true);
});
return false;
}else if(data=="basarisiz"){
swal("Başarısız","Yazılar güncellenirken bir sorun oluştu.","error");
return false;
}
});
});





   
  
</script>