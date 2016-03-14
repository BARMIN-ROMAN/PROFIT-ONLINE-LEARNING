<?php 

$uploaddir = 'images/';
$apend=date('YmdHis').rand(100,1000).'.jpg'; 
$uploadfile = "$uploaddir$apend"; 
if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png') && ($_FILES['userfile']['size'] != 0 and $_FILES['userfile']['size']<=512000)) 
{ 
  if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
   { 
   $size = getimagesize($uploadfile); 
     if ($size[0] < 501 && $size[1]<1501) 
     { 
     $img_url = $uploadfile;
     } else {
     echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
     unlink($uploadfile); 
     } 
   } else {
   echo "Файл не загружен, вернитеcь и попробуйте еще раз";
   } 
} else { 
echo "Размер файла не должен превышать 512Кб";
} ?>