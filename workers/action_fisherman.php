<?php 

session_start(); 

include_once "../database/bd.php";
include_once "../database/bd_funcs.php";

$action = isset($_GET['action'])?$_GET['action']:'';
$fisherman_name = isset($_GET['name'])?$_GET['name']:'';

if ($action=='delete'){
    delete_fisherman_bd($conn,$fisherman_name);
    header("Location: fisherman_form.php");
    exit();
} else if ($action=='update') {
    echo 'update';
    header("Location: fisherman_form.php");
    exit();
}else{
    if (isset($_POST['fisherman_name']) && isset($_POST['desc'])){
        $pk = $_SESSION['usuario_pk'];
        $dados = [
            "fisherman_name" => $_POST['fisherman_name'],
            "desc" => $_POST['desc'],
            "usuario_pk" => $pk,
        ];
        insert_fisherman_bd($dados, $conn);

        header("Location: ../home.php");

        exit();
    }
}