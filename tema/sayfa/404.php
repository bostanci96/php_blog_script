<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <title>404 Sayfa Bulunamadı - <?php echo $ayar[$lehce."site_title"];?></title>
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
        <meta http-equiv="refresh" content="10; url=<?php echo URL; ?>">
        <?php require_once(TEMA_INC.'inc/ust.php');?>
        <style type="text/css">
        .wrap{
        margin:0 auto;
        width:1000px;
        }
        .logoxxx{
        text-align:center;
        margin-top:2rem;
        margin-bottom: 2rem;
        }
        .logoxxx img{
        width:350px;
        }
        .logoxxx p{
        color:#272727;
        font-size:40px;
        margin-top:1px;
        }
        .logoxxx p span{
        color:lightgreen;
        }
        .sub a{
        color:#fff;
        background:#272727;
        text-decoration:none;
        padding:10px 20px;
        font-size:13px;
        font-family: arial, serif;
        font-weight:bold;
        -webkit-border-radius:.5em;
        -moz-border-radius:.5em;
        -border-radius:.5em;
        }
        
        </style>
    </head>
    <body>
        <?php require_once(TEMA_INC.'inc/head.php');?>
        <?php require_once(TEMA_INC.'inc/onecikanlar.php');?>
        
        <div class="container">
            <div class="row">
                <div class="wrap">
                    <div class="logoxxx">
                        <p>Sayfa Bulunamadı!</p>
                        <img class="img-fluid" src="<?php echo URL; ?>images/404.gif"/>
                        <div class="sub">
                            <p><a href="<?php echo URL; ?>">Anasayfa</a></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <?php require_once(TEMA_INC.'inc/footer.php');?>
        <!-- Theme Script -->
        <?php require_once(TEMA_INC.'inc/alt.php');?>
    </body>
</html>