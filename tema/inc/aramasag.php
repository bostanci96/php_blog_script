<div class="catOutline noneBorder">
    <div class="themeCatTitle">
        <img src="<?php echo TEMA_URL;?>ast/img/astro.png" alt=""> <?php echo $blokRowdil["baslik7"]; ?>
    </div>
    <div class="prodCartKapsar">
        <?php
        $haberQuery = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND makalekonum_aramablog='on' AND sayfa_tarih <= NOW() ORDER BY sayfa_tarih DESC LIMIT 5 ");
        if( $haberQuery->rowCount() ){
        foreach($haberQuery as $haberRow){
        $haberUrl = LURL.HABER.$haberRow["sayfa_url"].'/';
        ?>
        <div class="productCartv2" itemscope itemtype="http://schema.org/NewsArticle">
            <meta itemscope itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo $haberUrl; ?>" />
            <div class="cartImgv2" itemprop="image" itemscope itemtype="https://schema.org/ImageObject"><a href="<?php echo $haberUrl; ?>"> <img class="img-fluid" width="305" height="175" src="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" alt="<?php if($haberRow["resim_baslik"]){ echo $haberRow["resim_baslik"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"> </a>
 <meta itemprop="url" content="<?php echo URL.'images/makaleler/640x360/'.$haberRow["sayfa_resim"];?>" />
        <meta itemprop="width" content="640" />
        <meta itemprop="height" content="360" />
            </div>
            <div class="cartDescv2">
                <div class="cartDatev2"> <img src="<?php echo TEMA_URL;?>ast/img/clock2.png" alt=""><?php echo tarih($haberRow["sayfa_tarih"]);?></div>
                <div class="cartScorev2">
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
                <a href="<?php echo $haberUrl; ?>" itemprop="headline"><h3> <?php echo $haberRow[$lehce."sayfa_adi"];?></h3></a>
            </div>
             <meta itemprop="datePublished" content="<?php echo tarih($haberRow["sayfa_tarih"]);?>" />
    <meta itemprop="dateModified" content="<?php echo tarih($haberRow["sayfa_tarih"]);?>" />
        </div>
        <?php
        }
        }
        ?>
    </div>
</div>
