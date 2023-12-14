<?php echo !defined("ADMIN") ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Günlük Hit İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="content-body">
		<!-- Data list view starts -->
		<section id="data-list-view" class="data-list-view-header">


			<!-- DataTable starts -->
			<div class="table-responsive">
				<div class="actions action-btns">
					<div class="dt-buttons btn-group">
					<a onclick="BoslatSil('1');" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span>Günlük Hiti Sıfırla</span></a>
					<button id="button"class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span>Tarihi Güncelle (YAPILACAK)</span></button>
					 </div>
					</div>
					<table class="table  data-list">
						<thead>
							<tr><th></th>
								<th>ID</th>
								<th>Tarih</th>
								<th>Kategori</th>
								<th>Başlık</th>
								<th>Görsel</th>
								<th>T. Hit</th>
								<th>G. Hit</th>
								<th>Durum</th>
								<th>Yazar</th>
								<th>Kısa Kod</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$uyeQuery = $db->query("SELECT * FROM makalegaleri INNER JOIN galerikategori ON kategori_id=portkat INNER JOIN uyeler ON uye_id=sayfa_yazar ORDER BY yazi_gunluk_hit DESC LIMIT ".$tablobaslangic.",".$tablobitis." ");
							if($uyeQuery->rowCount()){
								foreach($uyeQuery as $uyeRow){
											if ($uyeRow["uye_kadisecimi"]==1) {
  $yazaradi = $uyeRow["uye_kadi"];
}else{
      $yazaradi = $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];
}
									?>
									<tr>


										<td></td>
										<td><?php echo $uyeRow["sayfa_id"];?></td>
										<td><?php echo $uyeRow["sayfa_tarih"];?></td>
										<td><a target="_blank" href="<?php echo URL.GBURL."/".$uyeRow["kategori_id"].'_'.$uyeRow["kategori_url"];?>"><?php echo $uyeRow["kategori_adi"];?></a></td>
										<td><a target="_blank" href="<?php echo URL.GALERİ. $uyeRow["sayfa_url"];?>"><?php echo $uyeRow["sayfa_adi"];?></a></td>
										<td><img src="<?PHP echo URL;?>images/makalegaleri/thumb/<?php echo $uyeRow["sayfa_resim"];?>" style="width:50px"></td>
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
											
												<td><a target="_blank" href="<?php echo URL.YAZAR; ?><?php echo $uyeRow["uye_id"]; ?>_<?php echo $uyeRow["uye_url"]; ?>"><?php echo $yazaradi; ?></a></td>
													<td>[{=g:<?php echo $uyeRow["sayfa_id"];?>=}]</td>
											<td > <div class="dropdown dropright">

												<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													İşlemler
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="index.php?sayfa=galeri_edit&id=<?php echo $uyeRow["sayfa_id"];?>">Görüntüle / Düzenle</a>
													<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $uyeRow["sayfa_id"];?>);">
														<?php if($uyeRow["sayfa_durum"]==1){echo 'Yazıyı Gizle';}else{echo 'Yazıyı Yayına Al';}?>
													</a>
												<?php if($uyeRow["sayfa_durum"]!=2){ ?>	<a class="dropdown-item"  onclick="durumDegis2(<?php echo $uyeRow["sayfa_id"];?>);" >Yazıyı Taslağa Çek</a> <?php } ?>
													<a class="dropdown-item"  onclick="TekSil(<?php echo $uyeRow["sayfa_id"];?>);" >Yazıyı Sil</a>
												</div>
											</div>   


										</td>
									</tr>

								<?php  }} ?>



							</tbody>
						</table>
					</div>
					<!-- DataTable ends -->

					<!-- add new sidebar ends -->
				</section>
				<!-- Data list view end -->

			</div>
		</div>
		<script>
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
$.post('ajax.php?p=galeri_sayfa_sil', {id: sayfaId}, function (data) {
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
				$.post('ajax.php?p=galerionay', {id: sayfaid}, function (data) {
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
				$.post('ajax.php?p=galerionay2', {id: sayfaid}, function (data) {
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


				function BoslatSil(log_id){
		$.post('ajax.php?p=galeri_hit_bosalt', {id: log_id}, function (data) {
			if(data=="basarili"){
				sweetAlert({
						title	: "Başarılı",
						text 	: "Kayıtlar başarılı bir şekilde sıfırlandı.",
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
	
 
		</script>
