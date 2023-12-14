<?php echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Manşet Ekle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=slider">Manşetler</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Manşet Ekle</a>
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
					<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=fotograf_add"  enctype="multipart/form-data">
						<input type="hidden" name="fotograf_bolum" value="1" />
						<div class="form-body">
							<div class="row">
								<!--<div class="col-12">
									<div class="form-group row">
										<label for="input-text" class="col-sm-2 control-label">Manşet Seçenekleri</label>
										<div class="col-sm-9">
											<select name="fotograf_shortDesc2" class="form-control">
												<option selected="true" disabled="disabled">Manşet seçeneğini belirleyin !</option>
												<option value="manuel">Manuel Gireceğim</option>
												<option value="makale" >Makalelerden Göster</option>
												<option value="galeri" >Galerilerden Göster</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12" id="hrefSayfalar" style="display:none">
									<div class="form-group row">
										<label for="input-text" class="col-sm-2 control-label">Menü Linki Belirleyin</label>
										<div class="col-sm-9">
											<select name="fotograf_longDesc" class="form-control">
												<option selected="true" disabled="disabled">Makale Seçin !</option>
												<?php
												$sayfaQuery = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND makalekonum_manset='on'");
												if($sayfaQuery->rowCount()){
													foreach($sayfaQuery as $sayfaRow){
														echo '<option value="'.$sayfaRow["sayfa_id"].'">'.$sayfaRow["sayfa_adi"].'</option>';
													}
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-12" id="hrefKategoriler" style="display:none">
									<div class="form-group row">
										<label for="input-text" class="col-sm-2 control-label">Menü Linki Belirleyin</label>
										<div class="col-sm-9">
											<select name="fotograf_longDesc" class="form-control">
												<option selected="true" disabled="disabled">Galeri Seçin !</option>
												<?php
												$sayfaQuery = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1");
												if($sayfaQuery->rowCount()){
													foreach($sayfaQuery as $sayfaRow){
														echo '<option value="'.$sayfaRow["sayfa_id"].'">'.$sayfaRow["sayfa_adi"].'</option>';
													}
												}
												?>
											</select>
										</div>
									</div>
									-->
								</div>
								<div  class="col-12 row" id="hrefManuel" >
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-2">
												<span>Manşet Başlığı</span>
											</div>
											<div class="col-md-10">
												<fieldset class="position-relative has-icon-left">
													<input type="text" id="first-name" class="form-control" name="fotograf_shortDesc" placeholder="Manşet başlığı örnek : Yeni Koleksiyonlar">
													<div class="form-control-position">
														<i class="feather icon-type"></i>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									
									<!--
									<div class="col-12">
													<div class="form-group row">
																	<div class="col-md-2">
																					<span>Fotoğraf Alt Başlığı</span>
																	</div>
																	<div class="col-md-10">
																					<fieldset class="position-relative has-icon-left">
																									<input type="text" id="first-name" class="form-control" name="fotograf_shortDesc2" placeholder="Fotoğraf başlığı örnek : Yeni Koleksiyonlar">
																									<div class="form-control-position">
																													<i class="feather icon-image"></i>
																									</div>
																					</fieldset>
																	</div>
													</div>
									</div>
									<div class="col-12">
													<div class="form-group row">
																	<div class="col-md-2">
																					<span>Uzun Açıklama</span>
																	</div>
																	<div class="col-md-10">
																					<fieldset class="position-relative has-icon-left">
																									<input type="text" id="first-name" class="form-control" name="fotograf_longDesc" placeholder="Fotoğrafa ait en fazla 140 karakterlik açıklama yazısı">
																									<div class="form-control-position">
																													<i class="feather icon-info"></i>
																									</div>
																					</fieldset>
																	</div>
													</div>
									</div>
									<div class="col-12">
													<div class="form-group row">
																	<div class="col-md-2">
																					<span>Fotoğrafı Alt Başlık</span>
																	</div>
																	<div class="col-md-10">
																					<fieldset class="form-group">
																									<input type="text" id="first-name" class="form-control" name="resim_baslik" placeholder="Resim Başlık">
																									<div class="form-control-position">
																													<i class="feather icon-external-link"></i>
																									</div>
																					</fieldset>
																	</div>
													</div>
									</div>
									-->
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-2">
												<span>Manşet Linki</span>
											</div>
											<div class="col-md-10">
												<fieldset class="position-relative has-icon-left">
													<input type="text" id="first-name" class="form-control" name="fotograf_href" placeholder="Manşetin yönlendirileceği URL. ( Boş Bırakılabilir )">
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
								</div>
								<div class="form-group col-md-8 offset-md-4">
								</div>
								<div class="col-md-8 offset-md-4">
									<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
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
					text : "Manşet Yükleniyor. Lütfen Bekleyiniz",
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
									text 	: "Manşet Başarılı Bir Şekilde Eklendi",
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
<script type="text/javascript">
		/* Bağlantı seçeneğine göre inputları göster */
	$("select[name=fotograf_shortDesc2]").change(function(){
		var hrefType = $("select[name=fotograf_shortDesc2]").val();
		if(hrefType=='manuel'){
$("#hrefSayfalar").hide();
$("#hrefKategoriler").hide(500);
$("#hrefManuel").show(500);
}else if(hrefType=='makale'){
	$("#hrefSayfalar").show();
$("#hrefKategoriler").hide(500);
$("#hrefManuel").hide(500);
}else if(hrefType=="galeri"){
		$("#hrefSayfalar").hide();
$("#hrefKategoriler").show(500);
$("#hrefManuel").hide(500);
}
});
</script>