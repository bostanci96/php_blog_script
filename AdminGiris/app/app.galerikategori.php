<?php


## Kategori Düzenle
if ($_GET["p"] == "galerikategori_edit")
{
    $cat_id = p("kategori_id");
    $kat_secenek = p("kat_secenek");
    $kategori_adi = p("kategori_adi");
 $kategori_urlxxx = p("kategori_url");
    if (!$kategori_urlxxx)
    {
        $kategori_urls = $kategori_adi;
    }
    else
    {
        $kategori_urls = $kategori_urlxxx;
    }
    $kategori_url = sef_link($kategori_urls);
    $kategori_desc = p("kategori_desc");
    $kat_anasayfa = p("kat_anasayfa");
    $kat_anasayfa_sablon = p("kat_anasayfa_sablon");
    $kat_icerik_siralama = p("kat_icerik_siralama");
    $kat_seo_title = p("kat_seo_title");
    $kat_seo_desc = p("kat_seo_desc");
    $kat_seo_keyw = p("kat_seo_keyw");
    $kat_secenek_limiti = p("kat_secenek_limiti");
    $en_kategori_adi = p("en_kategori_adi");
    $en_kategori_url = sef_link($en_kategori_adi);
    $en_kategori_desc = p("en_kategori_desc");
    $resim_baslik = p("resim_baslik");
    $en_resim_baslik = p("en_resim_baslik");
    $galeri_anasayfa_kont = p("galeri_anasayfa_kont");
    $ar_resim_baslik = p("ar_resim_baslik");
    $fa_resim_baslik = p("fa_resim_baslik");
    $kategori_aciklama = p("kategori_aciklama");
    $fa_kategori_adi = p("fa_kategori_adi");
    $fa_kategori_url = $kategori_url;
    $fa_kategori_desc = p("fa_kategori_desc");
    $ar_kategori_adi = p("ar_kategori_adi");
    $ar_kategori_url = $kategori_url;
    $ar_kategori_desc = p("ar_kategori_desc");
    $ust_kategori = p("ust_kategori");
    @$dosya = $_FILES["dosya"]["tmp_name"][0];
    @$dosya2 = $_FILES["dosya2"]["tmp_name"][0];
    $page_limit = p("page_limit");

    if (!$kategori_adi || !$kategori_desc)
    {
        echo 'bos-deger';
    }
    else
    {
        $update = $db->query("UPDATE galerikategori SET
            kategori_ust_id     = '$ust_kategori',
            kategori_adi        = '$kategori_adi',
                kat_secenek         = '$kat_secenek',
            kategori_desc       = '$kategori_desc',
            kategori_url        = '$kategori_url',
            kategori_aciklama       = '$kategori_aciklama',
            kat_anasayfa        = '$kat_anasayfa',
            kat_anasayfa_sablon     = '$kat_anasayfa_sablon',
            kat_icerik_siralama     = '$kat_icerik_siralama',
            galeri_anasayfa_kont     = '$galeri_anasayfa_kont',
            kat_seo_title       = '$kat_seo_title',
            kat_seo_desc        = '$kat_seo_desc',
            kat_seo_keyw        = '$kat_seo_keyw',
            kat_secenek_limiti      = '$kat_secenek_limiti',
            en_kategori_adi     = '$en_kategori_adi',
            en_kategori_desc    = '$en_kategori_desc',
            en_kategori_url     = '$en_kategori_url',
            fa_kategori_adi     = '$fa_kategori_adi',
            fa_kategori_desc    = '$fa_kategori_desc',
            fa_kategori_url     = '$fa_kategori_url',
            ar_kategori_adi     = '$ar_kategori_adi',
            ar_kategori_desc    = '$ar_kategori_desc',
            ar_kategori_url     = '$ar_kategori_url',resim_baslik='$resim_baslik',en_resim_baslik='$en_resim_baslik',ar_resim_baslik='$ar_resim_baslik',fa_resim_baslik='$fa_resim_baslik', page_limit       = '$page_limit',
            kategori_durum      = 1 WHERE kategori_id='$cat_id'");
        if (strlen($dosya) > 3)
        {
            require_once ("app-upload/app.upload.php");
            require_once ("app-upload/galerikategori_resim_edit.php");
        }
         if (strlen($dosya2) > 3)
        {
            require_once ("app-upload/app.upload.php");
            require_once ("app-upload/galerikategori_sabitresim_edit.php");
        }
        if ($update->rowCount() || $updateSuccess || $updateSuccess2)
        {
            echo 'basarili';
        }
        else
        {
            echo 'basarisiz';
        }
    }
}

## Kategori Ekle
if ($_GET["p"] == "galerikategori_add")
{
    

    $kategori_adi = p("kategori_adi");
    $kategori_urlxxx = p("kategori_url");
    if (!$kategori_urlxxx)
    {
        $kategori_urls = $kategori_adi;
    }
    else
    {
        $kategori_urls = $kategori_urlxxx;
    }
    $kategori_url = sef_link($kategori_urls);
    $kategori_desc = p('kategori_desc');
    $kat_secenek = p("kat_secenek");

    $galeri_anasayfa_kont = p("galeri_anasayfa_kont");
    $kat_anasayfa = p("kat_anasayfa");
    $kat_anasayfa_sablon = p("kat_anasayfa_sablon");
    $kat_icerik_siralama = p("kat_icerik_siralama");
    $kat_seo_title = p("kat_seo_title");
    $kat_seo_desc = p("kat_seo_desc");
    $kat_seo_keyw = p("kat_seo_keyw");
    $kat_secenek_limiti = p("kat_secenek_limiti");

    $ust_kategori = p("ust_kategori");
    $kategori_aciklama = p("kategori_aciklama");
    $dosya = $_FILES["dosya"]["tmp_name"][0];
    $resim_baslik = p("resim_baslik");

    $dosya2 = $_FILES["dosya2"]["tmp_name"][0];
    $page_limit = p("page_limit");
    if (!$kategori_adi || !$kategori_desc)
    {
        echo 'bos-deger';
    }
    else
    {
        $insert = $db->query("INSERT INTO galerikategori SET
            kategori_ust_id     = '$ust_kategori',
            kategori_adi        = '$kategori_adi',
            kategori_url        = '$kategori_url',
            kat_secenek         = '$kat_secenek',
            resim_baslik        = '$resim_baslik',
            kat_anasayfa        = '$kat_anasayfa',
            kat_anasayfa_sablon     = '$kat_anasayfa_sablon',
            kat_icerik_siralama     = '$kat_icerik_siralama',
            kat_seo_title       = '$kat_seo_title',
            galeri_anasayfa_kont     = '$galeri_anasayfa_kont',
            kat_seo_desc        = '$kat_seo_desc',
            kat_seo_keyw        = '$kat_seo_keyw',
            kat_secenek_limiti      = '$kat_secenek_limiti',
            kategori_aciklama       = '$kategori_aciklama',
            kategori_desc       = '$kategori_desc',
            page_limit       = '$page_limit',
            kategori_durum      = 1");
        if ($insert->rowCount())
        {
            $last_insert_id = $db->lastInsertId();
            if ($last_insert_id)
            {
                require_once ("app-upload/app.upload.php");
                require_once ("app-upload/galerikategori_resim_add.php");
                if ($dosya2) {
                    require_once ("app-upload/galerikategori_sabitresim_add.php");
                }
            }
            echo 'basarili';
        }
        else
        {
            echo 'basarisiz';
        }
    }
}
#Tek Kategori Sil
if ($_GET["p"] == "tek_galericat_sil")
{
    $id = p("id");
    $kontrol = $db->query("SELECT * FROM galerikategori WHERE kategori_id='$id'");
    if ($kontrol->rowCount())
    {
        $kategori = $kontrol->fetch(PDO::FETCH_ASSOC);
        $buyukResim = "../images/kategoriler/big/" . $kategori["kategori_resim"];
        $kucukResim = "../images/kategoriler/thumb/" . $kategori["kategori_resim"];
        if (isset($buyukResim))
        {
            unlink($buyukResim);
        }
        if (isset($kucukResim))
        {
            unlink($kucukResim);
        }
        $delete = $db->query("DELETE FROM galerikategori WHERE kategori_id='$id'");
        if ($delete->rowCount())
        {
            echo 'basarili';
        }
        else
        {
            echo 'basarisiz';
        }
    }
}
#Durum Değiştir
if ($_GET["p"] == "cat_galeridurum_degis")
{
    $id = p("id");
    $kontrol = $db->query("SELECT * FROM galerikategori WHERE kategori_id='$id'");
    if ($kontrol->rowCount())
    {
        $uyeRow = $kontrol->fetch(PDO::FETCH_ASSOC);
        $uyeDurum = $uyeRow["kategori_durum"];
        if ($uyeDurum == 1)
        {
            $update = $db->query("UPDATE galerikategori SET kategori_durum=0 WHERE kategori_id='$id'");
            if ($update->rowCount())
            {
                echo 'yasaklama-basarili';
            }
        }
        else
        {
            $update = $db->query("UPDATE galerikategori SET kategori_durum=1 WHERE kategori_id='$id'");
            if ($update->rowCount())
            {
                echo 'yasak-kaldirildi';
            }
        }
    }
}
if ($_GET["p"] == "tek_galericat_sabit")
{
    $id = p("id");
      $resettt = $db->query("UPDATE galerikategori SET def_kat_ayar=0");
     if ($resettt->rowCount()){
    $kontrol = $db->query("SELECT * FROM galerikategori WHERE kategori_id='$id'");
    if ($kontrol->rowCount())
    {
            $update = $db->query("UPDATE galerikategori SET def_kat_ayar=1 WHERE kategori_id='$id'");
            if ($update->rowCount())
            {
                echo 'basarili';
            }else{
                  echo 'basarisiz';
            }
        
    }
      }
}
