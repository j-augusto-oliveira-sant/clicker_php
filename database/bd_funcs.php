<?php

//USER --------
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

//FISHERMAN --------
function update_fisherman_bd($array,$conn){
    //updates fisherman
    $query = "UPDATE fisherman SET nome='{$array['fisherman_name']}',descricao='{$array['desc']}'";
    $command = $conn->prepare($query);
    $command->execute();
}

function insert_fisherman_bd($array,$conn){
    //inserts fisherman
    $query = "INSERT INTO fisherman(nome,descricao,usuario_pk)
    VALUES ('{$array['fisherman_name']}','{$array['desc']}',{$array['usuario_pk']})";
    $command = $conn->prepare($query);
    $command->execute();
}

function delete_fisherman_bd($conn, $fisherman_name){
    $query = "DELETE FROM fisherman WHERE nome='{$fisherman_name}'";
    $command = $conn->prepare($query);
    $command->execute();
}

function search_fisherman_bd($username,$conn){
    $query = "SELECT * FROM fisherman WHERE nome='{$username}'";
    $command = $conn->prepare($query);
    $command->execute();
    $dados = $command->fetch();
    return $dados;
}

function all_fishermans_bd($conn, $usuario_pk){
    $query = "SELECT * FROM fisherman WHERE usuario_pk = {$usuario_pk}";
    $command = $conn->prepare($query);
    $command->execute();
    $dados = $command->fetchAll();
    $new_array = [];
    foreach($dados as $contato){
        array_push($new_array,$contato);
    }
    return $new_array;
}

//BOAT --------
function update_boat_bd($array,$conn){
    //updates boat
    $query = "UPDATE boat SET nome='{$array['boat_name']}',descricao='{$array['desc']}'";
    $command = $conn->prepare($query);
    $command->execute();
}

function insert_boat_bd($array,$conn){
    //inserts boat
    $query = "INSERT INTO boat(nome,descricao,usuario_pk)
    VALUES ('{$array['boat_name']}','{$array['desc']}',{$array['usuario_pk']})";
    $command = $conn->prepare($query);
    $command->execute();
}

function delete_boat_bd($conn, $boat_name){
    $query = "DELETE FROM boat WHERE nome='{$boat_name}'";
    $command = $conn->prepare($query);
    $command->execute();
}

function search_boat_bd($username,$conn){
    $query = "SELECT * FROM boat WHERE nome='{$username}'";
    $command = $conn->prepare($query);
    $command->execute();
    $dados = $command->fetch();
    return $dados;
}

function all_boat_bd($conn, $usuario_pk){
    $query = "SELECT * FROM boat WHERE usuario_pk = {$usuario_pk}";
    $command = $conn->prepare($query);
    $command->execute();
    $dados = $command->fetchAll();
    $new_array = [];
    foreach($dados as $contato){
        array_push($new_array,$contato);
    }
    return $new_array;
}