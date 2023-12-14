<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
$ayarControl = $db->query("SELECT * FROM siterenk");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
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
					<h2 class="content-header-title float-left mb-0">Site Genel Renk Yönetimi</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item active"><a href="javascript:void(0);">Site Genel Renk Yönetimi</a>
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
					<div class="card-body pt-2">
						
						
						
						<form role="form" class="form-horizontal"  id="forms2" method="POST" action="ajax.php?p=anasayfasablon_ayarlari"  enctype="multipart/form-data">
							<div class="form-body">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Yeni Bölümü Yazı Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik1" value="<?php echo  htmlspecialchars($ayarRow["baslik1"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Yeni Bölümü ArkaPlan Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc1" value="<?php echo  htmlspecialchars($ayarRow["desc1"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Header Ana Menü Hover Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik2" value="<?php echo  htmlspecialchars($ayarRow["baslik2"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Header Kayar Menü Arkaplan Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc2" value="<?php echo  htmlspecialchars($ayarRow["desc2"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Header Kayar Menü Box-Shadow Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" opacity class="form-control" id="basicInput" name="baslik3" value="<?php echo  htmlspecialchars($ayarRow["baslik3"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Header Kayar Menü Yazı Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc3" value="<?php echo  htmlspecialchars($ayarRow["desc3"]);?>" >
													</div>
													
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Öne Çıkanlar Kategori Yazı ArkaPlan Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik4" value="<?php echo  htmlspecialchars($ayarRow["baslik4"]);?>" >
													</div>
													
												</div>
											</div>

											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Öne Çıkanlar Kategori Yazı Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc4" value="<?php echo  htmlspecialchars($ayarRow["desc4"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Kategori 6'lı Liste Kategori ArkaPlan Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik5" value="<?php echo  htmlspecialchars($ayarRow["baslik5"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Kategori 6'lı Liste Kategori Yazı Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc5" value="<?php echo  htmlspecialchars($ayarRow["desc5"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Yıldız Seçili Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik6" value="<?php echo  htmlspecialchars($ayarRow["baslik6"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Yıldız Boş Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc6" value="<?php echo  htmlspecialchars($ayarRow["desc6"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Orta Slider Dot Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik7" value="<?php echo  htmlspecialchars($ayarRow["baslik7"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Güzel Sözler Liste Sıra no ArkaPlan Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc7" value="<?php echo  htmlspecialchars($ayarRow["desc7"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Güzel Sözler Liste Sıra no Yazı Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik8" value="<?php echo  htmlspecialchars($ayarRow["baslik8"]);?>" >
													</div>
													
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Footer Üst Menü Arkaplan Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc8" value="<?php echo  htmlspecialchars($ayarRow["desc8"]);?>" >
													</div>
													
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Footer Üst Menü Yazı Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik9" value="<?php echo  htmlspecialchars($ayarRow["baslik9"]);?>" >
													</div>
													
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Footer Son Yazılar Arkaplan Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc9" value="<?php echo  htmlspecialchars($ayarRow["desc9"]);?>" >
													</div>
													
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Footer Son Yazılar Yazı Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik10" value="<?php echo  htmlspecialchars($ayarRow["baslik10"]);?>" >
													</div>
													
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Detay Sayfası Maddeleme İcon Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc10" value="<?php echo  htmlspecialchars($ayarRow["desc10"]);?>" >
													</div>
													
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Galeri Anasayfa Kategori Başlık Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik11" value="<?php echo  htmlspecialchars($ayarRow["baslik11"]);?>" >
													</div>
													
												</div>
											</div>
										
												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Manşet ArkaPlan Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc11" value="<?php echo  htmlspecialchars($ayarRow["desc11"]);?>" >
													</div>
													
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Manşet Yazı Rengi</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik12" value="<?php echo  htmlspecialchars($ayarRow["baslik12"]);?>" >
													</div>
													
												</div>
											</div>
													<!--<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Kategori 6'lı Liste</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc12" value="<?php echo  htmlspecialchars($ayarRow["desc12"]);?>" >
													</div>
													
												</div>
											</div>

												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Kategori 6'lı Liste</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="baslik13" value="<?php echo  htmlspecialchars($ayarRow["baslik13"]);?>" >
													</div>
													
												</div>
											</div>
												<div class="col-md-3">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Kategori 6'lı Liste</span>
													</div>
													<div class="col-md-12">
														
														<input type="text" class="form-control" id="basicInput" name="desc13" value="<?php echo  htmlspecialchars($ayarRow["desc13"]);?>" >
													</div>
													
												</div>
											</div>
											-->
											
											<div class="col-md-7 offset-md-4" >
												<button type="submit" class="btn btn-primary mr-1 mb-1">Güncelle</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
						
					</div>
				</div>
			</div>
			<div class="card">
				
				<div class="card-content">
					<div class="card-body pt-2">
						
						
												<?php
												$ayarControlxxx = $db->query("SELECT * FROM csskod");
												if($ayarControlxxx->rowCount()){
													$ayarRowxxx = $ayarControlxxx->fetch(PDO::FETCH_ASSOC);
												}else{
													die('error: 302 !');
												}
												?>
						
						<form role="form" class="form-horizontal"  id="forms4" method="POST" action="ajax.php?p=detaytagayarlari"  enctype="multipart/form-data">
							<div class="form-body">
								<div class="row">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group row">
													<div class="col-md-12">
														<span>Ek Css Kodları</span>
													</div>
													<div class="col-md-12">
														<textarea class="form-control" id="label-textarea" rows="25" name="baslik1" placeholder=""><?php echo  html_entity_decode($ayarRowxxx["baslik1"]);?></textarea>
													</div>
													
												</div>
											</div>
									
											
											<div class="col-md-7 offset-md-4" >
												<button type="submit" class="btn btn-primary mr-1 mb-1">Güncelle</button>
											</div>
										</div>
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
	
		$('#forms2').ajaxForm({
			beforeSerialize: function(form, options) {
				for (instance in CKEDITOR.instances)
					CKEDITOR.instances[instance].updateElement();
			},
			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarili"){
					sweetAlert({
										title	: "Başarılı",
										text 	: "Ayarlarınız Güncellendi !",
										type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else if(data=="basarisiz"){
					sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
					return false;
				}else{
					console.log(data);
					return false;
				}
			}
		});
		$('#forms4').ajaxForm({
				beforeSerialize: function(form, options) { 
					for (instance in CKEDITOR.instances)
						CKEDITOR.instances[instance].updateElement();
				},
				success: function(data) {
					if(data=="bos-deger"){
						sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
						return false;
					}else if(data=="basarili"){
						sweetAlert({
							title	: "Başarılı",
							text 	: "Ayarlarınız Güncellendi !",
							type	: "success"
						},
						function(){
							window.location.reload(true);
						});
						return false;
					}else if(data=="basarisiz"){
						sweetAlert("Uyarı","Değişiklik Yaptınız mı ?","warning");
						return false;
					}else{
						console.log(data);
						return false;
					}
				}
			});
	});
</script>