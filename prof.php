<div class="block profile" >Профиль <span style="float:right;"><?php 
$u_id = $_SESSION['id']; 
include('db.php');
$result = mysql_query("SELECT * FROM user_info WHERE (uid='$u_id') AND (type = 'u') ",$connection); 
$myrow = mysql_fetch_array($result);
if(isset($myrow['id'])){
    echo '<a href="index.php?p=profile&pag=proverka">На проверку<span class ="uved1"></span></a>&nbsp;|&nbsp;';}?>
<a href="index.php?p=profile&pag=result">Результаты<span class ="uvedrez1"></span></a>&nbsp;|&nbsp;<a href="index.php?p=profile&pag=itog">Итоговая оценка</a></span></div>
 
<div class="block profile" >  
   <?php 
        if(($_GET['pag'] == 'result') or (!isset($_GET['pag']))){
        include('res.php');
             
             
        } 


         if($_GET['pag'] == 'proverka'){
                 include('admin1233132/proverka.php');
              }

        //if($_GET['pag'] == 'active'){ echo'Активные предметы';}
        if($_GET['pag'] == 'itog'){ include('itog.php');}
     
    
    ?> </div>     