<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
$ayarControl = $db->query("SELECT * FROM reklamalanlari");
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
					<h2 class="content-header-title float-left mb-0">Reklam Alan Ayarları</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
						</li>
						<li class="breadcrumb-item active"><a href="javascript:void(0);">Reklam Alan Ayarları</a>
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
						
						<div class="form-body p-2">
							<div class="row">
								<div class="col-md-6">
									<form role="form" class="form-horizontal"  id="forms2" method="POST" action="ajax.php?p=reklamalanlari"  enctype="multipart/form-data">
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Sağ Sabit</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 1" name="baslik1"><?php echo html_entity_decode($ayarRow["baslik1"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Sol Sabit</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 2" name="desc1"><?php echo html_entity_decode($ayarRow["desc1"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Footer Sabit</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 3" name="baslik2"><?php echo html_entity_decode($ayarRow["baslik2"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Anasayfa Önce Çıkanlar Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 4" name="desc2"><?php echo html_entity_decode($ayarRow["desc2"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Manşet Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 5" name="baslik3"><?php echo html_entity_decode($ayarRow["baslik3"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Footer Sabit</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 6" name="desc3"><?php echo html_entity_decode($ayarRow["desc3"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Makale Detay Öne Çıkanlar Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 7" name="baslik4"><?php echo html_entity_decode($ayarRow["baslik4"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Makale Detay Ön Görsel Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 8" name="desc4"><?php echo html_entity_decode($ayarRow["desc4"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Makale Detay İçerik Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 9" name="baslik5"><?php echo html_entity_decode($ayarRow["baslik5"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Makale Detay Benzer İçerik Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 10" name="desc5"><?php echo html_entity_decode($ayarRow["desc5"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Makale Detay Son Yazılar Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 11" name="baslik6"><?php echo html_entity_decode($ayarRow["baslik6"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Makale Detay Sağ Blog En Alt</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 12" name="desc6"><?php echo html_entity_decode($ayarRow["desc6"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Makale Detay Kayar Menü Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 13" name="baslik7"><?php echo html_entity_decode($ayarRow["baslik7"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Makale Detay Ön Görsel Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 14" name="desc7"><?php echo html_entity_decode($ayarRow["desc7"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Makale Detay İçerik Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 15" name="baslik8"><?php echo html_entity_decode($ayarRow["baslik8"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Makale Detay Benzer İçerik Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 16" name="desc8"><?php echo html_entity_decode($ayarRow["desc8"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Düz İçerik Detay Öne Çıkanlar Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 17" name="baslik9"><?php echo html_entity_decode($ayarRow["baslik9"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Düz İçerik Detay Ön Görsel Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 18" name="desc9"><?php echo html_entity_decode($ayarRow["desc9"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Düz İçerik Detay İçerik Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 19" name="baslik10"><?php echo html_entity_decode($ayarRow["baslik10"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Düz İçerik Detay Benzer İçerik Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 20" name="desc10"><?php echo html_entity_decode($ayarRow["desc10"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Düz İçerik Detay Son Yazılar Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 21" name="baslik11"><?php echo html_entity_decode($ayarRow["baslik11"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Düz İçerik Detay Sağ Blog En Alt</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 22" name="desc11"><?php echo html_entity_decode($ayarRow["desc11"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Düz İçerik Detay Kayar Menü Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 23" name="baslik12"><?php echo html_entity_decode($ayarRow["baslik12"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Düz İçerik Detay Ön Görsel Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 24" name="desc12"><?php echo html_entity_decode($ayarRow["desc12"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Düz İçerik Detay İçerik Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 25" name="baslik13"><?php echo html_entity_decode($ayarRow["baslik13"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
							
									</div>
									<div class="col-md-6">
													<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Düz İçerik Detay Benzer İçerik Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 26" name="desc13"><?php echo html_entity_decode($ayarRow["desc13"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Galeri Detay Menü Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 27" name="baslik14"><?php echo html_entity_decode($ayarRow["baslik14"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Galeri Detay Ön Görsel Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 28" name="desc14"><?php echo html_entity_decode($ayarRow["desc14"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Galeri Detay İçerik Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 29" name="baslik15"><?php echo html_entity_decode($ayarRow["baslik15"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Galeri Detay Sağ Blog En Alt</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 30" name="desc15"><?php echo html_entity_decode($ayarRow["desc15"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Galeri Detay Kayar Menü Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 31" name="baslik16"><?php echo html_entity_decode($ayarRow["baslik16"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Galeri Detay Ön Görsel Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 32" name="desc16"><?php echo html_entity_decode($ayarRow["desc16"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Galeri Detay İçerik Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 33" name="baslik17"><?php echo html_entity_decode($ayarRow["baslik17"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Astroloji Detay Menü Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 34" name="desc17"><?php echo html_entity_decode($ayarRow["desc17"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Astroloji Detay Ön Görsel Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 35" name="baslik18"><?php echo html_entity_decode($ayarRow["baslik18"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Astroloji Detay Aşk Falı Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 36" name="desc18"><?php echo html_entity_decode($ayarRow["desc18"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Astroloji Detay Para Falı Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 37" name="baslik19"><?php echo html_entity_decode($ayarRow["baslik19"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Astroloji Detay Hürriyet Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 38" name="desc19"><?php echo html_entity_decode($ayarRow["desc19"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Astroloji Detay Sözcü Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 39" name="baslik20"><?php echo html_entity_decode($ayarRow["baslik20"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Astroloji Detay Yazı Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 40" name="desc20"><?php echo html_entity_decode($ayarRow["desc20"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Masaüstü Astroloji Detay Sağ Blok Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 41" name="baslik21"><?php echo html_entity_decode($ayarRow["baslik21"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Astroloji Detay Menü Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 42" name="desc21"><?php echo html_entity_decode($ayarRow["desc21"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Astroloji Detay Ön Görsel Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 43" name="baslik22"><?php echo html_entity_decode($ayarRow["baslik22"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Astroloji Detay Aşk Falı Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 44" name="desc22"><?php echo html_entity_decode($ayarRow["desc22"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Astroloji Detay Para Falı Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 45" name="baslik23"><?php echo html_entity_decode($ayarRow["baslik23"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Astroloji Detay Hürriyet Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 46" name="desc23"><?php echo html_entity_decode($ayarRow["desc23"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Astroloji Detay Sözcü Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 47" name="baslik24"><?php echo html_entity_decode($ayarRow["baslik24"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Astroloji Detay Yazı Sonu</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 48" name="desc24"><?php echo html_entity_decode($ayarRow["desc24"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
										
										<div class="col-12">
											<div class="form-group row">
												<div class="col-md-12">
													<span>Mobil Astroloji Detay Sağ Blok Altı</span>
												</div>
												<div class="col-md-12">
													<fieldset class="form-group">
														<textarea class="form-control" id="basicTextarea" rows="3" placeholder="Alan 49" name="baslik25"><?php echo html_entity_decode($ayarRow["baslik25"]);?></textarea>
													</fieldset>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-7 offset-md-5" >
										<button type="submit" class="btn btn-primary mr-1 mb-1">Güncelle</button>
									</div>
								</form>
							</div>
						</div>
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
		$('#forms3').ajaxForm({
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