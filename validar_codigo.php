<?php

include_once("model/usuarioDAO.php");

$email = $_POST['email'] ?? '';
$codigo = $_POST['codigo'] ?? '';

$senha = $_POST['senha'] ?? '';
$confirmaSenha = $_POST['confirmar_senha'] ?? '';

$result=recuperarUsuario($email, $codigo);

var_dump($result);

if (empty($result) == false) {
    $idUsuario = $result[0]['idUsuario'];

    if ($senha === $confirmaSenha) {
        if (atualizarSenha($idUsuario, $senha)) {
            echo "✅ Senha atualizada com sucesso!";
        } else {
            echo "❌ Erro ao atualizar a senha. Tente novamente.";
        }
    } else {
        echo "⚠️ As senhas não coincidem. Corrija e envie novamente.";
    }

} else {
    echo "❌ Código inválido ou já utilizado. Solicite outro.";
}
?>
