<?php 

session_start(); 

include_once "../database/bd.php";
include_once "../database/bd_funcs.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = search_user_bd($username, $conn);

    if (is_countable($result) && count($result) > 0) {

        $row = $result;

        //compare password and username
        if ($row['nome'] === $username && password_verify($password, $row['senha'])) {

            echo "Logged in!";

            $_SESSION['username'] = $row['nome'];

            $_SESSION['password'] = $row['senha'];

            $_SESSION['email'] = $row['email'];
            
            $_SESSION['coins'] = $row['coins'];

            header("Location: ../home.php");

            exit();

        }

    }else{
        header("Location: login.php?error=Incorrect User name or password, Try again");
        exit();
    }

}else{

    header("Location: ../");

    exit();

}