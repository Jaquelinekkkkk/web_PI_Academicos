<?php

//include_once("model/usuarioDAO.php");

header('Content-Type: text/plain');

// 1. Coleta o e-mail enviado via POST
$email = $_POST['email'] ?? '';

if (empty($email)) {
    echo "Erro: E-mail não informado.";
    exit;
}

// 2. Busca o idUsuario com base no e-mail
$pdo = conectar();
$sql = "SELECT idUsuario FROM usuarios WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$result) {
    echo "Erro: E-mail não encontrado.";
    exit;
}

$idUsuario = $result['idUsuario'];

// 3. Gera código de recuperação
$codigo = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT); // Ex: "038274"

// 4. Insere na tabela recuperacao_senhas
$sqlInsert = "INSERT INTO recuperacao_senhas (idUsuario, codigo_recuperacao, expiracao_codigo) 
              VALUES (:idUsuario, :codigo, DATE_ADD(NOW(), INTERVAL 15 MINUTE))";

$stmtInsert = $pdo->prepare($sqlInsert);
$stmtInsert->bindParam(':idUsuario', $idUsuario);
$stmtInsert->bindParam(':codigo', $codigo);

if ($stmtInsert->execute()) {
    echo $codigo;
} else {
    echo "Erro ao salvar código.";
}
?>