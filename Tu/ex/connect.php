<?php
require_once 'class/Database.class.php';
$param  = array(
    'server'=>'localhost',
    'username'=>'root',
    'password'=>'',
    'database'=>'manage_employee',
    'table'=>'employee',
);

$database = new Database($param);
