 <?php
require '../models/db_connection.php';

# if value are empty
if (empty($_POST['user']) || empty($_POST['password'])) {
    header("Location: ../public/index.php");
    exit();
} 

$user = mysqli_real_escape_string($conn, $_POST['user']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = "SELECT * FROM users WHERE user = '{$user}' AND password = '{$password}'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Erro na consulta ao banco de dados: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if ($row) {
    session_start();
    $_SESSION['user'] = $row['user'];

    if ($row['user'] === $user) {
        // Redirecionar para a página do admin
        header("Location: ../views/pages/dashboard.php");
    } 
    exit();
} else {
    // Login falhou
    header('Location: ../public/index.php?error=1');
    exit();
}
?>
