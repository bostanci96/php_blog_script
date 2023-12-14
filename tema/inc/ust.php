<link rel="stylesheet" href="<?php echo TEMA_URL;?>ast/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo TEMA_URL;?>ast/css/all.min.css">
<link rel="stylesheet" href="<?php echo TEMA_URL;?>ast/css/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo TEMA_URL;?>ast/css/style.css">

<link rel="icon" href="<?php echo URL;?>images/<?php echo $ayar["favicon"];?>">
<link rel="manifest" href="<?php echo URL;?>manifest.json">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-title" content="<?php echo $ayar[$lehce."site_title"];?>">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<link href="<?php echo URL;?>img/ios/20.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo URL;?>img/ios/40.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo URL;?>img/ios/50.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo URL;?>img/ios/80.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo URL;?>img/ios/128.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo URL;?>img/ios/180.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo URL;?>img/ios/256.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link rel="apple-touch-icon" sizes="128x128" href="<?php echo URL;?>img/android-launchericon-192-192.png">
<link rel="apple-touch-icon-precomposed" sizes="128x128" href="<?php echo URL;?>img/android/android-launchericon-192-192.png">
<link rel="icon" sizes="192x192" href="<?php echo URL;?>img/android/android-launchericon-192-192.png">
<link rel="icon" sizes="128x128" href="<?php echo URL;?>img/android/android-launchericon-192-192.png">
<script>
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', function () {
                navigator.serviceWorker.register('<?php echo URL;?>sw.js?v=5');
            });
        }
    </script>
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Brand",
        "name":"<?php echo $ayar[$lehce.'site_title'];?>",
        "description":"<?php echo $ayar[$lehce.'site_desc'];?>",
      "url": "<?php echo URL; ?>",
      "logo": "<?php echo URL; ?>images/<?php echo $ayar['logo']; ?>"

    }
    </script>
<?php echo  html_entity_decode($ayar["cdestek"]);?>
<?php echo  html_entity_decode($ayar["gconsol"]);?>
<!-- Google tag (gtag.js) -->
<script ufuk-kuskaya="https://www.googletagmanager.com/gtag/js?id=<?php echo html_entity_decode($ayar['ganaltyc']);?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '<?php echo html_entity_decode($ayar["ganaltyc"]);?>');
</script>
<?php $blokRow = $db->query("SELECT * FROM bloklar{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<?php $blokRowdil = $db->query("SELECT * FROM dil_bloklar{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<?php $blokRowdil2 = $db->query("SELECT * FROM dil2_bloklar{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<?php $blokRowrenk = $db->query("SELECT * FROM siterenk{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<?php $blokRowekcss = $db->query("SELECT * FROM csskod{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<?php $blokRownews = $db->query("SELECT * FROM reklamalanlari{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<style type="text/css">
	.newTitle {
    background: <?php echo $blokRowrenk["desc1"]; ?>!important;
    color: <?php echo $blokRowrenk["baslik1"]; ?>!important;
}
.menuArea ul li a:hover {
       color: <?php echo $blokRowrenk["baslik2"]; ?>!important;
}
.barLinks {
    background: <?php echo $blokRowrenk["desc2"]; ?>!important;
    box-shadow: 0px 5px 7px 0px <?php echo $blokRowrenk["baslik3"]; ?>!important;
}
.barLinks ul li a {
    color: <?php echo $blokRowrenk["desc3"]; ?>!important;
    border-right: 1px solid <?php echo $blokRowrenk["desc3"]; ?>!important;
}
.modala {
    background: <?php echo $blokRowrenk["baslik4"]; ?>!important;
    color: <?php echo $blokRowrenk["desc4"]; ?>!important;
}
.cartImg a span {
       background: <?php echo $blokRowrenk["baslik5"]; ?>!important;
    color: <?php echo $blokRowrenk["desc5"]; ?>!important;
}
.rating-stars ul > li.star > .fa-star {
    color: <?php echo $blokRowrenk["desc6"]; ?>!important;
}
.rating-stars ul > li.star.hover > .fa-star {
    color: <?php echo $blokRowrenk["baslik6"]; ?>!important;
}
.rating-stars ul > li.star.selected > .fa-star {
    color: <?php echo $blokRowrenk["baslik6"]; ?>!important;
}
.owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
    background: <?php echo $blokRowrenk["baslik7"]; ?>!important;
}
.bg1 {
    background: <?php echo $blokRowrenk["desc7"]; ?>!important;
}
.popularLyrics ul li a span {
    color: <?php echo $blokRowrenk["baslik8"]; ?>!important;
}
.ftbar {
    background: <?php echo $blokRowrenk["desc8"]; ?>!important;
}
.ftbarLink ul li a {
    color: <?php echo $blokRowrenk["baslik9"]; ?>!important;
    border-right: 1px solid <?php echo $blokRowrenk["baslik9"]; ?>!important;
}
.footerMenuLink {
    background: <?php echo $blokRowrenk["desc9"]; ?>!important;
    border-top: 1px solid <?php echo $blokRowrenk["baslik10"]; ?>!important;
}
.footerMenuLink ul li a {
    color: <?php echo $blokRowrenk["baslik10"]; ?>!important;
}
.generalDetail ul li:before {
    background: <?php echo $blokRowrenk["desc10"]; ?>!important;
}
.themeCatTitle span {
    color: <?php echo $blokRowrenk["baslik11"]; ?>!important;
}
.mansetDesc {
    background: <?php echo $blokRowrenk["desc11"]; ?>!important;
}
.mansetDescription h1 {
    color: <?php echo $blokRowrenk["baslik12"]; ?>!important;
}
</style>
<style type="text/css">
<?php echo html_entity_decode($blokRowekcss["baslik1"]); ?>
</style>