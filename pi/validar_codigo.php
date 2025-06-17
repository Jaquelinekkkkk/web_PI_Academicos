<?php
$codigo = $_POST['codigo'] ?? '';

if ($codigo === '123456') {
  echo "✅ Código válido! Redirecionando para redefinir a senha...";
  // Aqui você faria um header("Location: nova_senha.php");
} else {
  echo "❌ Código inválido. Tente novamente.";
}
?>
