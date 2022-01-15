<?php
  $pdo = new PDO('mysql:host=localhost;dbname=scams;charset=utf8',
  'userscam',
  'userscam123');
  $pdo->setAttribute(PDO::ATTR_ERRMODE,
  PDO::ERRMODE_EXCEPTION);

  