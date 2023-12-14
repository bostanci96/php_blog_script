<?php
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; 
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = $ayar["gsmtp"];
$mail->Port = $ayar["gport"];
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet ="utf-8";
$mail->Username = $ayar["gmailkullanici"]; 
$mail->Password = $ayar["gmailkullanicisifre"];
  $mail->SetFrom($ayar["gmailkullanicisifre"], $ayar["site_title"]); // Mail attigimizda yazacak isim


  $mail->AddAddress($ayar["gemail"], $ayar["site_title"]);


  $mail->CharSet = 'UTF-8';


  $mail->Subject = $ayar["site_title"].' İletişim Formu';


  $mail->MsgHTML($ileti);


