<?php
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
$mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
$mail->SMTPSecure = 'ssl'; // Normal bağlantı için tls , güvenli bağlantı için ssl yazın
$mail->Host = "srvc189.turhost.com"; // Mail sunucusunun adresi (IP de olabilir)
$mail->Port = 465; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "info@sentaks.net"; // Gönderici adresinizin sunucudaki kullanıcı adı (e-posta adresiniz)
$mail->Password = "4bJ$@DC9"; // Mail adresimizin sifresi
$mail->SetFrom($_POST["email"], $_POST["name"]); // Mail atıldığında gorulecek isim ve email (genelde yukarıdaki username kullanılır)
$mail->AddAddress("seenone@gmail.com"); // Mailin gönderileceği alıcı adres
$mail->Subject = $_POST["subject"]; // Email konu başlığı
$mail->Body = $_POST["message"]; // Mailin içeriği
if(!$mail->Send()){
	echo "Email Gönderim Hatasi: ".$mail->ErrorInfo;
} else {
	echo "Email Gonderildi";
}
?>