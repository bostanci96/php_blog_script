<?php
// .htacccess dosyasının sonun bu kodu ekle = RewriteRule ^sitemap.xml$ sitemap.php [NC,L]
header('Content-type: Application/xml; charset="utf8"', true); ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php 
require_once('../AdminGiris/host/a.php');
$galerikategori = $db->query("select * from galerikategori order by kategori_tarih desc")->fetchAll(PDO::FETCH_ASSOC);
foreach ($galerikategori as $m3): ?>
<url>
  <loc><?php echo URL; ?>/<?php echo GBURL; ?><?php echo $m3["kategori_id"]; ?>_<?php echo $m3["kategori_url"]; ?></loc>
  <lastmod><?php echo related_tarihxx($m3["kategori_tarih"]); ?></lastmod>
  <priority>1.00</priority>
</url>
<?php endforeach; ?> 
</urlset>