<?php $str = "Бармин Роман Сергеевич";
$result = explode(" ", $str);
$fam = $result[0];
$name = $result[1];
$otch = $result[2];

echo $fam.' '.mb_substr($name,0,1,'utf-8').'.'.mb_substr($otch,0,1,'utf-8').'.';
 //Субъект
//А вообще вам бы не помешало бы для начала посмотреть что вы получили
?>