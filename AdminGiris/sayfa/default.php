<?php echo !defined("ADMIN") ? die(	go(ADMIN_URL.'index.php?sayfa=404')) : null;?>
<style type="text/css">
	.card {
    margin: 0.4rem;
}
</style>
<div class="content-header row">
</div>
<div class="content-body">
	<!-- Dashboard Analytics Start -->
	<div class="content-wrapper">
				<div class="content-body">
			<!-- Statistics card section start -->

			<section id="statistics-card">
<?php
									$sorgu = $db->prepare("SELECT COUNT(*) FROM makaleler ");
									$sorgu->execute();
									$say = $sorgu->fetchColumn();
									$sorgu2 = $db->prepare("SELECT COUNT(*) FROM makalegaleri ");
									$sorgu2->execute();
									$say2 = $sorgu2->fetchColumn();
									$sorgu3 = $db->prepare("SELECT COUNT(*) FROM duzsayfa ");
									$sorgu3->execute();
									$say3 = $sorgu3->fetchColumn();
									$sorgu4 = $db->prepare("SELECT COUNT(*) FROM sayfalar ");
									$sorgu4->execute();
									$say4 = $sorgu4->fetchColumn();
$Toplamicerik = $say + $say2 + $say3 + $say4;
									?>
								
				<div class="row">
    <!-- Medal Card -->
    <div class="col-xl-4 col-md-6 col-12">
      <div class="card card-congratulation-medal">
        <div class="card-body">
          <h5>Hoşgeldin 🎉 <?php echo $_SESSION["uye_adsoyad"];?></h5>
          <p class="card-text font-small-3">Toplam İçerik Sayısı= <strong style="font-size: 24px;"> <?php echo $Toplamicerik;  ?></strong></p>
         
        </div>
      </div>
    </div>
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    <div class="col-xl-8 col-md-6 col-12">
      <div class="card card-statistics">
     
        <div class="card-body statistics-body">
          <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-primary me-2">
                  <div class="avatar-content">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0"><?php echo $say3; ?></h4>
                  <p class="card-text font-small-3 mb-0">Düz Sayfa</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-info me-2">
                  <div class="avatar-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0"><?php echo $say; ?></h4>
                  <p class="card-text font-small-3 mb-0">Makale</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0"><?php echo $say2; ?></h4>
                  <p class="card-text font-small-3 mb-0">Galeri</p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
              <div class="d-flex flex-row">
                <div class="avatar bg-light-danger me-2">
                  <div class="avatar-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box avatar-icon"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                  </div>
                </div>
                <div class="my-auto">
                  <h4 class="fw-bolder mb-0"><?php echo $say4; ?></h4>
                  <p class="card-text font-small-3 mb-0">Sayfa</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ Statistics Card -->
  </div>
				<div class="row">








<?php
							$kquery = $db->query("SELECT * FROM haberkategori WHERE kat_secenek=1");
							if($kquery->rowCount()){
								foreach($kquery as $kRow){           $ustId = $kRow["kategori_ust_id"];
								if($ustId==0){
									$ustKat = "Ana Kategori";
								}else{
									$ustCatQuery = $db->query("SELECT kategori_adi FROM haberkategori WHERE kategori_id='$ustId' AND kat_secenek=1");
									if($ustCatQuery->rowCount()){
										$ustKatRow = $ustCatQuery->fetch(PDO::FETCH_ASSOC);
										$ustKat = $ustKatRow["kategori_adi"];
									}
								}
								    $katid = $kRow["kategori_id"];
								?>

					
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorgu = $db->prepare("SELECT COUNT(*) FROM makaleler INNER JOIN haberkategori ON kategori_id=portkat INNER JOIN uyeler ON uye_id=sayfa_yazar WHERE portkat='$katid'");
									$sorgu->execute();
									$say = $sorgu->fetchColumn();

									?>
								
								
									<p class="mb-0"><span style="    font-size: 14px;"><?php echo $say;?></span> Adet <span style="    font-size: 14px;"><?php echo $kRow["kategori_adi"];?></span> Makalesi</p>
								</div>

							</div>
					


							<?php  }} ?>


							<?php
							$kquery = $db->query("SELECT * FROM galerikategori WHERE kat_secenek=1");
							if($kquery->rowCount()){
								foreach($kquery as $kRow){           $ustId = $kRow["kategori_ust_id"];
								if($ustId==0){
									$ustKat = "Ana Kategori";
								}else{
									$ustCatQuery = $db->query("SELECT kategori_adi FROM galerikategori WHERE kategori_id='$ustId' AND kat_secenek=1");
									if($ustCatQuery->rowCount()){
										$ustKatRow = $ustCatQuery->fetch(PDO::FETCH_ASSOC);
										$ustKat = $ustKatRow["kategori_adi"];
									}
								}
								    $katid = $kRow["kategori_id"];
								?>

					
						<div class="card">
							<div class="card-header d-flex flex-column align-items-start pb-0" style="margin-bottom: 25px;">
								<?php
									$sorgu = $db->prepare("SELECT COUNT(*) FROM makalegaleri INNER JOIN galerikategori ON kategori_id=portkat INNER JOIN uyeler ON uye_id=sayfa_yazar WHERE portkat='$katid'");
									$sorgu->execute();
									$say = $sorgu->fetchColumn();

									?>
								
								
									<p class="mb-0"><span style="    font-size: 14px;"><?php echo $say;?></span> Adet <span style="    font-size: 14px;"><?php echo $kRow["kategori_adi"];?></span> Makalesi</p>
								</div>

							</div>
					


							<?php  }} ?>


						
					</div>

</section>
<!-- // Statistics Card section end-->

</div>
</div>
</div>
<!-- Dashboard Analytics end -->
