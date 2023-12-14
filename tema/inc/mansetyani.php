<div class="mansetRight">
    <div class="gundemHaberleri">
        <div class="gundemTitle"> <img width="25" height="25" src="<?php echo TEMA_URL;?>ast/img/edit.png" alt=""> <?php echo $blokRowdil["desc4"]; ?> </div>
        <?php
        $haberQuery = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND makalekonum_mansetyani='on' AND sayfa_tarih <= NOW() ORDER BY sayfa_tarih DESC LIMIT 0,1 ");
        if( $haberQuery->rowCount() ){
            $sayacLazy=0;
        foreach($haberQuery as $haberRow){
            $sayacLazy++;
        $haberUrl = LURL.HABER.$haberRow["sayfa_url"].'/';
        ?>
        <div class="gundemImg" itemscope itemtype="http://schema.org/NewsArticle">
            <meta itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo $haberUrl; ?>" />
            <a target="_blank" href="<?php echo $haberUrl; ?>">
                <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                    <img width="310" height="200" <?=($sayacLazy==1)? 'class="img-fluid"' : 'class="lazyload" src="'.URL.'images/lazy.png" data-'; ?>src="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>">
                    <meta itemprop="url" content="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" />
                    <meta itemprop="width" content="310" />
                    <meta itemprop="height" content="200" />
                </div>
                <div class="gundemDesc"  itemprop="headline">
                    <?php echo $haberRow[$lehce."sayfa_adi"];?>
                </div>
            </a>
            <meta itemprop="datePublished" content="<?php echo tarih($haberRow["sayfa_tarih"]);?>" />
            <meta itemprop="dateModified" content="<?php echo tarih($haberRow["sayfa_tarih"]);?>" />
        </div>
        <?php
        }
        }?>
    </div>
    <div class="cornerNewsArea">
        
        <?php
        $haberQuery = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND makalekonum_mansetyani='on' AND sayfa_tarih <= NOW() ORDER BY sayfa_tarih DESC LIMIT 1,2 ");
        if( $haberQuery->rowCount() ){
        foreach($haberQuery as $haberRow){
        $haberUrl = LURL.HABER.$haberRow["sayfa_url"].'/';
        ?>
        
        <div class="cornerNews" itemscope itemtype="http://schema.org/NewsArticle">
            <meta itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo $haberUrl; ?>" />
            <div class="cornerImg" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <a target="_blank" href="<?php echo $haberUrl; ?>">
                    <img width="100" height="50" class="img-fluid lazyload" src="<?=URL.'images/lazy.png'?>" data-src="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>">
                </a>
                <meta itemprop="url" content="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" />
                <meta itemprop="width" content="100" />
                <meta itemprop="height" content="50" />
            </div>
            <div class="cornerKapsar">
                <a target="_blank" href="<?php echo $haberUrl; ?>">
                    <div class="cornerDesc" itemprop="headline"><?php echo $haberRow[$lehce."sayfa_adi"];?></div>
                    <!--<div class="cornerDate"> <img src="<?php echo TEMA_URL;?>ast/img/clock2.png"> <?php echo tarih($haberRow["sayfa_tarih"]);?></div>
                -->  </a>
            </div>
            <meta itemprop="datePublished" content="<?php echo tarih($haberRow["sayfa_tarih"]);?>" />
            <meta itemprop="dateModified" content="<?php echo tarih($haberRow["sayfa_tarih"]);?>" />
        </div>
        
        <?php
        }
        }?>
    </div>
</div>