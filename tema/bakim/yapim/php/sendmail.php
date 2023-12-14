<?php  

$dosya_adi = "maillistesi.txt"; 

$deger = $_POST["email"]; 

$yazilacak_deger = "$deger\n"; 

if ($deger) {  

if (!file_exists($dosya_adi)){  
   
touch($dosya_adi); 
chmod($dosya_adi,0666); 
   
} 

$dosyaya_baglanti = fopen($dosya_adi,"a+"); 

if (!fwrite($dosyaya_baglanti,$yazilacak_deger)){ 
echo "Abone Olamadın."; 
exit; 

}  

echo "Tamamdır. Abone Oldun."; 

} else { 

echo "Abone Olamadın."; 

} 

?>