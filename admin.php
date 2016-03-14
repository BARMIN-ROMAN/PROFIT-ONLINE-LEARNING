<?php include('head.php'); ?>

<?php 
if(!empty($_SESSION['id'])){
    $u_id = $_SESSION['id']; 
     $result = mysql_query("SELECT * FROM user_info WHERE uid='$u_id' AND type = 'u' ",$connection);
    $myrow = mysql_fetch_array($result);
       if(($u_id == '1') or (isset($myrow['id']))){ 
        echo'<div class="main">'; 
        $urld = 'admin1233132/';
        include $urld.'panel-admin14124142.php';
         if($_GET['p'] == "add_p"){include($urld.'add_p.php'); }                              if($_GET['p'] == "edit_p"){include($urld.'edit_p.php'); }   
         if($_GET['p'] == "user"){include($urld.'user.php'); }  
         if($_GET['p'] == "add_v"){include($urld.'add_v.php'); }  
                                 echo '</div>';
                                 } else echo 'Иди гуляй';} else   echo'<script type="text/javascript">document.location.href = "index.php";</script>';?>
