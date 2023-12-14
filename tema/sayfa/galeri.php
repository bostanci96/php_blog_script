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
$sayfaControl = $db->prepare("SELECT * FROM makalegaleri INNER JOIN galerikategori ON kategori_id=portkat INNER JOIN uyeler ON uye_id=sayfa_yazar WHERE sayfa_url=:url AND sayfa_durum=:durum AND sayfa_tarih <= NOW()");
$sayfaControl ->bindParam("url",$urlSef,PDO::PARAM_STR,50);
$sayfaControl ->bindValue("durum",1,PDO::PARAM_INT);
$sayfaControl -> execute();
if($sayfaControl->rowCount()){
$sayfaRow = $sayfaControl->fetch(PDO::FETCH_ASSOC);
$id=$sayfaRow["sayfa_id"];
$urlx=$sayfaRow["sayfa_url"];
$kat_id=$sayfaRow["kategori_id"];
if ($sayfaRow["uye_kadisecimi"]==1) {
$yazaradi = $sayfaRow["uye_kadi"];
}else{
$yazaradi = $sayfaRow["uye_ad"]." ".$sayfaRow["uye_soyad"];
}
}else{
header("Location:".LURL."404");exit();
}
}else{
header("Location:".LURL."404");exit();
}
$sabitkatkont = $db->query("SELECT * FROM galerikategori WHERE def_kat_ayar=2")->fetch(PDO::FETCH_ASSOC);
$katid = $sabitkatkont["kategori_id"];
$hit = $db->prepare("UPDATE makalegaleri SET yazi_total_hit= yazi_total_hit +1 WHERE sayfa_id=?");
$hit->execute(array($id));
$hit2 = $db->prepare("UPDATE makalegaleri SET yazi_gunluk_hit= yazi_gunluk_hit +1 WHERE sayfa_id=?");
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
        "<?php echo URL.'images/makalegaleri/640x360/'.$sayfaRow['sayfa_resim'];?>"
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
        </style>
    </head>
    <body>
        <?php require_once(TEMA_INC.'inc/head.php');?>
        <section id="kategoriSlider">
            <div class="container">
                
                <div class="masaustureklam mb-2 mt-2">
                    <?php echo html_entity_decode($blokRownews["baslik14"]); ?>
                </div>
                <div class="mobilreklam mb-2 mt-2">
                    <?php echo html_entity_decode($blokRownews["baslik16"]); ?>
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
                                    
                                    <a itemprop="item" href="<?php echo LURL.GALERİ; ?>">
                                        <span itemprop="name">
                                            <?php echo $blokRowdil["desc17"]; ?>
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    
                                    <a itemprop="item" href="<?php echo LURL.GBURL."/".$sayfaRow["kategori_id"]."_".$sayfaRow["kategori_url"]; ?>">
                                        <span itemprop="name">
                                            <?php echo $sayfaRow["kategori_adi"]; ?>
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="3" />
                                </li>
                                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo LURL.GALERİ.$sayfaRow["sayfa_url"].'/'; ?>">
                                        <span itemprop="name">
                                            <?php echo $sayfaRow["sayfa_adi"]; ?>
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="4" />
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
                                    <h1><?php echo $sayfaRow["sayfa_adi"]; ?></h1>
                                    <p><?php echo $sayfaRow["sayfa_desc"]; ?></p>
                                    <div class="detailModalv1 flexend">
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
                                                <!--<div class="scoring">120 Oy</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fotoAuthor">
                                        <div class="authorPost">
                                            <div class="authorImg"> <img src="<?php echo TEMA_URL;?>ast/img/author3.png" alt=""> </div>
                                            <div class="authorDesc">
                                                <a href="<?php echo URL.YAZAR; ?><?php echo $sayfaRow["uye_id"]; ?>_<?php echo $sayfaRow["uye_url"]; ?>"><?php echo $yazaradi; ?></a>
                                                <span><?php echo $blokRowdil["baslik8"]; ?></span>
                                            </div>
                                        </div>
                                        <div class="dateAndCatName">
                                            <div class="detailDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($sayfaRow["sayfa_tarih"]); ?></div>
                                            <div class="catName">
                                                <?php echo $blokRowdil["desc8"]; ?><a href="<?php echo LURL.GBURL."/".$sayfaRow["kategori_id"]."/".$sayfaRow["kategori_url"]; ?>"> <?php echo $sayfaRow["kategori_adi"]; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="detailImg mb10">
                                        <?php if ($sayfaRow["resim_goster"]=="on") { ?>
                                        <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$sayfaRow["sayfa_resim"];?>" alt="<?php if($sayfaRow["resim_baslik"]){ echo $sayfaRow["resim_baslik"] ;}else{ echo $sayfaRow[$lehce."sayfa_adi"];} ?>">
                                        <?php  } ?>
                                    </div>
                                    
                                    <div class="detailSocialList">
                                        <ul>
                                            <li> <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $adres; ?>"> <img src="<?php echo TEMA_URL;?>ast/img/face.png" alt=""> Facebook </a> </li>
                                            <li> <a href="https://twitter.com/share?url=<?php echo $adres; ?>"> <img src="<?php echo TEMA_URL;?>ast/img/tw.png" alt=""> Twitter </a> </li>
                                            <li> <a href="whatsapp://send?text=<?php echo $adres; ?>"> <img src="<?php echo TEMA_URL;?>ast/img/whatsapp.png" alt=""> Whatsapp </a> </li>
                                            <li> <a href="https://www.tumblr.com/widgets/share/tool?shareSource=legacy&canonicalUrl=<?php echo $adres; ?>&posttype=link"> <img src="<?php echo TEMA_URL;?>ast/img/tumblr.png" alt=""> Tumbler </a> </li>
                                            <li> <a href="http://pinterest.com/pin/create/button/?url=<?php echo $adres; ?>"> <img src="<?php echo TEMA_URL;?>ast/img/pint.png" alt=""> Pinterest </a> </li>
                                        </ul>
                                    </div>
                                    <div class="masaustureklam mb-2">
                                        <?php echo html_entity_decode($blokRownews["desc14"]); ?>
                                    </div>
                                    <div class="mobilreklam mb-2 mt-2">
                                        <?php echo html_entity_decode($blokRownews["desc16"]); ?>
                                    </div>
                                    <div class="generalDetail">
                                        <?php
                                        
                                        $pars1 = explode("[{=",$sayfaRow["sayfa_icerik"]);
                                        $saymakontrol =  count($pars1);
                                        echo $pars1[0];
                                        for ($i=1; $i <  $saymakontrol ; $i++) {
                                        $pars2 = explode("=}]",$pars1[$i]);
                                        $pars3 = explode(":",$pars2[0]);
                                        $idxyz = $pars3[1];
                                        if ($pars3[0]=="m") {
                                        $kisakodxx = $db->query("SELECT * FROM makaleler WHERE sayfa_id='$idxyz' AND sayfa_durum=1 ")->fetch(PDO::FETCH_ASSOC);
                                        $lix = URL.HABER.$kisakodxx["sayfa_url"].'/';
                                        ?>
                                        <div class="postAdvert">
                                            <div class="postImg"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$kisakodxx["sayfa_resim"];?>" alt="<?php if($kisakodxx["resim_baslik"]){ echo $kisakodxx["resim_baslik"] ;}else{ echo $kisakodxx[$lehce."sayfa_adi"];} ?>"> </div>
                                            <a target="_blank" href="<?php echo $lix; ?>"><?php echo $kisakodxx["sayfa_adi"] ?></a>
                                        </div>
                                        <?php
                                        }elseif($pars3[0]=="g"){
                                        $kisakodxx = $db->query("SELECT * FROM makalegaleri WHERE sayfa_id='$idxyz' AND sayfa_durum=1 ")->fetch(PDO::FETCH_ASSOC);
                                        $lix = URL.GALERİ.$kisakodxx["sayfa_url"].'/';
                                        ?>
                                        <div class="postAdvert">
                                            <div class="postImg"> <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$kisakodxx["sayfa_resim"];?>" alt="<?php if($kisakodxx["resim_baslik"]){ echo $kisakodxx["resim_baslik"] ;}else{ echo $kisakodxx[$lehce."sayfa_adi"];} ?>"> </div>
                                            <a target="_blank" href="<?php echo $lix; ?>"><?php echo $kisakodxx["sayfa_adi"] ?></a>
                                        </div>
                                        <?php
                                        }elseif($pars3[0]=="s"){
                                        $kisakodxx = $db->query("SELECT * FROM sayfalar WHERE sayfa_id='$idxyz' AND sayfa_durum=1 ")->fetch(PDO::FETCH_ASSOC);
                                        $lix = URL.SAYFA.$kisakodxx["sayfa_url"].'/';
                                        ?>
                                        <div class="postAdvert">
                                            <div class="postImg"> <img class="img-fluid" src="<?php echo URL.'images/sayfalar/640x360/'.$kisakodxx["sayfa_resim"];?>" alt="<?php if($kisakodxx["resim_baslik"]){ echo $kisakodxx["resim_baslik"] ;}else{ echo $kisakodxx[$lehce."sayfa_adi"];} ?>"> </div>
                                            <a target="_blank" href="<?php echo $lix; ?>"><?php echo $kisakodxx["sayfa_adi"] ?></a>
                                        </div>
                                        <?php
                                        }elseif($pars3[0]=="d"){
                                        $kisakodxx = $db->query("SELECT * FROM duzsayfa WHERE sayfa_id='$idxyz' AND sayfa_durum=1 ")->fetch(PDO::FETCH_ASSOC);
                                        $lix = URL.DUZSAYFA.$kisakodxx["sayfa_url"].'/';
                                        ?>
                                        <div class="postAdvert">
                                            <div class="postImg"> <img class="img-fluid" src="<?php echo URL.'images/duzsayfa/640x360/'.$kisakodxx["sayfa_resim"];?>" alt="<?php if($kisakodxx["resim_baslik"]){ echo $kisakodxx["resim_baslik"] ;}else{ echo $kisakodxx[$lehce."sayfa_adi"];} ?>"> </div>
                                            <a target="_blank" href="<?php echo $lix; ?>"><?php echo $kisakodxx["sayfa_adi"] ?></a>
                                        </div>
                                        <?php
                                        }elseif($pars3[0]=="r"){
                                        $kisakodxx = $db->query("SELECT * FROM reklamlar WHERE fotograf_id='$idxyz' ")->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                 <?php if ($kisakodxx["fa_fotograf_longDesc"]==1) { ?>
<div class="mb-2 mt-2">
 <?php echo html_entity_decode($kisakodxx["fotograf_longDesc"]); ?>
                                </div>
<?php }else{ ?>

                                <div class="mb-2 mt-2">
                                    <a href="<?php echo $kisakodxx["fotograf_href"]; ?>" target="_blank">
                                        <img src="<?php echo URL;?>images/reklam/big/<?php echo $kisakodxx["fotograf_src"];?>" class="img-fluid">
                                    </a>
                                </div>


<?php } ?>
                                        <?php
                                        }
                                        echo $pars2[1];
                                        }
                                        ?>
                                    </div>
                                    <div class="fotoDetay">
                                        <ul itemscope itemtype="https://schema.org/ImageObject">
                                            <?php
                                            $imgQuery = $db->query("SELECT * FROM pageimages WHERE fotograf_sayfa_id='$id' ORDER BY fotograf_bolum2 ASC");
                                            if($imgQuery->rowCount()){
                                            $say=0;
                                            $numItems = $imgQuery->rowCount();
                                            foreach($imgQuery as $imgRow){
                                            
                                            $say++;
                                            ?>
                                            <li>
                                                <div class="fotoCard">
                                                    <div class="cardTitle">
                                                        <div class="cardNumber"><span class="bgColor1"><?php echo $say; ?></span><span class="bgColor2"><?php echo   $numItems; ?></span></div>
                                                        <div class="detailSocial">
                                                            <ul>
                                                                <li> <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo URL;?>images/makalegaleri/big/<?php echo $imgRow["fotograf_src"];?>"> <img src="<?php echo TEMA_URL;?>ast/img/facebook.png" alt=""> </a> </li>
                                                                <li> <a target="_blank" href="https://twitter.com/share?url=<?php echo URL;?>images/makalegaleri/big/<?php echo $imgRow["fotograf_src"];?>"> <img src="<?php echo TEMA_URL;?>ast/img/twitter.png" alt=""> </a> </li>
                                                                <li> <a target="_blank" href="whatsapp://send?text=<?php echo URL;?>images/makalegaleri/big/<?php echo $imgRow["fotograf_src"];?>"> <img src="<?php echo TEMA_URL;?>ast/img/whatsapp.png" alt=""> </a> </li>
                                                                <li> <a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo URL;?>images/makalegaleri/big/<?php echo $imgRow["fotograf_src"];?>"> <img src="<?php echo TEMA_URL;?>ast/img/pinterest.png" alt=""> </a> </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="fotoCardImg">
                                                        <img itemprop="contentUrl" src="<?php echo URL;?>images/makalegaleri/big/<?php echo $imgRow["fotograf_src"];?>" class="img-fluid" alt="<?php if($imgRow["fotograf_shortDesc"]){ echo $imgRow["fotograf_shortDesc"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>">
                                                        <span class="d-none" itemprop="license"><?php echo URL; ?></span><br />
                                                        <span class="d-none" itemprop="acquireLicensePage"><?php echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?></span>
                                                        <!--<h3></h3>-->
                                                        <p itemprop="name" style="margin-top: 5px">
                                                            <?php
                                                            
                                                            $pars1xxx = explode("[{=",html_entity_decode($imgRow["resim_baslik"]));
                                                            $saymakontrol =  count($pars1xxx);
                                                            echo $pars1xxx[0];
                                                            for ($i=1; $i <  $saymakontrol ; $i++) {
                                                            $pars2xx = explode("=}]",$pars1xxx[$i]);
                                                            $pars3xx = explode(":",$pars2xx[0]);
                                                            $idxyz = $pars3xx[1];
                                                            if ($pars3xx[0]=="m") {
                                                            $kisakodxx = $db->query("SELECT * FROM makaleler WHERE sayfa_id='$idxyz' AND sayfa_durum=1 ")->fetch(PDO::FETCH_ASSOC);
                                                            $lix = URL.HABER.$kisakodxx["sayfa_url"].'/';
                                                            ?>
                                                            <div class="postAdvert">
                                                                <div class="postImg"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$kisakodxx["sayfa_resim"];?>" alt="<?php if($kisakodxx["resim_baslik"]){ echo $kisakodxx["resim_baslik"] ;}else{ echo $kisakodxx[$lehce."sayfa_adi"];} ?>"> </div>
                                                                <a target="_blank" href="<?php echo $lix; ?>"><?php echo $kisakodxx["sayfa_adi"] ?></a>
                                                            </div>
                                                            <?php
                                                            }elseif($pars3xx[0]=="g"){
                                                            $kisakodxx = $db->query("SELECT * FROM makalegaleri WHERE sayfa_id='$idxyz' AND sayfa_durum=1 ")->fetch(PDO::FETCH_ASSOC);
                                                            $lix = URL.GALERİ.$kisakodxx["sayfa_url"].'/';
                                                            ?>
                                                            <div class="postAdvert">
                                                                <div class="postImg"> <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$kisakodxx["sayfa_resim"];?>" alt="<?php if($kisakodxx["resim_baslik"]){ echo $kisakodxx["resim_baslik"] ;}else{ echo $kisakodxx[$lehce."sayfa_adi"];} ?>"> </div>
                                                                <a target="_blank" href="<?php echo $lix; ?>"><?php echo $kisakodxx["sayfa_adi"] ?></a>
                                                            </div>
                                                            <?php
                                                            }elseif($pars3xx[0]=="s"){
                                                            $kisakodxx = $db->query("SELECT * FROM sayfalar WHERE sayfa_id='$idxyz' AND sayfa_durum=1 ")->fetch(PDO::FETCH_ASSOC);
                                                            $lix = URL.SAYFA.$kisakodxx["sayfa_url"].'/';
                                                            ?>
                                                            <div class="postAdvert">
                                                                <div class="postImg"> <img class="img-fluid" src="<?php echo URL.'images/sayfalar/640x360/'.$kisakodxx["sayfa_resim"];?>" alt="<?php if($kisakodxx["resim_baslik"]){ echo $kisakodxx["resim_baslik"] ;}else{ echo $kisakodxx[$lehce."sayfa_adi"];} ?>"> </div>
                                                                <a target="_blank" href="<?php echo $lix; ?>"><?php echo $kisakodxx["sayfa_adi"] ?></a>
                                                            </div>
                                                            <?php
                                                            }elseif($pars3xx[0]=="d"){
                                                            $kisakodxx = $db->query("SELECT * FROM duzsayfa WHERE sayfa_id='$idxyz' AND sayfa_durum=1 ")->fetch(PDO::FETCH_ASSOC);
                                                            $lix = URL.DUZSAYFA.$kisakodxx["sayfa_url"].'/';
                                                            ?>
                                                            <div class="postAdvert">
                                                                <div class="postImg"> <img class="img-fluid" src="<?php echo URL.'images/duzsayfa/640x360/'.$kisakodxx["sayfa_resim"];?>" alt="<?php if($kisakodxx["resim_baslik"]){ echo $kisakodxx["resim_baslik"] ;}else{ echo $kisakodxx[$lehce."sayfa_adi"];} ?>"> </div>
                                                                <a target="_blank" href="<?php echo $lix; ?>"><?php echo $kisakodxx["sayfa_adi"] ?></a>
                                                            </div>
                                                            <?php
                                                            }elseif($pars3xx[0]=="r"){
                                                            $kisakodxx = $db->query("SELECT * FROM reklamlar WHERE fotograf_id='$idxyz' ")->fetch(PDO::FETCH_ASSOC);
                                                            ?>
                                                         <?php if ($kisakodxx["fa_fotograf_longDesc"]==1) { ?>
<div class="mb-2 mt-2">
 <?php echo html_entity_decode($kisakodxx["fotograf_longDesc"]); ?>
                                </div>
<?php }else{ ?>

                                <div class="mb-2 mt-2">
                                    <a href="<?php echo $kisakodxx["fotograf_href"]; ?>" target="_blank">
                                        <img src="<?php echo URL;?>images/reklam/big/<?php echo $kisakodxx["fotograf_src"];?>" class="img-fluid">
                                    </a>
                                </div>


<?php } ?>
                                                            <?php
                                                            }
                                                            echo $pars2xx[1];
                                                            }
                                                            ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            
                                            <?php
                                            }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="masaustureklam mb-2">
                                        <?php echo html_entity_decode($blokRownews["baslik15"]); ?>
                                    </div>
                                    <div class="mobilreklam mb-2 mt-2">
                                        <?php echo html_entity_decode($blokRownews["baslik17"]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sideRight">
                            <div class="catOutline noneBorder">
                                <div class="prodCartKapsar">
                                    <?php
                                    $haberQuery = $db->query("SELECT * FROM makalegaleri INNER JOIN galerikategori ON kategori_id=portkat WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW()  ORDER BY sayfa_tarih DESC LIMIT 8 ");
                                    if( $haberQuery->rowCount() ){
                                    foreach($haberQuery as $haberRow){
                                    $haberUrl = LURL.GALERİ.$haberRow["sayfa_url"].'/';
                                    ?>
                                    <div class="productCart noneShadow">
                                        <div class="cartImg"><a href="<?php echo $haberUrl; ?>"> <span><?php echo $haberRow["kategori_adi"]; ?></span> <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> </a></div>
                                        <div class="cartDesc">
                                            <a href="<?php echo $haberUrl; ?>"><h3> <?php echo $haberRow[$lehce."sayfa_adi"];?> </h3></a>
                                        </div>
                                        <div class="cornerKapsar">
                                            <div class="cornerDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($haberRow["sayfa_tarih"]);?> </div>
                                        </div>
                                   
                                        <div class="cartScore">
                                            <div class='rating-stars text-center'>
                                                <ul id='stars'>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==1 OR $haberRow["makale_yildiz_say"]==2 OR $haberRow["makale_yildiz_say"]==3 OR $haberRow["makale_yildiz_say"]==4 OR $haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' title='' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==2 OR $haberRow["makale_yildiz_say"]==3 OR $haberRow["makale_yildiz_say"]==4 OR $haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' title='' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==3 OR $haberRow["makale_yildiz_say"]==4 OR $haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' title='' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==4 OR $haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' title='' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' title='' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                    }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="masaustureklam mt-3">
                                <?php echo html_entity_decode($blokRownews["desc15"]); ?>
                            </div>
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