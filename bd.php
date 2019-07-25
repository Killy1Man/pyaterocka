<?
    $HOST = 'host'; // хост
    $USER = 'log'; // пользователь
    $PASSWORD = 'pass';  // пароль (На локальных серверах его нету)
    $DB = 'name bd'; // Название базы данных
    $link = mysql_connect($HOST, $USER, $PASSWORD, $DB); // подключение к mysql
     mysql_select_db($DB); // выбор бд
      if (  !$link  ){
      echo 'FAILED TO CONNECT TO DATABASE!';
      mysqli_close($link);
      return;
 }