<?php
$idCampus = $_GET['id_campus'];
include_once("header.php");
include_once("../model/projetosDAO.php");
$projetos = buscarProjetosPorCampus($idCampus);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Projetos do Campus</title>
  <style>
    body {
      background-color: #ECECEC;
      font-family: "Courier Prime Serif", Courier, monospace;
      font-weight: bold;
    }

    .titulo-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 20px 0;
      gap: 10px;
    }

    .linha {
      flex-grow: 1;
      height: 2px;
      background-color: black;
    }

    .titulo-central {
      font-weight: bold;
      font-size: 18px;
      color: #386641;
    }

    .lista-projetos {
      display: flex;
      flex-direction: column;
      width: 100%;
      align-items: center;
      gap: 10px;
    }

    .item-projeto {
      display: flex;
      align-items: center;
      background-color: #BBC8BE;
      padding: 10px;
      width: 80%;
      border-radius: 6px;
      gap: 15px;
    }

    .foto {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #386641;
    }

    .info {
      display: flex;
      flex-direction: column;
      justify-content: center;
      flex-grow: 1;
      font-weight: bold;
    }

    .linha-interna {
      width: 80%;
      height: 1px;
      background-color: #386641;
    }

    .titulo-projeto {
      font-size: 16px;
      font-weight: bold;
      color: #386641;
    }

    .titulo-projeto a {
      text-decoration: none;
      color: #386641;
    }

    .titulo-projeto a:hover {
      text-decoration: underline;
    }

    .titulo-projeto a:visited,
    .titulo-projeto a:active {
      color: black;
    }

    .linha-info {
      display: flex;
      justify-content: space-between;
      margin-top: 5px;
      font-size: 14px;
      color: #2d2d2d;
    }
  </style>
</head>
<body>

  <div class="titulo-container">
    <div class="linha"></div>
    <span class="titulo-central">PROJETOS DO CÂMPUS</span>
    <div class="linha"></div>
  </div>

  <div class="lista-projetos">
    <?php foreach ($projetos as $p): ?>
      <div class="item-projeto">
        <?php if (!empty($p['arquivoFoto'])): ?>
          <img class="foto" src="data:image/jpeg;base64,<?= base64_encode($p['arquivoFoto']) ?>" alt="Foto do Projeto">
        <?php else: ?>
          <img class="foto" src="../assets/default.png" alt="Foto padrão">
        <?php endif; ?>

        <div class="info">
          <div class="titulo-projeto">
            <a href="tela_principal_projeto.php?idProjeto=<?= $p['idProjeto'] ?>">
              <?= htmlspecialchars($p['tituloProjeto']) ?>
            </a>
          </div>
          <div class="linha-info">
            <span>👤 Coordenador(a): <?= htmlspecialchars($p['nomeCoordenador'] ?? 'Desconhecido') ?></span>
            <span>📚 <?= htmlspecialchars($p['areaConhecimento'] ?? 'Área não informada') ?></span>
          </div>
        </div>
      </div>
      <div class="linha-interna"></div>
    <?php endforeach; ?>
  </div>

</body>
</html>