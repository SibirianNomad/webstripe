<?
require 'init.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/phpoffice/phpexcel/Classes/PHPExcel.php';

//метод для отправки письма
function sendEmail($name,$email){

    $title = "Заголовок письма";
    $body = "
    <h2>Новое письмо</h2>
    <br>Имя: $name
    <br>Почта: $email
    ";

    $mail = new PHPMailer();

    $mail -> isSMTP();   
    $mail -> CharSet = "UTF-8";
    $mail -> SMTPAuth   = true;
    $mail -> Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    $mail -> Host       = 'smtp.gmail.com'; 
    $mail -> Username   = 'sibiriannomad@gmail.com';
    $mail -> Password   = 'Faraon25'; 
    $mail -> SMTPSecure = 'ssl';
    $mail -> Port       = 465;
    $mail -> setFrom('sibiriannomad@gmail.com', 'Webstripe'); 
    $mail -> addAddress($email); 
    
   if(!empty($_FILES['fileUpload']['name'])){
       for($i=0;$i<count($_FILES['fileUpload']['name']);$i++){
            $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['fileUpload']['name'][$i]));
            move_uploaded_file($_FILES['fileUpload']['tmp_name'][$i], $uploadfile);
            $mail->addAttachment($uploadfile, $_FILES['fileUpload']['name'][$i]);
       }
   }
 
   $mail->addAttachment($_SERVER['DOCUMENT_ROOT'].'/webstripe/upload_files/table.xlsx');

  

    $mail -> isHTML(true);
    $mail -> Subject = $title;
    $mail -> Body = $body;
    $mail->send();   

}
//метод для создания Excel
function creteTable($tableInf){
    $objPHPExcel = new PHPExcel();
    $objPHPExcel -> setActiveSheetIndex(0);
    $active_sheet = $objPHPExcel -> getActiveSheet();
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    $active_sheet -> setTitle("infotmation");
    $objPHPExcel -> getDefaultStyle() -> getFont() -> setName('Arial');
    $objPHPExcel -> getDefaultStyle() -> getFont() -> setSize(14);
    $active_sheet -> getColumnDimension('B') -> setWidth(20);
    $count=1;
    foreach($tableInf as $key=>$value){
        $cellA='A'.$count;
        $cellB='B'.$count;
        $active_sheet -> setCellValue($cellA,$key);
        $active_sheet -> setCellValue($cellB,$value);
        $count++;
    }
    $objWriter -> save(str_replace(__FILE__,'../upload_files/table.xlsx',__FILE__));
}

//число прописью
function num_of_words($num)
	{
		$nul = 'ноль';
		$ten = array(
			array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
			array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
		);
		$a20 = array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
		$tens = array(2 => 'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
		$hundred = array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот','восемьсот','девятьсот');
		$unit = array(
			array('' ,'' ,'', 1),
			array('' ,'' ,'' ,0),
			array('тысяча' ,'тысячи' ,'тысяч' ,1),
			array('миллион' ,'миллиона','миллионов' ,0),
			array('миллиард','милиарда','миллиардов',0),
		);

		list($n) = explode('.',sprintf("%015.2f", floatval($num)));
		$out = array();
		if (intval($n) > 0) {
			foreach(str_split($n, 3) as $uk => $v)
		{
			if (!intval($v)) continue;
			$uk = sizeof($unit)-$uk-1;
			$gender = $unit[$uk][3];
			list($i1,$i2,$i3) = array_map('intval',str_split($v,1));

			$out[] = $hundred[$i1];
			if ($i2>1) $out[]= $tens[$i2].' '.$ten[$gender][$i3];
			else $out[]= $i2>0 ? $a20[$i3] : $ten[$gender][$i3];

			if ($uk>1) $out[]= morph($v,$unit[$uk][0],$unit[$uk][1],$unit[$uk][2]);
		}
		}
		else $out[] = $nul;
		return trim(preg_replace('/ {2,}/', ' ', join(' ',$out)));
		}
		function morph($n, $f1, $f2, $f5)
		{
			$n = abs(intval($n)) % 100;
			if ($n>10 && $n<20) return $f5;
			$n = $n % 10;
			if ($n>1 && $n<5) return $f2;
			if ($n==1) return $f1;
			return $f5;
	}