<?php $blok = $db->query("SELECT * FROM dil_bloklar{$blokLehce}")->fetch(PDO::FETCH_ASSOC);
if(isset($_GET["aramakelime"])){
@$kelime = mb_strtolower(ters_sef_link(g("aramakelime")));
}else{
@$kelime = mb_strtolower(p("aramakelime"));
}
$tagsay = explode(",",$ayar["google_maps"]);
$say = count($tagsay);
for ($i=0; $i < $say ; $i++) {
if ($tagsay[$i]==$kelime) {
header("Location:".LURL."404");
}
}
?>
<!DOCTYPE html>
<head>
    <title><?php echo $kelime.' '.$blok["baslik2"];?> - <?php echo $ayar[$lehce."site_title"];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" itemprop="description" content="<?php echo $ayar[$lehce."site_desc"];?>" />
    <meta name="keywords" itemprop="keywords" content="<?php echo $ayar[$lehce."site_keyw"];?>" />
    <meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
    <meta name="classification" content="<?php echo $kelime.' '.$blok["baslik2"];?> - <?php echo $ayar[$lehce."site_title"];?>" />
    <meta http-equiv="content-language" content="tr" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="all" />
    <meta name="robots" content="index, follow" />
    <meta name="revisit-after" content="7 days" />
    <meta name="country" content="Türkiye" />
    <link rel="canonical" href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:title" content="<?php echo $kelime.' '.$blok["baslik2"];?> - <?php echo $ayar[$lehce."site_title"];?>" />
    <meta property="og:locale" content="tr_TR" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="<?php echo $ayar[$lehce."site_desc"];?>" />
    <meta property="og:url" content="<?php echo LURL;?>" />
    <meta property="og:site_name" content="<?php echo $kelime.' '.$blok["baslik2"];?> - <?php echo $ayar[$lehce."site_title"];?>" />
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
                                    
                                        <a itemprop="item" href="<?php echo 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>">
                                            <span itemprop="name">
                                          <?php echo $kelime; ?> - <?php echo $blokRowdil["desc2"]; ?>
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
                        <div class="searchTitle"> <h2> “ <?php echo $kelime; ?> ” <?php echo $blokRowdil["baslik3"]; ?> </h2> </div>
                        
                        <?php
                        
                        $split = explode("?page=", $_SERVER['REQUEST_URI']);
                        if($split[count($split)-1]>1){
                        $_GET['page']=$split[count($split)-1];
                        }
                        $limit = 30;
                        $query = "SELECT * FROM makaleler WHERE  sayfa_adi LIKE '%$kelime%' or sayfa_desc LIKE '%$kelime%' or sayfa_icerik LIKE '%$kelime%' or makale_etiket LIKE '%$kelime%' AND sayfa_tarih <= NOW()  GROUP BY (sayfa_id) ORDER BY sayfa_tarih  DESC";
                        $s = $db->prepare($query);
                        $s->execute();
                        
                        $total_results = $s->rowCount();
                        $total_pages = ceil($total_results/$limit);
                        if (!isset($_GET['page'])) {
                        $page = 1;
                        } else{
                        $page = $_GET['page'];
                        }
                        $starting_limit = ($page-1)*$limit;
                        $show = "SELECT * FROM makaleler WHERE sayfa_adi LIKE '%$kelime%' or sayfa_desc LIKE '%$kelime%' or sayfa_icerik LIKE '%$kelime%' or makale_etiket LIKE '%$kelime%' AND sayfa_tarih <= NOW()  GROUP BY (sayfa_id) ORDER BY sayfa_tarih DESC  LIMIT $starting_limit, $limit";
                        $r = $db->prepare($show);
                        $r->execute();
                        if ($total_results AND $kelime !="") {
                        while($res = $r->fetch(PDO::FETCH_ASSOC)):
                        $portkatid=$res["portkat"];
                        $haberkategorikont = $db->query("SELECT * FROM haberkategori WHERE kategori_id='$portkatid' ")->fetch(PDO::FETCH_ASSOC);
                        $haberUrl = LURL.HABER.$res["sayfa_url"].'/';
                        ?>
                        
                        <div class="horizCard">
                            <div class="hCardImg">
                                <img src="<?php echo URL.'images/makaleler/640x360/'.$res["sayfa_resim"];?>" class="img-fluid" alt="<?php echo $res[$lehce."resim_baslik"];?>">
                            </div>
                            <div class="hCardDesc">
                                <a href="<?php echo $haberUrl;?>"><?php echo $res[$lehce."sayfa_adi"];?></a>
                                <div class="searchAreaCont">
                                    <div class="catNameSearch"><?php echo $blokRowdil["desc3"]; ?> <a href="<?php echo LURL.HBURL."/".$haberkategorikont["kategori_id"]."_".$haberkategorikont["kategori_url"]; ?>"><span><?php echo $haberkategorikont["kategori_adi"]; ?></span></a></div>
                                    <div class="cornerDate"> <img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""> <?php echo tarih($res["sayfa_tarih"]);?> </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php }elseif (!$total_results AND $kelime !="") { ?>
                        <div style="clear: both;"></div>
                        <div class="col col-12 col-lg-12 pt-5 pb-5 mt-5 mb-5">
                            <div class="item">
                                <center>
                                <p>
                                    Üzgünüm, <?php echo @$kelime;?> ilgili bir sonuç bulamadım.
                                </p>
                                </center>
                                
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div style="clear: both;"></div>
                        <?php echo $kelime; ?>
                        <?php }
                        ?>
                        <!--
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
                        -->
                        
                        <?php require_once(TEMA_INC.'inc/burcslider.php');?>
                    </div>
                    <div class="sideRight">
                        <?php require_once(TEMA_INC.'inc/aramasag.php');?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php require_once(TEMA_INC.'inc/footer.php');?>
    <!-- Theme Script -->
    <?php require_once(TEMA_INC.'inc/alt.php');?>
</body>