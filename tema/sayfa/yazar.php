<?php $blok = $db->query("SELECT * FROM dil_bloklar{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<?php
if(isset($_GET["id"])){
$urunGet = $_GET["id"];
$kategori = explode ("_",$urunGet);
$yazarid=$kategori[0];
@$kategoriurl=$kategori[1];
$kategoriControl = $db->prepare("SELECT * FROM uyeler WHERE uye_id=:id AND uye_url=:url AND uye_onay=:durum");
$kategoriControl ->bindParam("id",$yazarid,PDO::PARAM_INT);
$kategoriControl ->bindParam("url",$kategoriurl,PDO::PARAM_STR);
$kategoriControl ->bindValue("durum",1,PDO::PARAM_INT);
$kategoriControl ->execute();
if( $kategoriControl->rowCount() ){
$kategoriRow = $kategoriControl->fetch(PDO::FETCH_ASSOC);
if ($kategoriRow["uye_kadisecimi"]==1) {
$yazaradi = $kategoriRow["uye_kadi"];
}else{
$yazaradi = $kategoriRow["uye_ad"]." ".$kategoriRow["uye_soyad"];
}
}else{
header("Location:".LURL."404");exit();
}
}
$tagsay = explode(",",$ayar["google_maps"]);
$say = count($tagsay);
for ($i=0; $i < $say ; $i++) {
if ($tagsay[$i]==$kategoriurl) {
header("Location:".LURL."404");
}
}
?>
<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <title><?php echo $yazaradi;?> - <?php echo $ayar[$lehce."site_title"];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" itemprop="description" content="<?php echo $ayar[$lehce."site_desc"];?>" />
        <meta name="keywords" itemprop="keywords" content="<?php echo $ayar[$lehce."site_keyw"];?>" />
        <meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
        <meta name="classification" content="<?php echo $yazaradi;?> - <?php echo $ayar[$lehce."site_title"];?>" />
        <meta http-equiv="content-language" content="tr" />
        <meta name="distribution" content="Global" />
        <meta name="robots" content="all" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 days" />
        <meta name="country" content="Türkiye" />
        <link rel="canonical" href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:title" content="<?php echo $yazaradi;?> - <?php echo $ayar[$lehce."site_title"];?>" />
        <meta property="og:locale" content="tr_TR" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php echo $ayar[$lehce."site_desc"];?>" />
        <meta property="og:url" content="<?php echo LURL;?>" />
        <meta property="og:site_name" content="<?php echo $yazaradi;?> - <?php echo $ayar[$lehce."site_title"];?>" />
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
                                   
                                        <a itemprop="item" href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>">
                                             <span itemprop="name">
                                           <?php echo $yazaradi; ?>
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
        <?php
        $haberQuery = $db->query("SELECT * FROM makalegaleri INNER JOIN galerikategori ON kategori_id=portkat WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 AND sayfa_yazar='$yazarid' ORDER BY sayfa_tarih DESC LIMIT 30");
        if( $haberQuery->rowCount() ){
        ?>
        <section id="healthSlider" class="mt10">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="catOutline" style="display: block;">
                            <div class="themeCatTitle">
                                <img src="<?php echo TEMA_URL;?>ast/img/heart.png" alt=""> <span><?php echo $yazaradi; ?> <?php echo $blokRowdil["desc15"]; ?></span>
                            </div>
                            <div class="catSliders3">
                                <ul class="owl-carousel owl-theme">
                                    
                                    <?php foreach($haberQuery as $haberRow){
                                    $haberUrl = LURL.GALERİ.$haberRow["sayfa_url"].'/';
                                    ?>
                                    
                                    <li> <a href="<?php echo $haberUrl; ?>"> <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> <h2> <?php echo $haberRow[$lehce."sayfa_adi"];?> </h2> </a> </li>
                                    
                                    <?php
                                    } ?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php }?>
        <section id="productsSub">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="catOutline">
                            <div class="themeCatTitle">
                                <img src="<?php echo TEMA_URL;?>ast/img/food.png" alt=""> <span><?php echo $yazaradi; ?> <?php echo $blokRowdil["baslik16"]; ?></span>
                            </div>
                            <?php
                            $haberQuex = $db->query("SELECT * FROM makaleler INNER JOIN haberkategori ON kategori_id=portkat WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 AND sayfa_yazar='$yazarid' ORDER BY sayfa_tarih DESC LIMIT 30");
                            if( $haberQuex->rowCount() ){
                            foreach($haberQuex as $haberRow){
                            $haberUrl = LURL.HABER.$haberRow["sayfa_url"].'/';
                            ?>
                            <div class="productCart noneShadow">
                                <div class="cartImg"><a href="<?php echo $haberUrl; ?>"> <span><?php echo $haberRow["kategori_adi"]; ?></span> <img  class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> </a></div>
                                <div class="cartDesc">
                                    <a href="<?php echo $haberUrl; ?>"><h3> <?php echo $haberRow[$lehce."sayfa_adi"];?> </h3></a>
                                    <!-- <div class="authorPost">
                                        <div class="authorImg"> <img src="<?php echo TEMA_URL;?>ast/img/author1.png" alt=""> </div>
                                        <div class="authorDesc">
                                            <a href="#">Hakan ARDINÇ</a>
                                            <span>Yazar</span>
                                        </div>
                                    </div>-->
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
        <!--
        <?php
        $haberQuery = $db->query("SELECT * FROM haberkategori INNER JOIN makaleler ON portkat=kategori_id INNER JOIN uyeler ON uye_id=sayfa_yazar WHERE kategori_durum=1 AND sayfa_yazar='$yazarid' GROUP BY kategori_id
        ");
        if( $haberQuery->rowCount() ){
        foreach($haberQuery as $haberRow){
        $haberkatUrl = LURL.HBURL."/".$haberRow["kategori_id"]."/".$haberRow["kategori_url"];
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
                            $haberaltxy11 = $db->query("SELECT * FROM makaleler INNER JOIN haberkategori ON kategori_id=portkat WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND sayfa_yazar='$yazarid' ORDER BY sayfa_tarih DESC LIMIT 30");
                            if( $haberaltxy11->rowCount() ){
                            foreach($haberaltxy11 as $haberRowxy11){
                            $haberUrl = LURL.HABER.$haberRowxy11["sayfa_url"].'/';
                            ?>
                            
                            <div class="productCart noneShadow">
                                <div class="cartImg"><a href="<?php echo $haberUrl; ?>"> <span><?php echo $haberRow["kategori_adi"] ?></span> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$haberRowxy11["sayfa_resim"];?>" alt="<?php if($haberRowxy11["resim_baslik"]){ echo $haberRowxy11["resim_baslik"] ;}else{ echo $haberRowxy11["sayfa_adi"];} ?>"> </a></div>
                                <div class="cartDesc">
                                    <a href="<?php echo $haberUrl; ?>"><h3><?php echo $haberRowxy11["sayfa_adi"];?> </h3></a>
                                    <div class="authorPost">
                                        <div class="authorImg"> <img src="<?php echo TEMA_URL;?>ast/img/author1.png" alt=""> </div>
                                        <div class="authorDesc">
                                            <a href="#">Hakan ARDINÇ</a>
                                            <span>Yazar</span>
                                        </div>
                                    </div>
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
        -->
        
        <?php require_once(TEMA_INC.'inc/footer.php');?>
        <!-- Theme Script -->
        <?php require_once(TEMA_INC.'inc/alt.php');?>
    </body>
</html>