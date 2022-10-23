<?php

define('DB_NAME', 'library');
define('DB_USER','admin');
define('DB_PASSWORD','admin@2022');
define('DB_HOST','localhost');

$connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$connection){
    die('Could not connect:' .mysqli_connect_error());
}
