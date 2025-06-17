<?php


$email = $_GET['email'] ?? '';
$codigo = $_GET['codigo'] ?? '';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Recuperação de Senha</title>
  <style>
    body {
      background-color: #ECECEC;
      font-family: "Courier New", monospace;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background-color: white;
      padding: 30px;
      width: 500px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 10px;
    }
    h2 {
      text-align: center;
      font-size: 20px;
      margin-bottom: 30px;
      font-weight: bold;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      margin-bottom: 30px;
    }
    .buttons {
      display: flex;
      justify-content: space-between;
    }
    button {
      width: 45%;
      padding: 10px;
      font-size: 16px;
      background-color: #840d0b;
      color: white;
      border: none;
      cursor: pointer;
    }
    button:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Insira sua nova senha</h2>
    <form action="validar_codigo.php" method="post">
      <input type="text" name="senha" placeholder="Nova Senha" required />

      <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo; ?>">
      <input type="hidden" id="email" name="email" value="<?php echo $email; ?>">
      <input type="text" name="confirmar_senha" placeholder="Confirmar Senha" required />


      <div class="buttons">
        <button type="button" onclick="window.location.href='tela_login.php'">Voltar</button>
        <button type="submit">Enviar</button>
      </div>
    </form>
  </div>
</body>
</html>
