<section id="footerBar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="ftbar">
					<div class="ftlogo">  <a href="<?php echo LURL; ?>" title="<?php echo $ayar["site_title"]; ?>"> <img width="148" height="33" class="img-fluid lazyload" src="<?=URL.'images/lazy.png'?>" data-src="<?php echo URL; ?>images/<?php echo $ayar["footer_logo"]; ?>" alt="<?php echo $ayar["site_title"]; ?>"> </a> </div>
					<div class="socialMedia">
						<ul>
							<li> <a href="<?php echo $ayar["facebook_url"]; ?>"> <img src="<?php echo TEMA_URL; ?>ast/img/face.png" alt="" width="8" height="16"> </a> </li>
							<li> <a href="<?php echo $ayar["twitter_url"]; ?>"> <img src="<?php echo TEMA_URL; ?>ast/img/tw.png" alt="" width="16" height="14"> </a> </li>
							<li> <a href="<?php echo $ayar["google_url"]; ?>"> <img src="<?php echo TEMA_URL; ?>ast/img/yt.png" alt="" width="14" height="16"> </a> </li>
							<li> <a href="<?php echo $ayar["instagram_url"]; ?>"> <img src="<?php echo TEMA_URL; ?>ast/img/pint.png" alt="" width="11" height="15"> </a> </li>
							<li> <a href="<?php echo $ayar["linkedin_url"]; ?>"> <img src="<?php echo TEMA_URL; ?>ast/img/tumb.png" alt="" width="10" height="16"> </a> </li>
						</ul>
					</div>
					<div class="ftbarLink">
						<ul>
							<?php
							$url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
							$menuQuery = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=2 ORDER BY menu_sira ASC LIMIT 0,6");
							if ($menuQuery->rowCount()) {
								$numb = 0;
								foreach ($menuQuery as $menuRow) {
									echo '<li><a href="' . $menuRow[$lehce . "menu_href"] . '">' . $menuRow[$lehce . "menu_baslik"] . "</a></li>";
								}
								$numb++;
							}
							?>
							
						</ul>
					</div>
				</div>
				<div class="footerMenuList">
					<ul>
						<li>
							<ul>
								<?php
								$url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
								$menuQueryxx = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=3 ORDER BY menu_sira ASC LIMIT 0,6");
								if ($menuQueryxx->rowCount()) {
									$numb = 0;
									foreach ($menuQueryxx as $menuRowxx) {
										echo '<li><a href="' . $menuRowxx[$lehce . "menu_href"] . '">' . $menuRowxx[$lehce . "menu_baslik"] . "</a></li>";
									}
									$numb++;
								}
								?>
							</ul>
						</li>
						<li>
							<ul>
								<?php
								$url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
								$menuQueryxx = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=3 ORDER BY menu_sira ASC LIMIT 6,6");
								if ($menuQueryxx->rowCount()) {
									$numb = 0;
									foreach ($menuQueryxx as $menuRowxx) {
										echo '<li><a href="' . $menuRowxx[$lehce . "menu_href"] . '">' . $menuRowxx[$lehce . "menu_baslik"] . "</a></li>";
									}
									$numb++;
								}
								?>
							</ul>
						</li>
						<li>
							<ul>
								<?php
								$url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
								$menuQueryxx = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=3 ORDER BY menu_sira ASC LIMIT 12,6");
								if ($menuQueryxx->rowCount()) {
									$numb = 0;
									foreach ($menuQueryxx as $menuRowxx) {
										echo '<li><a href="' . $menuRowxx[$lehce . "menu_href"] . '">' . $menuRowxx[$lehce . "menu_baslik"] . "</a></li>";
									}
									$numb++;
								}
								?>
							</ul>
						</li>
						<li>
							<ul>
								<?php
								$url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
								$menuQueryxx = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=3 ORDER BY menu_sira ASC LIMIT 18,6");
								if ($menuQueryxx->rowCount()) {
									$numb = 0;
									foreach ($menuQueryxx as $menuRowxx) {
										echo '<li><a href="' . $menuRowxx[$lehce . "menu_href"] . '">' . $menuRowxx[$lehce . "menu_baslik"] . "</a></li>";
									}
									$numb++;
								}
								?>
							</ul>
						</li>
						<li>
							<ul>
								<?php
								$url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
								$menuQueryxx = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=3 ORDER BY menu_sira ASC LIMIT 24,6");
								if ($menuQueryxx->rowCount()) {
									$numb = 0;
									foreach ($menuQueryxx as $menuRowxx) {
										echo '<li><a href="' . $menuRowxx[$lehce . "menu_href"] . '">' . $menuRowxx[$lehce . "menu_baslik"] . "</a></li>";
									}
									$numb++;
								}
								?>
							</ul>
						</li>
						<li>
							<ul>
								<?php
								$url = "https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
								$menuQueryxx = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=3 ORDER BY menu_sira ASC LIMIT 30,6");
								if ($menuQueryxx->rowCount()) {
									$numb = 0;
									foreach ($menuQueryxx as $menuRowxx) {
										echo '<li><a href="' . $menuRowxx[$lehce . "menu_href"] . '">' . $menuRowxx[$lehce . "menu_baslik"] . "</a></li>";
									}
									$numb++;
								}
								?>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="footer" class="homepage">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="themeCatTitle bgdark">
					<img src="<?php echo TEMA_URL; ?>ast/img/list.png"  width="13" height="13" alt=""><?php echo $blokRowdil["baslik5"]; ?>
				</div>
				<div class="footerMenuLink">
					<ul>
						
						<?php
						$haberQuery = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND makalekonum_footeryazi='on' ORDER BY sayfa_id DESC LIMIT 12 ");
						if( $haberQuery->rowCount() ){
							foreach($haberQuery as $haberRow){
								$haberUrl = LURL.HABER.$haberRow["sayfa_url"].'/';
								?>

								<li> <a href="<?php echo $haberUrl; ?>"> <?php echo $haberRow[$lehce."sayfa_adi"];?> </a> </li>
								<?php
							}
						}?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<div style="clear: both;"></div>
