<div class="catOutline mt10">
    <div class="themeCatTitle">
        <img src="<?php echo TEMA_URL;?>ast/img/burc.png" alt=""> <?php echo $blokRowdil["baslik15"]; ?>
    </div>
    <div class="horoscopes pad40 imgpad">
        <ul class="owl-carousel owl-theme">
            <?php $haberQuery = $db->query("SELECT * FROM duzsayfa WHERE sayfa_durum=1 AND secenekHaber=4 AND sayfa_tarih <= NOW() ORDER BY sayfa_tarih ASC"); if( $haberQuery->rowCount() ){ foreach($haberQuery as $haberRow){ $haberUrl = LURL.DUZSAYFA.$haberRow["sayfa_url"].'/'; ?>
            <li itemscope itemtype="http://schema.org/NewsArticle">
                <meta itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo $haberUrl; ?>" />
                <a href="<?php echo $haberUrl; ?>">
                    <div class="horosImg" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                        <img class="img-fluid owl-lazy" data-src="<?php echo URL.'images/duzsayfa/thumb/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>">
                        <meta itemprop="url" content="<?php echo URL.'images/duzsayfa/thumb/'.$haberRow["sayfa_resim"];?>" />
                        <meta itemprop="width" content="640" />
                        <meta itemprop="height" content="360" />
                    </div>
                    <div class="horosTitle" itemprop="headline">
                        <?php echo $haberRow[$lehce."sayfa_adi"];?>
                        
                    </div>
                </a>
                <meta itemprop="datePublished" content="<?php echo tarih($haberRow["sayfa_tarih"]);?>" />
    <meta itemprop="dateModified" content="<?php echo tarih($haberRow["sayfa_tarih"]);?>" />
            </li>
            
            <?php } } ?>
        </ul>
    </div>
</div>