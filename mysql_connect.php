<?php
// Подключаемся к БД
  $user = 'root';
  $password = '';
  $db = 'baza';
  $host = 'localhost';

  $dsn = 'mysql:host='.$host.';dbname='.$db;
  $pdo = new PDO($dsn, $user, $password);
?>
