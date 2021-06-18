<?php
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$model = $_POST["model"];
	$email = $_POST["email"];
	if (!empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	$domain = $_SERVER["HTTP_HOST"];
	$monthes = array(1=>"января", 2=>"февраля", 3=>"марта", 4=>"апреля", 5=>"мая", 6=>"июня", 7=>"июля", 8=>"августа", 9=>"сентября", 10=>"октября", 11=>"ноября", 12=>"декабря");
	$days = array("Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота");
	$clientTime = date("H:i:s")." - ".$days[(date("w"))]." (".date("j")." ".$monthes[(date("n"))]." ".date("Y").")";
	$mails = 'roman.kliakhin@gmail.com';
	$subject = "Новая заявка";
	$headers = "Reply-To: Отправитель <info@$domain>\r\n"; 
	$headers .= "Return-Path: Отправитель <info@$domain>\r\n"; 
	$headers .= "From: <info@$domain>\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=\"utf-8\" \r\n";
	$headers .= "X-Priority: 3\r\n";
	$headers .= "X-Mailer: PHP".phpversion()."\r\n";
	$mailBody = "<table border='1' style='border-collapse:collapse; border:1px solid #000; font:14px Helvetica; width:660px; margin-left:10px;'>
	<tr>
		<td colspan='2' width='600' style='font-size:18px; padding:7px; color:#fff; background: #8f0000;'><strong>Данные Заказчика</strong></td>
	</tr>
	<tr>
		<td width='200' style='padding:10px; background:#ececec;'>Имя:</td>
		<td width='400' style='padding:10px;'>$name</td>
	</tr>
	<tr>
		<td width='200' style='padding:10px; background:#ececec;'>Телефон:</td>
		<td width='400' style='padding:10px;'>$phone</td>
	</tr>
	<tr>
		<td width='200' style='padding:10px; background:#ececec;'>Товар:</td>
		<td width='400' style='padding:10px;'>$model</td>
	</tr>
	<tr>
		<td width='200' style='padding:10px; background:#ececec;'>Email подписка:</td>
		<td width='400' style='padding:10px;'>$email</td>
	</tr>
	<tr>
		<td width='200' style='padding:10px; background:#ececec;'>Время оформления заказа:</td>
		<td width='400' style='padding:10px;'>$clientTime</td>
	</tr>
	<tr>
		<td colspan='2' height='1' bgcolor='#8f0000' nowrap></td>
	</tr>
	<tr>
		<td width='200' style='padding:10px; background:#ececec;'>IP-адрес:</td>
		<td width='400' style='padding:10px;'><span style='color:#8f0000;'>$ip</span></td>
	</tr>
	</table><br/>";
	mail($mails, $subject, $mailBody, $headers);
	header('Location: success.html');
?>