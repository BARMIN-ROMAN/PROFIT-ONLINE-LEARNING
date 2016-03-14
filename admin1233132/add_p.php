<style>
    #upload{
	margin:10px 30px; padding:10px;
	font-weight:bold; font-size:12px;
	font-family:Arial, Helvetica, sans-serif;
	text-align:center;
	background:#f2f2f2;
	color:#3366cc;
	border:1px solid #ccc;
	width:140px;
	cursor:pointer !important;
	-moz-border-radius:5px; -webkit-border-radius:5px;
}
.darkbg{
	background:#ddd !important;
}
#status{
	font-family:Arial; padding:5px;
}
ul#files{ list-style:none; padding:0; margin:0; }
ul#files li{ padding:10px; margin-bottom:2px; width:200px;  margin-right:10px;}
ul#files li img{ max-width:160px; max-height:150px; }
.success{}
.error{ background:#f0c6c3; border:1px solid #cc6622; }
</style>



    <script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/ajaxupload.3.5.js"></script>
<script type="text/javascript">
$(function(){
var btnUpload=$('#upload');
var status=$('#status');
new AjaxUpload(btnUpload, {
action: 'upload-file.php',
name: 'uploadfile',
onSubmit: function(file, ext){
if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
// extension is not allowed 
status.text('Поддерживаемые форматы JPG, PNG или GIF');
return false;
}
status.text('Загрузка...');
},
onComplete: function(file, response){
//On completion clear the status
status.text('');
//Add uploaded file to list
if(response==="success"){
$('<li></li>').appendTo('#files').html('<img src="./uploads/'+file+'" alt="" /><br /><input type="hidden" name = "img" value="uploads/'+file+'">').addClass('success');
} else{
$('<li></li>').appendTo('#files').text(file).addClass('error');
}
}
}); 
});
</script>


    

 <div style="display: flex;"class="block" align="justify">
  <a href="admin.php?p=add_p&d_id=1" style="text-decoration:none; color:#000; margin-right:5px;" class="si"><div style="background: #E4E4E4;" class="sb " ><center><p style="padding: 10px 0;
background: #F4F4F4; "style="padding: 10px 0;
background: #F4F4F4; " class="<?php if($_GET['d_id'] == '1'){echo'select';}?>">Профильные дисциплины</p></center>
        </div></a>
    <a href="admin.php?p=add_p&d_id=2" style="text-decoration:none; color:#000;  margin-right:5px;" class="si"><div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; "style="padding: 10px 0;
background: #F4F4F4; " class="<?php if($_GET['d_id'] == '2'){echo'select';}?>">Общеобразовательные дисциплины</p></center>
        </div></a>
    <a href="admin.php?p=add_p&d_id=3" style="text-decoration:none; color:#000;" class="si"><div style="background: #E4E4E4;" class="sb"><center><p style="padding: 10px 0;
background: #F4F4F4; " class="<?php if($_GET['d_id'] == '3'){echo'select';}?>">Базовые дисциплины</p></center>
        </div></a>
    </div> 


    
          

<?php

if(isset($_GET['d_id'])){
$d_id = $_GET['d_id'];
 echo' <div style=""class="block" align="justify">';
        echo '<ul class="spis">';
        echo '<div class="add sb" style="width: 856px;!importent" ><a href="admin.php?p=add_p&d_id='.$d_id.'&add=new" style="text-decoration:none; color:#000;"><div style="background: #E4E4E4;" ><center><p style="padding: 10px 0;
background: #F4F4F4; "><span style="font-size:14pt; margin-right:10px; margin-top:5px;">+</span>Добавить предмет</p></center>
        </div></a></div>';
include ("db.php");

$result = mysql_query("SELECT * FROM predmety WHERE d_id='$d_id'",$connection); 
    $myrow = mysql_fetch_array($result);
    if(!empty($myrow)){
   
do 
{
	echo"<a style ='margin-left:25px; ' href='admin.php?p=add_p&d_id=".$d_id."&p_id=".$myrow['id']."'>
    <li style='padding-left:10px;padding-top: 10px  ;
background: #F4F4F4; ' class='";  if(isset($_GET['p_id'])){$p_id = $_GET['p_id']; if($_GET['p_id'] == $myrow['id']){ echo'select';}} echo "'>".$myrow['name']." </li></a><div class='".$myrow['id']."' style='border:1px solid #ccc;'></div>";
}
while($myrow = mysql_fetch_array($result));
}echo ' </ul></div>';
if(isset($_GET['add'])){



 if (isset($_POST['submit'])){  
include('db.php');
     
    $img = $_POST['img'];
   
    $p_name = $_POST['name'];
     
     $opis = $_POST['opis'];
     
     
    $result2 = mysql_query ("INSERT INTO predmety (d_id,name,opis,img) VALUES ('$d_id','$p_name','$opis','$img')");
   
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE'){ 
        
         echo'<script type="text/javascript">document.location.href = "admin.php?p=add_p&d_id='.$d_id.'";</script>';
        
    } else echo"<center><div class='error' style='display:none;'>Ошибка</div></center>";
     
     
     
     
}

echo '
<div class="block profile" style="display:none;">
    

   <div class="add_b" > 
    <form action="" method="post" style="margin:0 auto 25px;"  width:940px;class="login" >
                        <center>                    
<p style="margin-top:25px;" >
    <input  class="pole" style="margin-left: -20px; width:816px;" name="name" type="text"  placeholder="Название предмета" ></p>
                            <p style="margin-top:15px;" >
                                <textarea  class="pole" style="margin-left:5px; max-width:900px;  width:900px; height:200px;" name="opis" type="text"   placeholder="Описание" ></textarea>
    </p> 
                        <script>CKEDITOR.replace("opis");</script>
                               <p style="margin:15px 0 25px; " >
                                <div id="mainbody" >
		<h3>Загрузка изображения</h3>
		<!-- Upload Button, use any id you wish-->
		<div id="upload" ><span>Выбрать файл<span></div><span id="status" ></span>
		
		<ul id="files" ></ul>
</div>
    </p> 

    
      <p>
    <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si" type="submit" name="submit" value="Добавить">
<br><div style="clear:both;"></div>
    </p>
                            <div class="error_msg" style="color:#000;"></div>
    </center> 
    </form>
    </div> </div>  '; 
    
    
    
}
}




