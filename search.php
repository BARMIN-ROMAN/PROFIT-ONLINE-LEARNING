<div class="block profile">
<?php  

 
include('db.php');



function search ($query) 
{  
    $query = trim($query); 
    $query = mysql_real_escape_string($query);
    $query = htmlspecialchars($query);
     $num = 1; 
    if (!empty($query)) 
    { 
        if (strlen($query) < 3) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
        } else if (strlen($query) > 128) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
        } else {  
            
            $f1 = strtolower($query) ; 
            $f2 = strtoupper($query); 
            $f3 = ucfirst($query); 
            $q = "SELECT `fio`,`uid`  FROM `user_info` WHERE `fio` LIKE '%$query%'";
             
            $result = mysql_query($q);

            if (mysql_affected_rows() > 0) { 
                   $row = mysql_fetch_assoc($result); 
                echo 'Возможно, вы имели ввиду преподавателя:<br> ';
                $sc = 1;
                do{
           echo $sc.') <b><a href="index.php?p=search&a_id='.$row['uid'].'"> '.$row['fio'].'</b></a><br>';$sc++;
                }while($row = mysql_fetch_assoc($result));
            }
            
           
            $f1 = strtolower($query) ; 
            $f2 = strtoupper($query); 
            $f3 = ucfirst($query); 
            
            $q = "SELECT `name`, `id`, `d_id`
                  FROM `predmety` WHERE `name` LIKE '%$query%'     OR  `opis` LIKE '%$query%'";
             
            $result = mysql_query($q);

            if (mysql_affected_rows() > 0) { 
                $row = mysql_fetch_assoc($result); 
               
                
               
do { 
                        $text .= '<a href="index.php?d='.$row['d_id'].'&p='.$row['id'].'" title="'.$row['name'].'"><li  style="border-bottom:1px solid #D8D8D8;padding: 5px!important;">'.$num.'. '.$row['name'].'</li></a>';

               $num++; } while ($row = mysql_fetch_assoc($result)); 
                
                
            }
            
            $f1 = strtolower($query) ; 
            $f2 = strtoupper($query); 
            $f3 = ucfirst($query); 
            
            $q = "SELECT `name`, `p_id`, `type`, `number`
                  FROM `content` WHERE `name` LIKE '%$query%'         OR  `text` LIKE '%$query%'";
            
            $result = mysql_query($q);

            if (mysql_affected_rows() > 0) {  
                $row = mysql_fetch_assoc($result); 
                
do { 
    $p_id = $row['p_id'];
    
      $qu = "SELECT `name`, `d_id`
                  FROM `predmety` WHERE `id` = '$p_id'";
            
            $result1 = mysql_query($qu);
    $row2 = mysql_fetch_assoc($result1); 
    
    
                        $text .= '<a href="index.php?d='.$row2['d_id'].'&p='.$p_id.'&type=select&t='.$row['type'].'&numb='.$row['number'].'" title="'.$row['name'].'"><li  style="border-bottom:1px solid #D8D8D8;padding: 5px!important;">'.$num.'.'; 
    
    if($row['type'] == 'le'){$text .= ' [Лекция '.$row['number'].'] ';} 
    if($row['type'] == 'la'){$text .= ' [Лабораторная работа '.$row['number'].'] ';} 
    $text .=  $row2['name'].'</li></a>';

               $num++; } while ($row = mysql_fetch_assoc($result)); 
            }
           
            if ($text != ''){  $num = $num-1;  $kolvo = '<p>По запросу <b>'.$query.'</b> найдено совпадений: '.$num.'</p> <ul style="list-style: none; padding: 0px!important; " class="distp">';}
            $text .='</ul>';
        }  
    } else {
        echo'<p>Задан пустой поисковый запрос.</p>';
    }

  
    return $kolvo.$text;  
    
    
    
    
    
} 
?>

<?php 
if (!empty($_POST['query'])) { 
    $search_result = search ($_POST['query']); 
    echo $search_result; 
}

?>


<?php
if(isset($_GET['a_id'])){
    include('db.php');
  $a_id = $_GET['a_id'];
      $q = "SELECT *  FROM `predmety` WHERE `a_id` = '$a_id'";
             
            $result = mysql_query($q);

            if (mysql_affected_rows() > 0) { 
                   $row = mysql_fetch_assoc($result);
                
                echo 'Все предметы автора:<br> <ul style="list-style: none; padding: 0px!important; " class="distp">';
                $sc = 1;
                do{
                   echo '<a href="index.php?d='.$row['d_id'].'&p='.$p_id.'&type=select"><li  style="border-bottom:1px solid #D8D8D8;padding: 5px!important;">'.$sc.')'.$row['name'].'</li></a>';$sc++;
                }while($row = mysql_fetch_assoc($result));
                echo'</ul>';
            }
    
}
?>
</div>