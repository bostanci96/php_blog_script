<div class="mansetArea">
    <ul class="owl-carousel owl-theme">
        <?php
        $slideQuery = $db->query("SELECT * FROM fotograflar WHERE fotograf_bolum=1 && fotograf_durum=1 ORDER BY foto_sira ASC");
        if($slideQuery->rowCount()){
        $sayac = 0;
        foreach($slideQuery as $slideRow){
        $sayac++;
        ?>
        
        <li>
            <a target="_blank" href="<?php echo $slideRow[$lehce."fotograf_href"]; ?>">
                <img class="owl-lazy" data-src="<?php echo URL.'images/photos/640x360/'.$slideRow["fotograf_src"];?>" alt="">
                <div class="mansetDesc">
                    <div class="mansetIcon"> <!--<img src="<?php echo TEMA_URL;?>ast/img/oclock.png" alt=""> --></div>
                    <div class="mansetDescription">
                        <!-- <span></span>-->
                        <h1> <?php echo $slideRow[$lehce."fotograf_shortDesc"];?></h1>
                    </div>
                </div>
            </a>
        </li>
        <?php
        }
        }
        ?>
        
    </ul>
    <div class="mobilreklam mb-2 mt-2">
        <?php echo html_entity_decode($blokRownews["baslik3"]); ?>
    </div>
</div>