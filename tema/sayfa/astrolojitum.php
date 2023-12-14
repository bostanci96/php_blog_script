<?php $blok = $db->query("SELECT * FROM dil_bloklar{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <title><?php echo $blok["desc12"];?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" itemprop="description" content="<?php echo $ayar["en_site_desc"];?>" />
        <meta name="keywords" itemprop="keywords" content="<?php echo $ayar[$lehce."site_keyw"];?>" />
        <meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
        <meta name="classification" content="<?php echo $blok["desc12"];?> " />
        <meta http-equiv="content-language" content="tr" />
        <meta name="distribution" content="Global" />
        <meta name="robots" content="all" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 days" />
        <meta name="country" content="Türkiye" />
        <link rel="canonical" href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:title" content="<?php echo $blok["desc12"];?> " />
        <meta property="og:locale" content="tr_TR" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php echo $ayar["en_site_desc"];?>" />
        <meta property="og:url" content="<?php echo LURL;?>" />
        <meta property="og:site_name" content="<?php echo $blok["desc12"];?> " />
        <?php require_once(TEMA_INC.'inc/ust.php');?>
    </head>
    <body>
        <?php require_once(TEMA_INC.'inc/head.php');?>
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
                                            <?php echo $blokRowdil["baslik13"]; ?>
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
        <section id="horoscopeCategori">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="catOutline">
                            <div class="themeCatTitle mb0">
                                <img src="<?php echo TEMA_URL;?>ast/img/head.png" alt=""><?php echo $blokRowdil["baslik13"]; ?>
                            </div>
                        </div>
                        <div class="catDesc">
                            <p><?php echo $blokRowdil["desc13"]; ?></p>
                        </div>
                        <div class="dailyHoroscope">
                            <ul class="dispFlex">
                                <?php
                                $haberQuery = $db->query("SELECT * FROM burclar WHERE sayfa_durum=1 AND secenekHaber=1 ORDER BY sayfa_id DESC");
                                if( $haberQuery->rowCount() ){
                                foreach($haberQuery as $haberRow){
                                $haberUrl = LURL.ASTRO.$haberRow["sayfa_url"].'/';
                                ?>
                                <li> <a href="<?php echo $haberUrl; ?>"> <div class="catHoroscopeImg"> <img class="img-fluid"  src="<?php echo URL.'images/burclaricon/big/'.$haberRow["sayfa_resim2"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> </div>
                                <div class="horosDesc">
                                    <div class="horoscatTitle"><?php echo $haberRow[$lehce."sayfa_adi"];?></div>
                                    <div class="horostar">
                                        <div class="cartScorev2 dispFlex">
                                            <div class='rating-stars text-center'>
                                                <ul id='stars'>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==1 OR $haberRow["makale_yildiz_say"]==2 OR $haberRow["makale_yildiz_say"]==3 OR $haberRow["makale_yildiz_say"]==4 OR $haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='1'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==2 OR $haberRow["makale_yildiz_say"]==3 OR $haberRow["makale_yildiz_say"]==4 OR $haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='2'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==3 OR $haberRow["makale_yildiz_say"]==4 OR $haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='3'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==4 OR $haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='4'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                    <li class='star <?php if($haberRow["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='5'>
                                                        <i class='fa fa-star fa-fw'></i>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
    </div>
</section>
<section id="horoscopeCategori">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="catOutline">
                    <div class="themeCatTitle mb0">
                        <img src="<?php echo TEMA_URL;?>ast/img/head.png" alt="">
                        <?php echo $blokRowdil["baslik14"]; ?>
                    </div>
                </div>
                <div class="catDesc">
                    <p>
                        <?php echo $blokRowdil["desc14"]; ?>
                    </p>
                </div>
                <div class="dailyHoroscope">
                    <ul>
                        <?php $haberQuery = $db->query("SELECT * FROM duzsayfa WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=4 ORDER BY sayfa_tarih ASC"); if( $haberQuery->rowCount() ){ foreach($haberQuery as $haberRow){ $haberUrl = LURL.DUZSAYFA.$haberRow["sayfa_url"].'/'; ?>
                        <li>
                            <a href="<?php echo $haberUrl; ?>">
                                <div class="catHoroscopeImg">
                                    <img style="width: 85px;height: 75px;" class="img-fluid" src="<?php echo URL.'images/duzsayfa/thumb/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>">
                                </div>
                                <div class="horosDesc">
                                    <div class="horosDate"><?php echo $haberRow[$lehce."tariharalik"];?></div>
                                    <div class="horoscatTitle"><?php echo $haberRow[$lehce."sayfa_adi"];?></div>
                                </div>
                            </a>
                        </li>
                        <?php } } ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $haberQuery = $db->query("SELECT * FROM haberkategori WHERE kategori_durum=1 AND katkonum_yeni='on'");
    if( $haberQuery->rowCount() ){
    foreach($haberQuery as $haberRow){
    $haberkatUrl = LURL.HBURL."/".$haberRow["kategori_id"]."_".$haberRow["kategori_url"];
    $haberkatid = $haberRow["kategori_id"];
 
    ?>
    <section id="healthSlider" class="mt10">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="catOutline">
                        <div class="themeCatTitle">
                            <img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>"> <span><?php echo $haberRow["kategori_adi"] ?></span>
                            <a class="linkR" href="<?php echo $haberkatUrl; ?>"><?php echo $blokRowdil["desc6"]; ?></a>
                        </div>
                        <div class="catSliders3">
                            <ul class="owl-carousel owl-theme">
                                <?php
                                $haberaltxy999 = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 and portkat='$haberkatid' LIMIT 12");
                                if( $haberaltxy999->rowCount() ){
                                foreach($haberaltxy999 as $haberRowxy77){
                                $haberUrl = LURL.HABER.$haberRowxy77["sayfa_url"].'/';
                                ?>
                                
                                <li> <a href="<?php echo $haberUrl; ?>"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRowxy77["sayfa_resim"];?>" alt="<?php if($haberRowxy77["resim_baslik"]){ echo $haberRowxy77["resim_baslik"] ;}else{ echo $haberRowxy77["sayfa_adi"];} ?>"> <h2> <?php echo $haberRowxy77["sayfa_adi"];?> </h2> </a> </li>
                                
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } } ?>
    <?php require_once(TEMA_INC.'inc/footer.php');?>
    <!-- Theme Script -->
    <?php require_once(TEMA_INC.'inc/alt.php');?>
</body>
</html>