<?php echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<?php
function Kategori_Select($tree,$level=0){
	global $db;
	$sorgula = $db->query("SELECT * FROM galerikategori WHERE kategori_ust_id='$tree' and kategori_durum=1 ORDER BY kategori_adi ASC");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
				if($item["def_kat_ayar"]==1){$sel="selected";}else{$sel="";}
			echo '<option '.$sel.' value="'.$item["kategori_id"].'">'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1);
		}
	}
}
?>
<style type="text/css">
	.ft1{
		font-size: 1.1rem;
	}
</style>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-0">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Galeri Ekle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=galeri_sayfalar">Galeri Yazıları</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Yeni Galeri Ekle</a>
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
					<form role="form" class="form-horizontal"  id="forms" method="POST" id="forms" method="POST" action="ajax.php?p=galeri_ekle"  enctype="multipart/form-data">
						<input type="hidden" name="secenekHaber" value="1">
						<input type="hidden" name="secenekHaber" value="1">
						<div class="form-body">
							<div class="row">
								<div class="col-md-10">
									<div class="row">
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Başlık</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="text" class="form-control"  placeholder="Galeri Başlığı girin " name="sayfa_adi">
														<div class="form-control-position">
															<i class="feather icon-feather"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Acıklama</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<textarea  type="text" class="form-control"  placeholder="Galeri Kısa Açıklaması " name="sayfa_desc"></textarea>
														<div class="form-control-position">
															<i class="feather icon-file-text"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri İçerik</span>
												</div>
												<div class="col-md-12">
													<textarea class="ckeditor" id="bootstrapck" name="sayfa_icerik"></textarea>
													<?php ckeditor('bootstrapck');?>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri İçeriği Resim Ekle</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="inputGroupFile01" multiple=""  name="galeritotal[]">
															<label class="custom-file-label" for="inputGroupFile01">Dosyaları Seçiniz</label>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Etiketleri <small>(Virgül ile ayırarak yazınız.)</small></span>
												</div>
												<div class="col-md-12">
													<input type="text" class="form-control"   placeholder="" name="makale_etiket">
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Seo Başlık</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="text" class="form-control"  placeholder="" name="sayfa_goster1">
														<div class="form-control-position">
															<i class="feather icon-file-text"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Seo Açıklama</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="text" class="form-control"  placeholder="" name="sayfa_goster2">
														<div class="form-control-position">
															<i class="feather icon-file-text"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<!--	<div class="col-12">
												<div class="form-group row">
														<div class="col-md-12">
																<span>Seo Anahtar Kelime</span>
														</div>
														<div class="col-md-12">
																<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control"  placeholder="Örn Kalem, Silgi, Defter Gibi .." name="sayfa_keyw">
																		<div class="form-control-position">
																				<i class="feather icon-file-text"></i>
																		</div>
																</fieldset>
														</div>
												</div>
										</div>-->
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri URL</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="text" class="form-control"  placeholder="" name="sayfa_url">
														<div class="form-control-position">
															<i class="feather icon-file-text"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<div class="row">
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Kategori Seç</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<select name="portkat" class="form-control">
															<?php Kategori_Select(0,0);?>
														</select>
													</fieldset>
												</div>
											</div>
										</div>
								<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Resim Göster / Gösterme</span>
												</div>
												<div class="col-md-12">
													<div class="custom-control custom-checkbox">
														<input checked type="checkbox" name="resim_goster" class="custom-control-input" id="customCheck5965"/>
														<label class="custom-control-label ft1"  for="customCheck5965">Göster / Gösterme</label>
													</div>
												
												</div>
											</div>
										</div>
											
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Ön Görsel</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<div class="custom-file">
															<input type="file" class="custom-file-input" id="inputGroupFile01"  name="dosya[]">
															<label class="custom-file-label" for="inputGroupFile01">Dosya Seçiniz</label>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Resim Başlık</span>
												</div>
												<div class="col-md-12">
													<input type="text" class="form-control"   placeholder="Örn Kalem, Silgi, Defter Gibi .." name="resim_baslik">
												</div>
											</div>
										</div>
											<!--	<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Konumları</span>
												</div>
												<div class="col-md-12">
														<div class="custom-control custom-checkbox">
														<input checked type="checkbox" name="makalekonum_yeni" class="custom-control-input" id="customCheck8"/>
														<label class="custom-control-label ft1" for="customCheck8">Yeni</label>
													</div>
													<div class="custom-control custom-checkbox">
												
														<input checked type="checkbox" name="makalekonum_ustslider" class="custom-control-input" id="customCheck1"/>
														<label class="custom-control-label ft1" for="customCheck1">Üst Slider</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input checked type="checkbox" name="makalekonum_mansetyani" class="custom-control-input" id="customCheck2"/>
														<label class="custom-control-label ft1" for="customCheck2">Manşet Yanı</label>
													</div>
													<div class="custom-control custom-checkbox">
												
														<input checked type="checkbox" name="makalekonum_manset" class="custom-control-input" id="customCheck9696"/>
														<label class="custom-control-label ft1" for="customCheck9696">Manşet</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input checked type="checkbox" name="makalekonum_sonyazilar" class="custom-control-input" id="customCheck4"/>
														<label class="custom-control-label ft1" for="customCheck4">Son Yazılar</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input checked type="checkbox" name="makalekonum_populeryazilar" class="custom-control-input" id="customCheck5"/>
														<label class="custom-control-label ft1" for="customCheck5">Popüler Yazılar</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input checked type="checkbox" name="makalekonum_buyukliste" class="custom-control-input" id="customCheck6"/>
														<label class="custom-control-label ft1" for="customCheck6">Büyük Liste</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input checked type="checkbox" name="makalekonum_aramablog" class="custom-control-input" id="customCheck7"/>
														<label class="custom-control-label ft1" for="customCheck7">Arama Blog</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input checked type="checkbox" name="makalekonum_footeryazi" class="custom-control-input" id="customCheck9"/>
														<label class="custom-control-label ft1" for="customCheck9">Footer Yazılar</label>
													</div>
												</div>
											</div>
										</div>-->
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Yayın Tarihi</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>"  placeholder="" name="sayfa_tarih">
														<div class="form-control-position">
															<i class="feather icon-file-text"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Yayın Saati</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="time" class="form-control" value="<?php echo date('H:i'); ?>"  placeholder="" name="sayfa_time">
														<div class="form-control-position">
															<i class="feather icon-file-text"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<?php if ($_SESSION["uye_rutbe"] == 0 OR $_SESSION["uye_rutbe"] == 1 OR $_SESSION["uye_rutbe"] == 3) { ?>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Yazarı</span>
												</div>
												<div class="col-md-12">
													<select name="sayfa_yazar" class="form-control" required="" >
														
														<option selected="true" disabled="disabled">Yazar Seçin !</option>
												
														<?php
															$sayfaQxx = $db->query("SELECT * FROM uyeler WHERE uye_onay=1 ORDER BY uye_ad ASC");
															if($sayfaQxx->rowCount()){
																foreach($sayfaQxx as $sayfaRxx){
																	$sle =NULL;
																	if ($_SESSION['uye_id']==$sayfaRxx["uye_id"]) {
																		$sle ="selected";
																	}
																	echo '<option '.$sle.' value="'.$sayfaRxx["uye_id"].'">'.$sayfaRxx["uye_ad"].' '.$sayfaRxx["uye_soyad"].'</option>';
																}
															}
														?>
													</select>
												</div>
											</div>
										</div>
										<?php } ?>
										<?php if ($_SESSION["uye_rutbe"] == 2 OR $_SESSION["uye_rutbe"] == 4) { ?>

											<input type="hidden" name="sayfa_yazar" value="<?php echo  $_SESSION["uye_id"]; ?>">
											<?php } ?>
												<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Durumu</span>
												</div>
												<div class="col-md-12">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" name="makale_durum_pop" class="custom-control-input" id="customCheck99"/>
														<label class="custom-control-label ft1" for="customCheck99">Popüler Galeri</label>
													</div>
												</div>
												<div class="col-md-12">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" name="makalekonum_yeni" class="custom-control-input" id="customCheck88"/>
														<label class="custom-control-label ft1" for="customCheck88">Editörün Seçimi</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri İnceleme Sayısı</span>
												</div>
												<div class="col-md-12">
													<input type="number" class="form-control"   placeholder="" name="makale_inceleme_say">
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Yıldız Sayısı</span>
												</div>
												<div class="col-md-12">
													<input type="number" min="1"  max="5" class="form-control"   placeholder="" name="makale_yildiz_say">
												</div>
											</div>
										</div>
									</div>
									
								</div>
								
								
								<div class="form-group col-md-8 offset-md-4">
								</div>
								<div class="col-md-12 text-right mt-5">
									<button type="submit" name="taslak" value="1" class="btn btn-secondary mr-1 mb-1">Taslak Olarak Kaydet</button>
								<!--	<button type="submit" name="yayin"  value="1" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button> -->
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
			beforeSerialize: function(form, options) {
				for (instance in CKEDITOR.instances)
					CKEDITOR.instances[instance].updateElement();
			},
			uploadProgress: function(event, position, total, percentComplete) {
				swal({
					title: "Yükleniyor",
					text : "Galeri Fotoğrafları Yükleniyor. Lütfen Bekleyiniz",
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
										text 	: "Galeri Başarılı Bir Şekilde Eklendi",
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