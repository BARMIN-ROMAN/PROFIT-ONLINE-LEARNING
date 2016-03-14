<style>
    .slil{background:#405A48;border-radius:5px; font-size:12pt; font-weight:300;border:1px solid #405A48}
    .lil{margin-right:10px; }
    
    </style>
<?php 
if((isset($_GET['p_id'])) and (isset($_GET['num']))){
    include('db.php');
     $p_id = $_GET['p_id'];
     $num = $_GET['num'];
       $result1 = mysql_query("SELECT * FROM video WHERE p_id = '$p_id' and num = '$num'",$connection);
            $myrow1 = mysql_fetch_array($result1);
    echo'
    
    <div class="video_s">
        <iframe width="958" height="538.874999" src="https://www.youtube.com/embed/'.$myrow1['url_id'].'" frameborder="0" allowfullscreen></iframe>
        <div class="name"><b>'.$myrow1['name'].'</b></div>
       
        </div>
        <div class="video_s" style="margin-top:10px; padding:0px 25px;">
        
        <ul id="menu">
        <li class="lil"><a class="slil" href="index.php?p=video&p_id='.$p_id.'">В раздел</a></li>';
    
    if (isset($_GET['num'])){
            $num = $_GET['num'] + 1;
        $result1 = mysql_query("SELECT * FROM video WHERE p_id = '$p_id' and num = '$num'",$connection);
        $myrow1 = mysql_fetch_array($result1);
        if (isset($myrow1['id'])){
            echo'<li style="float:right;" class="lil"><a href="index.php?p=video&p_id='.$p_id.'&num='.$num.'" class="slil">следующие  видео</a></li>';}}
    
        if ($_GET['num'] > 1){
            $num = $_GET['num'] - 1;
            echo'<li style="float:right;" class="lil"><a href="index.php?p=video&p_id='.$p_id.'&num='.$num.'" class="slil">предыдущие  видео</a></li>';}
              
    echo'    </ul>
        </div>
        ';


} else 
    if(!empty($_GET['p_id'])){
        echo'<div class="video_b">';
        include('db.php');
        $p_id = $_GET['p_id'];
     $result1 = mysql_query("SELECT * FROM video WHERE p_id = '$p_id'",$connection);
            $myrow1 = mysql_fetch_array($result1);
    $result = mysql_query("SELECT * FROM predmety WHERE id = '$p_id'",$connection);
            $myrow = mysql_fetch_array($result);
    echo'<h3>Видео по предмету '.$myrow['name'].'<span style="float:right;margin-top:-10px;"><ul id="menu">
        <li class="lil"><a class="slil" href="index.php?p=video&p_id">Категории</a></li> <li class="lil"><a class="slil" href="index.php?p=video">Новые видуоуроки</a></li></ul></span></h3> <br>';
        do{
         echo'
 
   <div class="item anim"><a href="index.php?p=video&p_id='.$p_id.'&num='.$myrow1['num'].'"><img src="http://img.youtube.com/vi/'.$myrow1['url_id'].'/mqdefault.jpg" alt="">
   <hr>
   <div class="name"><b>'.$myrow1['name'].'</b></div>
   </a>
   </div> ';
        }while( $myrow1 = mysql_fetch_array($result1));
        
       
echo'</div>';
        
        
}else  if(isset($_GET['p_id'])){

    echo'<div class="video_b">';
      include('db.php');
            
    
     $result = mysql_query("SELECT * FROM video GROUP BY p_id",$connection);
 
            $myrow = mysql_fetch_array($result);
            echo ' <h3>Выбирите предмет <span style="float:right;margin-top:-10px;"><ul id="menu">
        <li class="lil"><a class="slil" href="index.php?p=video">Новые видеоуроки</a></li></ul></span></h3> <br><ul class="spis">';
               
            do{
                $p_id = $myrow['p_id'];
                $result2 = mysql_query("SELECT * FROM predmety WHERE id = '$p_id'",$connection); 
            $myrow2 = mysql_fetch_array($result2);
                echo'<a '; 
           echo 'href="index.php?p=video&p_id='.$p_id.'"><li>'.$myrow2['name'].' <span style="float:right;">';
                
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
echo'</div>';
} else{
    
echo'<div class="video_b">';
          include('db.php');
      
     $result1 = mysql_query("SELECT * FROM video",$connection);
            $myrow1 = mysql_fetch_array($result1);
    echo'<h3>Новые видеоуроки <span style="float:right;margin-top:-10px;"><ul id="menu">
        <li class="lil"><a class="slil" href="index.php?p=video&p_id">Категории</a></li></ul></span></h3> <br> ';
        do{
              $p_id = $myrow1['p_id'];
         echo'
 
   <div class="item anim"><a href="index.php?p=video&p_id='.$p_id.'&num='.$myrow1['num'].'"><img src="http://img.youtube.com/vi/'.$myrow1['url_id'].'/mqdefault.jpg" alt="">
   <hr>
   <div class="name"><b>'.$myrow1['name'].'</b></div>
  </a>
   </div> ';
        }while( $myrow1 = mysql_fetch_array($result1));
        
    
echo '</div>';}




?>