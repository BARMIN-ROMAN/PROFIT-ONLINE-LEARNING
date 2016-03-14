<div style="display: flex;"class="block" align="justify">
  <a href="admin.php?p=edit_p&d_id=1" style="text-decoration:none; color:#000; margin-right:5px;" class="si"><div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; "class="<?php if($_GET['d_id'] == '1'){echo'select';}?>">Профильные дисциплины</p></center>
        </div></a>
    <a href="admin.php?p=edit_p&d_id=2" style="text-decoration:none; color:#000;  margin-right:5px;" class="si"><div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; "class="<?php if($_GET['d_id'] == '2'){echo'select';}?>">Общеобразовательные дисциплины</p></center>
        </div></a>
    <a href="admin.php?p=edit_p&d_id=3" style="text-decoration:none; color:#000;" class="si"><div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; "class="<?php if($_GET['d_id'] == '3'){echo'select';}?>">Базовые дисциплины</p></center>
        </div></a>
    </div> 


    
    

<?php
if(isset($_GET['d_id'])){
$d_id = $_GET['d_id'];

include ("db.php");

$result = mysql_query("SELECT * FROM predmety WHERE d_id='$d_id'",$connection); 
    $myrow = mysql_fetch_array($result);
    if(!empty($myrow)){
       echo' <div style=""class="block" align="justify">';
        echo '<ul class="spis">';
do
{
	echo " <form action='' method='post' id='form1' >
    <a style ='margin-left:25px;' href='admin.php?p=edit_p&d_id=".$d_id."&p_id=".$myrow['id']."'><li class='";  if(isset($_GET['p_id'])){$p_id = $_GET['p_id']; if($_GET['p_id'] == $myrow['id']){ echo'select';}} echo"'>".$myrow['name']."
    <span style='float:right;'>
       
        <input class='btm_spis'type='submit' name='edit' value='✎'style='margin-right:5px;'><input type='hidden' name='delet_id' value='".$myrow['id']."'><input class='btm_spis'type='submit' name='delete' value='✖'></span></li></a><div class='".$myrow['id']."' style='border:1px solid #ccc;'></div></form>";
}
while($myrow = mysql_fetch_array($result));
echo ' </ul></div>';}}


if (isset($_POST['delete']))
{
    $p_id = $_POST['delet_id'];
mysql_query("DELETE  FROM predmety WHERE id='$p_id'",$connection);
   echo'<script type="text/javascript">document.location.href = "admin.php?p=edit_p&d_id='.$d_id.'";</script>';
 
        }

if ((isset($_POST['save'])) and (empty($_POST['t']))) 
{
    $name = $_POST['name'];
    $opis = $_POST['opis'];
    $p_id = $_POST['delet_id'];
mysql_query("UPDATE predmety SET name='$name', opis='$opis' WHERE id='$p_id'",$connection);
echo'<script type="text/javascript">document.location.href = "admin.php?p=edit_p&d_id='.$d_id.'";</script>';
 
        }


