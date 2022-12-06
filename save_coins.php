<?php
include_once 'database/bd.php';
include_once 'database/bd_funcs.php';

$val = isset($_POST['val'])?$_POST['val']:'';
$id = isset($_POST['id'])?$_POST['id']:'';
$val = intval($val);
$id = intval($id);
session_start();
update_coins_user($val,$id,$conn);
?>