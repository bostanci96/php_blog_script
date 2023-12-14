
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
	<!--><html class="no-js" lang="tr"><!--<![endif]-->
	<head>
		<meta charset="utf-8" />
		

		<title><?php echo $ayar["site_title"];?></title>
		<meta name="description" content="<?php echo $ayar["site_desc"];?>" />
		<meta name="keyword" content="<?php echo $ayar["site_keyw"];?>" />

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="index, follow" />
		<meta name="viewport" content="width=device-width" />
		<meta name="HandheldFriendly" content="True" />
		<meta name="MobileOptimized" content="320" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="author" content="Devoncrea Web Tasarım" />
		<meta property="og:title" content="<?php echo $ayar["site_title"]?>" />
		<meta property="og:type" content="article" />
		<meta property="og:url" content="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" />
		<meta property="og:image" content="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" />
		<meta property="og:description" content="<?php echo $ayar["site_desc"]?>" />
		<!--===============================================================================================-->
		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo URL;?>img/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo URL;?>img/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo URL;?>img/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo URL;?>img/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo URL;?>img/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo URL;?>img/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo URL;?>img/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo URL;?>img/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo URL;?>img/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo URL;?>img/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo URL;?>img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo URL;?>img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo URL;?>img/favicon-16x16.png">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo URL;?>img/ms-icon-144x144.png">
		<!-- Included CSS Files -->
		<link rel="stylesheet" href="<?php echo YAPIM_AST;?>css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo YAPIM_AST;?>css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo YAPIM_AST;?>css/animate.css">
		<link rel="stylesheet" href="<?php echo YAPIM_AST;?>css/style.css">
		<link rel="stylesheet" href="<?php echo YAPIM_AST;?>css/responsive.css">
		
		<!-- JS Files -->
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/modernizr.js"></script>
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/device.min.js"></script>
		
		<!-- Google Web Fonts -->
		<link href='https://fonts.googleapis.com/css?family=Exo:200,400,600' rel='stylesheet' type='text/css'>   
		
		
	<!-- DEMO Switcher
		================================================== -->
		<link rel="stylesheet" href="<?php echo YAPIM_AST;?>css/styleswitcher.css" />  
		
	</head>
	<body>


		<!-- Loader -->
		<div id="loading">
			<img src="<?php echo YAPIM_AST;?>img/loader.gif" alt="Website Loader"/>
		</div>
		
		<!-- Slideshow Pattern-->
		<div class="slideshow-pattern"></div>
		
		<div id="canvas" class="canvas"></div>
		
		<section class="home-content">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div id="home">
							<a href="/" class="a-rounded animate" data-animate="fadeInDown" title="" target="_blank">
								<h1>D</h1>
							</a>
							<h3 class="animate" data-animate="fadeInDown"><?php echo $bakim["bakim_yazi"];?></h3>
							<p class="timer animate" data-animate="fadeInDown">
								<span class="days"></span>Gün</span><span class="separate">/</span> 
								<span class="hours"></span>Saat</span><span class="separate">/</span>
								<span class="minutes"></span>Dakika<span class="separate">/</span>
								<span class="seconds"></span>Saniye</span> 
							</p>
							<div class="links animate" data-animate="bounceIn">
								<div class="col-md-4 col-md-offset-2 col-sm-4 col-sm-offset-2 col-xs-6">
									
									<a href="tel:<?php echo $bakim["bakim_cep"];?>" id="meetus" >GSM</a>
								</div>
								<div class="col-md-4 col-sm-4 col-xs-6">
									<a id="link-map" href="<?php echo $bakim["bakim_harita"];?>" target="_blank">Bize Ulaşın </a>
								</div>
							</div>
							<div class="singup animate" data-animate="fadeInUp">
								<div class="subscribe">
									<p class="footer-social animate fadeInUp animated" data-animate="fadeInUp">				
										<a target="_blank" href="<?php echo $ayar["facebook_url"];?>" title="" data-gal="tooltip" data-placement="top" data-original-title="Facebook"><span class="fa fa-facebook"></span></a>
										<a target="_blank" href="<?php echo $ayar["twitter_url"];?>" title="" data-gal="tooltip" data-placement="top" data-original-title="Twitter"><span class="fa fa-twitter"></span></a>
										<a target="_blank" href="<?php echo $ayar["instagram_url"];?>" title="" data-gal="tooltip" data-placement="top" data-original-title="Instagram"><span class="fa fa-instagram"></span></a>
										
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>


		
		<!-- Javascript -->
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/jquery.countdown.js"></script>
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/jquery.scrollTo.min.js"></script>
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/fss.js"></script>
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/waypoints.min.js"></script>
		
		<?php require(TEMA_YAPIM.'yapim/scripts.php'); ?>
		<script type="text/javascript" src="<?php echo YAPIM_AST;?>js/canvas.js"></script>
		
    <!-- DEMO Switcher
    	================================================== -->
    	<script src="<?php echo YAPIM_AST;?>js/styleswitcher.js"></script>

    	
    </body>
    </html>
