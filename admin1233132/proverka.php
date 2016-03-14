<?php

    include('db.php');
            $u_id = $_SESSION['id']; 
            $result = mysql_query("SELECT p_id, u_id FROM ekzresult  WHERE (uch_id = '$u_id') AND (v1res = '') ",$connection); 
            $myrow = mysql_fetch_array($result);
            echo '<ul class="spis"> Экзамены<br>';
    if($myrow['u_id'] != ''){
            do{
                $my1 = $myrow['p_id'];
                $us_id = $myrow['u_id'];
                    $result1 = mysql_query("SELECT name FROM predmety WHERE id='$my1'",$connection); 
                    $myrow1 = mysql_fetch_array($result1);
                $p_name = $myrow1['name'];
                
                $result1 = mysql_query("SELECT * FROM user_info WHERE uid='$us_id'",$connection); 
                    $myrow1 = mysql_fetch_array($result1);
                $u_name = $myrow1['fio'];
                $fak = $myrow1['fak'];
                echo'<a '; 
           echo 'href="index.php?p=profile&pag=proverka&t=ekz&num='.$my1.'&u_id='.$us_id.'"><li>Экзамен по '.$p_name.'<span style="float:right;" >Сдал: '.$u_name.'('.$fak.')</span></li> </a>';  
            } while($myrow = mysql_fetch_array($result));}
            echo '</ul>';
              
              
                if($_GET['t'] == 'ekz'){
                    $p_id = $_GET['num'];
                    $uchen_id = $_GET['u_id'];
                    $u_id = $_SESSION['id']; 
                    $num= 1 ;  
                    $result = mysql_query("SELECT * FROM ekzans WHERE p_id='$p_id'",$connection); 
                    $myrow = mysql_fetch_array($result);
                    $result1 = mysql_query("SELECT * FROM ekzresult WHERE (p_id='$p_id') AND (u_id = '$uchen_id') AND (uch_id = '$u_id') AND (v1res = '')",$connection); 
                    $myrow1 = mysql_fetch_array($result1);
              
    
    echo'<form method="post">';
    $vpr = 1 ;  do{
        echo '<div class="block profile">
<p style="margin-top:0px; " ><h5>Вопрос №'.$vpr.'</h5><br>
  '.$myrow['v'.$vpr].'</p>';
         echo '
          <p style="margin-top:15px; background: #fffae0; padding-top:10px;" >'.$myrow1['v'.$vpr].'</p><br>Оценка: <input type="text" style="width:25px;" name="v'.$vpr.'res">%';echo'</div>';$vpr++;} while($vpr<4);
 echo' <p>
    <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover" type="submit" name="submit1" value="Оценить">
<br><div style="clear:both;"></div>
    </p></div></form>';}
                if(isset($_POST['submit1'])){
                $v1res = $_POST['v1res'];
                $v2res = $_POST['v2res'];
                $v3res = $_POST['v3res'];
                
                $result2 = mysql_query("UPDATE ekzresult SET v1res='$v1res', v2res='$v2res', v3res='$v3res' WHERE (p_id = '$p_id') AND (u_id = '$uchen_id') AND (uch_id = '$u_id')",$connection);
         if ($result2=='TRUE'){    
             
             echo'<script type="text/javascript">document.location.href = "index.php?p=profile&pag=proverka";</script>';
   
         }else {echo"<center><div class='error' style='display:none;'>Ошибка</div></center>";}
                
                }
 

?>