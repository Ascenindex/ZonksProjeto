<?php
session_start();

require '../models/db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = isset($_POST['user']) ? $_POST['user'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    
    if (!$user || !$email || !$password) {
        $_SESSION['register_message'] = 'Todos os campos são obrigatórios.';
        header("Location: ../public/index.php");
        exit();
    }
}


    // Inserir a senha diretamente sem criptografia (NÃO RECOMENDADO)
    $stmt = $conn->prepare("INSERT INTO users (user, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $password, $email); // Insere a senha sem criptografia

    if ($stmt->execute()) {
        $_SESSION['user'] = $user;
      
        $_SESSION['email'] = $email;
        header("Location: ../public/index.php?sucess=1");
        exit();
    } else {
        $_SESSION['register_message'] = 'Erro ao cadastrar usuário.';
        exit();
    }


$stmt->close();
$conn->close();
?>