if (isset($_POST['edit']))
{
    $p_id = $_POST['delet_id'];
    

  $result =  mysql_query("SELECT * FROM predmety WHERE id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);
    echo '<div class="block profile" >
    

    
    <form action="" method="post" style="margin:0 auto 25px;"  width:940px;class="login" >
                        <center>                    
<p style="margin-top:25px;" >
    <input  class="pole" style="margin-left:5px; width:792px;" name="name" type="text"  placeholder="Название предмета" value="'.$myrow["name"].'"></p>
                            <p style="margin-top:15px;" >
                                <textarea  class="pole" style="margin-left:5px; max-width:900px;  width:900px; height:200px;" name="opis" type="text"  placeholder="Описание" >'.$myrow["opis"].'</textarea><input type="hidden" name="delet_id" value="'.$myrow["id"].'"><script>CKEDITOR.replace("opis");</script>
    </p> 
                            
      <p>
   <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si btm" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si btm" type="submit" name="save" value="Сохранить">
<br><div style="clear:both;"></div>
</p>
                            <div class="error_msg" style="color:#000;"></div>
    </center>
 
    </form>
    </div>';
    
 
        }

if(isset($_GET['p_id'])){
$p_id = $_GET['p_id'];
echo '<div class="block profile" id="'.$p_id.'zad"style="">
<ul class="spis">';
$result = mysql_query("SELECT * FROM content WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);    
    
if(!isset($_GET['t'])){
echo '
<ul class="spis">';
        echo '<p style="margin: 10px 5px;">Лекции:</p>';
      
    
    
  $num = 1;    
do
{
    
    $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='le' AND number='$num' AND a_id = '$u_id'  ",$connection); 
$myrow = mysql_fetch_array($result);
	echo'<a ';  if(empty($myrow['id'])){echo 'style="display:none"';} echo'href="admin.php?p=edit_p&d_id='.$d_id.'&p_id='.$p_id.'&t=le&numb='.$num.'"><li>Лекция '.$num.' </li></a>'; $num++;
}
while($num<10);

    
        
        echo' <p style="margin: 10px 5px;">Лабораторные работы:</p>';
        $num = 1;    
do
{
    
    $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='la' AND number='$num' AND a_id = '$u_id'  ",$connection); 
$myrow = mysql_fetch_array($result);
	echo'<a '; if(empty($myrow['id'])){echo 'style="display:none"';} echo 'href="admin.php?p=edit_p&d_id='.$d_id.'&p_id='.$p_id.'&t=la&numb='.$num.'"><li>Лабораторная работа'.$num.' </li></a>'; $num++;
}
while($num<8);
    $result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id' AND a_id = '$u_id' ",$connection); 
$myrow = mysql_fetch_array($result);
         echo'<p style="margin: 10px 5px;">Контрольные:</p>';
        echo'<a href="admin.php?p=edit_p&d_id='.$d_id.'&p_id='.$p_id.'&t=test" ';  if(empty($myrow['id'])){echo 'style="display:none"';}echo'><li>Рубежный контроль </li></a>';
    
      $result = mysql_query("SELECT * FROM ekzans WHERE p_id='$p_id' AND a_id = '$u_id' ",$connection); 
$myrow = mysql_fetch_array($result);
     echo'<a href="admin.php?p=edit_p&d_id='.$d_id.'&p_id='.$p_id.'&t=ekz" ';  if(empty($myrow['id'])){echo 'style="display:none"';}echo'><li>Экзамен </li></a>';
       
        
    
  echo'  </ul></div></div>';    

    
    

}else{ 
    
    
   
    $p_id = $_GET['p_id'];
    
     $type = $_GET['t'];
    $numb = $_GET['numb'];
    
    
    
if (isset($_POST['save']))
{  $name = $_POST['name'];
  $opis = $_POST['opis'];
    $a_id = $_SESSION['id'];
   
    $result2 = mysql_query ("UPDATE content SET name='$name', text='$opis',a_id='$a_id' WHERE p_id='$p_id' AND type='$type' AND number='$numb' ",$connection);
if ($result2=='TRUE'){ 
        
         echo'<script type="text/javascript">document.location.href = "admin.php?p=edit_p&d_id='.$d_id.'";</script>';
        
    } else echo"<center><div class='error' style=''>Ошибка</div></center>";
 
        }
    

    if (($_GET['t'] == 'le') or ($_GET['t'] == 'la')){
     $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='$type' AND number='$numb'  ",$connection); 
$myrow = mysql_fetch_array($result);
    echo '
<div class="block profile" >
    

    <div class="add_b" >
    <form action="" method="post" style="margin:0 auto 25px;"  width:940px;class="login" >
                        <center>                    
<p style="margin-top:25px;" >
    <input  class="pole" style="margin-left:5px; width:792px;" name="name" type="text"  placeholder="Название" value="'.$myrow['name'].'" ></p>
                            <p style="margin-top:15px;" >
                                <textarea  class="pole" style="margin-left:5px; max-width:900px;  width:900px; height:200px;" name="opis" type="text"   placeholder="Текст" >'.$myrow['text'].'</textarea><script>CKEDITOR.replace("opis");</script>
    </p> 
                                   
      <p>
     <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si btm" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si btm" type="submit" name="save" value="Сохранить">
<br><div style="clear:both;"></div>
    </p>
                            <div class="error_msg" style="color:#000;"></div>
    </center>
 
    </form>
    </div>  '; }



}
    if( $_GET['t'] == 'test'){ 
    if (isset($_POST['savetest']))  
{  $num = 1;
           $result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);    
 $id = $myrow['id'];

                       do {
      $v1 = $_POST['v1'.$num];
    $v2 = $_POST['v2'.$num];
    $v3 = $_POST['v3'.$num];
    $v4 = $_POST['v4'.$num];
    
    $truea = $_POST['vtrue'.$num];
    
    $text = $_POST['que'.$num];
    
     $p_id = $_GET['p_id'];
        include('db.php');
          $result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);       

mysql_query("UPDATE answers SET vopros='$text', v1='$v1', v2='$v2', v3='$v3', v4='$v4', truea = '$truea' WHERE id='$id'",$connection);
echo'<script type="text/javascript">document.location.href = "admin.php?p=edit_p&d_id='.$d_id.'&p_id='.$p_id.'";</script>'; $num++; $id++;
                       }while($num < 31);
        }
    $p_id = $_GET['p_id'];
include('db.php');
$num= 1 ;  $result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result); do{
      
     
         echo '<form action="" method="post"><div class="block profile">
<p style="margin-top:0px;" ><h5>Вопрос №'.$num.'</h5><br>
<input  class="pole" style="margin-left:5px; width:746px;" name="que'.$num.'" type="text"  placeholder="Вопрос" value="'. $myrow['vopros'].'"></p>';
    
    $vpr = 1 ;  do{
         echo '
          <p style="margin-top:15px;" >
     <input class="pole" style="margin-left:5px; width:682px;" name="v'.$vpr.$num.'" type="text" id="v'.$vpr.$num.'" placeholder="Ответ '.$vpr.'" value="'. $myrow['v'.$vpr].'">
<input type="radio" id="v'.$vpr.'true'.$num.'" value="v'.$vpr.'" name="vtrue'.$num.'"'; if($myrow['truea'] == 'v'.$vpr){ echo 'checked="checked"';} echo' />
<label for="v'.$vpr.'true'.$num.'"><span></span></label> </p>';$vpr++;} while($vpr<5);
 echo'</div>';$num++;}
    while($myrow = mysql_fetch_array($result));
    echo'<p>
     <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si btm" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si btm" type="submit" name="savetest" value="Сохранить">
<br><div style="clear:both;"></div>
    </p></form>';
    
    
     
    
    } 
    
    if( $_GET['t'] == 'ekz'){ 
                 $p_id = $_GET['p_id'];
    if (isset($_POST['saveekz'])){               
                 $v1 = $_POST['v1'];
                 $v2 = $_POST['v2'];
                 $v3 = $_POST['v3'];  
                 $d_id = $_GET['d_id'];
                 include('db.php');
                 mysql_query("UPDATE ekzans SET v1='$v1', v2='$v2', v3='$v3' WHERE p_id = '$p_id'",$connection);
echo'<script type="text/javascript">document.location.href = "admin.php?p=edit_p&d_id='.$d_id.'&p_id='.$p_id.'";</script>';}
    
 $result = mysql_query("SELECT * FROM ekzans WHERE p_id='$p_id'",$connection); 
    $myrow = mysql_fetch_array($result); 
        echo '<form method="post" action=""><div class="block profile">';       $num = 1; 
                 do{
                  echo'  <h5 onmousedown="return false;" onclick="return true;" oncopy="return false;" style="margin-top:10px; padding-left:15px;">Вопрос №'.$num.'&nbsp;&nbsp;'.$myrow['v'.$num].'</h5>'; 
                     echo '<p style="margin-top:15px;" >
                                <textarea  class="pole" style="margin-left:5px; max-width:900px;  width:900px; height:200px;" name="v'.$num.'" type="text"   placeholder="Ответ" >'.$myrow['v'.$num].'</textarea>
                            <script>CKEDITOR.replace("v'.$num.'");</script>
    </p> ';
                $num++;}while($num < 4);
    echo'<p>
     <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si btm" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si btm" type="submit" name="saveekz" value="Сохранить">
<br><div style="clear:both;"></div>
    </p></form>'; 
     
    
     
    } 
      
    
    
}
if(isset($_POST['otmena'])){   echo'<script type="text/javascript">document.location.href = "admin.php?p=edit_p&d_id='.$d_id.'";</script>';}
         ?>
       

     
  <!--  <script type="text/javascript">
       window.onload=function(){  function getUrlVar(){
    var urlVar = window.location.search; 
    var arrayVar = []; 
    var valueAndKey = []; 
    var resultArray = [];
    arrayVar = (urlVar.substr(1)).split('&'); 
    if(arrayVar[0]=="") return false; 
    for (i = 0; i < arrayVar.length; i ++) { 
        valueAndKey = arrayVar[i].split('='); 
        resultArray[valueAndKey[0]] = valueAndKey[1]; 
    }
    return resultArray; 
}
        var result = getUrlVar();

        var num = result['p_id'];
        $('.'+num).html($('#'+num+'zad').html());}  
    </script> -->