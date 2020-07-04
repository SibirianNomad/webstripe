<?php
require '../vendor/autoload.php';
require '../App/App.php';

if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['text'])
    && isset($_POST['num1']) && isset($_POST['num2']) ){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $text = $_POST['text'];
    $sum = $num1+$num2;
    $tableInf=['name' => $name,'email' => $email,'text' => $text,'num1' => $num1,'num2' => $num2,'sum' => $sum];

//создание таблицы excell
    creteTable($tableInf);
//отправка email
    sendEmail($name,$email);
        
//проверка и создание таблицы MySQL для записи
    $query = "CREATE TABLE IF NOT EXISTS $dbname.`information` ( `id` INT NOT NULL DEFAULT '1', `name` TEXT NULL , `email` VARCHAR(256)  NULL , `text` VARCHAR(256)  NULL , `num1` INT  NULL , `num2` INT  NULL , `sum` INT  NULL  ) ENGINE = InnoDB;";
    mysqli_query($link,$query) or die(mysqli_error($link));
    $query = "SELECT*FROM `information` WHERE id=1";
    $result = mysqli_query($link,$query) or die(mysqli_error($link));
    $data = mysqli_fetch_assoc($result);
    if(empty($data)){
        $query = "INSERT INTO `information` (id) VALUES ('1')";
        mysqli_query($link,$query) or die(mysqli_error($link));
    }
 //создание записи в БД
    $query = "UPDATE `information` SET name='$name', email='$email', text='$text', num1='$num1', num2='$num2', sum='$sum' WHERE id='1'";
    mysqli_query($link,$query) or die(mysqli_error($link));
}