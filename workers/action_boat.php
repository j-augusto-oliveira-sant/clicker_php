<?php 

session_start(); 

include_once "../database/bd.php";
include_once "../database/bd_funcs.php";

$action = isset($_GET['action'])?$_GET['action']:'';
$boat_name = isset($_GET['name'])?$_GET['name']:'';

if ($action=='delete'){
    delete_boat_bd($conn,$boat_name);
    header("Location: boat_form.php");
    exit();
} else if ($action=='update') {
    echo 'update';
    header("Location: boat_form.php");
    exit();
} else {
    if (isset($_POST['boat_name']) && isset($_POST['desc'])){
        $pk = $_SESSION['usuario_pk'];
        $dados = [
            "boat_name" => $_POST['boat_name'],
            "desc" => $_POST['desc'],
            "usuario_pk" => $pk,
        ];
        insert_boat_bd($dados, $conn);

        header("Location: ../home.php");

        exit();
    }
}