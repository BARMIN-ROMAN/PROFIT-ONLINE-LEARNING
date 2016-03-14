<div style=""class="block" align="justify">
    <?php

$d_id = $_GET['d'];
$p_id = $_GET['p'];
include ("db.php");
$u_id = $_SESSION['id'];
$step[1] = 'le1';
$step[2] = 'la1';
$step[3] = 'le2';
$step[4] = 'la2';
$step[5] = 'le3';
$step[6] = 'la3';
$step[7] = 'le4';
$step[8] = 'la4';
$step[9] = 'le5'; 
$step[10] = 'test';
$step[11] = 'le6';
$step[12] = 'la5';  
$step[13] = 'le7';
$step[14] = 'la6';
$step[15] = 'le8'; 
$step[16] = 'la7'; 
$step[17] = 'le9';
$step[18] = 'ekz';

            $p_id = $_GET['p'];
            $u_id = $_SESSION['id'];
            $result = mysql_query("SELECT el FROM u_history WHERE (u_id='$u_id') AND (p_id ='$p_id') AND ty !=''",$connection); 
            $myrow = mysql_fetch_array($result);
                $el = $myrow['el'];
                $el = $step[$el];
                $numb = substr($el, 2);
                $el = substr($el, 0, 2);

$result = mysql_query("SELECT name FROM discipliny WHERE id='$d_id'",$connection); 
$myrow = mysql_fetch_array($result);

$d_name = $myrow['name'];

$result = mysql_query("SELECT name FROM predmety WHERE id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);

$p_name = $myrow['name'];

$url = 'index.php?d='.$_GET['d'];
echo '<a href="index.php">Главная<a> ';
//if(!empty($_GET['d'])){ echo ' → <a href="'.$url.'">'.$d_name.'</a> ';}
$url .= '&p='.$_GET['p'];
if(!empty($_GET['p'])){ echo ' → <a href="'.$url.'">'.$p_name.'</a> ';} 
if($_GET['type'] == 'select'){ echo ' →  <a href="'.$url.'&type=select">Выбрать урок</a> ';} 
if($_GET['t'] == 'le'){ echo ' → <a href="'.$url.'&type=select&t=le&numb='.$_GET['numb'].'">Лекция '.$_GET['numb'].'</a> ';} 
if($_GET['type'] == 'all'){
if($el == 'le'){ echo ' → <a href="'.$url.'&type=select&t=le&numb='.$numb.'">Лекция '.$numb.'</a> ';} 
if($el == 'la'){ echo ' → <a href="'.$url.'&type=select&t=la&numb='.$numb.'">Лабораторная работа '.$numb.'</a> ';} 
}
if($_GET['t'] == 'la'){ echo ' → <a href="'.$url.'&type=select&t=la&numb='.$_GET['numb'].'">Лабораторная работа '.$_GET['numb'].'</a> ';} 
if($_GET['t'] == 'ekz'){ echo ' → <a href="'.$url.'&type=select&t=ekz">Экзамен</a> ';} 
if($_GET['t'] == 'test'){ echo ' → <a href="'.$url.'&type=select&t=ekz">Рубежный контроль</a> ';} 

                                    ?>  </div>

                  