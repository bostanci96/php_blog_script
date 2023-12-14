<?php 
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$slideControl = $db->prepare("SELECT * FROM fotograflar WHERE fotograf_id=:id && fotograf_bolum=:bolum");
	$slideControl->execute(array(
		"id"	=> $id,
		"bolum"	=>1
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
					<h2 class="content-header-title float-left mb-0">Fotoğraf Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);"><?php echo $slideRow["fotograf_shortDesc"];?></b> düzenleniyor..</a>
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
						<div class="card-header">
						
						</div>
						<div class="card-content">
							<div class="card-body">
								<form role="form" id="forms" method="POST" action="ajax.php?p=fotograf_edit"  enctype="multipart/form-data">
									<input type="hidden" name="fotograf_bolum" value="1" />
									<input type="hidden" name="fotograf_id" value="<?php echo $slideRow["fotograf_id"];?>" />
									<input type="hidden" name="fotograf_src" value="<?php echo $slideRow["fotograf_src"];?>" />
									<input type="hidden" name="fotograf_src" value="<?php echo $slideRow["fotograf_shortDesc2"];?>" />
									<input type="hidden" name="fotograf_src" value="<?php echo $slideRow["fotograf_longDesc"];?>" />
									<div class="form-body">
										<div class="row">

					

													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
															<span>Manşet Başlığı</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="fotograf_shortDesc" value="<?php echo $slideRow["fotograf_shortDesc"];?>" placeholder="Fotoğraf başlığı örnek : Yeni Koleksiyonlar">
																	<div class="form-control-position">
																		<i class="feather icon-type"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>
												
													<div class="col-12">
														<div class="form-group row">
															<div class="col-md-2">
															<span>Manşet Linki</span>
															</div>
															<div class="col-md-10">
																<fieldset class="position-relative has-icon-left">
																	<input type="text" id="first-name" class="form-control" name="fotograf_href" value="<?php echo $slideRow["fotograf_href"];?>" placeholder="İncele butonunun yönlendirileceği URL. ( Boş Bırakılabilir )">
																	<div class="form-control-position">
																		<i class="feather icon-external-link"></i>
																	</div>
																</fieldset>
															</div>
														</div>
													</div>

												


											


											<div class="col-12">
												<div class="form-group row">
													<div class="col-md-2">
															<span>Manşet Resmi</span>
													</div>
													<div class="col-md-10">
														<fieldset class="form-group">                                                    
															<div class="custom-file">
																<input type="file" class="custom-file-input" name="dosya[]" id="dosya[]">
																<label class="custom-file-label" for="inputGroupFile01">Resim Seçiniz</label>
															</div>
														</fieldset>
													</div>
												</div>
											</div>
											<div class="col-md-5"><img src="<?php echo URL;?>images/photos/big/<?php echo $slideRow["fotograf_src"];?>" style="width: 150px;"></div>

											<div class="col-md-7 offset-md-4 ressss"  >
												<button type="submit" class="btn btn-primary mr-1 mb-1">Güncelle</button>
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
					text : "Manşet Güncelleniyor. Lütfen Bekleyiniz",
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
					sweetAlert({
						title	: "Başarılı",
						text 	: "Manşet Başarılı Bir Şekilde Güncellendi",
						type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else{
					sweetAlert(data,"Bir hata oluştu !","error");
					return false;
				}
			}
		});

	});
</script>



