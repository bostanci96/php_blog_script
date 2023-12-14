<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL . 'index.php?sayfa=404')) : null;
if (isset($_GET["id"]))
{
$id = g("id");
$pageControl = $db->prepare("SELECT * FROM sayfalar WHERE sayfa_id=:id");
$pageControl->execute(array(
"id" => $id
));
if ($pageControl->rowCount())
{
$pageRow = $pageControl->fetch(PDO::FETCH_ASSOC);
}
else
{
go(ADMIN_URL . 'index.php?sayfa=404');
}
}
else
{
go(ADMIN_URL . 'index.php?sayfa=404');
}
function Kategori_Select($tree, $level = 0, $selID = null)
{
global $db;
$sorgula = $db->query("SELECT * FROM kategoriler WHERE kategori_ust_id='$tree' and kategori_durum=1 and kat_secenek=2");
if ($sorgula->rowCount())
{
foreach ($sorgula as $item)
{
if ($item["kategori_id"] == $selID)
{
$selected = " selected ";
}
else
{
$selected = null;
}
echo '<option value="' . $item["kategori_id"] . '" ' . $selected . '>' . str_repeat('-', $level * 3) . $item['kategori_adi'] . '</option>';
Kategori_Select($item['kategori_id'], $level + 1, $selID);
}
}
}
?>
<style type="text/css">
	.card-body {
		padding: 0pc 1.5pc;
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
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL; ?>">Anasayfa</a></li>
							<li class="breadcrumb-item"><a href="index.php?sayfa=sayfalar">Sayfalar</a></li>
							<li class="breadcrumb-item active"><a href="javascript:void(0);"><b><?php echo $pageRow["sayfa_adi"]; ?> </b> Adlı Sayfa Düzenleniyor  </a></li>
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
								<form role="form"id="forms" method="POST" action="ajax.php?p=sayfa_edit"  enctype="multipart/form-data">
									<input type="hidden" value="<?php echo $pageRow["sayfa_id"]; ?>" name="sayfa_id" />
									<input type="hidden" value="<?php echo $pageRow["portkat"]; ?>" name="portkat" />
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
																<input type="text" class="form-control" value="<?php echo $pageRow["sayfa_adi"]; ?>"    id="iconLeft1" placeholder="Sayfa Başlığı girin " name="sayfa_adi">
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
																<textarea  type="text" class="form-control" value=""  id="iconLeft1" placeholder="Sayfa Kısa Açıklaması " name="sayfa_desc"><?php echo $pageRow["sayfa_desc"]; ?></textarea>
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
															<textarea class="ckeditor" id="bootstrapck" name="sayfa_icerik"> <?php echo $pageRow["sayfa_icerik"]; ?> </textarea>
															<?php ckeditor('bootstrapck'); ?>
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
																<input type="text" class="form-control" value="<?php echo $pageRow["sayfa_goster1"]; ?>" id="iconLeft1" placeholder="" name="sayfa_goster1">
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
																<textarea type="text" class="form-control" id="iconLeft1" placeholder="" name="sayfa_goster2"><?php echo $pageRow["sayfa_goster2"]; ?></textarea>
																
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
																<input type="text" class="form-control" id="iconLeft1" placeholder="Örn Kalem, Silgi, Defter Gibi .." name="sayfa_keyw" value="<?php echo $pageRow["sayfa_keyw"]; ?>">
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
																<input type="text" class="form-control" value="<?php echo $pageRow["sayfa_url"]; ?>" id="iconLeft1" placeholder="" name="sayfa_url">
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
															<span>Sayfa Seçenekleri</span>
														</div>
														<div class="col-md-12">
															<fieldset class="form-group">
																<select name="secenekHaber" class="form-control">
																	<option value="0"  <?php echo $pageRow["secenekHaber"] == 0 ? 'selected' : null; ?>>Düz Sayfa Olsun</option>
																	<option value="3"  <?php echo $pageRow["secenekHaber"] == 3 ? 'selected' : null; ?>>Contact Page Ekle</option>
																	<!--<option value="4" <?php echo $pageRow["secenekHaber"] == 4 ? 'selected' : null; ?>>Astroloji Sabit Sayfa Ekle</option>
																	<option value="6" <?php echo $pageRow["secenekHaber"] == 6 ? 'selected' : null; ?>>Detaylı Sayfa Ekle</option>
																		<option value="1">Blog Alanına Ekle</option>
																	<option value="3"> Kurumsal Alana Ekle</option>
																	<option value="4"> SSS ÜST Alana Ekle</option>
																	<option value="5"> SSS ALT Alana Ekle</option>-->
																</select>
															</fieldset>
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
												<div class="col-md-5"><img src="<?php echo URL; ?>images/sayfalar/thumb/<?php echo $pageRow["sayfa_resim"]; ?>" style="width: 150px;"></div>
												<div class="col-12">
													<div class="form-group row">
														<div class="col-md-12">
															<span>Resim Başlık</span>
														</div>
														<div class="col-md-12">
															<input type="text" class="form-control"  id="iconLeft1" value="<?php echo $pageRow["resim_baslik"]; ?>"  placeholder="Örn Kalem, Silgi, Defter Gibi .." name="resim_baslik">
														</div>
													</div>
												</div>
												
											
												</div>
												
											</div>
											<div class="form-group col-md-8 offset-md-4">
											</div>
											<div class="col-md-12 text-right mt-5">
												<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Güncelle</button>
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
	function baslikguncelle(slideId){
		var resim_baslik=document.getElementById('resmLeft1').value
		var en_resim_baslik=document.getElementById('resmLeft2').value
		var ar_resim_baslik=document.getElementById('resmLeft3').value
		var fa_resim_baslik=document.getElementById('resmLeft4').value
		$.post('ajax.php?p=baslikresimguncelle', {resim_baslik: resim_baslik,en_resim_baslik: en_resim_baslik,ar_resim_baslik: ar_resim_baslik,fa_resim_baslik: fa_resim_baslik,id: slideId}, function (data) {
			if(data=="basarili"){
				sweetAlert({
									title	: "Başarılı",
									text 	: "Resim başarılı bir şekilde Güncellendi.",
									type	: "success"
				},
				function(){
					window.location.reload(true);
				});
				return false;
			}else if(data=="basarisiz"){
				swal("Başarısız","Güncellenemedi !","error");
				return false;
			}
		});
	}
	function TekSil(slideId){
		var x = confirm("Silmek istediğinize eminmisiniz ?");
		if(x){
			$.post('ajax.php?p=tek_foto_sil', {id: slideId}, function (data) {
				if(data=="basarili"){
					sweetAlert({
										title	: "Başarılı",
										text 	: "Resim başarılı bir şekilde silindi.",
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
		}else{
			return false;
		}
	}
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