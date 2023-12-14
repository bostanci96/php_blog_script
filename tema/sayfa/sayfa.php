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
$sayfaControl = $db->prepare("SELECT * FROM sayfalar WHERE sayfa_url=:url AND sayfa_durum=:durum AND sayfa_tarih <= NOW()");
$sayfaControl ->bindParam("url",$urlSef,PDO::PARAM_STR,50);
$sayfaControl ->bindValue("durum",1,PDO::PARAM_INT);
$sayfaControl -> execute();
if($sayfaControl->rowCount()){
$sayfaRow = $sayfaControl->fetch(PDO::FETCH_ASSOC);
$id=$sayfaRow["sayfa_id"];
$urlx=$sayfaRow["sayfa_url"];
}else{
header("Location:".LURL."404");exit();
}
}else{
header("Location:".LURL."404");exit();
}
$hit = $db->prepare("UPDATE sayfalar SET yazi_total_hit= yazi_total_hit +1 WHERE sayfa_id=?");
$hit->execute(array($id));
$hit2 = $db->prepare("UPDATE sayfalar SET yazi_gunluk_hit= yazi_gunluk_hit +1 WHERE sayfa_id=?");
$hit2->execute(array($id));
?>
<!DOCTYPE html>
<html lang="tr-TR">
    <head>
        <title><?php if($sayfaRow["sayfa_goster1"]){ echo $sayfaRow["sayfa_goster1"]; }else{ echo $sayfaRow["sayfa_adi"]; } ?> - <?php echo $ayar[$lehce."site_title"];?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport">
        <meta name="description" itemprop="description" content="<?php if($sayfaRow["sayfa_goster2"]){ echo $sayfaRow["sayfa_goster2"]; }else{ echo $sayfaRow["sayfa_desc"]; } ?>" />
        <meta name="keywords" itemprop="keywords" content="<?php echo $sayfaRow[$lehce."sayfa_keyw"];?>" />
        <meta name="Abstract" content="<?php echo $ayar["main_tablo"];?>" />
        <meta name="classification" content="<?php if($sayfaRow["sayfa_goster1"]){ echo $sayfaRow["sayfa_goster1"]; }else{ echo $sayfaRow["sayfa_adi"]; } ?> - <?php echo $ayar[$lehce."site_title"];?>" />
        <meta http-equiv="content-language" content="tr" />
        <meta name="distribution" content="Global" />
        <meta name="robots" content="all" />
        <meta name="robots" content="index, follow" />
        <meta name="revisit-after" content="7 days" />
        <meta name="country" content="Türkiye" />
        <link rel="canonical" href="<?php echo "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:title" content="<?php if($sayfaRow["sayfa_goster1"]){ echo $sayfaRow["sayfa_goster1"]; }else{ echo $sayfaRow["sayfa_adi"]; } ?> - <?php echo $ayar[$lehce."site_title"];?>" />
        <meta property="og:locale" content="tr_TR" />
        <meta property="og:type" content="website" />
        <meta property="og:description" content="<?php if($sayfaRow["sayfa_goster2"]){ echo $sayfaRow["sayfa_goster2"]; }else{ echo $sayfaRow["sayfa_desc"]; } ?>" />
        <meta property="og:url" content="<?php echo LURL;?>" />
        <meta property="og:site_name" content="<?php if($sayfaRow["sayfa_goster1"]){ echo $sayfaRow["sayfa_goster1"]; }else{ echo $sayfaRow["sayfa_adi"]; } ?> - <?php echo $ayar[$lehce."site_title"];?>" />
        <?php require_once(TEMA_INC.'inc/ust.php');?>
    </head>
    <body>
        <?php require_once(TEMA_INC.'inc/head.php');?>
        <?php if ($sayfaRow["secenekHaber"]==3) { ?>
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
                                          <?php echo $sayfaRow[$lehce."sayfa_adi"];?>
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
        <section id="subPages">
            <div class="container borderContainer">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sidebar">
                            <ul>
                                <?php $haberQuery = $db->query("SELECT * FROM sayfalar WHERE sayfa_durum=1 AND secenekHaber=3 AND sayfa_tarih <= NOW() ORDER BY sayfa_id ASC"); if( $haberQuery->rowCount() ){ foreach($haberQuery as $haberRow){ $haberUrl = LURL.SAYFA.$haberRow["sayfa_url"].'/'; ?>
                                <li> <a class="<?php if($haberRow["sayfa_url"]==$urlx){ echo "active"; } ?>" href="<?php echo $haberUrl; ?>"> <?php echo $haberRow[$lehce."sayfa_adi"];?> </a> </li>
                                <?php } } ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="pagesDecription">
                            <h2><?php echo $sayfaRow[$lehce."sayfa_adi"];?></h2>
                           <?php echo $sayfaRow[$lehce."sayfa_icerik"];?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
         <?php }elseif ($sayfaRow["secenekHaber"]==0) { ?>
        <section id="breadcrump">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrump">
                            <ul>
                                <li> <a href="<?php echo LURL; ?>"> <?php echo $blokRowdil["desc1"]; ?> </a> </li>
                                <li> <a href="<?php echo LURL; ?><?php echo $sayfaRow[$lehce."sayfa_url"];?>/"> <?php echo $sayfaRow[$lehce."sayfa_adi"];?> </a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="subPages">
            <div class="container borderContainer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="pagesDecription">
                            <h2><?php echo $sayfaRow[$lehce."sayfa_adi"];?></h2>
                           <?php echo $sayfaRow[$lehce."sayfa_icerik"];?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 
         <?php } ?>
        <?php require_once(TEMA_INC.'inc/footer.php');?>
        <!-- Theme Script -->
        <?php require_once(TEMA_INC.'inc/alt.php');?>
    </body>
</html>