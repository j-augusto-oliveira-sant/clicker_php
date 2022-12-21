<?php 

session_start(); 

include_once "../database/bd.php";
include_once "../database/bd_funcs.php";

$action = isset($_GET['action'])?$_GET['action']:'';
$boat_id = isset($_GET['id'])?$_GET['id']:'';

if ($action=='delete'){
    delete_boat_bd($conn,$boat_id);
    header("Location: boats.php");
    exit();
} else if ($action=='update') {
    header("Location: boat_form.php?id={$boat_id}");
    exit();
}else if ($_POST['id'] != '') {
    $boat = [
        "boat_name" => $_POST['boat_name'],
        "desc" => $_POST['desc'],
        "boat_pk" => $_POST['id'],
    ];
    update_boat_bd($boat,$conn);
    header("Location: boats.php");
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

        //remove price
        $total_boat = count(all_boat_bd($conn,$pk));
        $boat_val = 800*($total_boat-1);
        $searched_user = search_user_bd($_SESSION['username'],$conn);
        $val = $searched_user['coins']-$boat_val;
        update_coins_user($val,$pk,$conn);

        header("Location: ../home.php");

        exit();
    }
}