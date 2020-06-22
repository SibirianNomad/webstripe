<?
require 'mail.php';

function sendEmail($email,$file){
    $mail = new Mail;
    $mail -> from('ekurchenko@yahoo.com', 'ИМЯ_ОТПРАВИТЕЛЯ');
    $mail -> to($email, 'ИМЯ_ПОЛУЧАТЕЛЯ');
    $mail -> subject = 'Рассылка c сайта';
    
    $mail -> addFile(__DIR__ . '../upload_files/table.xlsx');
    if(!empty($file)){
        foreach($file as $value){
            $mail -> addFile(__DIR__ . "../upload_files/$value");
        }
    }
    
    $mail -> body = '<h1>Здравствуйте!</h1>';
    $mail -> send();
}