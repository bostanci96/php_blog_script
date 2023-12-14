<?php
	echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$catControl = $db->prepare("SELECT * FROM galerikategori WHERE kategori_id=:id");
	$catControl->execute(array("id"=>$id));
	if($catControl->rowCount()){
		$catRow = $catControl->fetch(PDO::FETCH_ASSOC);
	}else{
			go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
		go(ADMIN_URL.'index.php?sayfa=404');
}
function Kategori_Select($tree,$level=0,$selID = null){
	global $db;
	$sorgula = $db->query("SELECT * FROM galerikategori WHERE kategori_ust_id='$tree' and kategori_durum=1 and kat_secenek=1");
	if($sorgula->rowCount()){
		foreach ($sorgula as $item)
		{
			if($item["kategori_id"]==$selID){$selected = " selected ";}else{$selected=null;}
			echo '<option value="'.$item["kategori_id"].'" '.$selected.'>'.str_repeat('-', $level*3).$item['kategori_adi'].'</option>';
			Kategori_Select($item['kategori_id'],$level + 1,$selID);
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
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Kategori Düzenle</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="index.php?sayfa=kategoriler4">Kategoriler</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);"><b><?php echo $catRow["kategori_adi"];?></b> adlı kategori düzenleniyor.. </a>
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
					<form role="form" id="forms" method="POST" action="ajax.php?p=galerikategori_edit"  enctype="multipart/form-data">
						<input type="hidden" name="kategori_id" value="<?php echo $catRow["kategori_id"];?>" />
						<input type="hidden" name="kat_secenek" value="<?php echo $catRow["kat_secenek"];?>" />
						<div class="form-body">
							<div class="row">
								<div class="col-md-10">
										<div class="row">
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Kategori Adı</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<input type="text" id="first-name" class="form-control" name="kategori_adi"  value="<?php echo $catRow["kategori_adi"];?>" placeholder="Kategori Adı">
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
												<span>Kategori Desc</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<input type="text" id="first-name" class="form-control" name="kategori_desc"  value="<?php echo $catRow["kategori_desc"];?>" placeholder="Kategori Desc">
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
												<span>Kategori Açıklama</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<textarea class="ckeditor" id="bootstrapck" name="kategori_aciklama"> <?php echo $catRow["kategori_aciklama"];?></textarea>
													<?php ckeditor('bootstrapck');?>
												</fieldset>
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
													<input type="text" class="form-control" id="iconLeft1" placeholder="" value="<?php echo $catRow["kat_seo_title"];?>"  name="kat_seo_title">
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
													<textarea type="text" class="form-control" id="iconLeft1" placeholder=""  name="kat_seo_desc"><?php echo $catRow["kat_seo_desc"];?></textarea>
													
													<div class="form-control-position">
														<i class="feather icon-file-text"></i>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									<!--<div class="col-12">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Seo Anahtar Kelime</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<input type="text" class="form-control" id="iconLeft1" placeholder="" value="<?php echo $catRow["kat_seo_keyw"];?>"  name="kat_seo_keyw">
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
												<span>Kategori URL</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<input type="text" class="form-control" id="iconLeft1" placeholder="" value="<?php echo $catRow["kategori_url"];?>" name="kategori_url">
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
												<span>Anasayfa Görünürlüğü</span>
											</div>
											<div class="col-md-12">
												<fieldset class="form-group">
													<select name="kat_anasayfa" id="method"  class="form-control">
														<option <?php echo $catRow["kat_anasayfa"] == 0 ? 'selected' : null; ?> value="0">Hayır, Görünmesin</option>
														<option <?php echo $catRow["kat_anasayfa"] == 1 ? 'selected' : null; ?> value="1">Evet, Görünsün</option>
														
													</select>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-12" style="display: none;" id="sablonsec">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Şablon Seçeneği</span>
											</div>
											<div class="col-md-12">
												<fieldset class="form-group">
													<select name="kat_anasayfa_sablon" class="form-control">
														<option selected="true" disabled="disabled">---Şablon Seçiniz----</option>
	
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 1 ? 'selected' : null; ?> value="1">Kategori 6'lı Liste</option>
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 2 ? 'selected' : null; ?> value="2">Kategorisiz 6'lı Liste</option>
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 3 ? 'selected' : null; ?> value="3">Ufak 9'lu Liste</option>
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 4 ? 'selected' : null; ?> value="4">Orta Slider</option>
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 5 ? 'selected' : null; ?> value="5">3'lü Liste</option>
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 6 ? 'selected' : null; ?> value="6">3'lü Blog Liste</option>
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 9 ? 'selected' : null; ?> value="9">Kategori 3'lü Liste</option>
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 7 ? 'selected' : null; ?> value="7">Galeri Listeme</option>
														<option <?php echo $catRow["kat_anasayfa_sablon"] == 8 ? 'selected' : null; ?> value="8">G. Sözler Listeleme</option>
														
														
													</select>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-12" style="display: none;" id="iceriksiralama">
										<div class="form-group row">
											<div class="col-md-12">
												<span>İçerik Sıralaması</span>
											</div>
											<div class="col-md-12">
												<fieldset class="form-group">
													<select name="kat_icerik_siralama" class="form-control">
														<option selected="true" disabled="disabled">---Sıralama Seçiniz----</option>
														<option <?php echo $catRow["kat_icerik_siralama"] == "DESC" ? 'selected' : null; ?> value="DESC">Son Gönderilerden Çek</option>
														<option <?php echo $catRow["kat_icerik_siralama"] == "populer" ? 'selected' : null; ?> value="populer">Popüler Gönderilerden Çek</option>
														
														
													</select>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-12"  style="display: none;" id="iceriklimit">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Gösterilecek İçerik Limiti</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative">
													<input type="number"  class="form-control" name="kat_secenek_limiti"  value="<?php echo $catRow["kat_secenek_limiti"];?>" >
													
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Kategori Resim</span>
											</div>
											<div class="col-md-12">
												<fieldset class="form-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="inputGroupFile01" name="dosya[]">
														<label class="custom-file-label" for="inputGroupFile01">Dosya Seçiniz</label>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-md-5"><img src="<?php echo URL;?>images/kategoriler/big/<?php echo $catRow["kategori_resim"];?>" class="img-fluid" style="max-width: 85px;"></div>
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Resim Başlık</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<input type="desc" id="email-id" class="form-control" name="resim_baslik" value="<?php echo $catRow["resim_baslik"];?>" placeholder="Resim Başlık">
													<div class="form-control-position">
														<i class="feather icon-star"></i>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Kategori Sayfa Limit</span>
											</div>
											<div class="col-md-12">
												<fieldset class="position-relative has-icon-left">
													<input type="number" class="form-control" name="page_limit" value="<?php echo $catRow["page_limit"];?>" >
													<div class="form-control-position">
														<i class="feather icon-star"></i>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group row">
											<div class="col-md-12">
												<span>Yazı Default Resmi</span>
											</div>
											<div class="col-md-12">
												<fieldset class="form-group">
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="inputGroupFile01" name="dosya2[]">
														<label class="custom-file-label" for="inputGroupFile01">Dosya Seçiniz</label>
													</div>
												</fieldset>
											</div>
										</div>
									</div>
										<div class="col-md-5"><img src="<?php echo URL;?>images/makalegaleri/big/<?php echo $catRow["kategori_sabitresim"];?>" class="img-fluid" style="max-width: 85px;"></div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Galeri Anasayfa Durumu</span>
												</div>
												<div class="col-md-12">
													<div class="custom-control custom-checkbox">
														<input type="checkbox" name="galeri_anasayfa_kont" <?php echo $pageRow["galeri_anasayfa_kont"] == "on" ? 'checked' : null; ?> class="custom-control-input" id="customCheck99"/>
														<label class="custom-control-label ft1" for="customCheck99">Anasayfada Göster / Gösterme</label>
													</div>
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
					text : "Kategori Güncelleniyor. Lütfen Bekleyiniz",
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
							text 	: "Kategori Başarılı Bir Şekilde Güncellendi",
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
	$(document).ready(function () {
$('#method').change(
function () {
var method = $('option:selected').val();
if (this.value == "1") {
$("#sablonsec").show(500);
$("#iceriksiralama").show(500);
$("#iceriklimit").show(500);
} else if (this.value == "0") {
$("#sablonsec").hide(500);
$("#iceriklimit").hide(500);
$("#iceriksiralama").hide(500);
}
});
});
	var method = document.getElementById('method').value;
if (method == "1") {
$("#sablonsec").show(500);
$("#iceriksiralama").show(500);
$("#iceriklimit").show(500);
} else if (method == "0") {
$("#sablonsec").hide(500);
$("#iceriklimit").hide(500);
$("#iceriksiralama").hide(500);
}
</script>