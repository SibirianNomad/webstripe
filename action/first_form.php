<?php
require 'init.php';
require 'createTable.php';
require 'send.php';
if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])
&& isset($_POST['num1']) && isset($_POST['num2'])){
    //mail('0491a@sibmail.com', 'Тема письма', 'Текст письма', 'ekurchenko@yahoo.com');
    //sendEmail();
    $name=$_POST['name'];
    $email=$_POST['email'];
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    $text=$_POST['text'];
    $sum=$num1+$num2;
    $tableInf=['name'=>$name,'email'=>$email,'text'=>$text,'num1'=>$num1,'num2'=>$num2,'sum'=>$sum];
//удаление ранее загруженных файлов
        $files = glob($_SERVER['DOCUMENT_ROOT'].'/webstripe/upload_files/*'); // get all file names
        foreach($files as $file){ // iterate files
        if(is_file($file))
            unlink($file); // delete file
        }
//создание таблицы excell
    creteTable($tableInf);
 //сохранение загруженных файлов
    if(isset($_FILES['fileUpload'])){
       
    
        $files      = $_FILES; // полученные файлы
        $done_files = array();
    
        // переместим файлы из временной директории в указанную
        foreach( $files as $file ){
            $file_name = $file['name'];
    
            if( move_uploaded_file( $file['tmp_name'], "../upload_files/$file_name" ) ){
                $done_files[] = realpath( "../upload_files/$file_name" );
            }
        }
    
        $data = $done_files ? array('files' => $done_files ) : array('error' => 'Ошибка загрузки файлов.');
    
    }
//проверка и создание таблицы MySQL для записи
    $query="CREATE TABLE IF NOT EXISTS `my_base`.`information` ( `id` INT NOT NULL DEFAULT '1', `name` TEXT NULL , `email` VARCHAR(256)  NULL , `text` VARCHAR(256)  NULL , `num1` INT  NULL , `num2` INT  NULL , `sum` INT  NULL  ) ENGINE = InnoDB;";
    mysqli_query($link,$query) or die(mysqli_error($link));
    $query="SELECT*FROM `information` WHERE id=1";
    $result=mysqli_query($link,$query) or die(mysqli_error($link));
    $data = mysqli_fetch_assoc($result);
    if(empty($data)){
        $query="INSERT INTO `information` (id) VALUES ('1')";
        mysqli_query($link,$query) or die(mysqli_error($link));
    }
 //создание записи в БД
    $query="UPDATE `information` SET name='$name', email='$email', text='$text', num1='$num1', num2='$num2', sum='$sum' WHERE id='1'";
    mysqli_query($link,$query) or die(mysqli_error($link));
}