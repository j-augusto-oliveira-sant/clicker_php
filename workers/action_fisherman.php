<?php 

session_start(); 

include_once "../database/bd.php";
include_once "../database/bd_funcs.php";

$action = isset($_GET['action'])?$_GET['action']:'';
$fisherman_pk = isset($_GET['id'])?$_GET['id']:'';


if ($action=='delete'){
    delete_fisherman_bd($conn,$fisherman_pk);
    header("Location: fishermans.php");
    exit();
} else if ($action=='update') {
    header("Location: fisherman_form.php?id={$fisherman_pk}");
    exit();
} else if ($_POST['id'] != '') {
    $fisherman = [
        "fisherman_name" => $_POST['fisherman_name'],
        "desc" => $_POST['desc'],
        "fisherman_pk" => $_POST['id'],
    ];
    update_fisherman_bd($fisherman,$conn);
    header("Location: fishermans.php");
    exit();
}
else{
    if (isset($_POST['fisherman_name']) && isset($_POST['desc'])){
        $pk = $_SESSION['usuario_pk'];
        $dados = [
            "fisherman_name" => $_POST['fisherman_name'],
            "desc" => $_POST['desc'],
            "usuario_pk" => $pk,
        ];
        insert_fisherman_bd($dados, $conn);

        //remove price
        $total_fisherman = count(all_fishermans_bd($conn,$pk));
        $fishman_val = 500*($total_fisherman-1);
        $searched_user = search_user_bd($_SESSION['username'],$conn);
        $val = $searched_user['coins']-$fishman_val;
        update_coins_user($val,$pk,$conn);

        header("Location: ../home.php");

        exit();
    }
}