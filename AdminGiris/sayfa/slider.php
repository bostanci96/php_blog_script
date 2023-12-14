<?php echo !defined("ADMIN") ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Manşet Ayarları</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=slider">Manşet Ayarları</a>
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
				<div class="actions action-btns"><div class="dt-buttons btn-group">
					<a href="<?php echo ADMIN_URL?>index.php?sayfa=slider_ekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr>
								<th></th>
								<th>Sıra No</th>
								<th>ID</th>
									
								<th>Görsel</th>
								<th>Fotoğraf Adı</th>
								<th>İncele Butonu</th>
								<th>Kayıt Tarihi</th>
								<th>Durum</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$slideQuery = $db->query("SELECT * FROM fotograflar WHERE fotograf_bolum=1 ORDER BY foto_sira ASC LIMIT ".$tablobaslangic.",".$tablobitis." ");
							if($slideQuery->rowCount()){
								foreach($slideQuery as $slideRow){
									if(strlen($slideRow["fotograf_href"])>5){$slideButton = '<a target="_blank" href="'.$slideRow["fotograf_href"].'">'.$slideRow["fotograf_href"].'</a>';}else{$slideButton = "Link Belirtilmemiş";}



									?>
									<tr>
										<td></td>
										<td style="width:100px">
										<input type="text" value="<?php echo $slideRow["foto_sira"];?>" name="sira_no<?php echo $slideRow["fotograf_id"]?>" style="margin-right:5px;width:30px;float:left"/>
										<a href="javascript:;" id="updateSira" get-id="<?php echo $slideRow["fotograf_id"];?>" style="float:left"> <i class="fa fa-pencil"></i></a>
									</td>
										<td><?php echo $slideRow["fotograf_id"];?></td>


										<td>
											<img src="<?PHP echo URL;?>images/photos/thumb/<?php echo $slideRow["fotograf_src"];?>" style="width:50px">
											
										</td>
										<td><?php echo $slideRow["fotograf_shortDesc"];?></td>
										<td><?php echo $slideButton;?></td>
										<td><?php echo $slideRow["fotograf_tarih"];?></td>

										<td>    <?php
										if($slideRow["fotograf_durum"]==1){ ?>
										<div class="chip chip-success">
												<div class="chip-body">
														<div class="chip-text">Aktif</div>
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
											<td > <div class="dropdown dropright">

												<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													İşlemler
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="index.php?sayfa=slider_duzenle&id=<?php echo $slideRow["fotograf_id"];?>">Görüntüle / Düzenle</a>
													<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $slideRow["fotograf_id"];?>);">
														<?php if($slideRow["fotograf_durum"]==1){echo  "Pasifleştir";}else{echo "Aktifleştir";}?>
													</a>
												<?php if ($_SESSION["uye_rutbe"] == 0) { ?><a class="dropdown-item"  onclick="TekSil(<?php echo $slideRow["fotograf_id"];?>);" >Manşet'i Sil</a><?php } ?>
												</div>
											</div>   


										</td>
									</tr>

									<?php
								}
							}
							?>



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

		$(document).ready(function() {
			$('.datatable').dataTable({
				"bSort":false
			});
				$("td #updateSira").click(function(){
				var id = $(this).attr("get-id");
				var inputValue = $("input[name=sira_no"+id+"]").val();
				$.post('ajax.php?p=mansetSiraGuncelle', {sira_no: inputValue,fotograf_id:id}, function (data) {
					alert(data);
				});
			});
		});
		

			function TekSil(slideId){
swal({
title: "Emin misin?",
text: "Bu Manşeti kurtaramayacaksınız!",
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
	$.post('ajax.php?p=tek_foto_sil', {id: slideId}, function (data) {
				if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Manşet başarılı bir şekilde silindi.",
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
swal("İptal edildi", "Manşet güvende :)", "error");
return false;
}
});
	
	}
		function durumDegis(slideId){
			$.post('ajax.php?p=foto_durum_degis', {id: slideId}, function (data) {
				if(data=="yasaklama-basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Manşet başarılı bir şekilde yayından kaldırıldı.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="yasak-kaldirildi"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Manşet başarılı bir şekilde yayınlandı.",
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
