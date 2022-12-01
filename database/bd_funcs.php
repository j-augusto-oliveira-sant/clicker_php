<?php
function update_user_bd($array,$conn){
    //updates user
    $id = $array['id'];
    $query = "UPDATE usuario SET nome='{$array['username']}',email='{$array['email']}',
    senha='{$array['password']}',coins={$array['coins']} WHERE nome={$array['username']}";
    $command = $conn->prepare($query);
    $command->execute();
}

function insert_user_bd($array,$conn){
    //inserts user
    
    $val_coins = 0;
    //encrypt password
    $password = password_hash($array['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO usuario(nome,email,senha,coins)
    VALUES ('{$array['username']}','{$array['email']}','$password',{$val_coins})";
    $command = $conn->prepare($query);
    $command->execute();
}

function search_user_bd($username,$conn){
    $query = "SELECT * FROM usuario WHERE nome='{$username}'";
    $command = $conn->prepare($query);
    $command->execute();
    $dados = $command->fetch();
    return $dados;
}

function all_users_bd($conn){
    $query = 'SELECT * FROM usuario';
    $command = $conn->prepare($query);
    $command->execute();
    $dados = $command->fetchAll();
    $new_array = [];
    foreach($dados as $contato){
        array_push($new_array,$contato);
    }
    return $new_array;
}