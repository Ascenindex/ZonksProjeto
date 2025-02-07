<?php
define("SERVER", "localhost");
define("USER", "root");
define("PASSWORD", "");
define("DB", "zonksbd");

$conn = new mysqli(SERVER, USER, PASSWORD, DB);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

?>
