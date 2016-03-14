<?php
session_start();
unset($_SESSION['password']);
unset($_SESSION['id']);
unset($_SESSION['login']);//    уничтожаем переменные в сессиях
 echo'<script type="text/javascript">document.location.href = "index.php";</script>';
?>