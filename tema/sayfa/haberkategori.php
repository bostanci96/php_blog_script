<?php $blok = $db->query("SELECT * FROM dil_bloklar{$blokLehce}")->fetch(PDO::FETCH_ASSOC); ?>
<?php
if(isset($_GET["kategori"])){
$urunGet = $_GET["kategori"];
$kategori = explode ("_",$urunGet);
$kategoriid=$kategori[0];
@$kategoriurl=$kategori[1];
$kategoriControl = $db->prepare("SELECT * FROM haberkategori WHERE kategori_id=:id AND kategori_url=:url AND kategori_durum=:durum");
$kategoriControl ->bindParam("id",$kategoriid,PDO::PARAM_INT);
$kategoriControl ->bindParam("url",$kategoriurl,PDO::PARAM_STR);
$kategoriControl ->bindValue("durum",1,PDO::PARAM_INT);
$kategoriControl ->execute();
if( $kategoriControl->rowCount() ){
$kategoriRow = $kategoriControl->fetch(PDO::FETCH_ASSOC);
if ($kategoriRow[$lehce."kat_seo_title"]) {
$title     = $kategoriRow[$lehce."kat_seo_title"];
}else{
$title     = $kategoriRow[$lehce."kategori_adi"];
}
if ($kategoriRow[$lehce."kat_seo_desc"]) {
$description = $kategoriRow[$lehce."kat_seo_desc"];
}else{
$description = $kategoriRow[$lehce."kategori_desc"];
}
if ($kategoriRow[$lehce."kat_seo_keyw"]) {
$keyws = $kategoriRow[$lehce."kat_seo_keyw"];
}else{
$keyws = $ayar[$lehce."site_keyw"];
}
$checked   = true;
$kategori_id = $kategoriRow["kategori_id"];
$kategori_ust_id = $kategoriRow["kategori_ust_id"];
}else{
header("Location:".LURL."404");exit();
}
}else{
header("Location:".LURL."404");exit();
}

$tagsay = explode(",",$ayar["google_maps"]);
$say = count($tagsay);
for ($i=0; $i < $say ; $i++) {
if ($tagsay[$i]==$kategoriurl) {
header("Location:".LURL."404");
}
}
 $split = explode("?page=", $_SERVER['REQUEST_URI']);
                                if($split[count($split)-1]>1){
                           $page =     $_GET['page']=$split[count($split)-1];
                                }else{
                                    $page = 1;
                                }
