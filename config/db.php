<?php
define('host', 'localhost');
define('username', 'root');
define('password', '');
define('dbname', 'users');
$db = mysqli_connect(host, username, password, dbname);
//if($db){
//    echo '1';
//} else{
//    echo '0';
//}