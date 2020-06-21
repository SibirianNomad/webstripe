<?php
error_reporting(E_ALL);
ini_set('display_errors','on');
$host='localhost';
$user='root';
$password='';
$dbname='my_base';
$link=mysqli_connect($host,$user,$password,$dbname) or die(mysqli_error($link));
mysqli_query($link,"SET NAMES 'utf8'");