?>
<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <title><?php echo $title;?> (<?php echo $kategoriRow["page_limit"]; ?> sayfadan <?php echo $page; ?>. sayfa)</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="description" itemprop="description" content="<?php echo $description;?>" />
        <meta name="keywords" itemprop="keywords" content="<?php echo $keyws;?>" />
        <meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
        <meta name="classification" content="<?php echo $title;?> - <?php echo $ayar[$lehce."site_title"];?>" />
        <meta http-equiv="content-language" content="tr" />
        <meta name="distribution" content="Global" />
        <meta name="robots" content="all" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 days" />
        <meta name="country" content="Türkiye" />
        <link rel="canonical" href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:title" content="<?php echo $title;?> - <?php echo $ayar[$lehce."site_title"];?>" />
        <meta property="og:locale" content="tr_TR" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php echo $description;?>" />
        <meta property="og:url" content="<?php echo LURL;?>" />
        <meta property="og:site_name" content="<?php echo $title;?> - <?php echo $ayar[$lehce."site_title"];?>" />
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
                                    
                                    <a itemprop="item" href="<?php echo URL.HBURL."/".$kategoriRow["kategori_id"]."_".$kategoriRow["kategori_url"];?>/">
                                        <span itemprop="name">
                                            <?php echo $kategoriRow[$lehce."kategori_adi"];?>
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
        <section id="categories">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="catOutline">
                            <div class="themeCatTitle">
                                <img src="<?PHP echo URL;?>images/kategoriler/big/<?php echo $kategoriRow["kategori_resim"];?>" class="img-fluid" alt="<?php echo $kategoriRow[$lehce."resim_baslik"];?>"> <span class="kategoriTitle"> <?php echo $kategoriRow[$lehce."kategori_adi"];?></span>
                            </div>
                            <div class="themeCatTitle">
                                <p><?php echo $kategoriRow[$lehce."kategori_aciklama"];?></p>
                            </div>
                            <div class="prodCartKapsar">
                                <?php
                               
                                $limit = 30;
                                $query = "SELECT * FROM makaleler WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 AND portkat='$urunGet' ORDER BY sayfa_tarih DESC";
                                $s = $db->prepare($query);
                                $s->execute();
                                $total_results = $s->rowCount();
                                $total_pages = ceil($total_results/$limit);
                                if ($total_pages>$kategoriRow["page_limit"]) {
                                $total_pages = $kategoriRow["page_limit"];
                                }
                                if (!isset($_GET['page'])) {
                                $page = 1;
                                } else{
                                $page = $_GET['page'];
                                }
                                $starting_limit = ($page-1)*$limit;
                                $show = "SELECT * FROM makaleler WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 AND portkat='$urunGet'   ORDER BY sayfa_tarih DESC LIMIT $starting_limit, $limit";
                                $r = $db->prepare($show);
                                $r->execute();
                                while($res = $r->fetch(PDO::FETCH_ASSOC)):
                                $haberUrl = LURL.HABER.$res["sayfa_url"].'/'
                                ?>
                                <div class="productCartv2" itemscope itemtype="http://schema.org/NewsArticle">
                                    <meta itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo $haberUrl;?>" />
                                    <meta itemprop="datePublished" content="<?php echo tarih($res["sayfa_tarih"]);?>" />
                                    <meta itemprop="dateModified" content="<?php echo tarih($res["sayfa_tarih"]);?>" />
                                    <div class="cartImgv2" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><a href="<?php echo $haberUrl;?>"> <img class="img-fluid" src="<?php echo URL.'images/makaleler/640x360/'.$res["sayfa_resim"];?>" alt="<?php if($res["resim_baslik"]){ echo $res["resim_baslik"] ;}else{ echo $res[$lehce."sayfa_adi"];} ?>"> </a>
                                    <meta itemprop="url" content="<?php echo URL.'images/makaleler/640x360/'.$res["sayfa_resim"];?>" />
                                    <meta itemprop="width" content="640" />
                                    <meta itemprop="height" content="360" />
                                </div>
                                <div class="cartDescv2">
                                    <div class="cartDatev2"> <img src="<?php echo TEMA_URL;?>ast/img/clock.png" alt="<?php echo tarih($res["sayfa_tarih"]);?>"> <?php echo tarih($res["sayfa_tarih"]);?></div>
                                    <div class="cartScorev2">
                                        <div class='rating-stars text-center'>
                                            <ul id='stars'>
                                                <li class='star <?php if($res["makale_yildiz_say"]==1 OR $res["makale_yildiz_say"]==2 OR $res["makale_yildiz_say"]==3 OR $res["makale_yildiz_say"]==4 OR $res["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='1'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star <?php if($res["makale_yildiz_say"]==2 OR $res["makale_yildiz_say"]==3 OR $res["makale_yildiz_say"]==4 OR $res["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='2'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star <?php if($res["makale_yildiz_say"]==3 OR $res["makale_yildiz_say"]==4 OR $res["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='3'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star <?php if($res["makale_yildiz_say"]==4 OR $res["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='4'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                                <li class='star <?php if($res["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='5'>
                                                    <i class='fa fa-star fa-fw'></i>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <a href="<?php echo $haberUrl;?>"><h3 itemprop="headline"> <?php echo $res[$lehce."sayfa_adi"];?> </h3></a>
                                </div>
                            </div>
                            
                            
                            <?php endwhile; ?>
                            <!-- start pagination -->
                            <div style="clear: both;"></div>
                            
                            <div class="col-12 text-center margin-100px-top md-margin-50px-top position-relative wow animate__fadeInUp">
                                <nav class="pagination text-small text-uppercase text-extra-dark-gray justify-content-center">
                                    <center>
                                    <ul class="pagination">
                                        <?php if($page>1){ ?>
                                        <li  class="page-item"><a  class="page-link" href="?page=<?php echo $page-1;?>"><i class="fas fa-long-arrow-alt-left margin-5px-right"></i> </a></li>
                                        <?php } for ($i=$page; $i <=$total_pages ; $i++){ ?>
                                        <?php if($i==$page){ ?>
                                        
                                        <li class="page-item active"><a  class="page-link" href="javascript:void(0);"><?php echo $i;?></a></li>
                                        <?php }else{ ?>
                                        <li  class="page-item"><a  class="page-link" href='?page=<?php echo $i;?>'><?php echo $i;?></a></li>
                                        <?php   } } if ($total_pages>$page) { ?>
                                        <li  class="page-item"><a  class="page-link" href="?page=<?php echo $page+1;?>"><i class="fas fa-long-arrow-alt-right margin-5px-left"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                    </center>
                                </nav>
                            </div>
                            <!-- end pagination -->
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