if(isset($_POST['otmena'])){   echo'<script type="text/javascript">document.location.href = "admin.php?p=add_p&d_id='.$d_id.'";</script>';}


if(isset($_GET['p_id'])){
$p_id = $_GET['p_id'];

$result = mysql_query("SELECT * FROM content WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);    
    
if(!isset($_GET['t'])){
echo '<div class="block profile" id="'.$p_id.'zad"style="display:none">
<ul class="spis">';
        echo '<p style="margin: 10px 5px;">Лекции:</p>';
      
    
    
  $num = 1;    
do
{
    
    $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='le' AND number='$num'  ",$connection); 
$myrow = mysql_fetch_array($result);
	echo'<a ';  if(!empty($myrow['id'])){echo 'style="display:none"';} echo'href="admin.php?p=add_p&d_id='.$d_id.'&p_id='.$p_id.'&t=le&numb='.$num.'"><li>Лекция '.$num.' </li></a>'; $num++;
}
while($num<10);
 
    
        
        echo' <p style="margin: 10px 5px;">Лабораторные работы:</p>';
        $num = 1;    
do
{  
    
    $result = mysql_query("SELECT * FROM content WHERE p_id='$p_id' AND type='la' AND number='$num'  ",$connection); 
$myrow = mysql_fetch_array($result);
	echo'<a '; if(!empty($myrow['id'])){echo 'style="display:none"';} echo 'href="admin.php?p=add_p&d_id='.$d_id.'&p_id='.$p_id.'&t=la&numb='.$num.'"><li>Лабораторная работа'.$num.' </li></a>'; $num++;
}
while($num<8);
    include('db.php'); $p_id = $_GET['p_id'];
         echo'<p style="margin: 10px 5px;">Контрольные:</p>';
      $result = mysql_query("SELECT * FROM answers WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);
        echo'<a href="admin.php?p=add_p&d_id='.$d_id.'&p_id='.$p_id.'&t=test" ';  if(!empty($myrow['id'])){echo 'style="display:none"';}echo'><li>Рубежный контроль </li></a>';
     
    
    $result = mysql_query("SELECT * FROM ekzans WHERE p_id='$p_id'",$connection); 
$myrow = mysql_fetch_array($result);
    echo'<a href="admin.php?p=add_p&d_id='.$d_id.'&p_id='.$p_id.'&t=ekz" ';  if(!empty($myrow['id'])){echo 'style="display:none"';}echo'><li>Экзамен </li></a>';
       
        
    
  echo'  </ul></div>';    

    
    

}else{ 
    
    if(isset($_POST['submit1'])){
    
   
   
    $name = $_POST['name'];
    
     $opis = $_POST['opis'];
     $type = $_GET['t'];
    $numb = $_GET['numb'];
        $a_id = $_SESSION['id'];
    $result2 = mysql_query ("INSERT INTO content (p_id,name,text,type,a_id,number,date) VALUES ('$p_id','$name','$opis','$type','$a_id','$numb',now())");
   
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE'){ 
        
         echo'<script type="text/javascript">document.location.href = "admin.php?p=add_p&d_id='.$d_id.'";</script>';
        
    } else echo"<center><div class='error' style='display:none;'>Ошибка</div></center>";
    }
    
    
     if($_GET['t'] == 'test'){
     echo '
<div class="block profile" >
    

    <div class="add_b" >
    <form action="" method="post" style="margin:0 auto 25px;"  width:940px;class="login" >
                     <center>   
                        
'; $num= 1 ;  do{
         echo ' 
<p style="margin-top:25px;" ><h5>Вопрос №'.$num.'</h2><br>
    <input  class="pole" style="margin-left: -20px; width:816px;" name="que'.$num.'" type="text"  placeholder="Вопрос" ></p>';
    
    $vpr = 1 ;  do{
         echo '
                           <p style="margin-top:15px;" >
                            <input class="pole" style="margin-left:5px; width:846px;" name="v'.$vpr.$num.'" type="text" id="v'.$vpr.$num.'" placeholder="Ответ '.$vpr.'">
<input type="radio" id="v'.$vpr.'true'.$num.'" value="v'.$vpr.'" name="vtrue'.$num.'" />
<label for="v'.$vpr.'true'.$num.'"><span></span></label>  </p>';$vpr++;} while($vpr<5);
 $num++;}
         while($num<31);
                           
    echo'
    
      <p>
      <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si" type="submit" name="submittest" value="Добавить">
<br><div style="clear:both;"></div>
    </p>
                            <div class="error_msg" style="color:#000;"></div>
    </center>
 
    </form>
    </div> </div>  ';
         
         
                   if(isset($_POST['submittest'])){
    
      include ("db.php");
                       $num = 1;
                       do {
                               
     $v1 = $_POST['v1'.$num];
    $v2 = $_POST['v2'.$num];
    $v3 = $_POST['v3'.$num];
    $v4 = $_POST['v4'.$num];
    
    $truea = $_POST['vtrue'.$num];
    
    $text = $_POST['que'.$num];
    
     $p_id = $_GET['p_id'];
             

        $result2 = mysql_query ("INSERT INTO answers (p_id,vopros,v1,v2,v3,v4,truea) VALUES ('$p_id','$text','$v1','$v2','$v3','$v4','$truea')");
         if ($result2=='TRUE'){    
             
             echo'<script type="text/javascript">document.location.href = "admin.php?p=add_p&d_id='.$d_id.'&p_id='.$p_id.'";</script>';
   
         }else {echo"<center><div class='error' style='display:none;'>Ошибка</div></center>";}
         $num++;       } while($num < 31);
         

         
                   } }
    else{ 
        
        
        
        if($_GET['t'] == 'ekz'){
            
            
            if(isset($_POST['ekzsub'])){
                       
                 $v1 = $_POST['v1'];
                 $v2 = $_POST['v6'];
                 $v3 = $_POST['v8'];
                 $p_id = $_GET['p_id'];
             
                 $result2 = mysql_query ("INSERT INTO ekzans (p_id,v1,v2,v3) VALUES ('$p_id','$v1','$v2','$v3')");
                 if ($result2=='TRUE'){    
             
             echo'<script type="text/javascript">document.location.href = "admin.php?p=add_p&d_id='.$d_id.'&p_id='.$p_id.'";</script>';
   
         }else {echo"<center><div class='error' style='display:none;'>Ошибка</div></center>";}
       
                
            }
            
            
             echo '
<div class="block profile" >
    

    <div class="add_b" >
    <form action="" method="post" style="margin:0 auto 25px;"  width:940px;class="login" >
                        <center>  '; 
                        
                    $vpr = 1;
            do{ echo'
<p style="margin-top:10px;" >
    <input  class="pole" style="margin-left:5px; width:816px;" name="v'.$vpr.'" type="text"  placeholder="Вопрос '.$vpr.'" ></p> '; $vpr++;} while ($vpr < 11);
                               

    echo'
      <p>
    <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si" type="submit" name="ekzsub" value="Добавить">
<br><div style="clear:both;"></div>
    </p>
                            <div class="error_msg" style="color:#000;"></div>
    </center>
 
    </form>
    </div> </div>  ';
            
            
            }
        
        
        
        
        
        else 
    echo '
<div class="block profile" >
    

    <div class="add_b" >
    <form action="" method="post" style="margin:0 auto 25px;"  width:940px;class="login" >
                        <center>                    
<p style="margin-top:25px;" >
    <input  class="pole" style="margin-left: -20px; width:816px;" name="name" type="text"  placeholder="Название" ></p>
                            <p style="margin-top:15px;" >
                                <textarea  class="pole" style="margin-left:5px; max-width:900px;  width:900px; height:200px;" name="opis" type="text"   placeholder="Текст" ></textarea>
    </p>  <script>CKEDITOR.replace("opis");</script>
                               

    
      <p>
    <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si" type="submit" name="submit1" value="Добавить">
<br><div style="clear:both;"></div>
    </p>
                            <div class="error_msg" style="color:#000;"></div>
    </center>
 
    </form>
    </div> </div>  '; }}
    
   
}





         ?>
        
   
    
    
    <?php if(isset($_GET['add'])){echo "<script type='text/javascript'>



    $('.add').html($('.add_b').html());
</script>";}?>
    
    
    
    
    
    <script type="text/javascript">
        function getUrlVar(){
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
        $('.'+num).html($('#'+num+'zad').html());
    </script>
    

