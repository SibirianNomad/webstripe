<?php
session_start(); 
//выгрузка записис из БД
require 'init.php';
require 'messageFormate.php';
$query="SELECT*FROM `Information` WHERE id=1";
$result=mysqli_query($link,$query) or die(mysqli_error($link));
$data = mysqli_fetch_assoc($result);
if(!empty($data)){
   $_SESSION['name']=$data['name'];
    $_SESSION['email']=$data['email'];
    $_SESSION['num1']=$data['num1'];
    $_SESSION['num2']=$data['num2'];
    $_SESSION['text']=$data['text'];
    $_SESSION['sum']=$data['sum'];
//вывод каждой второй буквы элемента массива
    $arr=[$data['name'],$data['email'],$data['text']];
    $newArr='';
    foreach($arr as $value){
        $arr1=str_split($value);
        $newString=[];
        foreach($arr1 as $key=>$value1){
            if($key%2!=0){
                if($value1!=' ' && ctype_alpha($value1)==true){
                    $newString[]=$value1;
                }else{
                    $newString[]='_';
                }
                
            }
        }
        $newArr.=implode('',$newString);
    }
    $_SESSION['merged']=$newArr;
    $first_element=str_split ($arr[0]);
//длинна первого элемента массива прописью
    $text = num_of_words(count($first_element));
    $_SESSION['length']=$text;
//сумма элементов массива в столбик
    $arr=[$data['num1'],$data['num2'],$data['sum']];
    $arrSum=array_sum($arr);
    $stringArr=str_split(strval($arrSum));
    $_SESSION['sum_column']='';
    foreach($stringArr as $value){
        $_SESSION['sum_column'].=strval($value).'<br>';
    }

}
header('Location: /webstripe');
