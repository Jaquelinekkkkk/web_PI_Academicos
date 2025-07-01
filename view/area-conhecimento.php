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

    
#titulo {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  padding: 15px 20px;
  box-sizing: border-box;
}

.linhah {
  height: 2px;
  width: 40%; /* ou ajuste para 35%, se ainda estiver apertado */
  background-color: #386641;
}

.titulo-texto {
  color: #386641;
  font-size: 22px;
  font-weight: bold;
  margin: 0;
  white-space: nowrap; /* 👈 impede quebra de linha */
}
  </style>
</head>
<body>
<div id="titulo">
                <div class="linhah"></div>
                <h3 class="titulo-texto">Áreas de Conhecimento</h3>
                <div class="linhah"></div>
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