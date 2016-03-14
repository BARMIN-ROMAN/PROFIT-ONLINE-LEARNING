<div style=""class="block" align="justify">
    
<?php 
include ("db.php");

$p_id = $_GET['p'];
$result = mysql_query("SELECT * FROM predmety WHERE id='$p_id'",$connection); 
    $myrow = mysql_fetch_array($result);
if(!empty($myrow['img'])){
echo '<img src="'.$myrow['img'].'" style="float:left; padding-right:5px; padding-bottom:2px; width: 300px;">';}echo $myrow['opis']; 
$a_id = $myrow['a_id'];
  $result1 = mysql_query("SELECT * FROM user_info WHERE uid='$a_id'",$connection); 
$myrow1 = mysql_fetch_array($result1);

echo '<span style="float:right; color:#bcbcbc;">Автор:<a href="index.php?p=search&a_id='.$a_id.'"> '.$myrow1['fio'].'</a></span>';?>
    <div style="clear:both;"></div>
</div>
<div style="  font-weight:400;  padding:0 auto; <?php 
include ("db.php");

$p_id = $_GET['p'];
$result = mysql_query("SELECT * FROM content WHERE p_id='$p_id'",$connection); 
    $myrow = mysql_fetch_array($result);
if(empty($myrow)){
echo '';}?>"class="block">

  

    
   <center> 
       <a style="<?php  $result = mysql_query("SELECT el FROM u_history WHERE (u_id='$u_id') AND (p_id ='$p_id')",$connection); 
     $myrow = mysql_fetch_array($result);
$el = $myrow['el']; if($el > 18){echo'display:none;';} ?>" href="<?php echo $_SERVER['REQUEST_URI'];?>&type=all"  class="knop">Пройти обучение</a>
       <a href="<?php echo $_SERVER['REQUEST_URI'];?>&type=select" class="knop">Выбрать урок</a>
  
        
     
      
    <?php
 $p_id = $_GET['p'];
include('db.php');
                $result2 = mysql_query("SELECT * FROM video WHERE p_id = '$p_id'",$connection); 
            $myrow2 = mysql_fetch_array($result2);
if ($myrow2['id'] != ''){
         
    echo'     <a href="index.php?p=video&p_id='.$p_id.'" class="knop">Видеоуроки по предмету</a>';}
    ?>
        </center>

      </div>