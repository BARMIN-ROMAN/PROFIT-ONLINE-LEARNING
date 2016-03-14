<?php session_start(); ?>
<?php
  




try {


 $id=$_SESSION['id'];
    
   $dbh = new PDO("mysql:dbname=v_13721_lena;host=localhost", "v_13721_lena", "Htcones111", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    // получаем id последнего сообщения
    $last_id = isset($_POST['last_id']) ? (int)$_POST['last_id'] : 0;
    
    $sthz = $dbh->query("SELECT fio FROM user_info  WHERE uid = '$id'");
  $fios = $sthz->fetchAll(PDO::FETCH_ASSOC);
    foreach($fios as $fio) {
    $fio = $fio['fio'];
    $result = explode(" ", $fio);
$fam = $result[0];
$name = $result[1];
$otch = $result[2];

$fio = $fam.' '.mb_substr($name,0,1,'utf-8').'.'.mb_substr($otch,0,1,'utf-8').'.';
    }
    
    // текст
    $text = isset($_POST['text']) ? trim($_POST['text']) : '';
    if (!empty($text)) {
        // вставка новой записи
        $sth = $dbh->prepare("INSERT INTO `chat1` (`text`,`u_id`) VALUES (:text,:fio)");
        $sth->execute(array(':text' => $text,
                            ':fio' => $fio));
    }

    // загружаем сообщения, которые были после последнего полученного нами, но не более 20
    $sth = $dbh->prepare("SELECT * FROM `chat1` WHERE `id` > :last_id ORDER BY `id` DESC LIMIT 20");
    $sth->bindParam(':last_id', $last_id, PDO::PARAM_INT);
    $sth->execute();
    
    // отдаём массив сообщений в формате JSON
    echo json_encode(array_reverse($sth->fetchall()));
} catch (PDOException $e) {
    echo 'Ошибка подключения: ' . $e->getMessage();
}

?>
 