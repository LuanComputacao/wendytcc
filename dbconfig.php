<?php
//$host = "wendy.app";
//$user = "homestead";
//$password = "secret";
//$datbase = "wendy";
//mysql_connect($host, $user, $password) or die(mysql_error());
//mysql_select_db($datbase);



// Data Base
$config['db_sgbd']  = 'mysql';
$config['db_name']  = 'wendy';
$config['db_host']  = '127.0.0.1';
$config['db_dsn']   = $config['db_sgbd'] . ':dbname=' . $config['db_name'] . ';host=' . $config['db_host'];
$config['db_user']  = 'homestead';
$config['db_pass']  = 'secret';


$connection = new PDO($config['db_dsn'], $config['db_user'], $config['db_pass']) or die('MySQL connection problem');
$connection->query("use ". $config['db_name']);