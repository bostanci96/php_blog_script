<?php
$adres = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$linklercek = $db->query("select * from linkyonlendirme where link_yonlendirilecek = '".$adres."' and link_durum = '1' ");
$ceklinkler = $linklercek->fetch(PDO::FETCH_ASSOC);
if($linklercek->rowCount() > 0){
header("location:".$ceklinkler["link_yonlenen"]."");
exit();
}
if(isset($_GET["url"])){
$urlSef = g("url");
$sayfaControl = $db->prepare("SELECT * FROM burclar  INNER JOIN uyeler ON uye_id=sayfa_yazar WHERE sayfa_url=:url AND sayfa_durum=:durum");
$sayfaControl ->bindParam("url",$urlSef,PDO::PARAM_STR,50);
$sayfaControl ->bindValue("durum",1,PDO::PARAM_INT);
$sayfaControl -> execute();
if($sayfaControl->rowCount()){
$sayfaRow = $sayfaControl->fetch(PDO::FETCH_ASSOC);
$id=$sayfaRow["sayfa_id"];
$urlx=$sayfaRow["sayfa_url"];
$kat_id=$sayfaRow["kategori_id"];
}else{
header("Location:".LURL."404");exit();
}
}else{
header("Location:".LURL."404");exit();
}
$hit = $db->prepare("UPDATE burclar SET yazi_total_hit= yazi_total_hit +1 WHERE sayfa_id=?");
$hit->execute(array($id));
$hit2 = $db->prepare("UPDATE burclar SET yazi_gunluk_hit= yazi_gunluk_hit +1 WHERE sayfa_id=?");
$hit2->execute(array($id));
?>
<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <title><?php if($sayfaRow["sayfa_goster1"]){ echo $sayfaRow["sayfa_goster1"]; }else{ echo $sayfaRow["sayfa_adi"]; } ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <meta name="description" itemprop="description" content="<?php if($sayfaRow["sayfa_goster2"]){ echo $sayfaRow["sayfa_goster2"]; }else{ echo $sayfaRow["sayfa_desc"]; } ?>" />
        <meta name="keywords" itemprop="keywords" content="<?php echo $sayfaRow[$lehce."sayfa_keyw"];?>" />
        <meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
        <meta name="classification" content="<?php if($sayfaRow["sayfa_goster1"]){ echo $sayfaRow["sayfa_goster1"]; }else{ echo $sayfaRow["sayfa_adi"]; } ?>" />
        <meta http-equiv="content-language" content="tr" />
        <meta name="distribution" content="Global" />
        <meta name="robots" content="all" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 days" />
        <meta name="country" content="Türkiye" />
        <link rel="canonical" href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:title" content="<?php if($sayfaRow["sayfa_goster1"]){ echo $sayfaRow["sayfa_goster1"]; }else{ echo $sayfaRow["sayfa_adi"]; } ?>" />
        <meta property="og:locale" content="tr_TR" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php if($sayfaRow["sayfa_goster2"]){ echo $sayfaRow["sayfa_goster2"]; }else{ echo $sayfaRow["sayfa_desc"]; } ?>" />
        <meta property="og:url" content="<?php echo LURL;?>" />
        <meta property="og:site_name" content="<?php if($sayfaRow["sayfa_goster1"]){ echo $sayfaRow["sayfa_goster1"]; }else{ echo $sayfaRow["sayfa_adi"]; } ?>" />
        <?php require_once(TEMA_INC.'inc/ust.php');?>
        <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "NewsArticle",
        "headline": "<?php if($sayfaRow['sayfa_goster1']){ echo $sayfaRow['sayfa_goster1']; }else{ echo $sayfaRow['sayfa_adi']; } ?>",
        "image": [
        "<?php echo URL.'images/burclar/640x360/'.$sayfaRow['sayfa_resim'];?>"
        ],
        "datePublished": "<?php echo tarih($sayfaRow['sayfa_tarih']); ?>",
        "dateModified": "<?php echo tarih($sayfaRow['sayfa_tarih']); ?>",
        "author": [{
         "@type": "Publisher",
        "name": "<?php echo $yazaradi; ?>",
        "url": "<?php echo URL.YAZAR; ?><?php echo $sayfaRow['uye_id']; ?>/<?php echo sef_link($yazaradi); ?>"
        }]
        }
        </script>
        <style type="text/css">
        .detailSocial ul li:nth-child(3) a {
        background: #4ac959;
        }
        .detailDescrtiption p{
        margin-bottom: 0px;
        }
        .detailImg {
        margin-bottom: 10px;
        }
        </style>
    </head>
    <body>
        <?php require_once(TEMA_INC.'inc/head.php');?>
        <section id="kategoriSlider">
            <div class="container">
                
                <div class="masaustureklam mb-2 mt-2">
                    <?php echo html_entity_decode($blokRownews["desc17"]); ?>
                </div>
                <div class="mobilreklam mb-2 mt-2">
                    <?php echo html_entity_decode($blokRownews["desc21"]); ?>
                </div>
                
            </div>
        </section>
        <section id="breadcrump">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrump">
                            <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo LURL; ?>">
                                        <span itemprop="name">
                                            <?php echo $blokRowdil["desc7"]; ?>
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    
                                        <a itemprop="item" href="<?php echo LURL.ASTRO; ?>">
                                            <span itemprop="name">
                                            <?php echo $blokRowdil["baslik12"]; ?>
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    
                                        <a itemprop="item" href="<?php echo LURL.ASTRO.$sayfaRow["sayfa_url"].'/'; ?>">
                                            <span itemprop="name">
                                            <?php echo $sayfaRow["sayfa_adi"]; ?>
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="3" />
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="colPage">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pageLeft">
                            <div class="burcDetail">
                                <div class="detailDescrtiption">
                                    <h2><?php echo $sayfaRow["sayfa_adi"]; ?></h2>
                                    <p><?php echo $sayfaRow["sayfa_desc"]; ?></p>
                                    <div class="detailModalv1">
                                        <div class="detailDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""><?php echo tarih($sayfaRow["sayfa_tarih"]); ?></div>
                                        <div class="detailRate">
                                            <div class="cartScorev2 dispFlex">
                                                <div class="rating-stars text-center">
                                                    <ul id="stars">
                                                        <li class="star <?php if($sayfaRow["makale_yildiz_say"]==1 OR $sayfaRow["makale_yildiz_say"]==2 OR $sayfaRow["makale_yildiz_say"]==3 OR $sayfaRow["makale_yildiz_say"]==4 OR $sayfaRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>" title="" data-value="1">
                                                            <svg class="svg-inline--fa fa-star fa-w-18 fa-fw" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star fa-fw"></i> Font Awesome fontawesome.com -->
                                                        </li>
                                                        <li class="star <?php if($sayfaRow["makale_yildiz_say"]==2 OR $sayfaRow["makale_yildiz_say"]==3 OR $sayfaRow["makale_yildiz_say"]==4 OR $sayfaRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>" title="" data-value="2">
                                                            <svg class="svg-inline--fa fa-star fa-w-18 fa-fw" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star fa-fw"></i> Font Awesome fontawesome.com -->
                                                        </li>
                                                        <li class="star <?php if($sayfaRow["makale_yildiz_say"]==3 OR $sayfaRow["makale_yildiz_say"]==4 OR $sayfaRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>" title="" data-value="3">
                                                            <svg class="svg-inline--fa fa-star fa-w-18 fa-fw" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star fa-fw"></i> Font Awesome fontawesome.com -->
                                                        </li>
                                                        <li class="star <?php if($sayfaRow["makale_yildiz_say"]==4 OR $sayfaRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>" title="" data-value="4">
                                                            <svg class="svg-inline--fa fa-star fa-w-18 fa-fw" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star fa-fw"></i> Font Awesome fontawesome.com -->
                                                        </li>
                                                        <li class="star <?php if($sayfaRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>" title="" data-value="5">
                                                            <svg class="svg-inline--fa fa-star fa-w-18 fa-fw" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"></path></svg><!-- <i class="fa fa-star fa-fw"></i> Font Awesome fontawesome.com -->
                                                        </li>
                                                    </ul>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="detailSocial">
                                            <ul>
                                                <li> <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $adres; ?>"> <img src="<?php echo TEMA_URL;?>ast/img/facebook.png" alt=""> </a> </li>
                                                <li> <a target="_blank" href="https://twitter.com/share?url=<?php echo $adres; ?>"> <img src="<?php echo TEMA_URL;?>ast/img/twitter.png" alt=""> </a> </li>
                                                <li> <a target="_blank" href="whatsapp://send?text=<?php echo $adres; ?>"> <img src="<?php echo TEMA_URL;?>ast/img/whatsapp.png" alt=""> </a> </li>
                                                <li> <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $adres; ?>"> <img src="<?php echo TEMA_URL;?>ast/img/pinterest.png" alt=""> </a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="detailImg">
                                           <?php if ($sayfaRow["resim_goster"]=="on") { ?>
                                        <img class="img-fluid" src="<?php echo URL.'images/burclar/big/'.$sayfaRow["sayfa_resim"];?>" alt="<?php if($sayfaRow["resim_baslik"]){ echo $sayfaRow["resim_baslik"] ;}else{ echo $sayfaRow[$lehce."sayfa_adi"];} ?>">
                                               <?php  } ?>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="masaustureklam mb-2">
                                        <?php echo html_entity_decode($blokRownews["baslik18"]); ?>
                                    </div>
                                    <div class="mobilreklam mb-2 mt-2">
                                        <?php echo html_entity_decode($blokRownews["baslik22"]); ?>
                                    </div>
                                    <div style="clear: both;"></div>
                                    <div class="generalDetail">
                                        <?php echo $sayfaRow["sayfa_icerik"]; ?>
                                    </div>
                                    <div class="tumBurcYorumlari">
                                        <ul>
                                          <?php if ($sayfaRow["en_sayfa_adi"]) { ?>
                                           
                                   
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3><?php echo $sayfaRow["sayfa_adi"];?> Genel Durum</h3>
                                                        <p><?php echo $sayfaRow["en_sayfa_adi"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                                <?php    } ?>  

                                                  <?php if ($sayfaRow["en_sayfa_desc"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3><?php echo $sayfaRow["sayfa_adi"];?> Aşk Falı</h3>
                                                        <p><?php echo $sayfaRow["en_sayfa_desc"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                                  <?php    } ?>  
                                            <div style="clear: both;"></div>
                                            <div class="masaustureklam mb-2">
                                                <?php echo html_entity_decode($blokRownews["desc18"]); ?>
                                            </div>
                                            <div class="mobilreklam mb-2 mt-2">
                                                <?php echo html_entity_decode($blokRownews["desc22"]); ?>
                                            </div>
                                            <div style="clear: both;"></div>
                                                <?php if ($sayfaRow["en_sayfa_icerik"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3><?php echo $sayfaRow["sayfa_adi"];?> İş & Kariyer Falı</h3>
                                                        <p><?php echo $sayfaRow["en_sayfa_icerik"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                               <?php    } ?>  
                                                 <?php if ($sayfaRow["ar_sayfa_adi"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3><?php echo $sayfaRow["sayfa_adi"];?> Maddi Durum & Para Falı</h3>
                                                        <p><?php echo $sayfaRow["ar_sayfa_adi"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                               <?php    } ?> 
                                            <div style="clear: both;"></div>
                                            <div class="masaustureklam mb-2">
                                                <?php echo html_entity_decode($blokRownews["baslik19"]); ?>
                                            </div>
                                            <div class="mobilreklam mb-2 mt-2">
                                                <?php echo html_entity_decode($blokRownews["baslik23"]); ?>
                                            </div>
                                            <div style="clear: both;"></div>
                                            
                                              <?php if ($sayfaRow["ar_sayfa_desc"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3> <img src="<?php echo URL;?>images/burcsabit/mynet-logo.png" alt=""><?php echo $sayfaRow["sayfa_adi"];?> Mynet Sitesi</h3>
                                                        <p><?php echo $sayfaRow["ar_sayfa_desc"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                             <?php    } ?> 
                                              <?php if ($sayfaRow["ar_sayfa_icerik"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3> <img src="<?php echo URL;?>images/burcsabit/sabah.png" alt=""><?php echo $sayfaRow["sayfa_adi"];?> Sabah Gazetesi</h3>
                                                        <p><?php echo $sayfaRow["ar_sayfa_icerik"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                               <?php    } ?> 
                                                   <?php if ($sayfaRow["fa_sayfa_adi"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3> <img src="<?php echo URL;?>images/burcsabit/hurriyet.png" alt=""><?php echo $sayfaRow["sayfa_adi"];?> Hürriyet Gazetesi</h3>
                                                        <p><?php echo $sayfaRow["fa_sayfa_adi"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                                <?php    } ?> 
                                            <div style="clear: both;"></div>
                                            <div class="masaustureklam mb-2">
                                                <?php echo html_entity_decode($blokRownews["desc19"]); ?>
                                            </div>
                                            <div class="mobilreklam mb-2 mt-2">
                                                <?php echo html_entity_decode($blokRownews["desc23"]); ?>
                                            </div>
                                            <div style="clear: both;"></div>
                                              <?php if ($sayfaRow["fa_sayfa_desc"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3> <img src="<?php echo URL;?>images/burcsabit/Milliyet.png" alt=""><?php echo $sayfaRow["sayfa_adi"];?> Milliyet Gazetesi</h3>
                                                        <p><?php echo $sayfaRow["fa_sayfa_desc"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                               <?php    } ?> 
                                                   <?php if ($sayfaRow["fa_sayfa_icerik"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3> <img src="<?php echo URL;?>images/burcsabit/Takvim.png" alt=""><?php echo $sayfaRow["sayfa_adi"];?> Takvim Gazetesi</h3>
                                                        <p><?php echo $sayfaRow["fa_sayfa_icerik"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                               <?php    } ?> 
                                                <?php if ($sayfaRow["en_sayfa_keyw"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3> <img src="<?php echo URL;?>images/burcsabit/sozcu.jpg" alt=""><?php echo $sayfaRow["sayfa_adi"];?> Sözcü Gazetesi</h3>
                                                        <p><?php echo $sayfaRow["en_sayfa_keyw"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                                <?php    } ?> 
                                            <div style="clear: both;"></div>
                                            <div class="masaustureklam mb-2">
                                                <?php echo html_entity_decode($blokRownews["baslik20"]); ?>
                                            </div>
                                            <div class="mobilreklam mb-2 mt-2">
                                                <?php echo html_entity_decode($blokRownews["baslik24"]); ?>
                                            </div>
                                            <div style="clear: both;"></div>
                                               <?php if ($sayfaRow["ar_sayfa_keyw"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3> <img src="<?php echo URL;?>images/burcsabit/Haberturk.jpg" alt=""><?php echo $sayfaRow["sayfa_adi"];?> HaberTürk Gazetesi</h3>
                                                        <p><?php echo $sayfaRow["ar_sayfa_keyw"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                                <?php    } ?> 
                                                  <?php if ($sayfaRow["fa_sayfa_keyw"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3><img src="<?php echo URL;?>images/burcsabit/Rezzan-kiraz.PNG" alt=""> <?php echo $sayfaRow["sayfa_adi"];?> Rezzan Kiraz</h3>
                                                        <p><?php echo $sayfaRow["fa_sayfa_keyw"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                               <?php    } ?> 
                                                <?php if ($sayfaRow["en_resim_baslik"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3><img src="<?php echo URL;?>images/burcsabit/Nuray-sayari.PNG" alt=""> <?php echo $sayfaRow["sayfa_adi"];?> Nuray Sayarı</h3>
                                                        <p><?php echo $sayfaRow["en_resim_baslik"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                               <?php    } ?> 
                                                <?php if ($sayfaRow["ar_resim_baslik"]) { ?>
                                            <li>
                                                <div class="burcCard">
                                                    
                                                    <div class="burcCardDesc">
                                                        <h3><img src="<?php echo URL;?>images/burcsabit/Hande-kazanova.PNG" alt=""> <?php echo $sayfaRow["sayfa_adi"];?> Hande Kazanova</h3>
                                                        <p><?php echo $sayfaRow["ar_resim_baslik"]; ?></p>
                                                    </div>
                                                </div>
                                            </li>
                                                    <?php    } ?> 
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="masaustureklam mt-3">
                                <?php echo html_entity_decode($blokRownews["desc20"]); ?>
                            </div>
                            <div class="mobilreklam mb-2 mt-2">
                                <?php echo html_entity_decode($blokRownews["desc24"]); ?>
                            </div>
                            <div style="clear: both;"></div>
                            <?php require_once(TEMA_INC.'inc/burcslider.php');?>
                        </div>
                        <div class="sideRight">
                            
                            <div class="catOutline noneBorder">
                                <div class="themeCatTitle">
                                    <img class="img-fluid" src="<?php echo URL;?>tema/ast/img/pin.png" ><?php echo $blokRowdil["baslik18"] ?>
                                </div>
                                <div class="prodCartKapsar">
                                    <?php
                                    $haberaltxy999 = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 and makalekonum_astroloji='on' ORDER BY sayfa_tarih DESC LIMIT 15");
                                    if( $haberaltxy999->rowCount() ){
                                    foreach($haberaltxy999 as $haberRowxy77){
                                    $haberUrl = LURL.HABER.$haberRowxy77["sayfa_url"].'/';
                                    ?>
                                    
                                    <div class="productCartv2">
                                        <div class="cartImgv2"><a href="<?php echo $haberUrl; ?>"> <img width="310" height="170" class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRowxy77["sayfa_resim"];?>" alt="<?php if($haberRowxy77["resim_baslik"]){ echo $haberRowxy77["resim_baslik"] ;}else{ echo $haberRowxy77["sayfa_adi"];} ?>"> </a></div>
                                        <div class="cartDescv2">
                                            <div class="cartDatev2"> <img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($haberRowxy77["sayfa_tarih"]);?></div>
                                            <div class="cartScorev2">
                                                <div class='rating-stars text-center'>
                                                    <ul id='stars'>
                                                        <li class='star <?php if($haberRowxy77["makale_yildiz_say"]==1 OR $haberRowxy77["makale_yildiz_say"]==2 OR $haberRowxy77["makale_yildiz_say"]==3 OR $haberRowxy77["makale_yildiz_say"]==4 OR $haberRowxy77["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='1'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star <?php if($haberRowxy77["makale_yildiz_say"]==2 OR $haberRowxy77["makale_yildiz_say"]==3 OR $haberRowxy77["makale_yildiz_say"]==4 OR $haberRowxy77["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='2'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star <?php if($haberRowxy77["makale_yildiz_say"]==3 OR $haberRowxy77["makale_yildiz_say"]==4 OR $haberRowxy77["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='3'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star <?php if($haberRowxy77["makale_yildiz_say"]==4 OR $haberRowxy77["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='4'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                        <li class='star <?php if($haberRowxy77["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='5'>
                                                            <i class='fa fa-star fa-fw'></i>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <a href="<?php echo $haberUrl; ?>"><h3><?php echo $haberRowxy77["sayfa_adi"];?> </h3></a>
                                        </div>
                                    </div>
                                    <?php } } ?>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="masaustureklam mt-3">
                                <?php echo html_entity_decode($blokRownews["baslik21"]); ?>
                            </div>
                            <div class="mobilreklam mb-2 mt-2">
                                <?php echo html_entity_decode($blokRownews["baslik25"]); ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <?php require_once(TEMA_INC.'inc/footer.php');?>
        <!-- Theme Script -->
        <?php require_once(TEMA_INC.'inc/alt.php');?>
        
    </body>
</html>