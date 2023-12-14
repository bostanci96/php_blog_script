<?php echo !defined("ADMIN") ? die('error: 404 !') : null; ?>
<?php
function classActive($par = null, $get = null)
{
if ($par==$get)
{
echo 'active';
}
}
?>
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
	<div class="navbar-header">
		<ul class="nav navbar-nav flex-row">
			<li class="nav-item mr-auto">
				<a class="navbar-brand" target="_blank" href="<?php echo URL; ?>">
					<img style=" height: 28px;" src="<?php echo URL; ?>images/<?php echo $ayar["logo"]; ?>" alt="<?php echo $ayar["site_title"]; ?>">
				</a>
			</li>
			<li class="nav-item nav-toggle">
				<a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
					<i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
				</a>
			</li>
		</ul>
	</div>
	<div class="shadow-bottom"></div>
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<li class=" nav-item">
				<a target="_blank" href="<?php echo URL; ?>">
					<i class="feather icon-home"></i><span class="menu-title" data-i18n="menu levels">Siteyi Görüntüle</span>
				</a>
				
			</li>
			<li class=" nav-item">
				<a href="<?php ADMIN_URL; ?>index.php">
					<i class="feather icon-home"></i><span class="menu-title" data-i18n="menu levels">Admin Panel</span>
				</a>
				
			</li>
			<?php if ($_SESSION["uye_rutbe"]==0)
			{ ?>
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">İçerik Yönetimi</span>
				</a>
				<ul class="menu-content">
					<li class='<?php classActive('kategoriler3', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=kategoriler3">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Kategoriler</span>
						</a>
					</li>
					<li  class='<?php classActive('kategori_ekle3', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=kategori_ekle3">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Kategori Ekle</span>
						</a>
					</li>
					<li  class='<?php classActive('sayfalar2', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=sayfalar2">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Yazılar</span>
						</a>
					</li>
					<li   class='<?php classActive('sayfa_ekle3', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=sayfa_ekle3">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">İçerik Ekle</span>
						</a>
					</li>
				</ul>
			</li>
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Galeri Yönetimi</span>
				</a>
				<ul class="menu-content">
					<li class='<?php classActive('kategoriler4', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=kategoriler4">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Kategoriler</span>
						</a>
					</li>
					<li  class='<?php classActive('kategori_ekle4', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=kategori_ekle4">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Kategori Ekle</span>
						</a>
					</li>
					<li  class='<?php classActive('galeri_sayfalar', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=galeri_sayfalar">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Galeriler</span>
						</a>
					</li>
					<li   class='<?php classActive('galeri_sayfa_ekle', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=galeri_sayfa_ekle">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Galeri Ekle</span>
						</a>
					</li>
				</ul>
			</li>
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Düz İçerik Yönetimi</span>
				</a>
				<ul class="menu-content">
					<li  class='<?php classActive('duzsayfalar', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=duzsayfalar">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Sayfalar</span>
						</a>
					</li>
					<li   class='<?php classActive('duzsayfa_ekle', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=duzsayfa_ekle">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Düz İçerik Ekle</span>
						</a>
					</li>
				</ul>
			</li>
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Sayfalar</span>
				</a>
				<ul class="menu-content">
					<li  class='<?php classActive('sayfalar', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=sayfalar">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Sayfalar</span>
						</a>
					</li>
					<li   class='<?php classActive('sayfa_ekle', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=sayfa_ekle">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Sayfa Ekle</span>
						</a>
					</li>
				</ul>
			</li>
			<li  class='<?php classActive('burclar', @$_GET['sayfa']); ?>'>
				<a href="index.php?sayfa=burclar">
					<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Günlük Burçlar</span>
				</a>
			</li>
			
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-user"></i><span class="menu-title" data-i18n="Menu Levels">Kullanıcılar</span>
				</a>
				<ul class="menu-content">
					<li class='<?php classActive('kullanicilar', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=kullanicilar">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Kullanıcılar</span>
						</a>
					</li>
					<li class='<?php classActive('kullanicisifre', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=kullanicisifre">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Şifre İşlemleri</span>
						</a>
					</li>
					<li  class='<?php classActive('kullanici_ekle', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=kullanici_ekle">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Kullanıcı Ekle</span>
						</a>
					</li>
				</ul>
			</li>
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-image"></i><span class="menu-title" data-i18n="Menu Levels">Manşet Ayarları</span>
				</a>
				<ul class="menu-content">
					<li class='<?php classActive('slider', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=slider">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Manşetler</span>
						</a>
					</li>
					<li  class='<?php classActive('slider_ekle', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=slider_ekle">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Manşet Ekle</span>
						</a>
					</li>
				</ul>
			</li>
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-grid"></i><span class="menu-title" data-i18n="Menu Levels">Menü Yönetimi</span>
				</a>
				<ul class="menu-content">
					<li class='<?php classActive('menuler', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=menuler">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Menüler</span>
						</a>
					</li>
					<li  class='<?php classActive('menu_ekle', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=menu_ekle">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span>
						</a>
					</li>
				</ul>
			</li>
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-external-link"></i><span class="menu-title" data-i18n="Menu Levels">301 Yönlendirme</span>
				</a>
				<ul class="menu-content">
					<li class='<?php classActive('yonlendirmeler', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=yonlendirmeler">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Yönlendirmeler</span>
						</a>
					</li>
					<li  class='<?php classActive('yonlendirme_ekle', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=yonlendirme_ekle">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span>
						</a>
					</li>
				</ul>
			</li>
				<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-external-link"></i><span class="menu-title" data-i18n="Menu Levels">Reklamlar</span>
				</a>
				<ul class="menu-content">
					<li class='<?php classActive('reklamlar', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=reklamlar">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Reklamlar</span>
						</a>
					</li>
					<li  class='<?php classActive('reklam_ekle', @$_GET['sayfa']); ?>'>
						<a href="index.php?sayfa=reklam_ekle">
							<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span>
						</a>
					</li>
				</ul>
			</li>
			<li  class='<?php classActive('gunluk_hit_list', @$_GET['sayfa']); ?>'>
				<a href="index.php?sayfa=gunluk_hit_list">
					<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Günlük İçerik Hit</span>
				</a>
			</li>
			<li  class='<?php classActive('gunluk_galeri_hit_list', @$_GET['sayfa']); ?>'>
				<a href="index.php?sayfa=gunluk_galeri_hit_list">
					<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Günlük Galeri Hit</span>
				</a>
			</li>
			<li  class='<?php classActive('gunluk_burc_hit_list', @$_GET['sayfa']); ?>'>
				<a href="index.php?sayfa=gunluk_burc_hit_list">
					<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Günlük Burç Hit</span>
				</a>
			</li>
			<li  class='<?php classActive('gunluksabit_hit_list', @$_GET['sayfa']); ?>'>
				<a href="index.php?sayfa=gunluksabit_hit_list">
					<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Günlük Düz Sayfa Hit</span>
				</a>
			</li>
			<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-settings"></i><span class="menu-title" data-i18n="Menu Levels">Ayarlar</span>
				</a>
				<ul class="menu-content">
					<li class='<?php classActive('ayarlar.anasayfa', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=ayarlar.anasayfa">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Reklam Alanları</span>
						</a>
					</li>
					<li class='<?php classActive('ayarlar.anasayfasablon', @$_GET['sayfa']); ?>' >
						<a href="index.php?sayfa=ayarlar.anasayfasablon">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Site Renk Ayarları</span>
						</a>
					</li>
				</li>
				<li class='<?php classActive('ayarlar.lokaydi', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.lokaydi">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Log İşlemleri</span>
					</a>
				</li>
				
				<li class='<?php classActive('ayarlar.sosyalmedya', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.sosyalmedya">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Sosyal Medya</span>
					</a>
				</li>
				<li class='<?php classActive('ayarlar.dil', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.dil">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Dil Dosyası</span>
					</a>
				</li>
				<li class='<?php classActive('ayarlar.iletisim', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.iletisim">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Header Kod Alanı</span>
					</a>
				</li>
				<!--<li class='<?php classActive('ayarlar.dil2', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.dil2">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">2. Dil Dosyası</span>
					</a>
				</li>
				
				<li class='<?php classActive('ayarlar.mail', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.mail">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">İletişim Mail Ayarları</span>
					</a>
				</li>-->
				<li class='<?php classActive('ayarlar.seo', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.seo">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Seo Ayarları</span>
					</a>
				</li>
				<li class='<?php classActive('ayarlar.logo', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.logo">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Logo</span>
					</a>
				</li>
				<li class='<?php classActive('ayarlar.icerikara', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=ayarlar.icerikara">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">İçerik Arama</span>
					</a>
				</li>
				
				<li class='<?php classActive('bakim', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=bakim">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Bakım Modu</span>
					</a>
				</li>
				
			</ul>
		</li>
		<li class=" nav-item">
				<a href="javascript:void(0);">
					<i class="feather icon-external-link"></i><span class="menu-title" data-i18n="Menu Levels">İçerik Excel Export</span>
				</a>
				<ul class="menu-content">
					<li  >
						<a href="yazilaridisaaktar.php">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Yazıları Dışa Aktar</span>
						</a>
					</li>
					<li  >
						<a href="galerileridisaaktar.php">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Galerileri Dışa Aktar</span>
						</a>
					</li>
						<li  >
						<a href="duzsayfadisaaktar.php">
							<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Düz Sayfaları Dışa Aktar</span>
						</a>
					</li>
					
				</ul>
			</li>
		<?php
		}
		elseif ($_SESSION["uye_rutbe"]==1)
		{ // Admin
		?>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">İçerik Yönetimi</span>
			</a>
			<ul class="menu-content">
				<li class='<?php classActive('kategoriler3', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=kategoriler3">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Kategoriler</span>
					</a>
				</li>
				<li  class='<?php classActive('kategori_ekle3', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=kategori_ekle3">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Kategori Ekle</span>
					</a>
				</li>
				<li  class='<?php classActive('sayfalar2', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=sayfalar2">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Yazılar</span>
					</a>
				</li>
				<li   class='<?php classActive('sayfa_ekle3', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=sayfa_ekle3">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">İçerik Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Galeri Yönetimi</span>
			</a>
			<ul class="menu-content">
				<li class='<?php classActive('kategoriler4', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=kategoriler4">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Kategoriler</span>
					</a>
				</li>
				<li  class='<?php classActive('kategori_ekle4', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=kategori_ekle4">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Kategori Ekle</span>
					</a>
				</li>
				<li  class='<?php classActive('galeri_sayfalar', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=galeri_sayfalar">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Galeriler</span>
					</a>
				</li>
				<li   class='<?php classActive('galeri_sayfa_ekle', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=galeri_sayfa_ekle">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Galeri Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Düz İçerik Yönetimi</span>
			</a>
			<ul class="menu-content">
				<li  class='<?php classActive('duzsayfalar', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=duzsayfalar">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Sayfalar</span>
					</a>
				</li>
				<li   class='<?php classActive('duzsayfa_ekle', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=duzsayfa_ekle">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Sayfa Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Sayfalar</span>
			</a>
			<ul class="menu-content">
				<li  class='<?php classActive('sayfalar', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=sayfalar">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Sayfalar</span>
					</a>
				</li>
				
				
				<li   class='<?php classActive('sayfa_ekle', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=sayfa_ekle">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<li  class='<?php classActive('burclar', @$_GET['sayfa']); ?>'>
			<a href="index.php?sayfa=burclar">
				<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Günlük Burçlar</span>
			</a>
		</li>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-image"></i><span class="menu-title" data-i18n="Menu Levels">Manşet Ayarları</span>
			</a>
			<ul class="menu-content">
				<li class='<?php classActive('slider', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=slider">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Manşetler</span>
					</a>
				</li>
				<li  class='<?php classActive('slider_ekle', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=slider_ekle">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-external-link"></i><span class="menu-title" data-i18n="Menu Levels">301 Yönlendirme</span>
			</a>
			<ul class="menu-content">
				<li class='<?php classActive('yonlendirmeler', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=yonlendirmeler">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Yönlendirmeler</span>
					</a>
				</li>
				<li  class='<?php classActive('yonlendirme_ekle', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=yonlendirme_ekle">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Yeni Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
		}
		elseif ($_SESSION["uye_rutbe"]==2)
		{ // Editör
		?>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">İçerik Yönetimi</span>
			</a>
			<ul class="menu-content">
				<li  class='<?php classActive('sayfalar2', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=sayfalar2">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Yazılar</span>
					</a>
				</li>
				<li   class='<?php classActive('sayfa_ekle3', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=sayfa_ekle3">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">İçerik Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Galeri Yönetimi</span>
			</a>
			<ul class="menu-content">
				<li  class='<?php classActive('galeri_sayfalar', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=galeri_sayfalar">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Galeriler</span>
					</a>
				</li>
				<li   class='<?php classActive('galeri_sayfa_ekle', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=galeri_sayfa_ekle">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Galeri Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
		}
		elseif ($_SESSION["uye_rutbe"]==3)
		{ // Yazar
		?>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">İçerik Yönetimi</span>
			</a>
			<ul class="menu-content">
				<li  class='<?php classActive('sayfalar2', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=sayfalar2">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Yazılar</span>
					</a>
				</li>
				<li   class='<?php classActive('sayfa_ekle3', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=sayfa_ekle3">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">İçerik Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
		}
		elseif ($_SESSION["uye_rutbe"]==4)
		{ // Bot
		?>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">İçerik Yönetimi</span>
			</a>
			<ul class="menu-content">
				<li  class='<?php classActive('sayfalar2', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=sayfalar2">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Tüm Yazılar</span>
					</a>
				</li>
				<li   class='<?php classActive('sayfa_ekle3', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=sayfa_ekle3">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">İçerik Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<li class=" nav-item">
			<a href="javascript:void(0);">
				<i class="feather icon-calendar"></i><span class="menu-title" data-i18n="Menu Levels">Galeri Yönetimi</span>
			</a>
			<ul class="menu-content">
				<li  class='<?php classActive('galeri_sayfalar', @$_GET['sayfa']); ?>' >
					<a href="index.php?sayfa=galeri_sayfalar">
						<i class="feather icon-align-justify"></i><span class="menu-item" data-i18n="Second Level">Galeriler</span>
					</a>
				</li>
				<li   class='<?php classActive('galeri_sayfa_ekle', @$_GET['sayfa']); ?>'>
					<a href="index.php?sayfa=galeri_sayfa_ekle">
						<i class="feather icon-plus-square"></i><span class="menu-item" data-i18n="Second Level">Galeri Ekle</span>
					</a>
				</li>
			</ul>
		</li>
		<?php
		} ?>
	</ul>
</div>
</div>