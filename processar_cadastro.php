<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "SistemaDor";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
/**
 * SistemaDor - Registro de Alertas de Dor
 * Autor(a): Engrácia Jorge
 * Email: engraciajorge4@gmail.com
 * Data de criação: Julho 2025
 * Direitos Reservados © 2025
 */

$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

$sql = "INSERT INTO Usuarios (nome, email, senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar a query: " . $conn->error);
}

$stmt->bind_param("sss", $nome, $email, $senha);

if ($stmt->execute()) {
    echo "<script>
            alert('Cadastro feito com sucesso!');
            window.location.href = 'cadastro.php';
          </script>";
} else {
    echo "<script>
            alert('Erro ao cadastrar usuário.');
            window.location.href = 'cadastro.php';
          </script>";
}

$stmt->close();
$conn->close();
?>
