<?php 
$p_id = $_GET['p'];
$d_id = $_GET['d'];
$numb = $_GET['numb'];
$u_id = $_SESSION['id']; 
$type = $_GET['t'];
if($_GET['t'] == "ekz"){include('ekz.php');}else {
if($_GET['t'] == "test"){include('test.php');}else {
 include('db.php');  
if((!isset($_GET['t'])) and (isset($_GET['type']))){
 

echo '<div class="block profile" >
<ul class="spis">';
        echo '<p style="margin: 10px 5px;">Лекции:</p>';
      
    
    
  $num = 1;    
do
{
    
    $result = mysql_query("SELECT * FROM u_history WHERE p_id='$p_id' AND ty='le' AND el='$num' AND u_id = '$u_id' ",$connection); 
$myrow1 = mysql_fetch_array($result);
    
    $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='le' AND number='$num'  ",$connection); 
$myrow = mysql_fetch_array($result);
	echo'<a ';  if(empty($myrow['id'])){echo 'style="display:none"';} echo'href="index.php?d='.$d_id.'&p='.$p_id.'&type=select&t=le&numb='.$num.'"><li style="'; if(!empty($myrow1['id'])){echo'background: #E6FFDA;';}echo'"><div style="width: 650px; float:left;">[Лекция '.$num.'] '.$myrow['name'].'</div>'; if(!empty($myrow1['id'])){echo'<div style="float:right">Урок пройден</div>';} echo'<div style="clear:both;"></div></li></a>'; $num++;
}
while($num<10);

    
        
        echo' <p style="margin: 10px 5px;">Лабораторные работы:</p>';
        $num = 1;    
do
{
    
       $result = mysql_query("SELECT * FROM u_history WHERE p_id='$p_id' AND ty='la' AND el='$num' AND u_id = '$u_id' ",$connection); 
$myrow1 = mysql_fetch_array($result);
    
    $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='la' AND number='$num'  ",$connection); 
$myrow = mysql_fetch_array($result);
	echo'<a '; if(empty($myrow['id'])){echo 'style="display:none"';} echo 'href="index.php?d='.$d_id.'&p='.$p_id.'&type=select&t=la&numb='.$num.'"><li style="'; if(!empty($myrow1['id'])){echo'background: #E6FFDA;';}echo'"><div style="width: 650px; float:left;">[Лабораторная работа '.$num.'] '.$myrow['name'].'</div>'; if(!empty($myrow1['id'])){echo'<div style="float:right">Урок пройден</div>';} echo'<div style="clear:both;"></div> </li></a>'; $num++;
} 
while($num<8);$p_id = $_GET['p'];
    
$myrow = mysql_fetch_array($result);
         echo'<p style="margin: 10px 5px;">Контрольные:</p>';
    
    
    
    $result = mysql_query("SELECT * FROM testresult WHERE (test_id='$p_id') AND (u_id = '$u_id')",$connection); $myrow = mysql_fetch_array($result);
    if(empty($myrow['id'])){$result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); $myrow = mysql_fetch_array($result);  echo'<a href="index.php?d='.$d_id.'&p='.$p_id.'&type=select&t=test" ';  if(empty($myrow['id'])){echo 'style="display:none"';}echo'><li>Рубежный контроль </li></a>';}
    
      $result = mysql_query("SELECT * FROM ekzresult WHERE (p_id='$p_id') AND (u_id = '$u_id')",$connection); $myrow = mysql_fetch_array($result);
    if(empty($myrow['id'])){$result = mysql_query("SELECT * FROM ekzans WHERE p_id='$p_id'",$connection); $myrow = mysql_fetch_array($result);  echo'<a href="index.php?d='.$d_id.'&p='.$p_id.'&type=select&t=ekz" ';  if(empty($myrow['id'])){echo  'style="display:none"';}echo'><li>Экзамен </li></a>';}
               
         
    
  echo'  </ul></div><div style="clear:booth;"></div>';    

    
} else {
    
          
     $result2 = mysql_query ("INSERT INTO u_history (p_id,ty,el,u_id) VALUES ('$p_id','$type','$numb','$u_id')");
   
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE'){ 
    echo '<div class="block profile" >';
       $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='$type' AND number='$numb'  ",$connection); 
$myrow = mysql_fetch_array($result);
        echo '<center><h3>'.$myrow['name'].'</h3></center>';      
        echo '<br>';
        echo $myrow['text'];  
        echo'  <div style="clear:both;"></div></div> <center><a style="position:absolute;margin-left: -80px; margin-top: 10px;"class="btm" href="index.php?d='.$d_id.'&p='.$p_id.'&type=select">Назад</a></center>
       ';   } 
       }}}  
  
          
?>