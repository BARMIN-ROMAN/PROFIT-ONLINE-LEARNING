<?php
    $host = 'localhost';
    $userdb = 'v_13721_lena';
    $passworddb = 'Htcones111';
    $db = 'v_13721_lena';
    mysql_query("SET NAMES utf8");
    mysql_query("SET NAMES utf8");
    $connection =  mysql_connect($host,$userdb,$passworddb);
    if(!$connection || !mysql_select_db($db, $connection)){
     exit(mysql_error());   
    }

?>

    