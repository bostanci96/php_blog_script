<section id="horoscope">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="catOutline">
                    <div class="themeCatTitle">
                        <img src="<?php echo TEMA_URL;?>ast/img/burc.png" width="25" height="25" alt=""> <?php echo $blokRowdil["desc5"]; ?>
                    </div>
                    <div class="horoscopes pad40">
                        <ul class="owl-carousel owl-theme">
                            <?php
                            $haberQuery = $db->query("SELECT * FROM burclar WHERE sayfa_durum=1 AND secenekHaber=1 ORDER BY sayfa_id DESC");
                            if( $haberQuery->rowCount() ){
                            foreach($haberQuery as $haberRow){
                            $haberUrl = LURL.ASTRO.$haberRow["sayfa_url"].'/';
                            ?>
                            <li>
                                <a href="<?php echo $haberUrl; ?>">
                                    <div class="horosImg">
                                    <img width="130" height="75" class="img-fluid owl-lazy" data-src="<?php echo URL.'images/burclaricon/big/'.$haberRow["sayfa_resim2"];?>" alt="<?php if($haberRow["makalekonum_footeryazi"]){ echo $haberRow["makalekonum_footeryazi"] ;}else{ echo $haberRow[$lehce."sayfa_adi"];} ?>"></div>
                                    <div class="horosTitle">
                                        <?php echo $haberRow[$lehce."sayfa_adi"];?>
                                        
                                    </div>
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
    </div>
</section>

