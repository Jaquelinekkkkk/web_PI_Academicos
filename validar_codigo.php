<?php

include_once("model/usuarioDAO.php");

$email = $_POST['email'] ?? '';
$codigo = $_POST['codigo'] ?? '';

$senha = $_POST['senha'] ?? '';
$confirmaSenha = $_POST['confirmar_senha'] ?? '';

$result=recuperarUsuario($email, $codigo);

var_dump($result);

if (empty($result) == false) {
  echo "✅ Código válido! Redirecionando para redefinir a senha...";
  // Aqui você faria um header("Location: nova_senha.php");

if($senha == $confirmaSenha){
  echo "Senha alterada com sucesso;"
}

} else {
  echo "❌ Código inválido. Tente novamente.";
}
?>
