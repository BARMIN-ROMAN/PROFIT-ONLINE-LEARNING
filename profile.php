<div class="block profile" >
    <?php include ("db.php"); 
    $id = $_SESSION['id'];
    $result = mysql_query("SELECT * FROM user_info WHERE uid='$id'",$connection);
    $myrow = mysql_fetch_array($result);
    if ((empty($myrow['fio'])) or (empty($myrow['fak']))) {
    echo 'Здравствуй,'; echo $_SESSION["login"]; echo'. Твой профиль не заполнен. <a href="index.php?str=prof-edit">Редактировать.</a>';
    } else {echo 'Здравствуйте, '; echo $myrow['fio']; if(!empty($myrow['type'])){echo'✔';} echo'.'; }


?>
    </div>