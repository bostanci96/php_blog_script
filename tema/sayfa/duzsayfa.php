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
$sayfaControl = $db->prepare("SELECT * FROM duzsayfa INNER JOIN uyeler ON uye_id=sayfa_yazar WHERE sayfa_url=:url AND sayfa_durum=:durum AND sayfa_tarih <= NOW()");
$sayfaControl ->bindParam("url",$urlSef,PDO::PARAM_STR,50);
$sayfaControl ->bindValue("durum",1,PDO::PARAM_INT);
$sayfaControl -> execute();
if($sayfaControl->rowCount()){
$sayfaRow = $sayfaControl->fetch(PDO::FETCH_ASSOC);
$id=$sayfaRow["sayfa_id"];
$urlx=$sayfaRow["sayfa_url"];
$kat_id=$sayfaRow["kategori_id"];
$hashtag=$sayfaRow["hashtag"];
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
$sabitkatkont = $db->query("SELECT * FROM haberkategori WHERE def_kat_ayar=2")->fetch(PDO::FETCH_ASSOC);
$katid = $sabitkatkont["kategori_id"];
$hit = $db->prepare("UPDATE duzsayfa SET yazi_total_hit= yazi_total_hit +1 WHERE sayfa_id=?");
$hit->execute(array($id));
$hit2 = $db->prepare("UPDATE duzsayfa SET yazi_gunluk_hit= yazi_gunluk_hit +1 WHERE sayfa_id=?");
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
        "<?php echo URL.'images/duzsayfa/640x360/'.$sayfaRow['sayfa_resim'];?>"
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
        .detailDate {width: 68%;}
        .sideRight .cornerKapsar { width: 65%;}
        </style>
    </head>
    <body>
        <?php require_once(TEMA_INC.'inc/head.php');?>
        <?php require_once(TEMA_INC.'inc/onecikanlar.php');?>
        <section id="kategoriSlider">
            <div class="container">
                <div class="masaustureklam mb-2 mt-2">
                    <?php echo html_entity_decode($blokRownews["baslik9"]); ?>
                </div>
                <div class="mobilreklam mb-2 mt-2">
                    <?php echo html_entity_decode($blokRownews["baslik12"]); ?>
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
                                   
                                        <a itemprop="item" href="<?php echo LURL.DUZSAYFA.$sayfaRow["sayfa_url"].'/'; ?>">
                                             <span itemprop="name">
                                            <?php echo $sayfaRow["sayfa_adi"]; ?>
                                        </span>
                                    </a>
                                    <meta itemprop="position" content="2" />
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
                                    <div class="detailModalv1 flexend">
                                        <div class="detailRate">
                                            <div class="cartScorev2 dispFlex">
                                                
                                                <!--<div class="scoring">120 Oy</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fotoAuthor">
                                        <div class="authorPost">
                                            <div class="authorImg"> <img src="<?php echo TEMA_URL;?>ast/img/author3.png" alt=""> </div>
                                            <div class="authorDesc">
                                                <a href="<?php echo URL.YAZAR; ?><?php echo $sayfaRow["uye_id"]; ?>/<?php echo sef_link($yazaradi); ?>"><?php echo $yazaradi; ?></a>
                                                <span><?php echo $blokRowdil["baslik8"]; ?></span>
                                            </div>
                                        </div>
                                        <div class="dateAndCatName">
                                            <div class="detailDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($sayfaRow["sayfa_tarih"]); ?></div>
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
                                    
                                    
                                    
                                    <div class="detailImg mb10">
                                        <?php if ($sayfaRow["resim_goster"]=="on") { ?>
                                        <img class="img-fluid" src="<?php echo URL.'images/duzsayfa/640x360/'.$sayfaRow["sayfa_resim"];?>" alt="<?php if($sayfaRow["resim_baslik"]){ echo $sayfaRow["resim_baslik"] ;}else{ echo $sayfaRow[$lehce."sayfa_adi"];} ?>">
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
                                        <?php echo html_entity_decode($blokRownews["desc9"]); ?>
                                    </div>
                                    <div class="mobilreklam mb-2 mt-2">
                                        <?php echo html_entity_decode($blokRownews["desc12"]); ?>
                                    </div>
                                    <p>
                                        <?php echo $sayfaRow["sayfa_desc"]; ?>
                                    </p>
                                </div>
                            </div>
                            <?php
                            $cek = getir('<'.$hashtag.'>','</'.$hashtag.'>', $sayfaRow["sayfa_icerik"]);
                            if ($cek) { ?>
                            
                           <div class="collapseList">
                                <h4><?php echo $blokRowdil["desc18"];?><span class="hidden"><?php echo $blokRowdil["baslik19"];?></span> <span class="show"><?php echo $blokRowdil["desc19"];?></span> </h4>
                                <ul itemscope itemtype="https://schema.org/BreadcrumbList">
                                    <?php
                                    for ($i=0; $i < count($cek); $i++) { ?>
                                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="#<?=sef_link($cek[$i])?>">   <span itemprop="name"> <?=$cek[$i]?> </span></a>
                                        <meta itemprop="position" content=" <?=$i?>" /></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php  } ?>
                            <div class="generalDetail">
                                <?php
                                $yazialani = reskup($hashtag,$sayfaRow["sayfa_icerik"]);
                                $pars1 = explode("[{=",$yazialani);
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
                            
                            
                            
                            <div class="keywords">
                                <?php
                                ?>
                                <?php if ($sayfaRow["makale_etiket"]) {
                                $tagsay = explode(",",$sayfaRow["makale_etiket"]);
                                $say = count($tagsay);
                                for ($i=0; $i < $say ; $i++) {
                                
                                ?>
                                
                                
                                <form action="<?php echo URL.'search';?>" method="post" >
                                    <input type="hidden" name="aramakelime" value="<?php echo $tagsay[$i]; ?>">
                                    
                                    <a href="<?php echo URL; ?>search/<?php echo etiket_url_donustur($tagsay[$i]); ?>">     <button type="submit"><?php echo $tagsay[$i]; ?></button></a>
                                </form>
                                <?php  }   } ?>
                                
                                
                            </div>
                            <div class="masaustureklam mb-2">
                                <?php echo html_entity_decode($blokRownews["baslik10"]); ?>
                            </div>
                            <div class="mobilreklam mb-2 mt-2">
                                
                                <?php echo html_entity_decode($blokRownews["baslik13"]); ?>
                            </div>
                            <div class="benzerIcerikler">
                                <span><?php echo $blokRowdil["baslik9"] ?></span>
                                <div class="catesList">
                                    <ul>
                                        <?php
                                        $haberQuery = $db->query("SELECT * FROM duzsayfa WHERE sayfa_durum=1 AND secenekHaber!=4 AND sayfa_tarih <= NOW() ORDER BY RAND() DESC LIMIT 4 ");
                                        if( $haberQuery->rowCount() ){
                                        foreach($haberQuery as $haberRow){
                                        $haberUrl = LURL.DUZSAYFA.$haberRow["sayfa_url"].'/';
                                        ?>
                                        <li>
                                            <a href="<?php echo $haberUrl; ?>">
                                                <div class="catesImg"> <img class="img-fluid" src="<?php echo URL.'images/duzsayfa/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> </div>
                                                <div class="catesDesc"> <p><?php echo $haberRow[$lehce."sayfa_adi"];?></p>
                                                <div class="cornerKapsar">
                                                    <div class="cornerDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""><?php echo tarih($haberRow["sayfa_tarih"]);?> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <?php
                                    }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="masaustureklam mb-2">
                            <?php echo html_entity_decode($blokRownews["desc10"]); ?>
                        </div>
                        <div class="mobilreklam mb-2 mt-2">
                            <?php echo html_entity_decode($blokRownews["desc13"]); ?>
                        </div>
                       
                    </div>
                    <div class="sideRight">
                        <div class="catOutline">
                            <div class="themeCatTitle">
                                <img src="<?php echo TEMA_URL;?>ast/img/pin.png" alt=""> <span class="kategoriTitle"><?php echo $blokRowdil["desc9"]; ?></span>
                            </div>
                            <div class="prodCartKapsar">
                                <div class="catesList">
                                    <ul>
                                        <?php
                                        $haberQuery = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() AND makalekonum_sonyazilar='on' ORDER BY sayfa_tarih DESC LIMIT 8 ");
                                        if( $haberQuery->rowCount() ){
                                        foreach($haberQuery as $haberRow){
                                        $haberUrl = LURL.HABER.$haberRow["sayfa_url"].'/';
                                        ?>
                                        <li>
                                            <a href="<?php echo $haberUrl; ?>">
                                                <div class="catesImg"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> </div>
                                                <div class="catesDesc"> <p><?php echo $haberRow[$lehce."sayfa_adi"];?></p>
                                                <div class="cornerKapsar">
                                                    <div class="cornerDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($haberRow["sayfa_tarih"]);?> </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    
                                    <?php
                                    }
                                    }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div style="clear: both;"></div>
                    <div class="masaustureklam mt-3">
                        <?php echo html_entity_decode($blokRownews["baslik11"]); ?>
                    </div>
                    <div class="catOutline mt20">
                        <div class="themeCatTitle">
                            <img src="<?php echo TEMA_URL;?>ast/img/edit.png" alt=""> <span class="kategoriTitle"><?php echo $blokRowdil["baslik10"]; ?></span>
                        </div>
                        <div class="prodCartKapsar">
                            <div class="productCart noneShadow mb0">
                                <?php
                                $haberQuery12 = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() AND makale_durum_pop='on' ORDER BY sayfa_tarih DESC LIMIT 0,1 ");
                                if( $haberQuery12->rowCount() ){
                                foreach($haberQuery12 as $haberRow12){
                                $haberUrl = LURL.HABER.$haberRow12["sayfa_url"].'/';
                                ?>
                                <div class="cartImg"><a href="<?php echo $haberUrl; ?>"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRow12["sayfa_resim"];?>" alt="<?php if($haberRow12["resim_baslik"]){ echo $haberRow12["resim_baslik"] ;}else{ echo $haberRow12[$lehce."sayfa_adi"];} ?>"> </a></div>
                                <div class="cartDesc pb18">
                                    <a href="<?php echo $haberUrl; ?>"><h3> <?php echo $haberRow12[$lehce."sayfa_adi"];?></h3></a>
                                    <div class="detailDate"> <img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($haberRow12["sayfa_tarih"]);?> </div>
                                </div>
                                <?php
                                }
                                }?>
                            </div>
                            <div class="catesList">
                                <ul>
                                    <?php
                                    $haberQuery12 = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() AND makale_durum_pop='on' ORDER BY sayfa_tarih DESC LIMIT 1,5 ");
                                    if( $haberQuery12->rowCount() ){
                                    foreach($haberQuery12 as $haberRow12){
                                    $haberUrl = LURL.HABER.$haberRow12["sayfa_url"].'/';
                                    ?>
                                    <li>
                                        <a href="<?php echo $haberUrl; ?>">
                                            <div class="catesImg"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRow12["sayfa_resim"];?>" alt="<?php if($haberRow12["resim_baslik"]){ echo $haberRow12["resim_baslik"] ;}else{ echo $haberRow12[$lehce."sayfa_adi"];} ?>"> </div>
                                            <div class="catesDesc"> <p><?php echo $haberRow12[$lehce."sayfa_adi"];?></p>
                                            <div class="cornerKapsar">
                                                <div class="cornerDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($haberRow12["sayfa_tarih"]);?> </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                
                                <?php
                                }
                                }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="catOutline mt20">
                    <div class="themeCatTitle">
                        <img src="<?php echo TEMA_URL;?>ast/img/kamera.png" alt=""> <span class="kategoriTitle"><?php echo $sabitkatkont["kategori_adi"]; ?></span>
                    </div>
                    <div class="prodCartKapsar">
                        <div class="productCart noneShadow mb0">
                            <?php
                            
                            $haberQuery12xx = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() AND portkat='$katid' ORDER BY sayfa_tarih DESC LIMIT 0,1 ");
                            if( $haberQuery12xx->rowCount() ){
                            foreach($haberQuery12xx as $haberRow12xx){
                            $haberUrl = LURL.HABER.$haberRow12xx["sayfa_url"].'/';
                            ?>
                            <div class="cartImg"><a href="<?php echo $haberUrl; ?>"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRow12xx["sayfa_resim"];?>" alt="<?php if($haberRow12xx["resim_baslik"]){ echo $haberRow12xx["resim_baslik"] ;}else{ echo $haberRow12xx[$lehce."sayfa_adi"];} ?>"> </a></div>
                            <div class="cartDesc pb18">
                                <a href="<?php echo $haberUrl; ?>"><h3> <?php echo $haberRow12xx[$lehce."sayfa_adi"];?></h3></a>
                                <div class="detailDate"> <img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($haberRow12xx["sayfa_tarih"]);?> </div>
                            </div>
                            <?php
                            }
                            }?>
                        </div>
                        <div class="catesList">
                            <ul>
                                <?php
                                $haberQuery12xx = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() AND portkat='$katid' ORDER BY sayfa_tarih DESC LIMIT 1,5 ");
                                if( $haberQuery12xx->rowCount() ){
                                foreach($haberQuery12xx as $haberRow12xx){
                                $haberUrl = LURL.HABER.$haberRow12xx["sayfa_url"].'/';
                                ?>
                                <li>
                                    <a href="<?php echo $haberUrl; ?>">
                                        <div class="catesImg"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRow12xx["sayfa_resim"];?>" alt="<?php if($haberRow12xx["resim_baslik"]){ echo $haberRow12xx["resim_baslik"] ;}else{ echo $haberRow12xx[$lehce."sayfa_adi"];} ?>"> </div>
                                        <div class="catesDesc"> <p><?php echo $haberRow12xx[$lehce."sayfa_adi"];?></p>
                                        <div class="cornerKapsar">
                                            <div class="cornerDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($haberRow12xx["sayfa_tarih"]);?> </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            
                            <?php
                            }
                            }?>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div style="clear: both;"></div>
            <div class="masaustureklam mt-3">
                <?php echo html_entity_decode($blokRownews["desc11"]); ?>
            </div>
        </div>
        
    </div>
</div>
</div>
</section>
<?php require_once(TEMA_INC.'inc/footer.php');?>
<!-- Theme Script -->
<?php require_once(TEMA_INC.'inc/alt.php');?>
 <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
      {
        "@type": "Question",
        "name": "<?php echo $sayfaRow['sayfa_adi']; ?>",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "<?php echo $sayfaRow['sayfa_desc']; ?>"
        }
      }<?php if($sayfaRow['sorucevap']){echo ',';} ?>

<?php echo html_entity_decode($sayfaRow['sorucevap']); ?>

      ]
    }
    </script>
</body>
</html>