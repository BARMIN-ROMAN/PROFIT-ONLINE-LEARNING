<?php session_start();  ?>



<?php 


if ($_POST["submit"]) { 
    if (isset($_POST['login'])) { $login=$_POST['login'];  if($login !=''){
        if (isset($_POST['password'])) { $password=$_POST['password'];  if($password !=''){
            if (isset($_POST['code'])) {
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);   
    $password = md5(md5(trim($password)));   
    $password = trim($password);   
    $code = $_POST['code'];   
    include ("db.php"); //base date    
    if ($code == '28056'){
    $result = mysql_query("SELECT login FROM user WHERE login='$login'",$connection);
    $myrow = mysql_fetch_array($result);
    if (!empty($myrow['login'])) {
    echo ("<div class='error' style='display:none;'>Извините, введённый вами логин уже зарегистрирован. Введите другой логин.</div>");
    }
    else {
    $result2 = mysql_query ("INSERT INTO user (login,password,date) VALUES ('$login','$password',now())");
   
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE'){ 
        $result = mysql_query("SELECT * FROM user WHERE login='$login'",$connection);
        $myrow = mysql_fetch_array($result);
        $_SESSION['login']=$myrow['login'];
        $_SESSION['id']=$myrow['id'];
        $_SESSION['password']=$myrow['password'];
        echo'<script type="text/javascript">document.location.href = "index.php";</script>';
        
    } else echo"<center><div class='error' style='display:none;'>Ошибка</div></center>";}
    }else echo"<center><div class='error' style='display:none;'>Введите корректный код</div></center>";} else echo "<center><div class='error' style='display:none;'>Введите код</div></center>";}else echo "<center><div class='error' style='display:none;'>Введите пароль</div></center>";}} else echo "<center><div class='error' style='display:none;'>Введите логин</div></center>";}  }
?>  
        
<form action="" method="post" class="login">
                        <center>
                            <span style="padding:5px; background:#405a48; font-size:16pt; ">Регистрация</span>
                            <p style="margin-top:25px;" >
                    <input  class="pole"  name="login" type="text" size="15" maxlength="15" placeholder="Логин" >
    </p> 
    <p>
    <input class="pole" style="margin-top: 10px;"name="password" type="password" size="15" maxlength="15" placeholder="Пароль" >
    </p>

       <p style="margin-top:10px;" >
                    <input  class="pole"  name="code" type="text" size="15" maxlength="15" placeholder="Код" >
    </p> 

    
      <p>
    <input id="vvod"style="" class="input_l hover" type="submit" name="submit" value="Регистрация">
<br>
    </p>
                            <div class="error_msg" style="color:#000;"></div>
    </center>
 
    </form>
<script type="text/javascript">
	setTimeout(function(){$('.error_msg').fadeOut('fast')},5000);  //30000 = 30 секунд


    $('.error_msg').text($('.error').text());
</script>