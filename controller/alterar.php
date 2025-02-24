<?php
session_start();
include '../models/db_connection.php';

if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);


    $sql = "UPDATE usuarios SET username = '$username' WHERE username = '{$_SESSION['username']}'";
    $sql = "UPDATE usuarios SET password = '$password' WHERE password = '{$_SESSION['password']}'";

    mysqli_query($conn, $sql);


    if (!empty($_FILES["profile_picture"]["name"])) {
        $targetDir = "../../model/imgs/";
        $fileName = basename($_FILES["profile_picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFilePath)) {
                $sql = "UPDATE usuarios SET profile_picture = '$fileName' WHERE username = '{$_SESSION['username']}'";
                if (mysqli_query($conn, $sql)) {
                    $_SESSION['profile_picture'] = $fileName;
                }
            }
        }
    }

    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;

    header("Location: ../../views/pages/config.php?status=success");
    exit();
}

// Fechar a conexão com o banco de dados
mysqli_close($conn);
