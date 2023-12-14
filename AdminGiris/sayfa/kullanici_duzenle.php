<?php
	echo !defined('ADMIN') ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;
if(isset($_GET["id"])){
	$id = g("id");
	$uyeControl = $db->prepare("SELECT * FROM uyeler WHERE uye_id=:id");
	$uyeControl->execute(array("id"=>$id));
	if($uyeControl->rowCount()){
		$uyeRow = $uyeControl->fetch(PDO::FETCH_ASSOC);
	}else{
				go(ADMIN_URL.'index.php?sayfa=404');
	}
}else{
			go(ADMIN_URL.'index.php?sayfa=404');
}
?>
<div class="content-wrapper">
	<div class="content-header row">
		<div class="content-header-left col-md-9 col-12 mb-2">
			<div class="row breadcrumbs-top">
				<div class="col-12">
					<h2 class="content-header-title float-left mb-0">Kullanıcı İşlemleri</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item"><a href="index.php?sayfa=kullanicilar">Kullanıcılar</a>
					</li>
					<li class="breadcrumb-item active"><a href="javascript:void(0);">Kullanıcı Düzenleme </a>
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
				<h4 class="card-title">   <p><b><?php echo $uyeRow["uye_ad"]." ".$uyeRow["uye_soyad"];?></b> Kullanıcı Düzenleniyor</p> </h4>
			</div>
			<div class="card-content">
				<div class="card-body">
					<form role="form"  id="forms" method="POST" action="ajax.php?p=uye_edit">
						<input type="hidden" name="uye_id" value="<?php echo $uyeRow["uye_id"];?>"/>
						<div class="form-body">
							<div class="row">
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>Kullanıcı Adı</span>
										</div>
										<div class="col-md-10">
											<fieldset class="position-relative has-icon-left">
												<input type="text" class="form-control" id="iconLeft1" value="<?php echo $uyeRow["uye_kadi"];?>" name="uye_kadi"  placeholder="">
												<div class="form-control-position">
													<i class="feather icon-phone"></i>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>Kullanıcı URL</span>
										</div>
										<div class="col-md-10">
											<fieldset class="position-relative has-icon-left">
												<input type="text" class="form-control" id="iconLeft1" name="uye_url"  placeholder="" value="<?php echo $uyeRow["uye_url"];?>">
												<div class="form-control-position">
													<i class="feather icon-phone"></i>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>Adınız</span>
										</div>
										<div class="col-md-10">
											<fieldset class="position-relative has-icon-left">
												<input type="text" class="form-control" id="iconLeft1" placeholder="Kullanıcı İsmi" name="uye_ad" value="<?php echo $uyeRow["uye_ad"];?>">
												<div class="form-control-position">
													<i class="feather icon-user"></i>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>Soyadınız</span>
										</div>
										<div class="col-md-10">
											<fieldset class="position-relative has-icon-left">
												<input type="text" class="form-control" id="iconLeft1" placeholder="Kullanıcı Soyismi" name="uye_soyad" value="<?php echo $uyeRow["uye_soyad"];?>">
												<div class="form-control-position">
													<i class="feather icon-user"></i>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>E-Posta</span>
										</div>
										<div class="col-md-10">
											<fieldset class="position-relative has-icon-left">
												<input type="hidden" name="uyeid" value="<?php echo $id;?>">
												<input type="email" id="email-id" class="form-control" name="uye_eposta" placeholder="E-Posta Adresi" value="<?php echo $uyeRow["uye_eposta"];?>">
												<div class="form-control-position">
													<i class="feather icon-mail"></i>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>Cep Tel</span>
										</div>
										<div class="col-md-10">
											<fieldset class="position-relative has-icon-left">
												<input type="text" class="form-control" id="iconLeft1" name="uye_telefon" placeholder="Cep Tel" value="<?php echo $uyeRow["uye_telefon"];?>">
												<div class="form-control-position">
													<i class="feather icon-smartphone"></i>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>Sabit Tel</span>
										</div>
										<div class="col-md-10">
											<fieldset class="position-relative has-icon-left">
												<input type="text" class="form-control" id="iconLeft1" name="uye_sabit"  placeholder="Sabit Tel" value="<?php echo $uyeRow["uye_sabit"];?>">
												<div class="form-control-position">
													<i class="feather icon-phone"></i>
												</div>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-12">
											<span>Kullanıcı İsim Seçimi</span>
										</div>
										<div class="col-md-12">
											<fieldset class="form-group">
												<select class="form-control" name="uye_kadisecimi" >
													<option <?php if ($uyeRow["uye_kadisecimi"]==0){ echo "selected";} ?> value="0">İsmimi Göster</option>
													<option <?php if ($uyeRow["uye_kadisecimi"]==1){ echo "selected";} ?> value="1">Kullanıcı Adımı Göster</option>
												</select>
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="form-group row">
										<div class="col-md-2">
											<span>Kullanıcı Türü</span>
										</div>
										<div class="col-md-10">
											<fieldset class="form-group">
												<select class="form-control" name="uye_rutbe" id="basicSelect">
													
													<option  <?php if ($uyeRow["uye_rutbe"]==0){ echo "selected";} ?>  value="0">Süper Admin</option>
													<option  <?php if ($uyeRow["uye_rutbe"]==1){ echo "selected";} ?>  value="1">Admin</option>
													<option  <?php if ($uyeRow["uye_rutbe"]==2){ echo "selected";} ?>  value="2">Editör</option>
													<option  <?php if ($uyeRow["uye_rutbe"]==3){ echo "selected";} ?>  value="3">Yazar</option>
													<option  <?php if ($uyeRow["uye_rutbe"]==4){ echo "selected";} ?>  value="4">Bot</option>
												</select>
											</fieldset>
										</div>
									</div>
								</div>
								
								<div class="form-group col-md-8 offset-md-4">
								</div>
								<div class="col-md-8 offset-md-4">
									<div id="id_box"></div>
									<button type="submit" class="btn btn-primary mr-1 mb-1">Kullanıcı Düzenle</button>
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
			success: function(data) {
				if(data=="bos-deger"){
					sweetAlert("Hata","Boş Değer Bırakmamalısınız","error");
					return false;
				}else if(data=="basarili"){
Log_Kaydi_Baslat('<?php echo $_SESSION["uye_adsoyad"];?>','<?php echo GetIP(); ?>','<?php echo $_SERVER['REQUEST_URI']; ?>','Başarılı')
sweetAlert({
title	: "Başarılı",
text 	: "Üye Başarılı Bir Şekilde Eklendi",
type	: "success"
},
function(){
window.location.reload(true);
});
return false;
}else if(data=="sifreler-uyusmuyor"){
sweetAlert("Hata","Şifreler Uyuşmuyor","warning");
return false;
}else if(data=="degisiklik-yok"){
sweetAlert("Hata","Bu Mail Adresi Alınmış","warning");
return false;
}else if(data=="gecersiz-eposta"){
sweetAlert("Hata","Geçerli Bir Eposta Girin","warning");
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