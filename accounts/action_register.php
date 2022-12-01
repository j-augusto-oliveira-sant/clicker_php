<?php

include_once "../database/bd.php";
include_once "../database/bd_funcs.php";

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $result = search_user_bd($username, $conn);

    //found someone already registered
    if (is_countable($result) && count($result) > 0){
        header("Location: register.php?error=Already registered User, Try again");
        exit();
    } else {
        insert_user_bd($_POST,$conn);
        header("Location: login.php");
        exit();
    }
}