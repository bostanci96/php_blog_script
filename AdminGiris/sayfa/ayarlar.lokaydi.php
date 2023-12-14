<?php echo !defined("ADMIN") ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Log Kayıt İşlemleri</h2>
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
			<div class="actions action-btns"><div class="dt-buttons btn-group">
				<a onclick="BoslatSil('1');" class="btn btn-outline-primary" tabindex="0" aria-controls="DataTables_Table_0"><span>Sıfırla</span></a> </div></div>
				<table class="table data-list-view">
					<thead>
						<tr><th></th>
						<th>ID</th>
						<th>Tarih</th>
						
						<th>Yazar</th>
						<th>IP Adresi</th>
						<th>İşlem Sayfası</th>
						<th>İşlem Durumu</th>
						<th>İşlemler</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$uyeQuery = $db->query("SELECT * FROM kullanici_logkaydi");
					if($uyeQuery->rowCount()){
						foreach($uyeQuery as $uyeRow){
					?>
					<tr>
						<td></td>
						<td><?php echo $uyeRow["log_id"];?></td>
						<td><?php echo $uyeRow["log_tarih"];?></td>
						<td><?php echo $uyeRow["log_kadi"];?></td>
						<td><?php echo $uyeRow["log_kip"];?></td>
						<td><a href="<?php echo $uyeRow["log_bsayfa"];?>" target="_blank"><?php echo $uyeRow["log_bsayfa"];?></a></td>
						<td><?php echo $uyeRow["log_islemdurum"];?></td>
						
						<td >
							<div class="dropdown dropright">
								<button onclick="TekSil(<?php echo $uyeRow["log_id"];?>);"  class="btn btn-danger dropdown-toggle" type="button" >
								Sil
								</button>
								
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
	function TekSil(log_id){
		$.post('ajax.php?p=log_tek_sil', {id: log_id}, function (data) {
			if(data=="basarili"){
				sweetAlert({
						title	: "Başarılı",
						text 	: "Kayıt başarılı bir şekilde silinmiştir.",
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
		$.post('ajax.php?p=log_bosalt_sil', {id: log_id}, function (data) {
			if(data=="basarili"){
				sweetAlert({
						title	: "Başarılı",
						text 	: "Kayıt başarılı bir şekilde silinmiştir.",
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