<?php
include_once("model/usuarioDAO.php");

$email = $_POST['email'] ?? '';
$codigo = $_POST['codigo'] ?? '';
$senha = $_POST['senha'] ?? '';
$confirmaSenha = $_POST['confirmar_senha'] ?? '';

$result = recuperarUsuario($email, $codigo);

if (!empty($result)) {
    $idUsuario = $result[0]['idUsuario'];

    if ($senha === $confirmaSenha) {
        if (atualizarSenha($idUsuario, $senha)) {
            // Redireciona para tela de sucesso
            header("Location:confirmacao_alteracao.html");
            exit;
        } else {
            // Erro ao atualizar senha no banco
            header("Location:erro_alteracao.html?erro=atualizacao");
            exit;
        }
    } else {
        // Senhas não coincidem
        header("Location:erro_alteracao.html?erro=senhas&email=$email&codigo=$codigo");
        exit;
    }
} else {
    // Código inválido ou já utilizado
    header("Location:erro_alteracao.html?erro=codigo");
    exit;
}