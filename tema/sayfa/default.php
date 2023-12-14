
<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <title><?php echo $ayar[$lehce."site_title"];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" itemprop="description" content="<?php echo $ayar[$lehce."site_desc"];?>" />
        <meta name="keywords" itemprop="keywords" content="<?php echo $ayar[$lehce."site_keyw"];?>" />
        <meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
        <meta name="classification" content="<?php echo $ayar[$lehce."site_title"];?>" />
        <meta http-equiv="content-language" content="tr" />
        <meta name="distribution" content="Global" />
        <meta name="robots" content="all" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 days" />
        <meta name="country" content="Türkiye" />
        <link rel="canonical" href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:title" content="<?php echo $ayar[$lehce."site_title"];?>" />
        <meta property="og:locale" content="tr_TR" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php echo $ayar[$lehce."site_desc"];?>" />
        <meta property="og:url" content="<?php echo LURL;?>" />
        <meta property="og:site_name" content="<?php echo $ayar[$lehce."site_title"];?>" />
        <?php require_once(TEMA_INC.'inc/ust.php');?>
    </head>
    <body>
        <?php require_once(TEMA_INC.'inc/head.php');?>
        <?php require_once(TEMA_INC.'inc/onecikanlar.php');?>
        <section id="kategoriSlider">
            <div class="container">
                
                <div class="masaustureklam mb-2 mt-2">
                    <?php echo html_entity_decode($blokRownews["desc2"]); ?>
                </div>
                
            </div>
        </section>
        <section id="manset">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-12">
                        <?php require_once(TEMA_INC.'inc/manset.php');?>
                        
                    </div>
                    <div class="col-md-4 col-12">
                        <?php require_once(TEMA_INC.'inc/mansetyani.php');?>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="row">
                <?php require_once(TEMA_INC.'inc/anasayfasablon.php');?>
                <?php require_once(TEMA_INC.'inc/anasayfasablon2.php');?>
                
            </div>
        </div>
        <?php require_once(TEMA_INC.'inc/burcanasayfa.php');?>
        <?php require_once(TEMA_INC.'inc/footer.php');?>
        <!-- Theme Script -->
        <?php require_once(TEMA_INC.'inc/alt.php');?>
    </body>
</html>