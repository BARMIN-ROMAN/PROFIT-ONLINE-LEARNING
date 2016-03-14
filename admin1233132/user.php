<?php

$d_id = $_GET['p_id'];

include ("db.php");

$result = mysql_query("SELECT * FROM user",$connection); 
    $myrow = mysql_fetch_array($result);

    if(!empty($myrow)){
        
       echo' <div style=""class="block" align="justify">';
        echo '<ul class="spis">';
do
{   $id =$myrow['id'];
    $result1 = mysql_query("SELECT * FROM user_info WHERE uid='$id'",$connection); 
    $myrow1 = mysql_fetch_array($result1);
	echo" <form action='' method='post'  >
    <li>".$myrow1['fio']." [".$myrow['login']."]"; if(!empty($myrow1['type'])){echo'✔';} 
    echo "<span style='float:right;'>
       
        ";if(empty($myrow1['type'])){echo"<input class='btm_spis'type='submit' name='true' value='Сделать учителем ✔'style='margin-right:5px;'>";} echo"<input type='hidden' name='u_id' value='".$myrow['id']."'><input class='btm_spis'type='submit' name='delete' value='✖'></span></li></form>";
}
while($myrow = mysql_fetch_array($result));
echo ' </ul></div>';}



if (isset($_POST['true']))
{
    $u_id = $_POST['u_id'];
mysql_query("UPDATE user_info SET type='u' WHERE uid='$u_id'",$connection);
      $url=$_SERVER['REQUEST_URI'];
   echo'<script type="text/javascript">document.location.href = "'.$url.'";</script>';
 
        }

if (isset($_POST['delete']))
{
    $u_id = $_POST['u_id'];
mysql_query("DELETE  FROM user WHERE id='$u_id'",$connection);
mysql_query("DELETE  FROM user_info WHERE uid='$u_id'",$connection);
      $url=$_SERVER['REQUEST_URI'];
   echo'<script type="text/javascript">document.location.href = "'.$url.'";</script>';
 
 
        }

         ?>