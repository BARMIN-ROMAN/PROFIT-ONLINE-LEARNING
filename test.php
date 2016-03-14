<form method="post" action="">
<?php 
$p_id = $_GET['p'];
 $u_id = $_SESSION['id'];
include('db.php');

$result = mysql_query("SELECT * FROM testresult WHERE (test_id='$p_id') AND (u_id = '$u_id')",$connection); 
$myrow = mysql_fetch_array($result);

if($myrow['id'] == ''){
$num= 1 ;  $result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result); do{
        
     
     
     
         echo '<div class="block profile" onmousedown="return false;" onclick="return true;" oncopy="return false;">
<p style="margin-top:0px;" ><h5>Вопрос №'.$num.'</h5><br>
  '. $myrow['vopros'].'</p>';
    
    $vpr = 1 ;  do{
         echo ' 
          <p style="margin-top:15px;" >
   <input type="radio" id="v'.$vpr.'true'.$num.'" value="v'.$vpr.'" name="vtrue'.$num.'" />
<label for="v'.$vpr.'true'.$num.'"><span></span></label>  '. $myrow['v'.$vpr].'</p>';$vpr++;} while($vpr<5);
 echo'</div>';$num++;}
    while($myrow = mysql_fetch_array($result));} else { 
    
    $result = mysql_query("SELECT el FROM u_history WHERE (u_id='$u_id') AND (p_id ='$p_id')",$connection); 
     $myrow = mysql_fetch_array($result);
     $el = $myrow['el'];
     $el = $el+1;
    $result2 = mysql_query ("UPDATE u_history SET el='$el'  WHERE p_id='$p_id' AND u_id='$u_id' ",$connection);
if ($result2=='TRUE'){ 
        
      echo'<script type="text/javascript">
         document.location.href = "index.php?p=profile&pag=result&t=test&num='.$p_id.'";
         </script>';
        
    }
    } 
?>  
 <p>
    <input id="vvod"style="float:left; margin-left:25px;background: #5a4240;" class="input_l hover" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover" type="submit" name="ready" value="Завершить">
<br><div style="clear:both;"></div>
</p></form>



       <script>
setInterval(function(){$("input[name*='ready']").trigger("click");
}, 2700000)</script>

      <script>
                min = 45;
                sec = 0;
setInterval(function(){ if (sec == 0){min=min-1; sec = 60} else {sec = sec-1;}
   $('.timer').text('Осталось: '+min+' мин. '+sec+' сек.');                   
                     
}, 1000);
       
                
                
        
        </script>
        
        <div style=' background:rgba(238, 238, 238, 0.6); position:fixed; bottom:10px; right:10px; padding: 5px 10px; font-size:14pt;' class='timer block'></div>
 <?php  
  
  
 
if(isset($_POST['ready'])){ 
    include('db.php');
       
     
    $u_id = $_SESSION['id']; 
    $p_id = $_GET['p'];
     
    $num = 1;
                    do {
    $select = $_POST['vtrue'.$num];
  
     
     
     $result2 = mysql_query ("INSERT INTO testresult (u_id,num,test_id,selectans) VALUES ('$u_id','$num','$p_id','$select')");
                           
         if ($result2=='TRUE'){ 
             
                          
         if($num == 30) { echo'<script type="text/javascript">
         document.location.href = "index.php?p=profile&pag=result&t=test&num='.$p_id.'";
         </script>';}
    
         }else {echo"<center><div class='error' style=''>Ошибка</div></center>";} $num++;} while($num < 31);
    
        


}
?>
     