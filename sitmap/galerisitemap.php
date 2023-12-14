<?php
// .htacccess dosyasının sonun bu kodu ekle = RewriteRule ^sitemap.xml$ sitemap.php [NC,L]
header('Content-type: Application/xml; charset="utf8"', true); ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<?php 
require_once('../AdminGiris/host/a.php');
$galeri = $db->query("select * from makalegaleri where sayfa_tarih <= NOW() order by sayfa_tarih desc")->fetchAll(PDO::FETCH_ASSOC);
foreach ($galeri as $m2): ?>
<url>
  <loc><?php echo URL; ?><?php echo GALERİ; ?><?php echo $m2["sayfa_url"]; ?>/</loc>
  <lastmod><?php echo related_tarihxx($m2["sayfa_tarih"]); ?></lastmod>
  <priority>1.00</priority>
</url>
<?php endforeach; ?>
</urlset>