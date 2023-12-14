<?php
require_once('host/a.php');
    if(empty($_SESSION["login"])){go(ADMIN_URL."pin.php");die();}
function exportExcel($filename='ExportExcel',$columns=array(),$data=array(),$replaceDotCol=array()){
    header('Content-Encoding: UTF-8');
    header('Content-Type: text/plain; charset=utf-8'); 
    header("Content-disposition: attachment; filename=".$filename.".xls");
    echo "\xEF\xBB\xBF"; // UTF-8 BOM
      
    $say=count($columns);
      
    echo '<table border="1"><tr>';
    foreach($columns as $v){
        echo '<th style="background-color:#FFA500">'.trim($v).'</th>';
    }
    echo '</tr>';
  
    foreach($data as $val){
        echo '<tr>';
        for($i=0; $i < $say; $i++){
  
            if(in_array($i,$replaceDotCol)){
                echo '<td>'.str_replace('.',',',$val[$i]).'</td>';
            }else{
                echo '<td>'.$val[$i].'</td>';
            }
        }
        echo '</tr>';
    }

    return 1;

}

/* TANIMLAMALAR */
 
$columns=array();
 
$data=array();
 
/*
 $replaceDotCol
 Decimal kolonlardaki noktayı (.) virgüle (,) dönüştürüelecek kolon numarası belirtilmelidir.
 Örneğin; Kolon 4'ün verilerinde nokta değilde virgül görülmesini istiyorsanız
 ilgili kolonun array key numarasını belirtmelisiniz. İlk kolonun key numarası 0'dır.
*/
$replaceDotCol=array(3); 
 
 
/* Sütun Başlıkları */
$columns=array(
    'Sayfa Id',
    'Ekleme Tarihi',
    'Sayfa Adı',
    'Kategori Adı',
    'Sayfa Url',
    'Yazar',
    'Etiketler',
    'Total Hit'
);
              

$kquery = $db->query("SELECT * FROM makalegaleri INNER JOIN galerikategori ON kategori_id=portkat INNER JOIN uyeler ON uye_id=sayfa_yazar ORDER BY sayfa_tarih DESC");

foreach($kquery as $verirow):
if ($verirow["uye_kadisecimi"]==1) {
                                        $yazaradi = $verirow["uye_kadi"];
                                        }else{
                                        $yazaradi = $verirow["uye_ad"]." ".$verirow["uye_soyad"];
                                        }

    $data[]=array(
        $verirow['sayfa_id'],
        $verirow['sayfa_tarih'],
        $verirow['sayfa_adi'],
        $verirow['kategori_adi'],
        URL.GALERİ.$verirow["sayfa_url"],
        $yazaradi,
        $verirow['makale_etiket'],
        $verirow['yazi_total_hit']
    );
endforeach;
 
exportExcel($ayar["site_title"]."-Galeri",$columns,$data,$replaceDotCol);





                     ?> 
    