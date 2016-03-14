<?php
echo '  <table class="simple-little-table" cellspacing="0">
	<tr>
		<th>Предмет </th>
		<th>Рубежный контроль</th>
		<th>Экзамен</th>
		<th>Итоговая оценка</th>
	</tr>';
    $u_id = $_SESSION['id'];
    include('db.php');
    
    $result = mysql_query("SELECT * FROM ekzresult WHERE (u_id='$u_id') AND (v1res != '') ",$connection); 
    $myrow = mysql_fetch_array($result);


 $true = 0; 

do{
    
     $p_id = $myrow['p_id'];
     $result1 = mysql_query("SELECT * FROM testresult WHERE (u_id='$u_id') AND (test_id = '$p_id') ",$connection); 
    $myrow1 = mysql_fetch_array($result1);
    
    $result3 = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); 
$myrow3 = mysql_fetch_array($result3);
           $nums=0;         
    do{
        $nums++;
        $result2 = mysql_query("SELECT name FROM predmety WHERE id='$p_id'",$connection); 
        $myrow2 = mysql_fetch_array($result2);
        $p_name = $myrow2['name'];
        
        
        $oc = ($myrow['v1res'] + $myrow['v2res'] + $myrow['v3res'])/3;
        $oc = sprintf("%.0f", $oc);
        
        
                   
              
                        if($myrow3['truea'] == $myrow1['selectans']){$true++;}
    
                    $proc = 100/30*$true;
                    $proc = sprintf("%.0f", $proc);
        if ($nums == 30){ 
       $itg = $oc*0.6+$proc*0.4;
             $itg = sprintf("%.0f", $itg);
            if ($itg > 89){$nace = 'Отлично';} else
                if($itg > 74){$nace = 'Хорошо';} else
                if($itg > 49){$nace = 'Удовлетворительно';} else 
                {$nace = 'Неудовлетворительно';} 
        echo '     
     
    
	<tr>
		<td>'.$p_name.'</td>
		<td>'.$proc.'%</td>
		<td>'.$oc.'%</td>
		<td>'.$itg.'% ('.$nace.')</td>
	</tr>



        
        ';
        
        
 
        }
        
    } while(($myrow1 = mysql_fetch_array($result1)) and ($myrow3 = mysql_fetch_array($result3)));
    
    
} while($myrow = mysql_fetch_array($result));
   echo '</table>   ';    

?>


