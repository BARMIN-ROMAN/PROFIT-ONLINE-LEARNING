<div style=""class="block" align="justify">

<?php
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
            $result = mysql_query("SELECT el FROM u_history WHERE (u_id='$u_id') AND (p_id ='$p_id') AND ty !='0'",$connection); 
            $myrow = mysql_fetch_array($result);
if($myrow['el']>18){echo'<script type="text/javascript">
         document.location.href = "index.php";
         </script>';}
            if(!isset($myrow['el'])){
            $result2 = mysql_query ("INSERT INTO u_history (p_id,u_id,el) VALUES ('$p_id','$u_id','1')");
            echo'<script type="text/javascript">
         document.location.href = location.href;
         </script>';
            } else { 
             $el = $myrow['el'];
            $el = $step[$el];
                if($el == 'test'){echo '<h3>Рубежный контроль</h3>';include('test.php');}
                if($el == 'ekz'){echo '<h3>Экзамен</h3>';include('ekz.php');}
                $numb = substr($el, 2);
                $el = substr($el, 0, 2);
               
                if(($el == 'le') or ($el == 'la')){echo '<div class="block profile" >';
       $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='$el' AND number='$numb'  ",$connection); 
$myrow = mysql_fetch_array($result);
        echo '<center><h3>'.$myrow['name'].'</h3></center>';
        echo '<br>';
        echo $myrow['text'];
        echo'  </div>';   
                                                        echo'<form method="post"> <p>
    <input id="vvod"style="float:left; margin-left:25px;background: #5a4240;" class="input_l hover si btm" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si btm" type="submit" name="ready" value="Продолжить">
<br><div style="clear:both;"></div>
</p></form>';
                                                  }
            }
        


if(isset($_POST['otmena'])){  echo'<script type="text/javascript">
         document.location.href = "index.php?d='.$_GET['d'].'&p='.$p_id.'";
         </script>';  }
if(isset($_POST['ready'])){  
     $result = mysql_query("SELECT el FROM u_history WHERE (u_id='$u_id') AND (p_id ='$p_id')",$connection); 
     $myrow = mysql_fetch_array($result);
     $el = $myrow['el'];
     $el = $el+1;
    $result2 = mysql_query ("UPDATE u_history SET el='$el'  WHERE p_id='$p_id' AND u_id='$u_id' ",$connection);
if ($result2=='TRUE'){ 
        
         echo'<script type="text/javascript">
         document.location.href = location.href;
         </script>';
        
    }
            }
?>


</div>