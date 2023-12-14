<?php echo !defined("ADMIN") ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<?php
/*
$kategoriQuery = $db->query("SELECT * FROM kategoriler WHERE kategori_durum=1");
if($kategoriQuery->rowCount()){
	foreach($kategoriQuery as $kategoriRow){
		$kategori_id = $kategoriRow["kategori_id"];
		$urunSorgu = $db->query("SELECT * FROM urunler WHERE urun_kategori='$kategori_id'");
		if($urunSorgu->rowCount()){
			$sayac = 1;
			foreach($urunSorgu as $urunRow){
				$urun_id = $urunRow["urun_id"];
				$update  = $db->query("UPDATE urunler SET urun_sira_no='$sayac' WHERE urun_id='$urun_id'");
				$sayac++;
			}
		}else{
			//
		}
	}
}*/
?>



<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Ürün Yönetimi</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>
							<li class="breadcrumb-item active"><a href="#">Tüm Ürünler</a>
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
					<a href="<?php echo ADMIN_URL?>index.php?sayfa=urun_ekle" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span><i class="feather icon-plus"></i> Yeni Ekle</span></a> </div></div>
					<table class="table data-list-view">
						<thead>
							<tr><th></th>
								<th>Ürün Görseli</th>
								<th>Sıra No</th>
								<th>Kategori Adı</th>
								<th>Ürün Adı</th>
								<th>Fiyat</th>
								<th>Durum</th>
								<th>İşlemler</th>
							</tr>
						</thead>
						<tbody>


							<?php
							$catQuery = $db->query("SELECT * FROM urunler 
								INNER JOIN kategoriler ON kategori_id=urun_kategori 
								INNER JOIN urunresim ON urun_id=resim_urun_id 
								GROUP BY(urun_id) ORDER BY urun_kategori DESC,urun_sira_no");
							if($catQuery->rowCount()){
								foreach($catQuery as $catRow){
									$link = URL."urun-detay/".$catRow["urun_url"]."/";
									?>
									<tr>
										<td></td>
										<td class="product-img sorting_1"><img style="    height: 7rem;" src="<?php  echo URL;?>images/urunler/thumb/<?php echo $catRow["urun_img"];?>" alt="Img placeholder">
										</td>
										<td style="width:100px">
											<input type="text" value="<?php echo $catRow["urun_sira_no"];?>" name="sira_no<?php echo $catRow["urun_id"]?>" style="margin-right:5px;width:30px;float:left"/>
											<a href="javascript:;" id="updateSira" get-id="<?php echo $catRow["urun_id"];?>" style="float:left"> <i class="fa fa-pencil"></i></a>
										</td>

										<td><?php echo $catRow["kategori_adi"];?></td>
										<td><?php echo $catRow["urun_adi"];?></td>
											<td style="width:150px">
											<input type="text" value="<?php echo $catRow["urun_fiyat"];?>" name="urun_fiyat<?php echo $catRow["urun_id"]?>" style="margin-right:5px;width:75px;float:left"/>
											<a href="javascript:;" id="urun_fiyat" get-id="<?php echo $catRow["urun_id"];?>" style="float:left"> <i class="fa fa-pencil"></i></a>
										</td>

										<td>    <?php
										if($catRow["urun_durum"]==1){ ?>
											<div class="chip chip-success">
												<div class="chip-body">
													<div class="chip-text">Yayında</div>
												</div>
												</div> <?php }else {?>
													<div class="chip chip-danger">
														<div class="chip-body">
															<div class="chip-text">Yayında Değil </div>
														</div>
													</div>
												<?php }?>
											</td>


											<td > <div class="dropdown dropright">

												<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													İşlemler
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="index.php?sayfa=urun_duzenle&id=<?php echo $catRow["urun_id"];?>">Görüntüle / Düzenle</a>
													<a class="dropdown-item" href="javascript:;" onclick="durumDegis(<?php echo $catRow["urun_id"];?>);">
														<?php if($catRow["urun_durum"]==1){echo  "Ürünü Gizle";}else{echo "Ürünü Aktif Et";}?>
													</a>
													<a class="dropdown-item"  onclick="TekSil(<?php echo $catRow["urun_id"];?>);" >Ürünü Sil</a>
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
				$("td #updateSira").click(function(){
					var id = $(this).attr("get-id");
					var inputValue = $("input[name=sira_no"+id+"]").val();
					$.post('ajax.php?p=urunSiraGuncelle', {sira_no: inputValue,urun_id:id}, function (data) {
						alert(data);
					});
				});
				$('.datatable').dataTable({
					"bSort":false
				});

			});

				$(document).ready(function() {
				$("td #urun_fiyat").click(function(){
					var id = $(this).attr("get-id");
					var inputValue = $("input[name=urun_fiyat"+id+"]").val();
					$.post('ajax.php?p=urun_fiyatGuncelle', {urun_fiyat: inputValue,urun_id:id}, function (data) {
						alert(data);
							window.location.reload(true);
					});
				});
				$('.datatable').dataTable({
					"bSort":false
				});

			});


			function TekSil(catId){
				$.post('ajax.php?p=tek_urun_sil', {id: catId}, function (data) {
					if(data=="basarili"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Ürün başarılı bir şekilde silinmiştir.",
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
			function durumDegis(catId){
				$.post('ajax.php?p=urun_durum_degis', {id: catId}, function (data) {
					if(data=="yasaklama-basarili"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Ürün başarılı bir şekilde gizlendi.",
							type	: "success"
						},
						function(){
							window.location.reload(true);
						});
						return false;
					}else if(data=="yasak-kaldirildi"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Ürün başarılı bir şekilde aktifleştirildi.",
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
