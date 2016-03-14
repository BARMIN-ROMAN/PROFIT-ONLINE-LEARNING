<?php

    include('db.php');
            $u_id = $_SESSION['id']; 
            $result = mysql_query("SELECT test_id FROM testresult  WHERE u_id = '$u_id'  GROUP BY test_id",$connection); 
            $myrow = mysql_fetch_array($result);
            echo '<ul class="spis"> Тесты<br>';
            do{
                $my1 = $myrow['test_id'];
                    $result1 = mysql_query("SELECT name FROM predmety WHERE id='$my1'",$connection); 
                    $myrow1 = mysql_fetch_array($result1);
$p_name = $myrow1['name'];
                echo'<a '; 
           echo 'href="index.php?p=profile&pag=result&t=test&num='.$my1.'"><li>Тест по '.$p_name.' </li></a>';  
         } while($myrow = mysql_fetch_array($result));
            echo '</ul>';
               
             
                if($_GET['t'] == 'test'){
                    $p_id = $_GET['num'];
                $num= 1 ;  $result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);
                    $result1 = mysql_query("SELECT * FROM testresult WHERE  (test_id='$p_id') AND (u_id = '$u_id')",$connection); 
$myrow1 = mysql_fetch_array($result1);$true = 0; $false = 0;
                    do{if($myrow['truea'] == $myrow1['selectans']){$true++;}else{$false++;}}
    while(($myrow = mysql_fetch_array($result)) and ($myrow1 = mysql_fetch_array($result1))) ; 
                    $proc = 100/30*$true;
                    $proc = sprintf("%.0f", $proc);
                    echo'<h3 style="padding-top:25px;">Правильных: '.$true.' Неправильных: '.$false.' Процент: '.$proc.'%</h3>';
                   $result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);
                    $result1 = mysql_query("SELECT * FROM testresult WHERE  (test_id='$p_id') AND (u_id = '$u_id')",$connection); 
$myrow1 = mysql_fetch_array($result1);
                    do{ 
         
       
       
     
    echo '<div class="block profile" style="';if($myrow['truea'] == $myrow1['selectans']){$true++; echo 'background: rgba(175, 255, 170, 0.8);';} else {$false++;echo 'background: rgba(255, 170, 170, 0.8);';}echo'">
<p style="margin-top:0px; " ><h5>Вопрос №'.$num.'</h5><br>
  '. $myrow['vopros'].'</p>';
    
    $vpr = 1 ;  do{
         echo '
          <p style="margin-top:15px; " >
   
 '.$vpr.') '. $myrow['v'.$vpr];if($myrow['truea'] != $myrow1['selectans']){if($myrow['truea'] == 'v'.$vpr){echo' (Правильный ответ)';}if($myrow1['selectans'] == 'v'.$vpr){echo' (Ваш ответ)';}}echo'</p>';$vpr++;} while($vpr<5);
 echo'</div>';$num++;}
    while(($myrow = mysql_fetch_array($result)) and ($myrow1 = mysql_fetch_array($result1))) ;

                }
 

?>