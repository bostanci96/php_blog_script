

<section id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="headerNav">
                    <div class="takvim">
                        <img src="<?php echo TEMA_URL;?>ast/img/clock.png" alt="" width="13" height="13">
                        <?php echo bugunungunu(date("w"))." ".date("d-m-Y");  ?>
                    </div>
                    <div class="slidertextArea">
                        <div class="newTitle"> <?php  echo $blokRowdil["baslik4"];?> </div>
                        <div class="sliderOwlDesc">
                            <div class="owl-carousel text owl-theme">
                                <?php
                                $haberQuery = $db->query("SELECT * FROM makaleler WHERE sayfa_durum=1 AND secenekHaber=1 AND makalekonum_yeni='on' ORDER BY sayfa_tarih DESC LIMIT 15");
                                if( $haberQuery->rowCount() ){
                                foreach($haberQuery as $haberRow){
                                $haberUrl = LURL.HABER.$haberRow["sayfa_url"].'/';
                                ?>
                                <div class="item">
                                    <a target="_blank" href="<?php echo $haberUrl; ?>">
                                        <?php echo mb_substr($haberRow["sayfa_adi"],0,70);?>
                                        
                                    </a>
                                </div>
                                <?php
                                }
                                }?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="searchArea" itemscope itemtype="https://schema.org/WebSite">
                        <meta itemprop="url" content="<?php echo URL; ?>"/>
                        <form itemprop="potentialAction" itemscope itemtype="https://schema.org/SearchAction" action="<?php echo URL.'search';?>" method="POST" >
                            <meta itemprop="target" content="<?php echo URL.'search';?>/{aramakelime}"/>
                            <input itemprop="query-input"  type="search" name="aramakelime" placeholder="<?php echo $blokRowdil["baslik1"]; ?>">
                            <button type="submit"> <img src="<?php echo TEMA_URL;?>ast/img/search.png" width="13" height="13" alt=""> </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="headerMenu">
                    <div class="logo">
                        <a href="<?php echo LURL; ?>" title="<?php echo $ayar["site_title"];?>"> <img src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" width="148"  alt="<?php echo $ayar["site_title"];?>"> </a>
                    </div>
                    <div class="menuArea">
                        <ul>
                            <?php
                            $url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                            $menuQuery = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=0 ORDER BY menu_sira ASC");
                            if ($menuQuery->rowCount()){
                            $numb = 0;
                            foreach ($menuQuery as $menuRow){
                            if ($url == $menuRow[$lehce . "menu_href"]){ $linkactive = "activeaa"; }else{ $linkactive = null; }
                            echo '<li class="' . $linkactive . '"><a  href="' . $menuRow[$lehce . "menu_href"] . '">' . $menuRow[$lehce . "menu_baslik"] . '</a></li>';
                            $numb++;
                            }
                            }
                            ?>
                            <li><a class="submenu" href="javascript:void(0);"> <img width="16" height="12" src="<?php echo TEMA_URL;?>ast/img/menu.png" alt=""> </a>
                            <div class="openMenu">
                                <ul>
                                    <?php
                                    $url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                                    $menuQuery = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=5 ORDER BY menu_sira ASC");
                                    if ($menuQuery->rowCount()){
                                    $numb = 0;
                                    foreach ($menuQuery as $menuRow){
                                    if ($url == $menuRow[$lehce . "menu_href"]){ $linkactive = "activeaa"; }else{ $linkactive = null; }
                                    echo '<li class="' . $linkactive . '"><a  href="' . $menuRow[$lehce . "menu_href"] . '">' . $menuRow[$lehce . "menu_baslik"] . '</a></li>';
                                    $numb++;
                                    }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12">
            <div class="barLinks">
                <ul>
                    <?php
                    $url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                    $menuQueryalt = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=1 ORDER BY menu_sira ASC");
                    if ($menuQueryalt->rowCount()){
                    $numb = 0;
                    foreach ($menuQueryalt as $menuRowalt){
                    if ($url == $menuRowalt[$lehce . "menu_href"]){ $linkactivealt = "activeaa"; }else{ $linkactivealt = null; }
                    echo '<li class="' . $linkactivealt . '"><a href="' . $menuRowalt[$lehce . "menu_href"] . '">' . $menuRowalt[$lehce . "menu_baslik"] . '</a></li>';
                    $numb++;
                    }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</section>
<section id="mobileHeader">
<div class="mobileContainer">
    <div class="themeMobil">
        <nav class="navbar navbar-expand-lg navbar-light">
            
            <div class="logoMobile">
                <a href="<?php echo LURL; ?>" title="<?php echo $ayar["site_title"];?>"> <img src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" width="148"  alt="<?php echo $ayar["site_title"];?>"> </a>
            </div>
            <div class="searchMobile">
                <div class="searchIcon"> <img src="<?php echo TEMA_URL;?>ast/img/research.png"  width="13" height="13" alt=""></div>
                <div class="" id="install-app" > <img src="<?php echo URL;?>images/play.png" alt=""></div>
                <div class="searchArea"  itemscope itemtype="https://schema.org/WebSite">
                    <meta itemprop="url" content="<?php echo URL; ?>"/>
                    <form action="<?php echo URL.'search';?>" method="post" >
                        <meta itemprop="target" content="<?php echo URL.'search';?>/{aramakelime}"/>
                        <input itemprop="query-input"  type="search" name="aramakelime" placeholder="<?php echo $blokRowdil["baslik1"]; ?>">
                        <button type="submit"> <img src="<?php echo TEMA_URL;?>ast/img/search.png" width="13" height="13" alt=""> </button>
                    </form>
                </div>
                
            </div>
            <div id="mySidenav" class="sidenav">
                <div class="canvaside">
                    <div><img src="<?php echo URL;?>images/<?php echo $ayar["logo"];?>" width="148"  alt="<?php echo $ayar["site_title"];?>"><a class="closebtn" href="javascript:void(0)" onclick="closeNav()">&times;</a></div>
                    <?php
                    $url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                    $menuQuerymobil = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=0 OR menu_type=5 ORDER BY menu_sira ASC");
                    if ($menuQuerymobil->rowCount()){
                    $numb = 0;
                    foreach ($menuQuerymobil as $menuRowmobil){
                    if ($url == $menuRowmobil[$lehce . "menu_href"]){ $linkactive = "activeaa"; }else{ $linkactive = null; }
                    echo '<a href="' . $menuRowmobil[$lehce . "menu_href"] . '">' . $menuRowmobil[$lehce . "menu_baslik"] . '</a>';
                    $numb++;
                    }
                    }
                    ?>
                </div>
            </div>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            
        </nav>
    </div>
</div>
<div class="barLinks">
    <ul>
        <?php
        $url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
        $menuQuerymobil2 = $db->query("SELECT * FROM menuler WHERE menu_durum=1 and menu_ust=0 and menu_type=6 ORDER BY menu_sira ASC");
        if ($menuQuerymobil2->rowCount()){
        $numb = 0;
        foreach ($menuQuerymobil2 as $menuRow2){
        if ($url == $menuRow2[$lehce . "menu_href"]){ $linkactive = "activeaa"; }else{ $linkactive = null; }
        echo '<li class="' . $linkactive . '"><a target="_blank" href="' . $menuRow2[$lehce . "menu_href"] . '">' . $menuRow2[$lehce . "menu_baslik"] . '</a></li>';
        $numb++;
        }
        }
        ?>
    </ul>
</div>
</section>