<?php
include_once("header.php");
include_once('../model/areaDAO.php');

$areas = buscarTodasAsAreasSimples();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Áreas de Conhecimento</title>
  <style>
    body {
      background-color: #ECECEC;
      font-family: Courier;
      margin: 0;
      padding: 0;
    }

    .area-item {
      padding: 15px 20px;
      border-bottom: 2px solid #BBC8BE;
      width: 100%;
      box-sizing: border-box;
    }

    .area-item a {
      text-decoration: none;
      color: #2a5934;
      font-size: 18px;
      font-weight: bold;
      display: block;
      transition: color 0.3s ease;
    }

    .area-item a:hover {
      color: #6c9a79;
      text-decoration: underline;
    }

    




.titulo-texto {
  color: #386641;
  font-size: 22px;
  font-weight: bold;
  margin: 0;
  white-space: nowrap; /* 👈 impede quebra de linha */
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
        <span class="campus-title">ÁREAS DE CONHECIMENTO</span>
        <div class="div-traco"></div>
    </div>

  <?php foreach ($areas as $area): ?>
    <div class="area-item">
      <a href="projetosConhecimento.php?idArea=<?= $area['idArea'] ?>">
        <?= htmlspecialchars($area['nomeArea']) ?>
      </a>
    </div>
  <?php endforeach; ?>

</body>
</html>