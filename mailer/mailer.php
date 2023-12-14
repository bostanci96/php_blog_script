<?php
require_once('../AdminGiris/host/a.php');
require_once('../AdminGiris/host/f.php');

if(isset($_POST["anasayfa"])){

}elseif(isset($_POST["username"])){
	$username = p("username");
	$phone = p("phone");
	$email = p("email");
	$message = p("message");
	$gelen_ip = GetIP();
	if(empty($username) || empty($phone) || empty($email) || empty($message)){
		echo "bos-deger";
	}else{
		$ileti ="Merhaba Yönetici; <br>Satın Alma Formundan Bir Yeni Mesaj Alıdın. Detaylar aşağıdaki gibidir;";
		$ileti .=  "<br><p><strong><h4><u>Gönderilen Mesaj Detayları</u></h4></strong></p>";
		$ileti .= "<b>Ad Soyad :</b> ".$username."<br>";
		$ileti .= "<b>Telefon :</b> ".$phone."<br>";
		$ileti .= "<b>E-Posta :</b> ".$email."<br>";
		$ileti .= "<b>Mesaj  :</b> ".$message."<br>";
		$ileti .= "<h5><u>Bu mesaj <b>".$gelen_ip."</b> numaralı ip adresinden gönderildi !</u></h5>";
		require 'class.phpmailer.php';
		$mail = new PHPMailer();
		require 'mail_functions_2.php';
		if($mail->Send()){
			echo "basarili";
			die();
		}else{
			echo 'basarisiz';
		}
	}
}