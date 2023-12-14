<?php
echo !defined('ADMIN') ? die(go(ADMIN_URL.'index.php?sayfa=404')) : null;
$ayarControl = $db->query("SELECT * FROM dil_bloklar");
if($ayarControl->rowCount()){
	$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
}else{
	die(go(ADMIN_URL.'index.php?sayfa=404'));
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
					<h2 class="content-header-title float-left mb-0">Dil Dosyası</h2>
					<div class="breadcrumb-wrapper col-12">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo ADMIN_URL ;?>">Anasayfa</a>
							</li>

							<li class="breadcrumb-item active"><a href="javascript:void(0);">Dil Dosyası</a>
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
							<h4 class="card-title">   <p><b>Dil Dosyasını</b>  Düzenle </p> </h4>
						</div>
						<div class="card-content">
							<div class="card-body">
								

								<div class="form-body">
									<div class="row">

										<!-- Nav tabs -->
										<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
											<li class="nav-link active">
												<a class="nav-link " id="home-tab-fill" data-toggle="tab" href="#home-fill" role="tab" aria-controls="home-fill" aria-selected="true">  <i class="feather icon-file-text"></i> TÜRKÇE </a>
											</li>
											<!--<li class="nav-link">
												<a class="nav-link" id="profile-tab-fill" data-toggle="tab" href="#profile-fill" role="tab" aria-controls="profile-fill" aria-selected="false"><i class="feather icon-file-text"></i> İNGİZLİCE </a>
											</li>
											<li class="nav-link">
												<a class="nav-link" id="messages-tab-fill" data-toggle="tab" href="#messages-fill" role="tab" aria-controls="messages-fill" aria-selected="false"><i class="feather icon-file-text"></i> ARAPÇA</a>
											</li>
											<li class="nav-link">
												<a class="nav-link" id="settings-tab-fill" data-toggle="tab" href="#settings-fill" role="tab" aria-controls="settings-fill" aria-selected="false"><i class="feather icon-file-text"></i> RUSÇA </a>
											</li>-->
										</ul>


											<!-- Tab panes -->
											<div class="tab-content pt-1">
												<div class="tab-pane <?php if($_SESSION["uye_rutbe"]==0 OR $_SESSION["uye_rutbe"]==1){ echo "active";} ?> " id="home-fill" role="tabpanel" aria-labelledby="home-tab-fill">

													<!-- Türkçe başlangıç -->

													<form role="form" class="form-horizontal"  id="forms2" method="POST" action="ajax.php?p=dil_anasayfa_ayarlari"  enctype="multipart/form-data">
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 1</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 1" name="baslik1" value="<?php echo  htmlspecialchars($ayarRow["baslik1"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 2</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 2" name="desc1" value="<?php echo  htmlspecialchars($ayarRow["desc1"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 3</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 3" name="baslik2" value="<?php echo  htmlspecialchars($ayarRow["baslik2"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 4</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 4" name="desc2" value="<?php echo  htmlspecialchars($ayarRow["desc2"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 5</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 5" name="baslik3" value="<?php echo  htmlspecialchars($ayarRow["baslik3"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 6</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 6" name="desc3" value="<?php echo  htmlspecialchars($ayarRow["desc3"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 7</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 7" name="baslik4" value="<?php echo  htmlspecialchars($ayarRow["baslik4"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 8</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 8" name="desc4" value="<?php echo  htmlspecialchars($ayarRow["desc4"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 9</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 9" name="baslik5" value="<?php echo  htmlspecialchars($ayarRow["baslik5"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 10</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 10" name="desc5" value="<?php echo  htmlspecialchars($ayarRow["desc5"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 11</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 11" name="baslik6" value="<?php echo  htmlspecialchars($ayarRow["baslik6"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 12</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 12" name="desc6" value="<?php echo  htmlspecialchars($ayarRow["desc6"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 13</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 13" name="baslik7" value="<?php echo  htmlspecialchars($ayarRow["baslik7"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 14</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 14" name="desc7" value="<?php echo  htmlspecialchars($ayarRow["desc7"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 15</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 15" name="baslik8" value="<?php echo  htmlspecialchars($ayarRow["baslik8"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 16</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 16" name="desc8" value="<?php echo  htmlspecialchars($ayarRow["desc8"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 17</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 17" name="baslik9" value="<?php echo  htmlspecialchars($ayarRow["baslik9"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 18</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 18" name="desc9" value="<?php echo  htmlspecialchars($ayarRow["desc9"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>






														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 19</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 19" name="baslik10" value="<?php echo  htmlspecialchars($ayarRow["baslik10"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 20</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 20" name="desc10" value="<?php echo  htmlspecialchars($ayarRow["desc10"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 21</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 21" name="baslik11" value="<?php echo  htmlspecialchars($ayarRow["baslik11"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 22</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 22" name="desc11" value="<?php echo  htmlspecialchars($ayarRow["desc11"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 23</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 23" name="baslik12" value="<?php echo  htmlspecialchars($ayarRow["baslik12"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 24</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 24" name="desc12" value="<?php echo  htmlspecialchars($ayarRow["desc12"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 25</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 25" name="baslik13" value="<?php echo  htmlspecialchars($ayarRow["baslik13"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 26</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 26" name="desc13" value="<?php echo  htmlspecialchars($ayarRow["desc13"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 27</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 27" name="baslik14" value="<?php echo  htmlspecialchars($ayarRow["baslik14"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 28</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 28" name="desc14" value="<?php echo  htmlspecialchars($ayarRow["desc14"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 29</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 29" name="baslik15" value="<?php echo  htmlspecialchars($ayarRow["baslik15"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 30</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 30" name="desc15" value="<?php echo  htmlspecialchars($ayarRow["desc15"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 31</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 31" name="baslik16" value="<?php echo  htmlspecialchars($ayarRow["baslik16"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 32</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 32" name="desc16" value="<?php echo  htmlspecialchars($ayarRow["desc16"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 33</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 33" name="baslik17" value="<?php echo  htmlspecialchars($ayarRow["baslik17"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 34</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 34" name="desc17" value="<?php echo  htmlspecialchars($ayarRow["desc17"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 35</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 35" name="baslik18" value="<?php echo  htmlspecialchars($ayarRow["baslik18"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 36</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 36" name="desc18" value="<?php echo  htmlspecialchars($ayarRow["desc18"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 37</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 37" name="baslik19" value="<?php echo  htmlspecialchars($ayarRow["baslik19"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 38</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 38" name="desc19" value="<?php echo  htmlspecialchars($ayarRow["desc19"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>





														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 39</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 39" name="baslik20" value="<?php echo  htmlspecialchars($ayarRow["baslik20"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 40</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 40" name="desc20" value="<?php echo  htmlspecialchars($ayarRow["desc20"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>












														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 41</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 41" name="baslik21" value="<?php echo  htmlspecialchars($ayarRow["baslik21"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 42</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 42" name="desc21" value="<?php echo  htmlspecialchars($ayarRow["desc21"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 43</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 43" name="baslik22" value="<?php echo  htmlspecialchars($ayarRow["baslik22"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 44</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 44" name="desc22" value="<?php echo  htmlspecialchars($ayarRow["desc22"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 45</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 45" name="baslik23" value="<?php echo  htmlspecialchars($ayarRow["baslik23"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 46</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 46" name="desc23" value="<?php echo  htmlspecialchars($ayarRow["desc23"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 47</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 47" name="baslik24" value="<?php echo  htmlspecialchars($ayarRow["baslik24"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 48</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 48" name="desc24" value="<?php echo  htmlspecialchars($ayarRow["desc24"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 49</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 49" name="baslik25" value="<?php echo  htmlspecialchars($ayarRow["baslik25"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 50</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 50" name="desc25" value="<?php echo  htmlspecialchars($ayarRow["desc25"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 51</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 51" name="baslik26" value="<?php echo  htmlspecialchars($ayarRow["baslik26"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 52</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 52" name="desc26" value="<?php echo  htmlspecialchars($ayarRow["desc26"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 53</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 53" name="baslik27" value="<?php echo  htmlspecialchars($ayarRow["baslik27"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 54</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 54" name="desc27" value="<?php echo  htmlspecialchars($ayarRow["desc27"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<!--BAŞLADI-->
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 55</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 55" name="baslik28" value="<?php echo  htmlspecialchars($ayarRow["baslik28"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 56</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 56" name="desc28" value="<?php echo  htmlspecialchars($ayarRow["desc28"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 57</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 57" name="baslik29" value="<?php echo  htmlspecialchars($ayarRow["baslik29"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 58</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 58" name="desc29" value="<?php echo  htmlspecialchars($ayarRow["desc29"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 59</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 59" name="baslik30" value="<?php echo  htmlspecialchars($ayarRow["baslik30"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 60</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 60" name="desc30" value="<?php echo  htmlspecialchars($ayarRow["desc30"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 61</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 61" name="baslik31" value="<?php echo  htmlspecialchars($ayarRow["baslik31"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 62</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 62" name="desc31" value="<?php echo  htmlspecialchars($ayarRow["desc31"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 63</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 63" name="baslik32" value="<?php echo  htmlspecialchars($ayarRow["baslik32"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 64</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 64" name="desc32" value="<?php echo  htmlspecialchars($ayarRow["desc32"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 65</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 65" name="baslik33" value="<?php echo  htmlspecialchars($ayarRow["baslik33"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 66</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 66" name="desc33" value="<?php echo  htmlspecialchars($ayarRow["desc33"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 67</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 67" name="baslik34" value="<?php echo  htmlspecialchars($ayarRow["baslik34"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 68</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 68" name="desc34" value="<?php echo  htmlspecialchars($ayarRow["desc34"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 69</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 69" name="baslik35" value="<?php echo  htmlspecialchars($ayarRow["baslik35"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 70</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 70" name="desc35" value="<?php echo  htmlspecialchars($ayarRow["desc35"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 71</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 71" name="baslik36" value="<?php echo  htmlspecialchars($ayarRow["baslik36"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 72</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 72" name="desc36" value="<?php echo  htmlspecialchars($ayarRow["desc36"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 73</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 73" name="baslik37" value="<?php echo  htmlspecialchars($ayarRow["baslik37"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 74</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 74" name="desc37" value="<?php echo  htmlspecialchars($ayarRow["desc37"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 75</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 75" name="baslik38" value="<?php echo  htmlspecialchars($ayarRow["baslik38"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 76</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 76" name="desc38" value="<?php echo  htmlspecialchars($ayarRow["desc38"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 77</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 77" name="baslik39" value="<?php echo  htmlspecialchars($ayarRow["baslik39"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 78</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 78" name="desc39" value="<?php echo  htmlspecialchars($ayarRow["desc39"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 79</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 79" name="baslik40" value="<?php echo  htmlspecialchars($ayarRow["baslik40"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 80</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 80" name="desc40" value="<?php echo  htmlspecialchars($ayarRow["desc40"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 81</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 81" name="baslik41" value="<?php echo  htmlspecialchars($ayarRow["baslik41"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 82</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 82" name="desc41" value="<?php echo  htmlspecialchars($ayarRow["desc41"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 83</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 83" name="baslik42" value="<?php echo  htmlspecialchars($ayarRow["baslik42"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 84</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 84" name="desc42" value="<?php echo  htmlspecialchars($ayarRow["desc42"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 85</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 85" name="baslik43" value="<?php echo  htmlspecialchars($ayarRow["baslik43"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 86</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 86" name="desc43" value="<?php echo  htmlspecialchars($ayarRow["desc43"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 87</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 87" name="baslik44" value="<?php echo  htmlspecialchars($ayarRow["baslik44"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 88</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 88" name="desc44" value="<?php echo  htmlspecialchars($ayarRow["desc44"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 89</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 89" name="baslik45" value="<?php echo  htmlspecialchars($ayarRow["baslik45"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 90</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 90" name="desc45" value="<?php echo  htmlspecialchars($ayarRow["desc45"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 91</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 91" name="baslik46" value="<?php echo  htmlspecialchars($ayarRow["baslik46"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 92</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 92" name="desc46" value="<?php echo  htmlspecialchars($ayarRow["desc46"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 93</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 93" name="baslik47" value="<?php echo  htmlspecialchars($ayarRow["baslik47"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>Kelime 94</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="Kelime 94" name="desc47" value="<?php echo  htmlspecialchars($ayarRow["desc47"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<!--BİTTİ-->








														

														<div class="col-md-7 offset-md-4" >
															<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
														</div>
													</form>




													<!-- Türkçe bitiş -->
												</div>
												<?php
												echo !defined('ADMIN') ? die('error: 404 !') : null;
												$ayarControl = $db->query("SELECT * FROM dil_bloklar_en");
												if($ayarControl->rowCount()){
													$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
												}else{
													die('error: 302 !');
												}
												?>
												<div class="tab-pane <?php if($_SESSION["uye_rutbe"]==2){ echo "active";} ?>" id="profile-fill" role="tabpanel" aria-labelledby="profile-tab-fill">

													<!-- İngilizce başlangıç -->
													<form role="form" class="form-horizontal"  id="forms" method="POST" action="ajax.php?p=dil_en_anasayfa_ayarlari"  enctype="multipart/form-data">
														
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 1</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 1" name="baslik1" value="<?php echo  htmlspecialchars($ayarRow["baslik1"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 2</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 2" name="desc1" value="<?php echo  htmlspecialchars($ayarRow["desc1"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 3</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 3" name="baslik2" value="<?php echo  htmlspecialchars($ayarRow["baslik2"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 4</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 4" name="desc2" value="<?php echo  htmlspecialchars($ayarRow["desc2"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 5</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 5" name="baslik3" value="<?php echo  htmlspecialchars($ayarRow["baslik3"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 6</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 6" name="desc3" value="<?php echo  htmlspecialchars($ayarRow["desc3"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 7</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 7" name="baslik4" value="<?php echo  htmlspecialchars($ayarRow["baslik4"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 8</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 8" name="desc4" value="<?php echo  htmlspecialchars($ayarRow["desc4"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 9</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 9" name="baslik5" value="<?php echo  htmlspecialchars($ayarRow["baslik5"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 10</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 10" name="desc5" value="<?php echo  htmlspecialchars($ayarRow["desc5"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 11</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 11" name="baslik6" value="<?php echo  htmlspecialchars($ayarRow["baslik6"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 12</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 12" name="desc6" value="<?php echo  htmlspecialchars($ayarRow["desc6"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 13</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 13" name="baslik7" value="<?php echo  htmlspecialchars($ayarRow["baslik7"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 14</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 14" name="desc7" value="<?php echo  htmlspecialchars($ayarRow["desc7"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 15</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 15" name="baslik8" value="<?php echo  htmlspecialchars($ayarRow["baslik8"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 16</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 16" name="desc8" value="<?php echo  htmlspecialchars($ayarRow["desc8"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 17</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 17" name="baslik9" value="<?php echo  htmlspecialchars($ayarRow["baslik9"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 18</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 18" name="desc9" value="<?php echo  htmlspecialchars($ayarRow["desc9"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>




														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 19</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 19" name="baslik10" value="<?php echo  htmlspecialchars($ayarRow["baslik10"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 20</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 20" name="desc10" value="<?php echo  htmlspecialchars($ayarRow["desc10"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 21</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 21" name="baslik11" value="<?php echo  htmlspecialchars($ayarRow["baslik11"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 22</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 22" name="desc11" value="<?php echo  htmlspecialchars($ayarRow["desc11"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 23</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 23" name="baslik12" value="<?php echo  htmlspecialchars($ayarRow["baslik12"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 24</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 24" name="desc12" value="<?php echo  htmlspecialchars($ayarRow["desc12"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 25</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 25" name="baslik13" value="<?php echo  htmlspecialchars($ayarRow["baslik13"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 26</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 26" name="desc13" value="<?php echo  htmlspecialchars($ayarRow["desc13"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 27</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 27" name="baslik14" value="<?php echo  htmlspecialchars($ayarRow["baslik14"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 28</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 28" name="desc14" value="<?php echo  htmlspecialchars($ayarRow["desc14"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 29</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 29" name="baslik15" value="<?php echo  htmlspecialchars($ayarRow["baslik15"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 30</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 30" name="desc15" value="<?php echo  htmlspecialchars($ayarRow["desc15"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 31</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 31" name="baslik16" value="<?php echo  htmlspecialchars($ayarRow["baslik16"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 32</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 32" name="desc16" value="<?php echo  htmlspecialchars($ayarRow["desc16"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 33</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 33" name="baslik17" value="<?php echo  htmlspecialchars($ayarRow["baslik17"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 34</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 34" name="desc17" value="<?php echo  htmlspecialchars($ayarRow["desc17"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 35</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 35" name="baslik18" value="<?php echo  htmlspecialchars($ayarRow["baslik18"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 36</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 36" name="desc18" value="<?php echo  htmlspecialchars($ayarRow["desc18"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 37</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 37" name="baslik19" value="<?php echo  htmlspecialchars($ayarRow["baslik19"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 38</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 38" name="desc19" value="<?php echo  htmlspecialchars($ayarRow["desc19"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>





														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 39</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 39" name="baslik20" value="<?php echo  htmlspecialchars($ayarRow["baslik20"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 40</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 40" name="desc20" value="<?php echo  htmlspecialchars($ayarRow["desc20"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>




														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 41</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 41" name="baslik21" value="<?php echo  htmlspecialchars($ayarRow["baslik21"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 42</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 42" name="desc21" value="<?php echo  htmlspecialchars($ayarRow["desc21"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 43</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 43" name="baslik22" value="<?php echo  htmlspecialchars($ayarRow["baslik22"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 44</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 44" name="desc22" value="<?php echo  htmlspecialchars($ayarRow["desc22"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 45</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 45" name="baslik23" value="<?php echo  htmlspecialchars($ayarRow["baslik23"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 46</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 46" name="desc23" value="<?php echo  htmlspecialchars($ayarRow["desc23"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 47</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 47" name="baslik24" value="<?php echo  htmlspecialchars($ayarRow["baslik24"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 48</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 48" name="desc24" value="<?php echo  htmlspecialchars($ayarRow["desc24"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 49</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 49" name="baslik25" value="<?php echo  htmlspecialchars($ayarRow["baslik25"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 50</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 50" name="desc25" value="<?php echo  htmlspecialchars($ayarRow["desc25"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 51</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 51" name="baslik26" value="<?php echo  htmlspecialchars($ayarRow["baslik26"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 52</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 52" name="desc26" value="<?php echo  htmlspecialchars($ayarRow["desc26"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 53</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 53" name="baslik27" value="<?php echo  htmlspecialchars($ayarRow["baslik27"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 54</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 54" name="desc27" value="<?php echo  htmlspecialchars($ayarRow["desc27"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>




														<!--BAŞLADI-->
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 55</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 55" name="baslik28" value="<?php echo  htmlspecialchars($ayarRow["baslik28"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 56</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 56" name="desc28" value="<?php echo  htmlspecialchars($ayarRow["desc28"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 57</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 57" name="baslik29" value="<?php echo  htmlspecialchars($ayarRow["baslik29"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 58</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 58" name="desc29" value="<?php echo  htmlspecialchars($ayarRow["desc29"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 59</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 59" name="baslik30" value="<?php echo  htmlspecialchars($ayarRow["baslik30"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 60</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 60" name="desc30" value="<?php echo  htmlspecialchars($ayarRow["desc30"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 61</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 61" name="baslik31" value="<?php echo  htmlspecialchars($ayarRow["baslik31"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 62</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 62" name="desc31" value="<?php echo  htmlspecialchars($ayarRow["desc31"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 63</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 63" name="baslik32" value="<?php echo  htmlspecialchars($ayarRow["baslik32"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 64</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 64" name="desc32" value="<?php echo  htmlspecialchars($ayarRow["desc32"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 65</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 65" name="baslik33" value="<?php echo  htmlspecialchars($ayarRow["baslik33"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 66</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 66" name="desc33" value="<?php echo  htmlspecialchars($ayarRow["desc33"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 67</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 67" name="baslik34" value="<?php echo  htmlspecialchars($ayarRow["baslik34"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 68</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 68" name="desc34" value="<?php echo  htmlspecialchars($ayarRow["desc34"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 69</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 69" name="baslik35" value="<?php echo  htmlspecialchars($ayarRow["baslik35"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 70</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 70" name="desc35" value="<?php echo  htmlspecialchars($ayarRow["desc35"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 71</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 71" name="baslik36" value="<?php echo  htmlspecialchars($ayarRow["baslik36"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 72</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 72" name="desc36" value="<?php echo  htmlspecialchars($ayarRow["desc36"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 73</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 73" name="baslik37" value="<?php echo  htmlspecialchars($ayarRow["baslik37"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 74</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 74" name="desc37" value="<?php echo  htmlspecialchars($ayarRow["desc37"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 75</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 75" name="baslik38" value="<?php echo  htmlspecialchars($ayarRow["baslik38"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 76</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 76" name="desc38" value="<?php echo  htmlspecialchars($ayarRow["desc38"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 77</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 77" name="baslik39" value="<?php echo  htmlspecialchars($ayarRow["baslik39"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 78</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 78" name="desc39" value="<?php echo  htmlspecialchars($ayarRow["desc39"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 79</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 79" name="baslik40" value="<?php echo  htmlspecialchars($ayarRow["baslik40"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 80</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 80" name="desc40" value="<?php echo  htmlspecialchars($ayarRow["desc40"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 81</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 81" name="baslik41" value="<?php echo  htmlspecialchars($ayarRow["baslik41"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 82</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 82" name="desc41" value="<?php echo  htmlspecialchars($ayarRow["desc41"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 83</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 83" name="baslik42" value="<?php echo  htmlspecialchars($ayarRow["baslik42"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 84</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 84" name="desc42" value="<?php echo  htmlspecialchars($ayarRow["desc42"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 85</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 85" name="baslik43" value="<?php echo  htmlspecialchars($ayarRow["baslik43"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 86</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 86" name="desc43" value="<?php echo  htmlspecialchars($ayarRow["desc43"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 87</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 87" name="baslik44" value="<?php echo  htmlspecialchars($ayarRow["baslik44"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 88</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 88" name="desc44" value="<?php echo  htmlspecialchars($ayarRow["desc44"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 89</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 89" name="baslik45" value="<?php echo  htmlspecialchars($ayarRow["baslik45"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 90</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 90" name="desc45" value="<?php echo  htmlspecialchars($ayarRow["desc45"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 91</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 91" name="baslik46" value="<?php echo  htmlspecialchars($ayarRow["baslik46"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 92</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 92" name="desc46" value="<?php echo  htmlspecialchars($ayarRow["desc46"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 93</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 93" name="baslik47" value="<?php echo  htmlspecialchars($ayarRow["baslik47"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>DE Kelime 94</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="EN Kelime 94" name="desc47" value="<?php echo  htmlspecialchars($ayarRow["desc47"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<!--BİTTİ-->








														<div class="col-md-7 offset-md-4" >
															<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
														</div>
													</form>

													<!-- İngilizce bitiş -->

												</div>
												<?php
												echo !defined('ADMIN') ? die('error: 404 !') : null;
												$ayarControl = $db->query("SELECT * FROM dil_bloklar_ar");
												if($ayarControl->rowCount()){
													$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
												}else{
													die('error: 302 !');
												}
												?>
												<div class="tab-pane <?php if($_SESSION["uye_rutbe"]==3){ echo "active";} ?>" id="messages-fill" role="tabpanel" aria-labelledby="messages-tab-fill">
													<!-- Arapça başlangıç -->
													<form role="form" class="form-horizontal"  id="forms3" method="POST" action="ajax.php?p=dil_ar_anasayfa_ayarlari"  enctype="multipart/form-data">
														
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 1</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 1" name="baslik1" value="<?php echo  htmlspecialchars($ayarRow["baslik1"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 2</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 2" name="desc1" value="<?php echo  htmlspecialchars($ayarRow["desc1"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 3</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 3" name="baslik2" value="<?php echo  htmlspecialchars($ayarRow["baslik2"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 4</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 4" name="desc2" value="<?php echo  htmlspecialchars($ayarRow["desc2"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 5</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 5" name="baslik3" value="<?php echo  htmlspecialchars($ayarRow["baslik3"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 6</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 6" name="desc3" value="<?php echo  htmlspecialchars($ayarRow["desc3"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 7</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 7" name="baslik4" value="<?php echo  htmlspecialchars($ayarRow["baslik4"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 8</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 8" name="desc4" value="<?php echo  htmlspecialchars($ayarRow["desc4"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 9</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 9" name="baslik5" value="<?php echo  htmlspecialchars($ayarRow["baslik5"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 10</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 10" name="desc5" value="<?php echo  htmlspecialchars($ayarRow["desc5"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 11</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 11" name="baslik6" value="<?php echo  htmlspecialchars($ayarRow["baslik6"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 12</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 12" name="desc6" value="<?php echo  htmlspecialchars($ayarRow["desc6"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 13</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 13" name="baslik7" value="<?php echo  htmlspecialchars($ayarRow["baslik7"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 14</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 14" name="desc7" value="<?php echo  htmlspecialchars($ayarRow["desc7"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 15</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 15" name="baslik8" value="<?php echo  htmlspecialchars($ayarRow["baslik8"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 16</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 16" name="desc8" value="<?php echo  htmlspecialchars($ayarRow["desc8"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 17</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 17" name="baslik9" value="<?php echo  htmlspecialchars($ayarRow["baslik9"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 18</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 18" name="desc9" value="<?php echo  htmlspecialchars($ayarRow["desc9"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>





														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 19</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 19" name="baslik10" value="<?php echo  htmlspecialchars($ayarRow["baslik10"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 20</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 20" name="desc10" value="<?php echo  htmlspecialchars($ayarRow["desc10"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 21</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 21" name="baslik11" value="<?php echo  htmlspecialchars($ayarRow["baslik11"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 22</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 22" name="desc11" value="<?php echo  htmlspecialchars($ayarRow["desc11"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 23</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 23" name="baslik12" value="<?php echo  htmlspecialchars($ayarRow["baslik12"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 24</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 24" name="desc12" value="<?php echo  htmlspecialchars($ayarRow["desc12"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 25</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 25" name="baslik13" value="<?php echo  htmlspecialchars($ayarRow["baslik13"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 26</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 26" name="desc13" value="<?php echo  htmlspecialchars($ayarRow["desc13"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 27</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 27" name="baslik14" value="<?php echo  htmlspecialchars($ayarRow["baslik14"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 28</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 28" name="desc14" value="<?php echo  htmlspecialchars($ayarRow["desc14"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 29</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 29" name="baslik15" value="<?php echo  htmlspecialchars($ayarRow["baslik15"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 30</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 30" name="desc15" value="<?php echo  htmlspecialchars($ayarRow["desc15"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 31</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 31" name="baslik16" value="<?php echo  htmlspecialchars($ayarRow["baslik16"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 32</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 32" name="desc16" value="<?php echo  htmlspecialchars($ayarRow["desc16"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 33</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 33" name="baslik17" value="<?php echo  htmlspecialchars($ayarRow["baslik17"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 34</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 34" name="desc17" value="<?php echo  htmlspecialchars($ayarRow["desc17"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 35</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 35" name="baslik18" value="<?php echo  htmlspecialchars($ayarRow["baslik18"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 36</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 36" name="desc18" value="<?php echo  htmlspecialchars($ayarRow["desc18"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 37</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 37" name="baslik19" value="<?php echo  htmlspecialchars($ayarRow["baslik19"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 38</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 38" name="desc19" value="<?php echo  htmlspecialchars($ayarRow["desc19"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>





														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 39</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 39" name="baslik20" value="<?php echo  htmlspecialchars($ayarRow["baslik20"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 40</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 40" name="desc20" value="<?php echo  htmlspecialchars($ayarRow["desc20"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>




														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 41</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 41" name="baslik21" value="<?php echo  htmlspecialchars($ayarRow["baslik21"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 42</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 42" name="desc21" value="<?php echo  htmlspecialchars($ayarRow["desc21"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 43</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 43" name="baslik22" value="<?php echo  htmlspecialchars($ayarRow["baslik22"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 44</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 44" name="desc22" value="<?php echo  htmlspecialchars($ayarRow["desc22"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 45</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 45" name="baslik23" value="<?php echo  htmlspecialchars($ayarRow["baslik23"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 46</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 46" name="desc23" value="<?php echo  htmlspecialchars($ayarRow["desc23"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 47</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 47" name="baslik24" value="<?php echo  htmlspecialchars($ayarRow["baslik24"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 48</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 48" name="desc24" value="<?php echo  htmlspecialchars($ayarRow["desc24"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 49</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 49" name="baslik25" value="<?php echo  htmlspecialchars($ayarRow["baslik25"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 50</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 50" name="desc25" value="<?php echo  htmlspecialchars($ayarRow["desc25"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 51</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 51" name="baslik26" value="<?php echo  htmlspecialchars($ayarRow["baslik26"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 52</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 52" name="desc26" value="<?php echo  htmlspecialchars($ayarRow["desc26"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 53</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 53" name="baslik27" value="<?php echo  htmlspecialchars($ayarRow["baslik27"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 54</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 54" name="desc27" value="<?php echo  htmlspecialchars($ayarRow["desc27"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<!--BAŞLADI-->
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 55</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 55" name="baslik28" value="<?php echo  htmlspecialchars($ayarRow["baslik28"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 56</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 56" name="desc28" value="<?php echo  htmlspecialchars($ayarRow["desc28"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 57</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 57" name="baslik29" value="<?php echo  htmlspecialchars($ayarRow["baslik29"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 58</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 58" name="desc29" value="<?php echo  htmlspecialchars($ayarRow["desc29"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 59</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 59" name="baslik30" value="<?php echo  htmlspecialchars($ayarRow["baslik30"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 60</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 60" name="desc30" value="<?php echo  htmlspecialchars($ayarRow["desc30"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 61</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 61" name="baslik31" value="<?php echo  htmlspecialchars($ayarRow["baslik31"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 62</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 62" name="desc31" value="<?php echo  htmlspecialchars($ayarRow["desc31"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 63</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 63" name="baslik32" value="<?php echo  htmlspecialchars($ayarRow["baslik32"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 64</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 64" name="desc32" value="<?php echo  htmlspecialchars($ayarRow["desc32"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 65</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 65" name="baslik33" value="<?php echo  htmlspecialchars($ayarRow["baslik33"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 66</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 66" name="desc33" value="<?php echo  htmlspecialchars($ayarRow["desc33"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 67</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 67" name="baslik34" value="<?php echo  htmlspecialchars($ayarRow["baslik34"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 68</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 68" name="desc34" value="<?php echo  htmlspecialchars($ayarRow["desc34"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 69</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 69" name="baslik35" value="<?php echo  htmlspecialchars($ayarRow["baslik35"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 70</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 70" name="desc35" value="<?php echo  htmlspecialchars($ayarRow["desc35"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 71</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 71" name="baslik36" value="<?php echo  htmlspecialchars($ayarRow["baslik36"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 72</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 72" name="desc36" value="<?php echo  htmlspecialchars($ayarRow["desc36"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 73</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 73" name="baslik37" value="<?php echo  htmlspecialchars($ayarRow["baslik37"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 74</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 74" name="desc37" value="<?php echo  htmlspecialchars($ayarRow["desc37"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 75</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 75" name="baslik38" value="<?php echo  htmlspecialchars($ayarRow["baslik38"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 76</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 76" name="desc38" value="<?php echo  htmlspecialchars($ayarRow["desc38"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 77</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 77" name="baslik39" value="<?php echo  htmlspecialchars($ayarRow["baslik39"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 78</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 78" name="desc39" value="<?php echo  htmlspecialchars($ayarRow["desc39"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 79</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 79" name="baslik40" value="<?php echo  htmlspecialchars($ayarRow["baslik40"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 80</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 80" name="desc40" value="<?php echo  htmlspecialchars($ayarRow["desc40"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 81</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 81" name="baslik41" value="<?php echo  htmlspecialchars($ayarRow["baslik41"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 82</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 82" name="desc41" value="<?php echo  htmlspecialchars($ayarRow["desc41"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 83</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 83" name="baslik42" value="<?php echo  htmlspecialchars($ayarRow["baslik42"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 84</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 84" name="desc42" value="<?php echo  htmlspecialchars($ayarRow["desc42"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 85</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 85" name="baslik43" value="<?php echo  htmlspecialchars($ayarRow["baslik43"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 86</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 86" name="desc43" value="<?php echo  htmlspecialchars($ayarRow["desc43"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 87</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 87" name="baslik44" value="<?php echo  htmlspecialchars($ayarRow["baslik44"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 88</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 88" name="desc44" value="<?php echo  htmlspecialchars($ayarRow["desc44"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 89</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 89" name="baslik45" value="<?php echo  htmlspecialchars($ayarRow["baslik45"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 90</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 90" name="desc45" value="<?php echo  htmlspecialchars($ayarRow["desc45"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 91</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 91" name="baslik46" value="<?php echo  htmlspecialchars($ayarRow["baslik46"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 92</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 92" name="desc46" value="<?php echo  htmlspecialchars($ayarRow["desc46"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 93</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 93" name="baslik47" value="<?php echo  htmlspecialchars($ayarRow["baslik47"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>AR Kelime 94</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="AR Kelime 94" name="desc47" value="<?php echo  htmlspecialchars($ayarRow["desc47"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<!--BİTTİ-->









														<div class="col-md-7 offset-md-4" >
															<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
														</div>
													</form>
													<!-- Arapça bitiş -->    
												</div>

												<?php
												echo !defined('ADMIN') ? die('error: 404 !') : null;
												$ayarControl = $db->query("SELECT * FROM dil_bloklar_fa");
												if($ayarControl->rowCount()){
													$ayarRow = $ayarControl->fetch(PDO::FETCH_ASSOC);
												}else{
													die('error: 302 !');
												}
												?>
												<div class="tab-pane <?php if($_SESSION["uye_rutbe"]==4){ echo "active";} ?>" id="settings-fill" role="tabpanel" aria-labelledby="settings-tab-fill">

													<!-- RUSÇA başlangıç -->

													<form role="form" class="form-horizontal"  id="forms4" method="POST" action="ajax.php?p=dil_fa_anasayfa_ayarlari"  enctype="multipart/form-data">
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 1</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 1" name="baslik1" value="<?php echo  htmlspecialchars($ayarRow["baslik1"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 2</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 2" name="desc1" value="<?php echo  htmlspecialchars($ayarRow["desc1"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 3</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 3" name="baslik2" value="<?php echo  htmlspecialchars($ayarRow["baslik2"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 4</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 4" name="desc2" value="<?php echo  htmlspecialchars($ayarRow["desc2"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 5</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 5" name="baslik3" value="<?php echo  htmlspecialchars($ayarRow["baslik3"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 6</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 6" name="desc3" value="<?php echo  htmlspecialchars($ayarRow["desc3"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 7</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 7" name="baslik4" value="<?php echo  htmlspecialchars($ayarRow["baslik4"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 8</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 8" name="desc4" value="<?php echo  htmlspecialchars($ayarRow["desc4"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 9</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 9" name="baslik5" value="<?php echo  htmlspecialchars($ayarRow["baslik5"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 10</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 10" name="desc5" value="<?php echo  htmlspecialchars($ayarRow["desc5"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 11</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 11" name="baslik6" value="<?php echo  htmlspecialchars($ayarRow["baslik6"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 12</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 12" name="desc6" value="<?php echo  htmlspecialchars($ayarRow["desc6"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 13</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 13" name="baslik7" value="<?php echo  htmlspecialchars($ayarRow["baslik7"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 14</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 14" name="desc7" value="<?php echo  htmlspecialchars($ayarRow["desc7"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 15</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 15" name="baslik8" value="<?php echo  htmlspecialchars($ayarRow["baslik8"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 16</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 16" name="desc8" value="<?php echo  htmlspecialchars($ayarRow["desc8"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 17</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 17" name="baslik9" value="<?php echo  htmlspecialchars($ayarRow["baslik9"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 18</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 18" name="desc9" value="<?php echo  htmlspecialchars($ayarRow["desc9"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>		






														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 19</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 19" name="baslik10" value="<?php echo  htmlspecialchars($ayarRow["baslik10"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 20</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 20" name="desc10" value="<?php echo  htmlspecialchars($ayarRow["desc10"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 21</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 21" name="baslik11" value="<?php echo  htmlspecialchars($ayarRow["baslik11"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 22</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 22" name="desc11" value="<?php echo  htmlspecialchars($ayarRow["desc11"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 23</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 23" name="baslik12" value="<?php echo  htmlspecialchars($ayarRow["baslik12"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 24</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 24" name="desc12" value="<?php echo  htmlspecialchars($ayarRow["desc12"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 25</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 25" name="baslik13" value="<?php echo  htmlspecialchars($ayarRow["baslik13"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 26</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 26" name="desc13" value="<?php echo  htmlspecialchars($ayarRow["desc13"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 27</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 27" name="baslik14" value="<?php echo  htmlspecialchars($ayarRow["baslik14"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 28</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 28" name="desc14" value="<?php echo  htmlspecialchars($ayarRow["desc14"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 29</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 29" name="baslik15" value="<?php echo  htmlspecialchars($ayarRow["baslik15"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 30</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 30" name="desc15" value="<?php echo  htmlspecialchars($ayarRow["desc15"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>

														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 31</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 31" name="baslik16" value="<?php echo  htmlspecialchars($ayarRow["baslik16"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 32</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 32" name="desc16" value="<?php echo  htmlspecialchars($ayarRow["desc16"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 33</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 33" name="baslik17" value="<?php echo  htmlspecialchars($ayarRow["baslik17"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 34</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 34" name="desc17" value="<?php echo  htmlspecialchars($ayarRow["desc17"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 35</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 35" name="baslik18" value="<?php echo  htmlspecialchars($ayarRow["baslik18"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 36</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 36" name="desc18" value="<?php echo  htmlspecialchars($ayarRow["desc18"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 37</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 37" name="baslik19" value="<?php echo  htmlspecialchars($ayarRow["baslik19"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 38</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 38" name="desc19" value="<?php echo  htmlspecialchars($ayarRow["desc19"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>





														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 39</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 39" name="baslik20" value="<?php echo  htmlspecialchars($ayarRow["baslik20"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 40</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 40" name="desc20" value="<?php echo  htmlspecialchars($ayarRow["desc20"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 41</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 41" name="baslik21" value="<?php echo  htmlspecialchars($ayarRow["baslik21"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 42</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 42" name="desc21" value="<?php echo  htmlspecialchars($ayarRow["desc21"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 43</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 43" name="baslik22" value="<?php echo  htmlspecialchars($ayarRow["baslik22"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 44</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 44" name="desc22" value="<?php echo  htmlspecialchars($ayarRow["desc22"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 45</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 45" name="baslik23" value="<?php echo  htmlspecialchars($ayarRow["baslik23"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 46</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 46" name="desc23" value="<?php echo  htmlspecialchars($ayarRow["desc23"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 47</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 47" name="baslik24" value="<?php echo  htmlspecialchars($ayarRow["baslik24"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 48</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 48" name="desc24" value="<?php echo  htmlspecialchars($ayarRow["desc24"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 49</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 49" name="baslik25" value="<?php echo  htmlspecialchars($ayarRow["baslik25"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 50</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 50" name="desc25" value="<?php echo  htmlspecialchars($ayarRow["desc25"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 51</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 51" name="baslik26" value="<?php echo  htmlspecialchars($ayarRow["baslik26"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 52</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 52" name="desc26" value="<?php echo  htmlspecialchars($ayarRow["desc26"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 53</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 53" name="baslik27" value="<?php echo  htmlspecialchars($ayarRow["baslik27"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 54</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 54" name="desc27" value="<?php echo  htmlspecialchars($ayarRow["desc27"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<!--BAŞLADI-->
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 55</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 55" name="baslik28" value="<?php echo  htmlspecialchars($ayarRow["baslik28"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 56</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 56" name="desc28" value="<?php echo  htmlspecialchars($ayarRow["desc28"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 57</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 57" name="baslik29" value="<?php echo  htmlspecialchars($ayarRow["baslik29"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 58</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 58" name="desc29" value="<?php echo  htmlspecialchars($ayarRow["desc29"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 59</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 59" name="baslik30" value="<?php echo  htmlspecialchars($ayarRow["baslik30"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 60</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 60" name="desc30" value="<?php echo  htmlspecialchars($ayarRow["desc30"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 61</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 61" name="baslik31" value="<?php echo  htmlspecialchars($ayarRow["baslik31"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 62</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 62" name="desc31" value="<?php echo  htmlspecialchars($ayarRow["desc31"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>



														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 63</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 63" name="baslik32" value="<?php echo  htmlspecialchars($ayarRow["baslik32"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 64</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 64" name="desc32" value="<?php echo  htmlspecialchars($ayarRow["desc32"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 65</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 65" name="baslik33" value="<?php echo  htmlspecialchars($ayarRow["baslik33"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 66</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 66" name="desc33" value="<?php echo  htmlspecialchars($ayarRow["desc33"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 67</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 67" name="baslik34" value="<?php echo  htmlspecialchars($ayarRow["baslik34"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 68</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 68" name="desc34" value="<?php echo  htmlspecialchars($ayarRow["desc34"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 69</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 69" name="baslik35" value="<?php echo  htmlspecialchars($ayarRow["baslik35"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 70</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 70" name="desc35" value="<?php echo  htmlspecialchars($ayarRow["desc35"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 71</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 71" name="baslik36" value="<?php echo  htmlspecialchars($ayarRow["baslik36"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 72</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 72" name="desc36" value="<?php echo  htmlspecialchars($ayarRow["desc36"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 73</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 73" name="baslik37" value="<?php echo  htmlspecialchars($ayarRow["baslik37"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 74</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 74" name="desc37" value="<?php echo  htmlspecialchars($ayarRow["desc37"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 75</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 75" name="baslik38" value="<?php echo  htmlspecialchars($ayarRow["baslik38"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 76</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 76" name="desc38" value="<?php echo  htmlspecialchars($ayarRow["desc38"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 77</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 77" name="baslik39" value="<?php echo  htmlspecialchars($ayarRow["baslik39"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 78</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 78" name="desc39" value="<?php echo  htmlspecialchars($ayarRow["desc39"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 79</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 79" name="baslik40" value="<?php echo  htmlspecialchars($ayarRow["baslik40"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 80</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 80" name="desc40" value="<?php echo  htmlspecialchars($ayarRow["desc40"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 81</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 81" name="baslik41" value="<?php echo  htmlspecialchars($ayarRow["baslik41"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 82</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 82" name="desc41" value="<?php echo  htmlspecialchars($ayarRow["desc41"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 83</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 83" name="baslik42" value="<?php echo  htmlspecialchars($ayarRow["baslik42"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 84</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 84" name="desc42" value="<?php echo  htmlspecialchars($ayarRow["desc42"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 85</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 85" name="baslik43" value="<?php echo  htmlspecialchars($ayarRow["baslik43"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 86</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 86" name="desc43" value="<?php echo  htmlspecialchars($ayarRow["desc43"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 87</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 87" name="baslik44" value="<?php echo  htmlspecialchars($ayarRow["baslik44"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 88</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 88" name="desc44" value="<?php echo  htmlspecialchars($ayarRow["desc44"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 89</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 89" name="baslik45" value="<?php echo  htmlspecialchars($ayarRow["baslik45"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 90</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 90" name="desc45" value="<?php echo  htmlspecialchars($ayarRow["desc45"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 91</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 91" name="baslik46" value="<?php echo  htmlspecialchars($ayarRow["baslik46"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 92</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 92" name="desc46" value="<?php echo  htmlspecialchars($ayarRow["desc46"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>


														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 93</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 93" name="baslik47" value="<?php echo  htmlspecialchars($ayarRow["baslik47"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<div class="col-12">
															<div class="form-group row">
																<div class="col-md-2">
																	<span>RU Kelime 94</span>
																</div>
																<div class="col-md-10">
																	<fieldset class="position-relative has-icon-left">
																		<input type="text" class="form-control" id="iconLeft1" placeholder="RU Kelime 94" name="desc47" value="<?php echo  htmlspecialchars($ayarRow["desc47"]);?>">
																		<div class="form-control-position">
																			<i class="feather icon-star"></i>
																		</div>
																	</fieldset>
																</div>
															</div>
														</div>
														<!--BİTTİ-->









														<div class="col-md-7 offset-md-4" >
															<button type="submit" class="btn btn-primary mr-1 mb-1">Şimdi Yayınla</button>
														</div>
													</form>

													<!-- RUSÇA bitiş -->   
												</div>
											</div>



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



