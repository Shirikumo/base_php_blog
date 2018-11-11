<?php
declare(strict_types=1);
if(PHP_SESSION_NONE === session_status()){
    session_start();
}

$host = "bdd";
$db = "base_php_blog";
$db_user = "admin";
$db_password = "passw0rd";