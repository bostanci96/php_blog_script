<?php
	echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$slideControl = $db->prepare("SELECT * FROM linkyonlendirme WHERE link_id=:id");
	$slideControl->execute(array(
			"id"	=> $id
		));
	if($slideControl->rowCount()){
		$slideRow = $slideControl->fetch(PDO::FETCH_ASSOC);
	}else{
				go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
			go(ADMIN_URL.'index.php?sayfa=404');
}
?>
<style type="text/css">
	.card-body {
		padding: 0pc 1.5pc;
	}
</style>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Link Yönlendirme Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item active"><a href="javascript:void(0);">Link Yönlendirme Düzenle </a>
					</li>
				</ol>
			</div>
		</div>
	</div>
</div>
</div>
<div class="content-body">
<section id="multiple-column-form">
	<div class="row match-height">
		<div class="col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=linkyonlendirme_edit"  enctype="multipart/form-data">
							<div class="form-body">
								<div class="row">
									<input type="hidden" name="link_id" value="<?php echo $slideRow["link_id"];?>">
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Lütfen Yönlendirilmesini İsteğiniz Linki Yazın</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<input type="text" id="first-name" class="form-control" value="<?php echo $slideRow["link_yonlendirilecek"];?>" name="link_yonlendirilecek" placeholder="<?php echo URL; ?>yonlendirileceklink/">
													<div class="form-control-position">
														<i class="feather icon-type"></i>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Lütfen Yönleneceği Linki Yazın</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<input type="text" id="first-name" class="form-control" value="<?php echo $slideRow["link_yonlenen"];?>" name="link_yonlenen" placeholder="<?php echo URL; ?>yonlenecegilink/">
													<div class="form-control-position">
														<i class="feather icon-type"></i>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									
									
									<div class="form-group col-md-8 offset-md-4">
									</div>
									<div class="col-md-8 offset-md-4">
										<button type="submit" class="btn btn-primary mr-1 mb-1">Yönlendir</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>
<script>
$(document).ready(function(event) {
	$('#forms').ajaxForm({
		uploadProgress: function(event, position, total, percentComplete) {
			swal({
				title: "Yükleniyor",
				text : "Güncelleniyor. Lütfen Bekleyiniz",
				type : "info",
				closeOnConfirm : false,
				showLoaderOnConfirm:true,
			});
		},
		success: function(data) {
			if(data=="bos-deger"){
				sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
				return false;
			}else if(data=="basarili"){
				Log_Kaydi_Baslat('<?php echo $_SESSION["uye_adsoyad"];?>','<?php echo GetIP(); ?>','<?php echo $_SERVER['REQUEST_URI']; ?>','Başarılı')
				sweetAlert({
						title	: "Başarılı",
						text 	: "Başarılı Bir Şekilde Güncellendi",
						type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else{
				Log_Kaydi_Baslat('<?php echo $_SESSION["uye_adsoyad"];?>','<?php echo GetIP(); ?>','<?php echo $_SERVER['REQUEST_URI']; ?>','Başarısız')
				sweetAlert(data,"Bir hata oluştu !","error");
				return false;
			}
		}
	});
});
</script>