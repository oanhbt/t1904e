<?php
require_once 'class/Database.class.php';
$param  = array(
    'server'=>'localhost',
    'username'=>'sa',
    'password'=>'Leeanhphuong0',
    'database'=>'manage_employee',
    'table'=>'employee',
);

$database = new Database($param);
