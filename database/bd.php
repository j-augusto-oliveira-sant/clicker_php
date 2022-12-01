<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$dbname = "clicker_php";
$db_port = "3306";
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$dbname", $db_user, $db_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "<p class='btn btn-danger'>Erro</p>";
}
?>