<?
function num_of_words($num)
{
$nul = 'ноль';
$ten = array(
array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),
array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять'),
);
$a20 = array('десять','одиннадцать','двенадцать','тринадцать','четырнадцать' ,'пятнадцать','шестнадцать','семнадцать','восемнадцать','девятнадцать');
$tens = array(2=>'двадцать','тридцать','сорок','пятьдесят','шестьдесят','семьдесят' ,'восемьдесят','девяносто');
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