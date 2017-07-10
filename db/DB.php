<?php
$DB_HOST="127.0.0.1";
$DB_USER="homestead";
$DB_PASSWORD="secret";
$DB_NAME="todo";

$link=new mysqli($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if(!$link){
    echo "Connection failed: ".$link->connect_error;
}