<?
require __DIR__.'/vendor/autoload.php';

$title = "Заголовок письма";
$body = "
<h2>Новое письмо</h2>
<b>Имя:</b> gegreg<br>
<b>Почта:</b> ergeg<br><br>
<b>Сообщение:</b><br>ergegeg
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    //$mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'smtp.mail.yahoo.com'; // SMTP сервера вашей почты
    $mail->Username   = 'ekurchenko@yahoo.com'; // Логин на почте
    $mail->Password   = 'Faraon25'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('ekurchenko@yahoo.com', 'Имя отправителя'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('0491a@sibmail.com');  

   
// Отправка сообщения
$mail->isHTML(true);
$mail->Subject = $title;
$mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
echo json_encode(["result" => $result, "resultfile" => $rfile, "status" => $status]);

?>
