<?php
error_reporting(0);
require_once("host/a.php");
if($_GET["p"]=="sifremisifirla"){

	$eposta = $_POST["s_eposta"];  
	$query = $db->query("SELECT * FROM uyeler WHERE uye_eposta = '$eposta'");

	if(empty($eposta) or !filter_var($eposta, FILTER_VALIDATE_EMAIL) ){
		echo '<div class="alert alert-warning"><strong>Başarısız !</strong> Hatalı E-posta  !</div>';exit();
	}else{  
		$yeni_sifre     = rand(10000, 99999);
		$yeni_sifre_md5 = md5($yeni_sifre);
		$update = $db->query("UPDATE uyeler SET uye_sifre = '$yeni_sifre_md5' WHERE uye_eposta = '$eposta'");
		if($update){
			$ileti = "";
			$ileti = "Lütfen Şifrenizi Başkasına Vermemeniz Gerektiğini Unutmayınız ve Şifrenizi Güvenli Tutmak Sizin Sorumluluğunuzdadır.</br>";
			$ileti .= "<br>"."Yeni şifreniz : ".$yeni_sifre."<br>";
			require '../mailer/class.phpmailer.php';
			$mail = new PHPMailer();
			$mail->IsSMTP();        
			require '../mailer/adminsifre_functions.php';
			if($mail->Send()){
				echo '<div class="alert alert-success">
				<strong>Şifreniz Sıfırlandı !</strong> Mail Yoluyla Şifreniz Gönderildi !</div>';
				echo '<script type="text/javascript">  setTimeout(function () {
					window.location.href = "'.ADMIN_URL.'"; 
				}, 4000); //will call the function after 2 secs.</script>';exit();

			}else{
				echo '<div class="alert alert-warning"><strong>Başarısız !</strong> Sıfırlanırken Sorun Oluştu !</div>';exit();
			}
		}else{ echo '<div class="alert alert-warning"><strong>Başarısız !</strong> Sisteme Kayıtlı Mail Bulunamadı !</div>';exit();
	}
}
}
require_once("app/app.login.php");
require_once("app/app.sayfa.php");
require_once("app/app.makale.php");
require_once("app/app.uyeler.php");
require_once("app/app.kategoriler.php");
require_once("app/app.urunler.php");
require_once("app/app.menuler.php");
require_once("app/app.fotograflar.php");
require_once("app/app.ayarlar.php");
require_once("app/app.iletisim.php");
require_once("app/app.linkyonlendir.php");
require_once("app/app.galerikategori.php");
require_once("app/app.galerimakale.php");
require_once("app/app.duzsayfa.php");
if($_GET["p"]=="urunSiraGuncelle"){
	$urun_id = p("urun_id");
	$sira_no = p("sira_no");
	$update = $db->prepare("UPDATE urunler SET urun_sira_no=:sira_no WHERE urun_id=:id");
	$update -> bindParam("sira_no",$sira_no,PDO::PARAM_INT);
	$update -> bindParam("id",$urun_id,PDO::PARAM_INT);
	$update -> execute();
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}


if($_GET["p"]=="kategoriSiraGuncelle"){
	$kategori_id = p("kategori_id");
	$sira_no = p("sira_no");
	$update = $db->prepare("UPDATE haberkategori SET sira_no=:sira_no WHERE kategori_id=:id");
	$update -> bindParam("sira_no",$sira_no,PDO::PARAM_INT);
	$update -> bindParam("id",$kategori_id,PDO::PARAM_INT);
	$update -> execute();
	if($update->rowCount()){
		echo 'basarili';
	}else{
		echo 'basarisiz';
	}
}

if($_GET["p"]=="urun_fiyatGuncelle"){
	$urun_id = p("urun_id");
	$urun_fiyat = p("urun_fiyat");
	$update = $db->prepare("UPDATE urunler SET urun_fiyat=:urun_fiyat WHERE urun_id=:id");
	$update -> bindParam("urun_fiyat",$urun_fiyat,PDO::PARAM_INT);
	$update -> bindParam("id",$urun_id,PDO::PARAM_INT);
	$update -> execute();
	if($update->rowCount()){
		echo 'Fiyat Başarılı Bir Şekilde Güncelledi';
	}else{
		echo 'Fiyat Güncellerken Bir Sorun Oluştu';
	}
}




?>