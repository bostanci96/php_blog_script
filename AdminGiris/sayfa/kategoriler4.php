<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>

<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Kategori İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="index.php?sayfa=kategoriler4">Tüm Kategoriler </a>
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
					<a href="index.php?sayfa=kategori_ekle4" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr><th></th>
								<th>ID</th>
										<th>Sıra No</th>
							<th>Kategori İmg</th>
								<!--	<th>Üst Kategorisi</th>-->
								<th>Kategori Adi</th>
								<th>Kategori Desc</th>
								<th>Kategori Tarihi</th>
								<th>Kategori URL</th>
								<th>Durum</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$kquery = $db->query("SELECT * FROM galerikategori WHERE kat_secenek=1 LIMIT ".$tablobaslangic.",".$tablobitis." ");
							if($kquery->rowCount()){
								foreach($kquery as $kRow){           $ustId = $kRow["kategori_ust_id"];
								if($ustId==0){
									$ustKat = "Ana Kategori";
								}else{
									$ustCatQuery = $db->query("SELECT kategori_adi FROM galerikategori WHERE kategori_id='$ustId' AND kat_secenek=1");
									if($ustCatQuery->rowCount()){
										$ustKatRow = $ustCatQuery->fetch(PDO::FETCH_ASSOC);
										$ustKat = $ustKatRow["kategori_adi"];
									}
								}
								?>
								<tr>
									<td></td>
									<td><?php echo $kRow["kategori_id"];?></td>
										<td style="width:100px">
										<input type="text" value="<?php echo $kRow["sira_no"];?>" name="sira_no<?php echo $kRow["kategori_id"]?>" style="margin-right:5px;width:30px;float:left"/>
										<a href="javascript:;" id="updateSira" get-id="<?php echo $kRow["kategori_id"];?>" style="float:left"> <i class="fa fa-pencil"></i></a>
									</td>
									<td><img src="<?PHP echo URL;?>images/kategoriler/thumb/<?php echo $kRow["kategori_resim"];?>" style="width:50px"></td>
									<!--<td><?php echo $ustKat;?></td>-->
									<td><?php echo $kRow["kategori_adi"];?></td>
									<td><?php echo $kRow["kategori_desc"];?></td>
									<td><?php echo $kRow["kategori_tarih"];?></td>
									<td><a target="_blank" href="<?php echo URL.GBURL."/".$kRow["kategori_id"]."_".$kRow["kategori_url"];?>/">Kategoriye Git </a></td>
									<td>    <?php
									if($kRow["kategori_durum"]==1){ ?>
										<div class="chip chip-success">
											<div class="chip-body">
										<div class="chip-text">Aktif</div>
											</div>
											</div> <?php }else {?>
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
												<a class="dropdown-item" href="index.php?sayfa=kategori_duzenle4&id=<?php echo $kRow["kategori_id"];?>">Görüntüle / Düzenle</a>
												<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $kRow["kategori_id"];?>);">
													<?php if($kRow["kategori_durum"]==1){echo  "Kategori'yi Gizle";}else{echo "Kategori'yi Aktif Et";}?>
												</a>
													<a class="dropdown-item"  onclick="sabitKat(<?php echo $kRow["kategori_id"];?>);" >Sabit Kategori Seç</a>
											<?php if ($_SESSION["uye_rutbe"] == 0) { ?>	<a class="dropdown-item"  onclick="TekSil(<?php echo $kRow["kategori_id"];?>);" >Kategori'yi Sil</a><?php } ?>
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
		$(document).ready(function() {
			$('.datatable').dataTable({
				"bSort":false
			});
			$("td #updateSira").click(function(){
				var id = $(this).attr("get-id");
				var inputValue = $("input[name=sira_no"+id+"]").val();
				$.post('ajax.php?p=kategoriSiraGuncelle', {sira_no: inputValue,kategori_id:id}, function (data) {
					alert(data);
				});
			});
		});
		
		function TekSil(catId){
swal({
title: "Emin misin?",
text: "Bu kategoriyi kurtaramayacaksınız!",
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
	$.post('ajax.php?p=tek_galericat_sil', {id: catId}, function (data) {
				if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde silinmiştir.",
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
swal("İptal edildi", "Kategoriniz güvende :)", "error");
return false;
}
});
}
				function sabitKat(catId){
			$.post('ajax.php?p=tek_galericat_sabit', {id: catId}, function (data) {
				if(data=="basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde aktifleştirildi.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
					swal("Başarısız","Aktifleştirilemedi","error");
					return false;
				}
			});
		}
		function durumDegis(catId){
			$.post('ajax.php?p=cat_galeridurum_degis', {id: catId}, function (data) {
				if(data=="yasaklama-basarili"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde gizlendi.",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="yasak-kaldirildi"){
					sweetAlert({
						title	: "Başarılı",
						text 	: "Kategori başarılı bir şekilde aktifleştirildi.",
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
