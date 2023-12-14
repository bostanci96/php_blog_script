<?php $blok = $db->query("SELECT * FROM dil_bloklar{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <title><?php echo $blok["desc10"];?> </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" itemprop="description" content="<?php echo $ayar["en_site_keyw"];?>" />
        <meta name="keywords" itemprop="keywords" content="<?php echo $ayar[$lehce."site_keyw"];?>" />
        <meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
        <meta name="classification" content="<?php echo $blok["desc10"];?> " />
        <meta http-equiv="content-language" content="tr" />
        <meta name="distribution" content="Global" />
        <meta name="robots" content="all" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 days" />
        <meta name="country" content="Türkiye" />
        <link rel="canonical" href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:title" content="<?php echo $blok["desc10"];?> " />
        <meta property="og:locale" content="tr_TR" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php echo $ayar["en_site_keyw"];?>" />
        <meta property="og:url" content="<?php echo LURL;?>" />
        <meta property="og:site_name" content="<?php echo $blok["desc10"];?> " />
        <?php require_once(TEMA_INC.'inc/ust.php');?>
        <style type="text/css">
            .catOutline{
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    justify-content: flex-start;
    align-items: flex-start;
}
        </style>
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
                                   
                                        <a itemprop="item" href="<?php echo URL.GALERİ?>">
                                             <span itemprop="name">
                                        <?php echo $blokRowdil["baslik17"]; ?>
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
        <section id="healthSlider" class="mt10">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="catOutline" style="display: block;">
                            <div class="themeCatTitle">
                                <img src="<?php echo TEMA_URL;?>ast/img/heart.png" alt=""> <span><?php echo $blokRowdil["baslik11"]; ?></span>
                            </div>
                            <div class="catSliders3">
                                <ul class="owl-carousel owl-theme">
                                    <?php
                                    $haberQuery = $db->query("SELECT * FROM makalegaleri INNER JOIN galerikategori ON kategori_id=portkat WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 AND makale_durum_pop='on' ORDER BY sayfa_tarih DESC");
                                    if( $haberQuery->rowCount() ){
                                    foreach($haberQuery as $haberRow){
                                    $haberUrl = LURL.GALERİ.$haberRow["sayfa_url"].'/';
                                    ?>
                                    
                                    <li> <a href="<?php echo $haberUrl; ?>"> <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> <h2> <?php echo $haberRow[$lehce."sayfa_adi"];?> </h2> </a> </li>
                                    
                                    <?php
                                    }
                                    }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="productsSub">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="catOutline">
                            <div class="themeCatTitle">
                                <img src="<?php echo TEMA_URL;?>ast/img/food.png" alt=""> <span><?php echo $blokRowdil["desc11"]; ?></span>
                            </div>
                            <?php
                            $haberQuex = $db->query("SELECT * FROM makalegaleri INNER JOIN galerikategori ON kategori_id=portkat WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 ORDER BY sayfa_tarih DESC");
                            if( $haberQuex->rowCount() ){
                            foreach($haberQuex as $haberRow){
                            $haberUrl = LURL.GALERİ.$haberRow["sayfa_url"].'/';
                            ?>
                            <div class="productCart noneShadow">
                                <div class="cartImg"><a href="<?php echo $haberUrl; ?>"> <span><?php echo $haberRow["kategori_adi"]; ?></span> <img  class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> </a></div>
                                <div class="cartDesc">
                                    <a href="<?php echo $haberUrl; ?>"><h3> <?php echo $haberRow[$lehce."sayfa_adi"];?> </h3></a>
                                 
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
                            </div>
                            
                            <?php
                            }
                            }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        $haberQuery = $db->query("SELECT * FROM galerikategori WHERE kategori_durum=1 AND galeri_anasayfa_kont='on' ");
        if( $haberQuery->rowCount() ){
        foreach($haberQuery as $haberRow){
        $haberkatUrl = LURL.GBURL."/".$haberRow["kategori_id"]."_".$haberRow["kategori_url"];
        $haberkatid = $haberRow["kategori_id"];
        ?>
        <section id="productsSub2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="catOutline">
                            <div class="themeCatTitle">
                                <img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>"> <span><?php echo $haberRow["kategori_adi"] ?></span>
                            </div>
                            
                            <?php
                            $haberaltxy11 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 and portkat='$haberkatid' ");
                            if( $haberaltxy11->rowCount() ){
                            foreach($haberaltxy11 as $haberRowxy11){
                            $haberUrl = LURL.GALERİ.$haberRowxy11["sayfa_url"].'/';
                            ?>
                            
                            <div class="productCart noneShadow">
                                <div class="cartImg"><a href="<?php echo $haberUrl; ?>"> <span><?php echo $haberRow["kategori_adi"] ?></span> <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy11["sayfa_resim"];?>" alt="<?php if($haberRowxy11["resim_baslik"]){ echo $haberRowxy11["resim_baslik"] ;}else{ echo $haberRowxy11["sayfa_adi"];} ?>"> </a></div>
                                <div class="cartDesc">
                                    <a href="<?php echo $haberUrl; ?>"><h3><?php echo $haberRowxy11["sayfa_adi"];?> </h3></a>
                              
                                    <div class="cornerKapsar">
                                        <div class="cornerDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($haberRowxy11["sayfa_tarih"]);?> </div>
                                    </div>
                                    <div class="cartScore">
                                        <div class='rating-stars text-center'>
                                            <ul id='stars'>
                                                <li class='star <?php if($haberRowxy11["makale_yildiz_say"]==1 OR $haberRowxy11["makale_yildiz_say"]==2 OR $haberRowxy11["makale_yildiz_say"]==3 OR $haberRowxy11["makale_yildiz_say"]==4 OR $haberRowxy11["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star <?php if($haberRowxy11["makale_yildiz_say"]==2 OR $haberRowxy11["makale_yildiz_say"]==3 OR $haberRowxy11["makale_yildiz_say"]==4 OR $haberRowxy11["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='2'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star <?php if($haberRowxy11["makale_yildiz_say"]==3 OR $haberRowxy11["makale_yildiz_say"]==4 OR $haberRowxy11["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='3'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star <?php if($haberRowxy11["makale_yildiz_say"]==4 OR $haberRowxy11["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='4'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star <?php if($haberRowxy11["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='5'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php } }?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php  } } ?>
        
        <?php require_once(TEMA_INC.'inc/footer.php');?>
        <!-- Theme Script -->
        <?php require_once(TEMA_INC.'inc/alt.php');?>
    </body>
</html>