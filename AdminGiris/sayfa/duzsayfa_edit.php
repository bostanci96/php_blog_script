<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$pageControl = $db->prepare("SELECT * FROM duzsayfa WHERE sayfa_id=:id");
	$pageControl->execute(array("id"=>$id));
	if($pageControl->rowCount()){
		$pageRow = $pageControl->fetch(PDO::FETCH_ASSOC);
	}else{
			go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
		go(ADMIN_URL.'index.php?sayfa=404');
}

$met  =explode(" ", $pageRow["sayfa_tarih"]);
?>
<style type="text/css">
	.card-body {
		padding: 0pc 1.5pc;
	}
	.ft1{
		font-size: 1.1rem;
	}
</style>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-0">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Sayfa Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>index.php?sayfa=duzsayfalar">Sayfaler</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);"><b><?php echo $pageRow["sayfa_adi"];?> </b> Adlı Sayfa Düzenleniyor</a>
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
					<form role="form"id="forms" method="POST" action="ajax.php?p=duzsayfa_edit"  enctype="multipart/form-data">
						<input type="hidden" value="<?php echo $pageRow["sayfa_id"];?>" name="sayfa_id" />
						<input type="hidden" value="<?php echo $pageRow["portkat"];?>" name="portkat" />
						<input type="hidden" name="secenekHaber" value="<?php echo $pageRow["secenekHaber"];?>">
						<div class="form-body">
							<div class="row">
								<div class="col-md-10">
									<div class="row">
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Sayfa Başlık</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="text" class="form-control"  placeholder="Sayfa Başlığı girin " value="<?php echo $pageRow["sayfa_adi"];?>" name="sayfa_adi">
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
													<span>Sayfa Acıklama</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<textarea type="text" class="form-control"  placeholder="Sayfa Kısa Açıklaması " value="" name="sayfa_desc"><?php echo $pageRow["sayfa_desc"];?></textarea>
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
													<span>Sayfa İçerik</span>
												</div>
												<div class="col-md-12">
													<textarea class="ckeditor" id="bootstrapck" name="sayfa_icerik"><?php echo $pageRow["sayfa_icerik"];?></textarea>
													<?php ckeditor('bootstrapck');?>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Sayfa Etiketleri <small>(Virgül ile ayırarak yazınız.)</small></span>
												</div>
												<div class="col-md-12">
													<input type="text" class="form-control"   placeholder="" value="<?php echo $pageRow["makale_etiket"];?>" name="makale_etiket">
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
														<input type="text" class="form-control"  placeholder="" value="<?php echo $pageRow["sayfa_goster1"];?>" name="sayfa_goster1">
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
														<input type="text" class="form-control"  placeholder="" value="<?php echo $pageRow["sayfa_goster2"];?>" name="sayfa_goster2">
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
														<input type="text" class="form-control"  placeholder="Örn Kalem, Silgi, Defter Gibi .." value="<?php echo $pageRow["sayfa_keyw"];?>" name="sayfa_keyw">
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
													<span>Sayfa URL</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="text" class="form-control"  placeholder="" value="<?php echo $pageRow["sayfa_url"];?>" name="sayfa_url">
														<div class="form-control-position">
															<i class="feather icon-file-text"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
											<?php if ($_SESSION["uye_rutbe"] == 0) { ?>

<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Makale Soru Cevap SEO</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<textarea  type="text" class="form-control"  placeholder="Makale Soru Cevap SEO" name="sorucevap"><?php echo $pageRow["sorucevap"];?></textarea>
														<div class="form-control-position">
															<i class="feather icon-file-text"></i>
														</div>
													</fieldset>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
								<div class="col-md-2">
									<div class="row">
									<div class="col-12">
													<div class="form-group row">
														<div class="col-md-12">
															<span>Sayfa Seçenekleri</span>
														</div>
														<div class="col-md-12">
															<fieldset class="form-group">
																<select name="secenekHaber" class="form-control">
																<option value="4" <?php echo $pageRow["secenekHaber"] == 4 ? 'selected' : null; ?>>Astroloji Sabit Sayfa Ekle</option>
																	<option value="6" <?php echo $pageRow["secenekHaber"] == 6 ? 'selected' : null; ?>>Detaylı Sayfa Ekle</option>
																		
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
														<input type="checkbox" <?php echo $pageRow["resim_goster"] == "on" ? 'checked' : null; ?> name="resim_goster" class="custom-control-input" id="customCheck5965"/>
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
										<div class="col-md-5"><img src="<?php echo URL;?>images/duzsayfa/thumb/<?php echo $pageRow["sayfa_resim"];?>" style="width: 150px;"></div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Resim Başlık</span>
												</div>
												<div class="col-md-12">
													<input type="text" class="form-control"   placeholder="Örn Kalem, Silgi, Defter Gibi .." value="<?php echo $pageRow["resim_baslik"];?>" name="resim_baslik">
												</div>
											</div>
										</div>
										<!--<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Sayfa Konumları</span>
												</div>
												<div class="col-md-12">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" <?php echo $pageRow["makalekonum_yeni"] == "on" ? 'checked' : null; ?> name="makalekonum_yeni" class="custom-control-input" id="customCheck8"/>
														<label class="custom-control-label ft1"  for="customCheck8">Yeni</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" <?php echo $pageRow["makalekonum_ustslider"] == "on" ? 'checked' : null; ?> name="makalekonum_ustslider" class="custom-control-input" id="customCheck1"/>
														<label class="custom-control-label ft1"  for="customCheck1">Üst Slider</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" <?php echo $pageRow["makalekonum_mansetyani"] == "on" ? 'checked' : null; ?> name="makalekonum_mansetyani" class="custom-control-input" id="customCheck2"/>
														<label class="custom-control-label ft1"  for="customCheck2">Manşet Yanı</label>
													</div>
													<div class="custom-control custom-checkbox">
												
														<input checked type="checkbox" <?php echo $pageRow["makalekonum_manset"] == "on" ? 'checked' : null; ?> name="makalekonum_manset" class="custom-control-input" id="customCheck9696"/>
														<label class="custom-control-label ft1" for="customCheck9696">Manşet</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input type="checkbox"  <?php echo $pageRow["makalekonum_sonyazilar"] == "on" ? 'checked' : null; ?> name="makalekonum_sonyazilar" class="custom-control-input" id="customCheck4"/>
														<label class="custom-control-label ft1" for="customCheck4">Son Yazılar</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input type="checkbox"  <?php echo $pageRow["makalekonum_populeryazilar"] == "on" ? 'checked' : null; ?> name="makalekonum_populeryazilar" class="custom-control-input" id="customCheck5"/>
														<label class="custom-control-label ft1" for="customCheck5">Popüler Yazılar</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" <?php echo $pageRow["makalekonum_buyukliste"] == "on" ? 'checked' : null; ?> name="makalekonum_buyukliste" class="custom-control-input" id="customCheck6"/>
														<label class="custom-control-label ft1"  for="customCheck6">Büyük Liste</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" <?php echo $pageRow["makalekonum_aramablog"] == "on" ? 'checked' : null; ?> name="makalekonum_aramablog" class="custom-control-input" id="customCheck7"/>
														<label class="custom-control-label ft1"  for="customCheck7">Arama Blog</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" <?php echo $pageRow["makalekonum_footeryazi"] == "on" ? 'checked' : null; ?> name="makalekonum_footeryazi" class="custom-control-input" id="customCheck9"/>
														<label class="custom-control-label ft1"  for="customCheck9">Footer Yazılar</label>
													</div>
													<div class="custom-control custom-checkbox">
														<input type="checkbox" <?php echo $pageRow["makalekonum_astroloji"] == "on" ? 'checked' : null; ?> name="makalekonum_astroloji" class="custom-control-input" id="customCheck99595959"/>
														<label class="custom-control-label ft1"  for="customCheck99595959">Astroloji Sağ Alan</label>
													</div>
												</div>
											</div>
										</div>-->
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Sayfa Yayın Tarihi</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="date" class="form-control"  placeholder="" value="<?php echo $met["0"];?>" name="sayfa_tarih">
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
													<span>Sayfa Yayın Saati</span>
												</div>
												<div class="col-md-12">
													<fieldset class="position-relative has-icon-left">
														<input type="time" class="form-control"  placeholder="" value="<?php echo $met["1"];?>" name="sayfa_time">
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
													<span>Sayfa Yazarı</span>
												</div>
												<div class="col-md-12">
													<select name="sayfa_yazar" class="form-control" required=""  >
														
														<option selected="true" disabled="disabled">Yazar Seçin !</option>
														<?php
																$sayfaQxx = $db->query("SELECT * FROM uyeler WHERE uye_onay=1 ORDER BY uye_ad ASC");
																if($sayfaQxx->rowCount()){
														foreach($sayfaQxx as $sayfaRxx){ ?>
														<option value='<?php echo $sayfaRxx["uye_id"]; ?>' <?php if ($sayfaRxx["uye_id"]==$pageRow["sayfa_yazar"]){ echo "selected"; } ?> ><?php echo $sayfaRxx["uye_ad"].' '.$sayfaRxx["uye_soyad"]; ?></option>
														<?php	}
														}
														?>
													</select>
												</div>
											</div>
										</div>
<!--<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Sayfa Durumu</span>
												</div>
												<div class="col-md-12">
													<div class="custom-control custom-checkbox">
														<input <?php echo $pageRow["makale_durum_pop"] == "on" ? 'checked' : null; ?> type="checkbox" name="makale_durum_pop" class="custom-control-input" id="customCheck99"/>
														<label class="custom-control-label ft1" for="customCheck99">Popüler Sayfa</label>
													</div>
												</div>
											</div>
										</div>-->
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Sayfa İnceleme Sayısı</span>
												</div>
												<div class="col-md-12">
													<input type="number" class="form-control"   placeholder="" name="makale_inceleme_say" value="<?php echo $pageRow["makale_inceleme_say"];?>">
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Sayfa Yıldız Sayısı</span>
												</div>
												<div class="col-md-12">
													<input type="number" min="1"  max="5" class="form-control" value="<?php echo $pageRow["makale_yildiz_say"];?>"  placeholder="" name="makale_yildiz_say">
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Sayfa İçindekiler Tagı</span>
												</div>
												<div class="col-md-12">
													<input type="text" min="1"  max="5" class="form-control"   placeholder="" value="<?php echo $pageRow["hashtag"];?>" name="hashtag">
												</div>
											</div>
										</div>
											<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Astroloji Tarih Aralığı</span>
												</div>
												<div class="col-md-12">
													<input type="text"  class="form-control"   placeholder="" value="<?php echo $pageRow["tariharalik"];?>"  name="tariharalik">
												</div>
											</div>
										</div>
									</div>
									
								</div>
								
								
								<div class="form-group col-md-8 offset-md-4">
								</div>
								<div class="col-md-12 text-right mt-5">
									<button type="submit" name="taslak" value="1" class="btn btn-secondary mr-1 mb-1">Taslak Olarak Kaydet</button>
									<button type="submit" name="yayin"  value="1" class="btn btn-primary mr-1 mb-1">Güncelle</button>
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
					text : "Fotoğraflar Yükleniyor. Lütfen Bekleyiniz",
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
									text 	: "Sayfa Başarılı Bir Şekilde Güncellendi",
									type	: "success"
					},
					function(){
						window.location.reload(true);
					});
					return false;
				}else{
					Log_Kaydi_Baslat('<?php echo $_SESSION["uye_adsoyad"];?>','<?php echo GetIP(); ?>','<?php echo $_SERVER['REQUEST_URI']; ?>','Başarısız')
					sweetAlert(data,"Bir Hata Oluştu !","error");
					return false;
				}
			}
		});
	});
</script>