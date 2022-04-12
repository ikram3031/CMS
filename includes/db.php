<?php

//FOR SECURITY STORING THE VALUE IN CONSTANT

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

//MAKING CONSTANTS UPPERCASE
foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

//CONNECTING THE DATABASE
$connection =  mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);





?>