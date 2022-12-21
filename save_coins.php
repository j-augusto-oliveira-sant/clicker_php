<?php
include_once 'database/bd.php';
include_once 'database/bd_funcs.php';

$val = isset($_POST['val'])?$_POST['val']:'';
$id = isset($_POST['id'])?$_POST['id']:'';
$val = intval($val);
session_start();
$id = intval($id);
update_coins_user($val,$id,$conn);
?>