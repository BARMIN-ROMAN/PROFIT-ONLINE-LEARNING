
<?php 
  include('db.php');
    $p_id = $_GET['p'];
$u_id = $_SESSION['id']; 
$result = mysql_query("SELECT * FROM ekzresult WHERE (p_id='$p_id') AND (u_id = '$u_id')",$connection); 
$myrow = mysql_fetch_array($result);

if($myrow['id'] == ''){
if(isset($_GET['uch'])){
    
  
    $result = mysql_query("SELECT * FROM ekzans WHERE p_id='$p_id'",$connection); 
    $myrow = mysql_fetch_array($result); 
        echo '<form method="post" action=""><div class="block profile">';       $num = 1; 
                 do{
                  echo'  <h5 onmousedown="return false;" onclick="return true;" oncopy="return false;" style="margin-top:10px; padding-left:15px;">Вопрос №'.$num.'&nbsp;&nbsp;'.$myrow['v'.$num].'</h5>'; 
                     echo '<p style="margin-top:15px;" >
                                <textarea  class="pole" style="margin-left:5px; max-width:900px;  width:900px; height:200px;" name="v'.$num.'" type="text"   placeholder="Ответ" ></textarea>
    </p> ';
                 
                     
                     $num++;}while($num < 4);
                echo'</div>';

echo' <p>
    <input id="vvod"style="float:left; margin-left:25px;background: #5a4240;" class="input_l hover si" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si" type="submit" name="ready" value="Завершить">
<br><div style="clear:both;"></div>
</p></form>';
 
  echo '       <script>
setInterval(function(){
name = name*="ready"; 
$("input[name]").trigger("click");
}, 1800000)</script>'; 
  echo"      <script>
                min = 30;
                sec = 0;
setInterval(function(){ if (sec == 0){min=min-1; sec = 60} else {sec = sec-1;}
   $('.timer').text('Осталось: '+min+' мин. '+sec+' сек.');                   
                     
}, 1000);
       
                
                
        
        </script>
        
        <div style=' background:rgba(238, 238, 238, 0.6); position:fixed; bottom:10px; right:10px; padding: 5px 10px; font-size:14pt;' class='timer block'></div>";
   
if(isset($_POST['otmena'])){
    $d_id = $_GET['d'];
    $p_id = $_GET['p'];
     echo'<script type="text/javascript">
        document.location.href = "index.php?d='.$d_id.'&p='.$p_id.'&type=select";
         </script>';
}
if(isset($_POST['ready'])){ 
    include('db.php');
       
     
    $u_id = $_SESSION['id']; 
    $p_id = $_GET['p'];
    $uch_id = $_GET['uch'];
     
    $num = 1;
    $v1 = $_POST['v1'];
    $v2 = $_POST['v2']; 
    $v3 = $_POST['v3'];  
      
     
     $result2 = mysql_query ("INSERT INTO ekzresult (u_id,p_id,v1,v2,v3,uch_id) VALUES ('$u_id','$p_id','$v1','$v2','$v3','$uch_id')");
                            
         if ($result2=='TRUE'){ 
             
                           
         echo'<script type="text/javascript">
         document.location.href = "index.php?p=profile&pag=result";
         </script>';
    
         }else {echo"<center> <div class='error' style=''>Ошибка</div></center>";}  
     
         
 
   
}} else {   
     
    echo '<form method="post"><div class="block profile">';
    echo '<select style="  float: left;
  font-family: Roboto;
  font-size: 13pt;
  font-weight: 300;
  width: 500px;
  height: 45px;     
  cursor:pointer; 
  border-radius: 5px;
  padding-left:10px;
  margin-left: 25px; 
  margin-top: 10px;" name="uch_id">
        <option value="">Выберите учителя</option>';
         include('db.php');
               
            $result = mysql_query("SELECT * FROM user_info  WHERE type = 'u'", $connection); 
            $myrow = mysql_fetch_array($result);
    do{
        echo '<option value="'.$myrow['uid'].'">'.$myrow['fio'].'</option>';
    } while(     $myrow = mysql_fetch_array($result));
    echo'</select> 
    <input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si" type="submit" name="selec" value="Выбрать">
<div style="clear:both;"></div>';   
    echo '</div></form>';     
    
     
    
    if(isset($_POST['selec'])){
    
        if(!empty($_POST['uch_id'])){ 
        $uch = $_POST['uch_id'];
             echo'<script type="text/javascript">
         document.location.href = "index.php?d='.$d_id.'&p='.$p_id.'&type=select&t=ekz&uch='.$uch.'";
         </script>';
        
    }}
}   
} else {
    $result = mysql_query("SELECT el FROM u_history WHERE (u_id='$u_id') AND (p_id ='$p_id')",$connection); 
     $myrow = mysql_fetch_array($result);
     $el = $myrow['el'];
     $el = $el+1;
    $result2 = mysql_query ("UPDATE u_history SET el='$el'  WHERE p_id='$p_id' AND u_id='$u_id' ",$connection);
if ($result2=='TRUE'){ 
        
      echo'<script type="text/javascript">
        document.location.href = "index.php?p=profile&pag=result";
         </script>';
        
    }}
    
?> 
    
   <script type="text/javascript">$('#clients select').change(
  
    function () {
    <?php $p_id = $_GET['p']; $d_id = $_GET['d']; echo'document.location.href = "index.php?d='.$d_id.'&p='.$p_id.'&type=select&t=ekz&uch=';?> ";})</script>
     