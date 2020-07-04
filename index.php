<?
session_start();
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');
// setlocale(LC_ALL, 'Russian_Russia.1251');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>WebStripe</title>
<meta name='viewport' content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="css/jquery.fancybox.min.css" type="text/css" media="screen" >
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/carousel.css">
<link rel="stylesheet" href="css/style.css">

	
</head>
<body>
<script type="text/javascript" src="js/carousel.js"></script>
    <div class='m-3 p-3'>
        
    <p class='text-right'>Евгений Курченко</p>
    <h1  class='text-center'>ТЕСТОВОЕ ЗАДАНИЕ WEBSTRIPE</h1>
    <div id="carousel">
  <figure id="spinner">
  <img   src="https://instagram.fuln9-1.fna.fbcdn.net/v/t51.2885-15/e35/s480x480/45493016_138383270472575_3413528900122553152_n.jpg?_nc_ht=instagram.fuln9-1.fna.fbcdn.net&amp;_nc_cat=111&amp;_nc_ohc=fy8xpKZ810cAX8aMYMQ&amp;oh=6dc39325353be53975a136c22f98109d&amp;oe=5F17C030">
  <img  src="https://instagram.fuln9-1.fna.fbcdn.net/v/t51.2885-15/e35/54226384_1950227421772876_8351826763623483991_n.jpg?_nc_ht=instagram.fuln9-1.fna.fbcdn.net&amp;_nc_cat=104&amp;_nc_ohc=ZjmAGX8IIP8AX_sq6yZ&amp;oh=37175098e6bfc70387a3438fa7e5eaa3&amp;oe=5F1B7E3F">
  <img  src="https://instagram.fuln9-1.fna.fbcdn.net/v/t51.2885-15/e35/51226445_385583958938758_4124171221060616685_n.jpg?_nc_ht=instagram.fuln9-1.fna.fbcdn.net&amp;_nc_cat=110&amp;_nc_ohc=RhpNz_6JxpkAX8OLxUA&amp;oh=2ad49252ade55334ea30691e4e236d82&amp;oe=5F1821A4">
  <img   src="https://instagram.fuln9-1.fna.fbcdn.net/v/t51.2885-15/e35/42434657_1169730956501602_5546007552308781072_n.jpg?_nc_ht=instagram.fuln9-1.fna.fbcdn.net&amp;_nc_cat=110&amp;_nc_ohc=OqZCYReoXOIAX9adVuj&amp;oh=5525904efca5fb801bc5ae73c7a74061&amp;oe=5F183F04">
  <img  src="https://instagram.fuln9-1.fna.fbcdn.net/v/t51.2885-15/e35/19761160_209217309602119_9008897063903035392_n.jpg?_nc_ht=instagram.fuln9-1.fna.fbcdn.net&amp;_nc_cat=107&amp;_nc_ohc=mZtWSEQ4U1YAX9bTDAQ&amp;oh=535fdb452af17e0f2606cfdad7518a4d&amp;oe=5F1A4530">
  <img  src='https://instagram.fhel6-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/53848952_410627046400472_5149098460212551747_n.jpg?_nc_ht=instagram.fhel6-1.fna.fbcdn.net&_nc_cat=108&_nc_ohc=-eMaz7WpUgYAX-K6-Xc&oh=459b301ae1ccf62d647fbff5fc9f066b&oe=5F254063'>
  <img  src="https://instagram.fhel3-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/77109924_638120450263434_4513205245451097427_n.jpg?_nc_ht=instagram.fhel3-1.fna.fbcdn.net&amp;_nc_cat=106&amp;_nc_ohc=i96ZWUJ4X1cAX9by14L&amp;oh=12a0b4d36e8fdbf3616d0bf511e5a839&amp;oe=5F265350">
  <img  src="https://instagram.fhel6-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/35459698_259060841507057_9222299669420310528_n.jpg?_nc_ht=instagram.fhel6-1.fna.fbcdn.net&amp;_nc_cat=105&amp;_nc_ohc=CDsVInE9mCwAX_-6Dyh&amp;oh=fa9d9d3733fe8c40d7f6a462fc4e7bd7&amp;oe=5F26684E">
  </figure>
</div>
<span style="float:left" class="ss-icon" onclick="galleryspin('-')">&lt;</span>
<span style="float:right" class="ss-icon" onclick="galleryspin('')">&gt;</span>
    <div class='container'>
        <div class="row">
            <div class='col-sm'>
                <form method='POST' action='action/firstForm.php' id='first_form' enctype="multipart/form-data">
                    <h4 class='text-center'>Форма</h1>
                    <input type='text' name='name' placeholder='Имя' class='form-control'>
                    <input type='text' name='email' placeholder='email' class='form-control mt-2'>
                    <input type='text' name='text' placeholder='Текстовая строка' class='form-control mt-2'>
                    <input type='number' name='num1' placeholder='Число 1' class='form-control mt-2'>
                    <input type='number' name='num2' placeholder='Число 2' class='form-control mt-2'>
                    <input type='file' multiple id='fileUpload'   name='fileUpload[]' class='form-control-file mt-2'>
                    <a class='text-info add_field'>Добавить файл</a>
                    <br><button type='submit' class='btn btn-secondary mt-2 ml-auto mr-auto'>Отправить</button>
                </form>
            </div>
            <div class='col-sm'>
                <form method='POST'  action='action/secondForm.php'  id='second_form''>
                    <h4 class='text-center'>Результат</h1>
                    <button type='submit' class='btn btn-secondary mb-1'>Вывести</button>
        <? if(isset($_SESSION['name'])){ ?>
                    <p>Имя: <input type='text' disabled class='border-0' value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];} ?>"></p>
                    <p>Почта: <input type='text' disabled class='border-0' value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];} ?>"></p>
                    <p>Текстовая строка: <input type='text' disabled  class='border-0' value="<?php if(isset($_SESSION['text'])){echo $_SESSION['text'];} ?>"></p>
                    <p>Число 1: <input type='text' disabled class='border-0' value="<?php if(isset($_SESSION['num1'])){echo $_SESSION['num1'];} ?>"></p>
                    <p>Число 2: <input type='text' disabled class='border-0' value="<?php if(isset($_SESSION['num2'])){echo $_SESSION['num2'];} ?>"></p>
                    <p>Сумма:<input type='text' disabled class='border-0' value="<?php if(isset($_SESSION['sum'])){echo $_SESSION['sum'];} ?>"></p>
                    <p><input type='text' disabled class='border-0' value="<?php if(isset($_SESSION['merged'])){echo $_SESSION['merged'];} ?>"></p>
                    <p><input type='text' disabled class='border-0' value="<?php if(isset($_SESSION['length'])){echo $_SESSION['length'];} ?>"></p>
                    <p><?=$_SESSION['sum_column']?></p>
        <? } ?>
                </form>
            </div>
        </div>
    </div>
    <div id='popup' style="display:none;" class='rounded'>
			<div class='header-h1'>Ваш персонаж создан</div>
    </div>
    </div>
    <div class='mt-2'>
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aa591d96c135165a81d03f2b760dadf1803a5e49d90b83ca130e25ecab438aeaf&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/jquery.fancybox-1.3.4.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>




