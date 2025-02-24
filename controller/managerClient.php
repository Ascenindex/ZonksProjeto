<?php
session_start();
require_once(__DIR__ . '../../models/db_connection.php');

// Check if all required fields are filled
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST['acao'])) {
    switch ($_POST['acao']) {
      case 'update':
        updateClients($conn);
        break;
      case 'delete':
        deleteClient($conn);
        break;
    }
  }
}

function updateClients($conn)
{
  if (empty($_POST['id']) || empty($_POST['nome']) || empty($_POST['numeroDeTelefone']) || empty($_POST['email']) || empty($_POST['empresa']) || empty($_POST['produto'])) {
    echo "<script>alert('Preencha todos os campos!'); window.location.href = '../views/pages/atualizar.php';</script>";
    exit();
  }

  // Sanitize input
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $nome = mysqli_real_escape_string($conn, $_POST['nome']);
  $numero = mysqli_real_escape_string($conn, $_POST['numeroDeTelefone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $empresa = mysqli_real_escape_string($conn, $_POST['empresa']);
  $produto = mysqli_real_escape_string($conn, $_POST['produto']);

  // Update query
  $updateQuery = "UPDATE clientes SET nome = ?, numero = ?, email = ?, empresa = ?, produto = ? WHERE id = ?";
  $stmt = mysqli_prepare($conn, $updateQuery);
  mysqli_stmt_bind_param($stmt, "sssssi", $nome, $numero, $email, $empresa, $produto, $id);

  if (mysqli_stmt_execute($stmt) && mysqli_stmt_affected_rows($stmt) > 0) {
    $_SESSION['nome'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['numero'] = $numero;
    $_SESSION['empresa'] = $empresa;
    $_SESSION['produto'] = $produto;

    echo "<script>alert('Cliente atualizado com sucesso!'); window.location.href = '../views/pages/cadastrar.php';</script>";
    exit();
  } else {
    echo "<script>alert('Erro ao atualizar: Nenhuma linha foi afetada.'); window.location.href = '../views/pages/atualizar.php';</script>";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}

function deleteClient($conn)
{
  if (empty($_POST['id'])) {
    echo "<script>alert('ID não encontrado!'); window.location.href = '../views/pages/cadastrar.php';</script>";
    exit();
  }

  $id = $_POST['id'];
  $sql = "DELETE FROM clientes WHERE id = ?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "i", $id);

  $maxRetries = 5;
  $retries = 0;
  $success = false;

  while ($retries < $maxRetries && !$success) {
    try {
      $conn->begin_transaction();
      if (mysqli_stmt_execute($stmt)) {
        $conn->commit();
        $success = true;
        echo "<script>alert('Registro deletado com sucesso!'); window.location.href = '../views/pages/cadastrar.php';</script>";
        exit();
      } else {
        $conn->rollback();
        throw new Exception("Erro ao deletar: " . $conn->error);
      }
    } catch (Exception $e) {
      $conn->rollback();
      if (strpos($e->getMessage(), 'Lock wait timeout exceeded') !== false) {
        $retries++;
        sleep(1);
      } else {
        echo "<script>alert('" . $e->getMessage() . "'); window.location.href = '../views/pages/cadastrar.php';</script>";
        break;
      }
    }
  }

  if (!$success) {
    echo "<script>alert('Erro: Não foi possível deletar o registro após várias tentativas.'); window.location.href = '../views/pages/cadastrar.php';</script>";
  }

  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
