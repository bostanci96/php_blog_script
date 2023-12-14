<section id="kategoriSlider">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="catSliders">
                    <ul class="owl-carousel owl-theme"  >
                        <?php
                        $haberQuery = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND makalekonum_ustslider='on' AND sayfa_tarih <= NOW() ORDER BY sayfa_tarih DESC LIMIT 12 ");
                        if( $haberQuery->rowCount() ){
                        foreach($haberQuery as $haberRow){
                        $ustId = $haberRow["portkat"];
                        $ustCatQuery = $db->query("SELECT * FROM haberkategori WHERE kategori_id='$ustId'");
                        if($ustCatQuery->rowCount()){
                        $ustKatRow = $ustCatQuery->fetch(PDO::FETCH_ASSOC);
                        $ustKat = $ustKatRow["kategori_adi"];
                        $katURL = LURL.HBURL."/".$ustKatRow["kategori_id"]."_".$ustKatRow["kategori_url"];
                        }
                        $haberUrl = LURL.HABER.$haberRow["sayfa_url"].'/';
                        ?>
                        
                        
                        <li itemscope itemtype="http://schema.org/NewsArticle">
                            <meta itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo $haberUrl; ?>" />
                            <a  target="_blank" href="<?php echo $haberUrl; ?>">
                                <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                                    <img width="235" height="130" class="owl-lazy" data-src="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>">
                                    <meta itemprop="url" content="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" />
                                    <meta itemprop="width" content="640" />
                                    <meta itemprop="height" content="360" />
                                </div>
                                <span class="modala"> <?php echo  $ustKat; ?> </span>
                                <h2 itemprop="headline"> <?php echo $haberRow[$lehce."sayfa_adi"];?> </h2>
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