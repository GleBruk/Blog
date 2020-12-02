<?php
  $message = trim(filter_var($_POST['message'], FILTER_SANITIZE_STRING));

  // Если длина сообщения равна нулю, то выходим из скрипта
  if(strlen($message) == 0)
    exit();

  require_once '../mysql_connect.php';

  // Добавляем сообщение в БД
  $sql = 'INSERT INTO chat(message) VALUES(?)';
  $query = $pdo->prepare($sql);
  $query->execute([$message]);