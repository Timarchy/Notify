<?php
include 'error_syntax.php';

$db['db_host'] = 'localhost';
$db['db_user'] = 'timi';
$db['db_pass'] = 'timi';
$db['db_name'] = 'notifyBar';

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER, DB_PASS, DB_NAME);

if(!$connection) {
    echo 'Boom, error nigga!!';
}

?>