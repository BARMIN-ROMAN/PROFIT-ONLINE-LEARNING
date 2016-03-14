<?php 
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
 if (isset($_POST['submit'])){ 
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login != '') {  //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password !='') { 
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
$password = stripslashes($password);
    $password = htmlspecialchars($password);
//удаляем лишние пробелы
    $login = trim($login);
    $password = md5(md5(trim($password)));
// подключаемся к базе
    include ("db.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 
 
$result = mysql_query("SELECT * FROM user WHERE login='$login'",$connection); //извлекаем из базы все данные о пользователе с введенным логином
    $myrow = mysql_fetch_array($result);
    if (empty($myrow['password']))
    {
    //если пользователя с введенным логином не существует
    
        echo ("<center><div class='error_msg'>Извините, введённый вами логин или пароль неверный.</div></center>");

    }
    else {
    //если существует, то сверяем пароли
    if ($myrow['password']==$password) {
    //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
     echo'<script type="text/javascript">document.location.href = "index.php";</script>';
    }
 else {
    //если пароли не сошлись


    echo ("<center><div class='error_msg'>Извините, введённый вами логин или пароль неверный.</div></center>");
    }
    }}else echo"<center><div class='error_msg'>введите пароль</div></center>";}}else echo"<center><div class='error_msg'>введите логин</div></center>";} }
    ?>


        
<form action="" method="post" class="login">
                        <center>
                            <span style="padding:5px; background:#405a48; font-size:16pt; ">Авторизация</span>
                            <p style="margin-top:25px;" >
                    <input  class="pole"  name="login" type="text" size="15" maxlength="15" placeholder="Логин" >
    </p> 
    <p>
    <input class="pole" style="margin-top: 10px;"name="password" type="password" size="15" maxlength="15" placeholder="Пароль" >
    </p>
      <p>
    <input id="vvod"style="" class="input_l hover" type="submit" name="submit" value="Войти">
<br>
    </p>
    </center>
 
    </form>