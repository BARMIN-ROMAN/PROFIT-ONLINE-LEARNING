<html>
    <head> <?php  session_start(); ?>
    <link rel="stylesheet" type="text/css" href="style.css"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="js/ajaxupload.3.5.js"></script>
     <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<script type="text/javascript" src="js/last-jq.js"></script>
 <script type="text/javascript" src="js/jq.min.js"></script>

        
            
<!— Start SiteHeart code —>
<script>
(function(){
var widget_id = 781096;
_shcp =[{widget_id : widget_id}];
var lang =(navigator.language || navigator.systemLanguage 
|| navigator.userLanguage ||"en")
.substr(0,2).toLowerCase();
var url ="widget.siteheart.com/widget/sh/"+ widget_id +"/"+ lang +"/widget.js";
var hcc = document.createElement("script");
hcc.type ="text/javascript";
hcc.async =true;
hcc.src =("https:"== document.location.protocol ?"https":"http")
+"://"+ url;
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<!— End SiteHeart code —>
    </head>   
    
    <body    > 
        <div id="modal-window" class="modal-window">
<div class="window-container animation">
    <span style="position: relative;
top: -28px;
right: -500px;
font-size: 20pt;"class="close">✖</span>
<?php include('help.php');?>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>


      
<script> 
$(document).ready(function() {
$('.open-window').click(function() {
$('.modal-window').fadeIn(function() {
$('.window-container').addClass('visible');
});
});
$('.close, .modal-window').click(function() {
$('.modal-window').fadeOut().end().find('.window-container').removeClass('visible');
});
$('.window-container').click(function(event) {
event.stopPropagation()
});
});
</script> 

 
        
         <script type="text/javascript">
             $(document).ready(function(){if($(".uved_t").length>0) {$('.uved1').html('<span class="uved">'+$('.uved_t').text()+'</span>');}});
            $(document).ready(function(){if($(".uved_rez").length>0) {$('.uvedrez1').html('<span class="uved">'+$('.uved_rez').text()+'</span>');}});
        </script> 
        <div class="topmenu_f">  <div class="topmenu">
            <a href="index.php" style="text-decoration:none; " ><span class="logo"><img style="height:26px;" src="img/logo1.png"></span></a> 
            
             

            <?php 
    
    include('db.php');
    $u_id = $_SESSION['id'];
    
    //количество на проверку
    $kolvo = mysql_query("SELECT COUNT(*) FROM ekzresult WHERE (uch_id='$u_id') AND (v1res = '')",$connection);
    $kolvo = mysql_fetch_row($kolvo);
    $kolvo = $kolvo[0];     
   if($kolvo > 0){echo'<div class="uved_t" style="display:none;">'.$kolvo.'</div>';}
    
     //количество результатов
    $kolvo = mysql_query("SELECT COUNT(*) FROM ekzresult WHERE (u_id='$u_id') AND (v1res != '') AND (smot = 0)",$connection);
    $kolvo = mysql_fetch_row($kolvo);
    $kolvo = $kolvo[0];     
   if($kolvo > 0){echo'<div class="uved_rez" style="display:none;">'.$kolvo.'</div>';}

    if (empty($_SESSION['id'])){ echo '<style>body{background: url("img/bg.jpg");background-position: center center; background-size: cover;}</style>
    <span style="float:right;   margin-top: -6px;"><ul id="menu">
        <li><a href="index.php?p=reg">Зарегистрироваться</a></li>
        <li><a href="index.php">Войти</a></li></ul></span>
';} else { 
     
    echo '<style>body{background: url("img/bgb.jpg");  background-position: center top; background-color:#fff;}</style>
            ';
           
       echo '   <span style="  top: 8px;
  position: absolute;
  left: 120px;">
           <form  name="search" method="post" action="index.php?p=search">
    <input style="  width: 200px;
  height: 30px;
  border-radius: 5px;
  border: 0;
  padding: 0 10px; font-size:14px; border-bottom-right-radius: 0px;
  border-top-right-radius: 0px;" type="search" name="query" placeholder="Поиск">
    <button style=" height: 30px;
  border-bottom-right-radius: 5px;
  border-top-right-radius: 5px;
  border: 0px;
  padding: 0 10px;
  margin-left: -4px;  position: relative;
  top: -1.5px;"type="submit">Найти</button> 
</form></span><span style="float:right;   margin-top: -6px;"><ul id="menu">
        <li><a href="index.php">Главная</a></li>
        
        <li><a class="open-window" href="#">Помощь</a></li>
         
        <li ><a style="  text-transform: uppercase;" href="index.php?p=profile">Профиль</a>';
        echo '<span class ="uved1"></span><span class ="uvedrez1"></span>';
            
        echo'</li><li ><a style="  text-transform: uppercase;" href="index.php?p=video">видеоуроки</a></li>
        <li ><a style="  text-transform: uppercase;" href="index.php?p=chat">чат</a></li>';
        $u_id = $_SESSION['id'];
    
        $result = mysql_query("SELECT * FROM user_info WHERE uid='$u_id' AND type = 'u' ",$connection);
    $myrow = mysql_fetch_array($result);
      
       if(($u_id == '1') or (isset($myrow['id']))){ echo'       <li>
         <a '; if(($_SESSION['id'] == '1')){ echo'href="admin.php"'; }echo'>Админ панель</a>
                <ul>
                        <li><a href="admin.php?p=add_p&d_id=1">Добавить</a></li>
                        <li><a href="admin.php?p=add_v">Добавить видео</a></li>
                        <li><a href="admin.php?p=edit_p&d_id=1">Редактировать</a></li>';
                        if(($_SESSION['id'] == '1')){echo'<li><a href="admin.php?p=user">Пользователи</a></li>';}
                 echo'    
                </ul>
        </li>';}

        echo '<li><a href="index.php?p=exit">Выйти</a></li>
</ul></span>';}  
            ?>
        
       <!-- background: url("img/bg.gif"); url("img/bg1.jpg");-->
       <!-- background: url("http://cs625221.vk.me/v625221563/3685a/WrRLEIadG94.jpg"); -->
             
             
             
             
            </div></div>
 
    <!--  <ul id="menu">
        <li><a href="#">Главная</a></li>
        <li><a href="#">Помощь</a></li>
        <li><a href="#">Профиль</a></li>
        <li>
         <a href="#">Админ панель</a>
                <ul>
                        <li><a href="#">Добавить</a></li>
                        <li><a href="#">Редактировать</a></li>
                        <li><a href="#">Пользователи разработчика</a></li>
                     
                </ul>
        </li>

        <li><a href="#">Выйти</a></li>
</ul> -->

      