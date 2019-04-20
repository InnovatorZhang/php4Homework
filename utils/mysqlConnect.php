<?php
 
$pdo = new PDO("mysql:host=localhost;dbname=test;","root","zhangzhonghao");
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
$pdo->exec("set names 'utf8'");



?>