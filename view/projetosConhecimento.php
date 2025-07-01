<?php
include_once("header.php");
include_once("../model/areaDAO.php");

$idArea = $_GET['idArea'] ?? null;
if (!$idArea) {
    echo "<p style='color:red;'>Área não especificada.</p>";
    exit;
}

// Buscar projetos vinculados à área
$projetos = buscarProjetosPorIdArea($idArea);
$nomeArea = buscarNomeDaArea($idArea);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Projetos da Área</title>
  <style>
    body {
      background-color: #ECECEC;
      font-family: Courier;
      margin: 0;
      padding: 0;
    }

    #titulo {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      padding: 15px 20px;
      box-sizing: border-box;
    }

    

    .titulo-texto {
      color: #386641;
      font-size: 22px;
      font-weight: bold;
      margin: 0;
      white-space: nowrap;
    }

    .projeto-item {
      padding: 20px;
      width: 100%;
      box-sizing: border-box;
      border-bottom: 1px solid #BBC8BE;
    }

    .projeto-item a {
      text-decoration: none;
      color: #2a5934;
      font-size: 18px;
      font-weight: bold;
      display: block;
      transition: color 0.3s ease;
    }

    .projeto-item a:hover {
      color: #6c9a79;
      text-decoration: underline;
    }

    .voltar-link {
      display: block;
      margin: 30px 20px;
      color: #386641;
      font-weight: bold;
      text-decoration: none;
    }

    .voltar-link:hover {
      text-decoration: underline;
      color: #2c5036;
    }

    .mensagem {
      padding: 20px;
      font-style: italic;
      color: #444;
    }
    
  .separador-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
    gap: 10px;
    white-space: nowrap; /* Impede quebra de linha */
    overflow-x: auto; /* Permite rolagem horizontal se necessário */
  }

  .div-traco {
    flex: 1;
    height: 2px;
    background-color: black;
    min-width: 30px;
  }

  .campus-title {
    font-weight: bold;
    font-size: 18px;
    color: #386641;
    white-space: nowrap; /* Garante que o texto fique numa linha só */
  }
  </style>
</head>
<body>

<div class="separador-container">
        <div class="div-traco"></div>
        <span class="campus-title">PROJETOS DA ÁREA</span>
        <div class="div-traco"></div>
    </div>

  <?php if (!empty($projetos)): ?>
    <?php foreach ($projetos as $proj): ?>
      <div class="projeto-item">
        <a href="tela_principal_projeto.php?idProjeto=<?= $proj['idProjeto'] ?>">
          <?= htmlspecialchars($proj['tituloProjeto']) ?>
        </a>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <div class="mensagem">
      Nenhum projeto vinculado a esta área ainda.
    </div>
  <?php endif; ?>

  <a href="area-conhecimento.php" class="voltar-link">← Voltar para Áreas de Conhecimento</a>

</body>
</html>