<?php
if ($_POST["Submit"]){
  //Проверка, действительно ли загруженный файл является изображением
  $imageinfo = getimagesize($_FILES["uploadimg"]["tmp_name"]);
  if($imageinfo["mime"] != "image/gif" && $imageinfo["mime"] != "image/jpeg" && $imageinfo["mime"] !="image/png") {
  print "Загруженный файл не является изображением";die;
  }

  //Сохранение загруженного изображения с расширением, которое возвращает функция getimagesize()
  //Расширение изображения
  $mime=explode("/",$imageinfo["mime"]);
  //Имя файла
  $namefile=explode(".",$_FILES["uploadimg"]["name"]);
  //Полный путь к директории
  $uploaddir = "/www/gamers.kz/skillup/img/image";
  //Функция, перемещает файл из временной, в указанную вами папку
  if (move_uploaded_file($_FILES["uploadimg"]["tmp_name"], $uploaddir.$namefile[0].".".$mime[1])) {
    print "Изображение успешно загружено";
  }else{
    print "Произошла ошибка";
  }
}
?>
<form name="upload" enctype="multipart/form-data"  method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="102400" />
  <input type="file" name="uploadimg" />
  <input type="submit" name="Submit">
</form>