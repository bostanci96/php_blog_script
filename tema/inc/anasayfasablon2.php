<?php
$haberQuery = $db->query("SELECT * FROM galerikategori WHERE kategori_durum=1 AND kat_anasayfa=1 ORDER BY sira_no ASC ");
if( $haberQuery->rowCount() ){ ?>
<section id="products">
    <div class="container">
        <div class="row">
            <div class="">
                <div class="cartList"><?php
                    foreach($haberQuery as $haberRow){
                    $haberkatUrl = LURL.GBURL."/".$haberRow["kategori_id"]."_".$haberRow["kategori_url"];
                    $haberkatid = $haberRow["kategori_id"];
                    $limitverlan = $haberRow["kat_secenek_limiti"];
                    $siralama="";
                    $limitler=$haberRow["kat_secenek_limiti"];
                    if ($haberRow["kat_icerik_siralama"]=="DESC") {
                    $siralama="ORDER BY sayfa_tarih DESC";
                    }else if ($haberRow["kat_icerik_siralama"]=="populer") {
                    $siralama="and makale_durum_pop='on' ORDER BY sayfa_tarih DESC";
                    }
                    ?>
                    <?php if ($haberRow["kat_anasayfa_sablon"]==1) { ?>
                    <section id="products">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="cartList">
                                        <?php
                                        $haber12 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 and portkat='$haberkatid' ".$siralama." LIMIT ".$limitverlan." ");
                                        if( $haber12->rowCount() ){
                                        foreach($haber12 as $haberRowx12){
                                        $haberUrl = LURL.GALERİ.$haberRowx12["sayfa_url"].'/';
                                        ?>
                                        
                                        <div class="productCart">
                                            <div class="cartImg"><a target="_blank" href="<?php echo $haberUrl; ?>"> <span><?php echo $haberRow["kategori_adi"] ?></span> <img width="310" height="175" class="img-fluid lazyload" src="<?=URL.'images/lazy.png'?>" data-src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowx12["sayfa_resim"];?>" alt="<?php if($haberRowx12["resim_baslik"]){ echo $haberRowx12["resim_baslik"] ;}else{ echo $haberRowx12["sayfa_adi"];} ?>"> </a></div>
                                            <div class="cartDesc pb18">
                                                <a target="_blank" href="<?php echo $haberUrl; ?>"><h3> <?php echo $haberRowx12["sayfa_adi"];?> </h3></a>
                                                <div class="cartDate"> <img src="<?php echo TEMA_URL;?>ast/img/clock.png" alt="" width="13" height="13"> <?php echo tarih($haberRowx12["sayfa_tarih"]);?></div>
                                                <div class="cartScore">
                                                    <div class='rating-stars text-center'>
                                                        <ul id='stars'>
                                                            <li class='star <?php if($haberRowx12["makale_yildiz_say"]==1 OR $haberRowx12["makale_yildiz_say"]==2 OR $haberRowx12["makale_yildiz_say"]==3 OR $haberRowx12["makale_yildiz_say"]==4 OR $haberRowx12["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='1'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star <?php if($haberRowx12["makale_yildiz_say"]==2 OR $haberRowx12["makale_yildiz_say"]==3 OR $haberRowx12["makale_yildiz_say"]==4 OR $haberRowx12["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='2'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star <?php if($haberRowx12["makale_yildiz_say"]==3 OR $haberRowx12["makale_yildiz_say"]==4 OR $haberRowx12["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='3'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star <?php if($haberRowx12["makale_yildiz_say"]==4 OR $haberRowx12["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='4'>
                                                                <i class='fa fa-star fa-fw'></i>
                                                            </li>
                                                            <li class='star <?php if($haberRowx12["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='5'>
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
                    
                    <?php }else if ($haberRow["kat_anasayfa_sablon"]==2) { ?>
                    <section id="categories">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="catOutline">
                                        <div class="themeCatTitle">
                                            <img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" width="25" height="25" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>"> <?php echo $haberRow["kategori_adi"] ?>
                                        </div>
                                        <div class="prodCartKapsar">
                                            <?php
                                            $haberaltxy11 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 and portkat='$haberkatid'  ".$siralama." LIMIT ".$limitverlan." ");
                                            if( $haberaltxy11->rowCount() ){
                                            foreach($haberaltxy11 as $haberRowxy11){
                                            $haberUrl = LURL.GALERİ.$haberRowxy11["sayfa_url"].'/';
                                            ?>
                                            
                                            
                                            
                                            <div class="productCartv2">
                                                <div class="cartImgv2"><a target="_blank" href="<?php echo $haberUrl; ?>"> <img class="img-fluid lazyload" src="<?=URL.'images/lazy.png'?>" data-src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy11["sayfa_resim"];?>" alt="<?php if($haberRowxy11["resim_baslik"]){ echo $haberRowxy11["resim_baslik"] ;}else{ echo $haberRowxy11["sayfa_adi"];} ?>"> </a></div>
                                                <div class="cartDescv2">
                                                    <div class="cartDatev2"> <img src="<?php echo TEMA_URL;?>ast/img/clock.png" alt="" width="13" height="13"><?php echo tarih($haberRowxy11["sayfa_tarih"]);?></div>
                                                    <div class="cartScorev2">
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
                                                    <a target="_blank" href="<?php echo $haberUrl; ?>"><h3>  <?php echo $haberRowxy11["sayfa_adi"];?>  </h3></a>
                                                </div>
                                            </div>
                                            
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }else if ($haberRow["kat_anasayfa_sablon"]==3) { ?>
                    <section id="poem">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="catOutline">
                                        <div class="themeCatTitle">
                                            <img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" width="25" height="25" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>"> <?php echo $haberRow["kategori_adi"] ?>
                                        </div>
                                        <div class="poemContainer">
                                            <?php
                                            $haberaltxy44 = $db->query("SELECT * FROM makalegaleri INNER JOIN uyeler ON uye_id=sayfa_yazar WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 and portkat='$haberkatid' ".$siralama." LIMIT ".$limitverlan." ");
                                            if( $haberaltxy44->rowCount() ){
                                            foreach($haberaltxy44 as $haberRowxy44){
                                            if ($haberRowxy44["uye_kadisecimi"]==1) {
                                            $yazaradi = $haberRowxy44["uye_kadi"];
                                            }else{
                                            $yazaradi = $haberRowxy44["uye_ad"]." ".$haberRowxy44["uye_soyad"];
                                            }
                                            $haberUrl = LURL.GALERİ.$haberRowxy44["sayfa_url"].'/';
                                            ?>
                                            
                                            <div class="poemCard">
                                                <div class="poemImg">
                                                    <a target="_blank" href="<?php echo $haberUrl; ?>"><img class="img-fluid lazyload" src="<?=URL.'images/lazy.png'?>" data-src="<?php echo URL.'images/makalegaleri/thumb/'.$haberRowxy44["sayfa_resim"];?>" alt="<?php if($haberRowxy44["resim_baslik"]){ echo $haberRowxy44["resim_baslik"] ;}else{ echo $haberRowxy44["sayfa_adi"];} ?>"></a>
                                                </div>
                                                <div class="poemDesc">
                                                    <a target="_blank" href="<?php echo $haberUrl; ?>"><p><?php echo mb_substr($haberRowxy44["sayfa_adi"],0,25);?> </p></a>
                                                    <a target="_blank" href="<?php echo URL.YAZAR; ?><?php echo $haberRowxy44["uye_id"]; ?>_<?php echo $haberRowxy44["uye_url"]; ?>"><span><?php echo $yazaradi; ?></span></a>
                                                    <div class="cornerKapsar">
                                                        <div class="cornerDate"> <img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt="" width="13" height="13"> <?php echo tarih($haberRowxy44["sayfa_tarih"]);?> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <?php } } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }else if ($haberRow["kat_anasayfa_sablon"]==4) { ?>
                    <section id="healthSlider">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="catOutline">
                                        <div class="themeCatTitle">
                                            <img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" width="25" height="25" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>"> <?php echo $haberRow["kategori_adi"] ?>
                                            <a class="linkR" href="<?php echo $haberkatUrl; ?>"><?php echo $blokRowdil["desc6"]; ?></a>
                                        </div>
                                        <div class="catSliders3">
                                            <ul class="owl-carousel owl-theme">
                                                <?php
                                                $haberaltxy77 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() and portkat='$haberkatid'  ".$siralama." LIMIT ".$limitverlan." ");
                                                if( $haberaltxy77->rowCount() ){
                                                foreach($haberaltxy77 as $haberRowxy77){
                                                $haberUrl = LURL.GALERİ.$haberRowxy77["sayfa_url"].'/';
                                                ?>
                                                <li> <a target="_blank" href="<?php echo $haberUrl; ?>"> <img class="img-fluid owl-lazy" data-src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy77["sayfa_resim"];?>" alt="<?php if($haberRowxy77["resim_baslik"]){ echo $haberRowxy77["resim_baslik"] ;}else{ echo $haberRowxy77["sayfa_adi"];} ?>"> <h2> <?php echo $haberRowxy77["sayfa_adi"];?> </h2> </a> </li>
                                                
                                                <?php } } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }else if ($haberRow["kat_anasayfa_sablon"]==5) { ?>
                    <section id="categories">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="catOutline">
                                        <div class="themeCatTitle">
                                            <img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" width="25" height="25" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>"> <?php echo $haberRow["kategori_adi"] ?>
                                        </div>
                                        <div class="prodCartKapsar">
                                            <?php
                                            $haberaltxy99 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() and portkat='$haberkatid' ".$siralama." LIMIT ".$limitverlan." ");
                                            if( $haberaltxy99->rowCount() ){
                                            foreach($haberaltxy99 as $haberRowxy99){
                                            $haberUrl = LURL.GALERİ.$haberRowxy99["sayfa_url"].'/';
                                            ?>
                                            <div class="productCartv2">
                                                <div class="cartImgv2"><a target="_blank" href="<?php echo $haberUrl; ?>"> <img class="img-fluid lazyload" src="<?=URL.'images/lazy.png'?>" data-src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy99["sayfa_resim"];?>" alt="<?php if($haberRowxy99["resim_baslik"]){ echo $haberRowxy99["resim_baslik"] ;}else{ echo $haberRowxy99["sayfa_adi"];} ?>"> </a></div>
                                                <div class="cartDescv2">
                                                    <div class="cartDatev2"> <img src="<?php echo TEMA_URL;?>ast/img/clock.png" alt="" width="13" height="13">  <?php echo tarih($haberRowxy99["sayfa_tarih"]);?></div>
                                                    <div class="cartScorev2">
                                                        <div class='rating-stars text-center'>
                                                            <ul id='stars'>
                                                                <li class='star <?php if($haberRowxy99["makale_yildiz_say"]==1 OR $haberRowxy99["makale_yildiz_say"]==2 OR $haberRowxy99["makale_yildiz_say"]==3 OR $haberRowxy99["makale_yildiz_say"]==4 OR $haberRowxy99["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='1'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star <?php if($haberRowxy99["makale_yildiz_say"]==2 OR $haberRowxy99["makale_yildiz_say"]==3 OR $haberRowxy99["makale_yildiz_say"]==4 OR $haberRowxy99["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='2'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star <?php if($haberRowxy99["makale_yildiz_say"]==3 OR $haberRowxy99["makale_yildiz_say"]==4 OR $haberRowxy99["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='3'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star <?php if($haberRowxy99["makale_yildiz_say"]==4 OR $haberRowxy99["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='4'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star <?php if($haberRowxy99["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='5'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <a target="_blank" href="<?php echo $haberUrl; ?>"><h3> <?php echo $haberRowxy99["sayfa_adi"];?> </h3></a>
                                                </div>
                                            </div>
                                            <?php } } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }else if ($haberRow["kat_anasayfa_sablon"]==7) { ?>
                    <section id="recipes" >
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="catOutline">
                                        <div class="themeCatTitle"><img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" width="25" height="25" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>" /> <?php echo $haberRow["kategori_adi"] ?></div>
                                        <div class="prodCartKapsar maxw">
                                            <?php
                                            $haber188 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() and portkat='$haberkatid' ".$siralama." LIMIT 0,2");
                                            if( $haber188->rowCount() ){
                                            foreach($haber188 as $haberRowxy188){
                                            $haberUrl = LURL.GALERİ.$haberRowxy188["sayfa_url"].'/';
                                            ?>
                                            <div class="productCartv2">
                                                <div class="cartImgv2">
                                                    <a target="_blank" href="<?php echo $haberUrl; ?>"> <img width="310" height="175" class="img-fluid lazyload" src="<?=URL.'images/lazy.png'?>" data-src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy188["sayfa_resim"];?>" alt="<?php if($haberRowxy188["resim_baslik"]){ echo $haberRowxy188["resim_baslik"] ;}else{ echo $haberRowxy188["sayfa_adi"];} ?>" /> </a>
                                                </div>
                                                <div class="cartDescv2">
                                                    <div class="cartDatev2"><img src="<?php echo TEMA_URL;?>ast/img/clock.png" alt="" width="13" height="13" />  <?php echo tarih($haberRowxy188["sayfa_tarih"]);?></div>
                                                    <div class="cartScorev2">
                                                        <div class="rating-stars text-center">
                                                            <ul id="stars">
                                                                <li class='star <?php if($haberRowxy188["makale_yildiz_say"]==1 OR $haberRowxy188["makale_yildiz_say"]==2 OR $haberRowxy188["makale_yildiz_say"]==3 OR $haberRowxy188["makale_yildiz_say"]==4 OR $haberRowxy188["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='1'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star <?php if($haberRowxy188["makale_yildiz_say"]==2 OR $haberRowxy188["makale_yildiz_say"]==3 OR $haberRowxy188["makale_yildiz_say"]==4 OR $haberRowxy188["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='2'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star <?php if($haberRowxy188["makale_yildiz_say"]==3 OR $haberRowxy188["makale_yildiz_say"]==4 OR $haberRowxy188["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='3'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star <?php if($haberRowxy188["makale_yildiz_say"]==4 OR $haberRowxy188["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='4'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                                <li class='star <?php if($haberRowxy188["makale_yildiz_say"]==5){ echo "hover selected";} ?>' data-value='5'>
                                                                    <i class='fa fa-star fa-fw'></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <a target="_blank" href="<?php echo $haberUrl; ?>"><h3><?php echo $haberRowxy188["sayfa_adi"];?></h3></a>
                                                </div>
                                            </div>
                                            <?php } } ?>
                                        </div>
                                        <div class="prodCartKapsarList catesList">
                                            <ul>
                                                <?php
                                                $haber188 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() and portkat='$haberkatid' ".$siralama." LIMIT 2,3");
                                                if( $haber188->rowCount() ){
                                                foreach($haber188 as $haberRowxy188){
                                                $haberUrl = LURL.GALERİ.$haberRowxy188["sayfa_url"].'/';
                                                ?>
                                                <li>
                                                    <a target="_blank" href="<?php echo $haberUrl; ?>">
                                                        <div class="catesImg"><img width="105" height="60" class="img-fluid lazyload" src="<?=URL.'images/lazy.png'?>" data-src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy188["sayfa_resim"];?>" alt="<?php if($haberRowxy188["resim_baslik"]){ echo $haberRowxy188["resim_baslik"] ;}else{ echo $haberRowxy188["sayfa_adi"];} ?>" /></div>
                                                        <div class="catesDesc">
                                                            <p><?php echo $haberRowxy188["sayfa_adi"];?></p>
                                                            <div class="cornerKapsar">
                                                                <div class="cornerDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt="" width="13" height="13" /> <?php echo tarih($haberRowxy188["sayfa_tarih"]);?></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                
                                                <?php } } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }else if ($haberRow["kat_anasayfa_sablon"]==8) { ?>
                    <section id="lyrics">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="catOutline">
                                        <div class="themeCatTitle">
                                            <img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" width="25" height="25" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>"> <?php echo $haberRow["kategori_adi"] ?>
                                        </div>
                                        <div class="popularLyrics">
                                            <ul>
                                                <?php
                                                $haberaltxy45 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() and portkat='$haberkatid' ".$siralama." LIMIT ".$limitverlan." ");
                                                if( $haberaltxy45->rowCount() ){
                                                $sayac=0;
                                                foreach($haberaltxy45 as $haberRowxy45){
                                                $haberUrl = LURL.GALERİ.$haberRowxy45["sayfa_url"].'/';
                                                $sayac++;
                                                ?>
                                                <li> <a target="_blank" href="<?php echo $haberUrl; ?>"> <span class="bg1"><?php echo $sayac; ?></span> <?php echo  mb_substr($haberRowxy45["sayfa_adi"],0,30);?></a> </li>
                                                <?php } } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }else if ($haberRow["kat_anasayfa_sablon"]==9) { ?>
                    <section id="productsSub">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="catOutline">
                                        <div class="themeCatTitle">
                                            <img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" width="25" height="25" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>"> <?php echo $haberRow["kategori_adi"] ?>
                                        </div>
                                        <?php
                                        $haberaltxy999 = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND secenekHaber=1 AND sayfa_tarih <= NOW() and  portkat='$haberkatid' ".$siralama." LIMIT ".$limitverlan." ");
                                        if( $haberaltxy999->rowCount() ){
                                        foreach($haberaltxy999 as $haberRowxy77){
                                        $haberUrl = LURL.GALERİ.$haberRowxy77["sayfa_url"].'/';
                                        ?>
                                        <div class="productCart noneShadow">
                                            <div class="cartImg"><a target="_blank" href="<?php echo $haberUrl; ?>"> <span><?php echo $haberRow["kategori_adi"] ?></span> <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy77["sayfa_resim"];?>" alt="<?php if($haberRowxy77["resim_baslik"]){ echo $haberRowxy77["resim_baslik"] ;}else{ echo $haberRowxy77["sayfa_adi"];} ?>"> </a></div>
                                            <div class="cartDesc">
                                                <a target="_blank" href="<?php echo $haberUrl; ?>"><h3><?php echo $haberRowxy77["sayfa_adi"];?></h3></a>
                                                <div class="cartScore">
                                                    
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
                                            </div>
                                        </div>
                                        
                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php }else if ($haberRow["kat_anasayfa_sablon"]==6) { ?>
                    <section id="multiCat" class="col-md-4">
                        <div class="container">
                            <div class="row">
                                <div class="">
                                    <div class="multiCates">
                                        <div class="catOutline catesList">
                                            <div class="themeCatTitle"><img class="img-fluid" src="<?php echo URL.'images/kategoriler/big/'.$haberRow["kategori_resim"];?>" width="25" height="25" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow["kategori_adi"];} ?>" /> <?php echo $haberRow["kategori_adi"] ?></div>
                                            <?php
                                            $haber188xx = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 and portkat='$haberkatid' ".$siralama." LIMIT 0,1");
                                            if( $haber188xx->rowCount() ){
                                            foreach($haber188xx as $haberRowxy188xx){
                                            $haberUrl = LURL.GALERİ.$haberRowxy188xx["sayfa_url"].'/';
                                            ?>
                                            <div class="catesManset">
                                                <a target="_blank" href="<?php echo $haberUrl; ?>">
                                                    <img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy188xx["sayfa_resim"];?>" alt="<?php if($haberRowxy188xx["resim_baslik"]){ echo $haberRowxy188xx["resim_baslik"] ;}else{ echo $haberRowxy188xx["sayfa_adi"];} ?>" />
                                                    <h3><?php echo $haberRowxy188xx["sayfa_adi"];?></h3>
                                                </a>
                                            </div>
                                            <?php } } ?>
                                            <ul>
                                                <?php
                                                $haber188xx = $db->query("SELECT * FROM makalegaleri WHERE sayfa_durum=1 AND sayfa_tarih <= NOW() AND secenekHaber=1 and portkat='$haberkatid' ".$siralama." LIMIT 1,3");
                                                if( $haber188xx->rowCount() ){
                                                foreach($haber188xx as $haberRowxy188xx){
                                                $haberUrl = LURL.GALERİ.$haberRowxy188xx["sayfa_url"].'/';
                                                ?>
                                                <li>
                                                    <a target="_blank" href="<?php echo $haberUrl; ?>">
                                                        <div class="catesImg"><img class="img-fluid" src="<?php echo URL.'images/makalegaleri/640x360/'.$haberRowxy188xx["sayfa_resim"];?>" alt="<?php if($haberRowxy188xx["resim_baslik"]){ echo $haberRowxy188xx["resim_baslik"] ;}else{ echo $haberRowxy188xx["sayfa_adi"];} ?>" /></div>
                                                        <div class="catesDesc">
                                                            <p><?php echo $haberRowxy188xx["sayfa_adi"];?></p>
                                                            <div class="cornerKapsar">
                                                                <div class="cornerDate"><img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt="" width="13" height="13" /><?php echo tarih($haberRowxy188xx["sayfa_tarih"]);?></div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                
                                                <?php } } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } } } ?>