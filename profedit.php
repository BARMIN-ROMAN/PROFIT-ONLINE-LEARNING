<? if ($_POST["submit"]) { 
    if (isset($_POST['name'])) { $name=$_POST['name'];  if($name !=''){
        if (isset($_POST['famil'])) { $famil=$_POST['famil'];  if($famil !=''){
            if (isset($_POST['fak'])) { $grup = $_POST['fak']; if ((preg_match('/([\D]{2,5})-([0-9]{2})-([0-9]{1,2})/', $grup)) and ($grup != '')){
    include ("db.php"); //base date    
    $id =  $_SESSION['id'];
    $fak = $_POST['fak'];
    $result = mysql_query("SELECT id FROM user_info WHERE uid='$id'",$connection);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['login'])) {
    echo ("<div class='error' style='display:none;'>У вас все заполнено.</div>");
    }
    else {
    $fio = trim($_POST['famil']).' ';
    $fio .= trim($_POST['name']).' ';
    $fio .= trim($_POST['otch']);
    $result2 = mysql_query ("INSERT INTO user_info (uid,fio,fak) VALUES ('$id','$fio','$fak')");
   
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE'){ 
        
         echo'<script type="text/javascript">document.location.href = "index.php";</script>'; 
         
    } else echo"<center><div class='error' style='display:none;'>Ошибка</div></center>";}
            } else{echo '<div class="block profile" >Введите корректное название группы</div>';}}}}}  }}?>


<div class="block profile" >
    <form action="" method="post" style="margin:0 auto 25px;"  width:940px;class="login">
                        <center>
                            
                            <p style="margin-top:25px;" ><input  class="pole" style="margin-left:5px;"  name="famil" type="text" size="15" maxlength="15" placeholder="Фамилия" >
                    <input  class="pole"  name="name" type="text" size="15" maxlength="15" placeholder="Имя" ><input  class="pole" style="margin-left:5px;" name="otch" type="text" size="15" maxlength="15" placeholder="Отчество" >
    </p> 
   

                            <p style="margin-top:10px;" >
                    <input  class="pole"  name="fak" type="text" style="width: 300px;" placeholder="Группа(Например: ФАИТ-12-2)" >
    </p> 
      

    
      <p>
    <input id="vvod"style="" class="input_l hover" type="submit" name="submit" value="Подтвердить">
<br>
    </p>
                            <div class="error_msg" style="color:#000;"></div>
    </center>
 
    </form>
    </div>