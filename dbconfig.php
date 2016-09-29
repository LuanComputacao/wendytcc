<?php
$host = "wendy.app";
$user = "homestead";
$password = "secret";
$datbase = "wendy";
mysql_connect($host, $user, $password) or die(mysql_error());
mysql_select_db($datbase);
?>
