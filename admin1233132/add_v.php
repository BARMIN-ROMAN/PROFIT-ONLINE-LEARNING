<div class="block" style="padding:20px;">
  
    <?php
if(isset($_GET['p_id'])){

echo' <form action="" method="post" style="margin:0 auto 25px;"  width:940px;class="login" >
                        <center>                    
<p style="margin-top:25px; padding:0px 0px 10px;   text-indent: 0px; " >
    <input  class="pole" style="width:100%" name="name" type="text"  placeholder="Название" ></p>
                           
                             
                               
<p style="margin-top:25px; padding:0px 0px 10px;   text-indent: 0px; " >
    <input  class="pole" style="width:100%" name="url" type="text"  placeholder="Ид видео например(-7sCE6ob70U)" ></p>
    
      <p>
    <input id="vvod"style="float:left; margin-left:25px;" class="input_l hover si" type="submit" name="otmena" value="Отмена"><input id="vvod"style="margin-right:25px; float:right;" class="input_l hover si" type="submit" name="submit1" value="Добавить">
<br><div style="clear:both;"></div>
    </p>
                            <div class="error_msg" style="color:#000;"></div>
    </center>
 
    </form>';

} else {
      include('db.php');
            $result = mysql_query("SELECT * FROM predmety",$connection); 
            $myrow = mysql_fetch_array($result);
            echo '<ul class="spis"> Выбирите предмет <br><br>';
               
            do{
                
                echo'<a '; 
           echo 'href="admin.php?p=add_v&p_id='.$myrow['id'].'"><li>'.$myrow['name'].' <span style="float:right;">';
                $p_id = $myrow['id'];
                 $result1 = mysql_query("SELECT num FROM video WHERE p_id = '$p_id'",$connection);
    $num = 0;
            $myrow1 = mysql_fetch_array($result1);
    do{
        if($num < $myrow1['num']){$num = $myrow1['num']; }
    }while($myrow1 = mysql_fetch_array($result1));
                echo '(Видео:'.$num.' шт.)';
                echo'</span></li></a>';  
            } while($myrow = mysql_fetch_array($result));
                     echo '</ul>';

}

if(isset($_POST['otmena'])){
     echo'<script type="text/javascript">document.location.href = "admin.php?p=add_v";</script>';
}

if(isset($_POST['submit1'])){
            $p_id = $_GET['p_id'];
            $name = $_POST['name'];
            $opis = $_POST['opis'];
            $url = $_POST['url'];
    
            include('db.php');
                   $result1 = mysql_query("SELECT num FROM video WHERE p_id = '$p_id'",$connection);
    $num = 1;
            $myrow1 = mysql_fetch_array($result1);
    do{
        if($num <= $myrow1['num']){$num = $myrow1['num']+1; }
    }while($myrow1 = mysql_fetch_array($result1));

    
    $result2 = mysql_query ("INSERT INTO video (p_id,name,opis,url_id,num) VALUES ('$p_id','$name','$opis','$url','$num')");
                 if ($result2=='TRUE'){ 
                       echo'<script type="text/javascript">document.location.href = "admin.php?p=add_v";</script>';
   
                 } 
}
?>
    
    
</div>