<div class="col-md-12 text-md-center text-small text-center"> <?php echo $ayar["footercop"]; ?></div>
<div style="clear: both;"></div>
<div class="masaustureklam dfp pageskin pageskin--left" >
	<?php echo html_entity_decode($blokRownews["desc1"]); ?>
</div>
<div class="masaustureklam dfp pageskin pageskin--right" >
	<?php echo html_entity_decode($blokRownews["baslik1"]); ?>
</div>
<?php if ($blokRownews["baslik2"]) { ?>
	<footer class="masaustureklam fixedFooter" id="masasasad">
		<button id="asdasdasdfa" class="closeButton" aria-label="Close this ad"></button>
		<?php echo html_entity_decode($blokRownews["baslik2"]); ?>
	</footer>
<?php } ?>
<?php if ($blokRownews["desc3"]) { ?>
	<footer class="mobilreklam fixedFooter" id="fixedFooterxy">
		<button id="closeButtonxy" class="closeButton" aria-label="Close this ad"></button>
		<?php echo html_entity_decode($blokRownews["desc3"]); ?>
	</footer>
<?php } ?>
<script type="text/javascript">
	var asdasdasdfa = document.getElementById("asdasdasdfa");
	var masasasad = document.getElementById("masasasad");
	if(asdasdasdfa){
		asdasdasdfa.onclick = function() {
			masasasad.style.display = "none";
		}
	}
</script>
<script type="text/javascript">
	var closeButton = document.getElementById("closeButtonxy");
	var fixedFooter = document.getElementById("fixedFooterxy");
	if(closeButton){
		closeButton.onclick = function() {
			fixedFooter.style.display = "none";
		}
	}
</script>
<div id="cookieNotice" class="cookie-consent">
	<span><?php echo $blokRowdil["baslik22"]; ?><a href="<?php echo $blokRowdil["desc21"]; ?>" class="ml-1 text-decoration-none text-info"><?php echo $blokRowdil["baslik21"]; ?></a> </span>
	<div class="mt-2 d-flex align-items-center justify-content-center g-2">
		<button class="allow-button mr-1" onclick="acceptCookieConsent();"><?php echo $blokRowdil["baslik20"]; ?></button>
		<button class="allow-button" type="button" id="coocieclose"><?php echo $blokRowdil["desc20"]; ?></button>
	</div>
	
</div>

<script>
	const installButton = document.getElementById('install-app');
	let beforeInstallPromptEvent
	window.addEventListener("beforeinstallprompt", function(e) {
		e.preventDefault();
		beforeInstallPromptEvent = e
		if(installButton){
			installButton.style.display = 'block'
			installButton.addEventListener("click", function() {
				e.prompt();
			});
			installButton.hidden = false;
		}
	});
	if(installButton){
		installButton.addEventListener("click", function() {
			beforeInstallPromptEvent.prompt();
		});
	}
</script>