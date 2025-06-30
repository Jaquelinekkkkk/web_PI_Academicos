<?php
include_once("header.php");
include_once('../model/projetosDAO.php');
include_once('../model/postagemDAO.php');
include_once('../model/artigosDAO.php');

$idProjeto = $_GET['idProjeto'] ?? null;

if (!$idProjeto) {
  die("Projeto não especificado.");
}

$projeto        = buscarDetalhesProjeto($idProjeto);
$coordenadores  = buscarCoordenadoresProjeto($idProjeto);
$bolsistas      = buscarBolsistasProjeto($idProjeto);
$postagens      = buscarPostagensProjeto($idProjeto);
$artigos        = buscarArtigosProjeto($idProjeto);

if (!$projeto) {
  die("Projeto não encontrado.");
}

$paginaAtual = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($projeto['tituloProjeto']) ?></title>
  <style>
    body {
      background-color: #ECECEC;
      font-family: "Courier New", monospace;
      margin: 0;
      padding: 10px;
    }
    .main-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 40px;
    }
    .sidebar {
      background-color: #98AE9C;
      color: #386641;
      padding: 30px;
      border-radius: 16px;
      width: 600px;
      text-align: left;
      margin-top: 15px;
    }
    .projeto-header {
      display: flex;
      align-items: center;
      gap: 20px;
      margin-bottom: 20px;
    }
    .foto-projeto {
      width: 70px;
      height: 70px;
      object-fit: cover;
      border-radius: 50%;
      border: 2px solid #386641;
    }
    h2 {
      color: black;
      font-size: 24px;
      margin: 0;
    }
    .info-row { margin-bottom: 10px; }
    .label {
      font-weight: bold;
      color: #386641;
      min-width: 140px;
      display: inline-block;
    }
    .value { color: #386641; }
    ul { margin: 5px 0 10px 20px; padding: 0; }
    li { margin-bottom: 4px; }

    .resumo {
      background-color: #fff;
      color: #386641;
      padding: 20px;
      border-radius: 12px;
      margin-top: 20px;
      line-height: 1.6;
    }

    .separador-container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      margin: 40px 0 10px;
      width: 100%;
    }
    .div-traco { flex: 1; height: 2px; background-color: #000; }
    .link-pares {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .separador-link {
      color: #000;
      text-decoration: none;
      font-weight: normal;
      font-size: 20px;
      transition: color 0.3s ease;
    }
    .separador-link:hover { color: #133a21; }
    .separador-link.ativo {
      color: #fff;
      background-color: #133a21;
      padding: 4px 10px;
      border-radius: 6px;
    }
    .separador-hifen { font-size: 20px; color: #000; }

    .publicacoes, .artigos {
      background-color: #386641;
      padding: 20px;
      border-radius: 12px;
      max-width: 600px;
      width: 100%;
    }
    .postagem-item, .artigo-item {
      background-color: #F1F1F1;
      border-radius: 10px;
      padding: 12px;
      margin-bottom: 20px;
      color: #2d2d2d;
      font-size: 15px;
    }
    .postagem-img {
      width: 100%;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      display: block;
    }
  </style>
</head>
<body>

<div class="main-wrapper">

  <div class="sidebar">
    <div class="projeto-header">
      <?php if (!empty($projeto['arquivoFoto'])): ?>
        <img src="data:image/jpeg;base64,<?= base64_encode($projeto['arquivoFoto']) ?>" alt="Foto do projeto" class="foto-projeto">
      <?php else: ?>
        <img src="../assets/sem-imagem.png" alt="Foto padrão" class="foto-projeto">
      <?php endif; ?>
      <h2><?= htmlspecialchars($projeto['tituloProjeto']) ?></h2>
    </div>

    <div class="info-row"><span class="label">Coordenador(es):</span>
      <span class="value">
        <ul>
          <?php foreach ($coordenadores as $nome): ?>
            <li><?= htmlspecialchars($nome) ?></li>
          <?php endforeach; ?>
        </ul>
      </span>
    </div>

    <div class="info-row"><span class="label">Bolsista(s):</span>
      <span class="value">
        <ul>
          <?php foreach ($bolsistas as $nome): ?>
            <li><?= htmlspecialchars($nome) ?></li>
          <?php endforeach; ?>
        </ul>
      </span>
    </div>

    <div class="info-row"><span class="label">Câmpus:</span> <span class="value"><?= htmlspecialchars($projeto['nomeCampus']) ?></span></div>
    <div class="info-row"><span class="label">Início:</span> <span class="value"><?= $projeto['dataInicio'] ?></span></div>
    <div class="info-row"><span class="label">Fim:</span> <span class="value"><?= $projeto['dataFim'] ?></span></div>
    <div class="info-row"><span class="label">Prorrogação:</span> <span class="value"><?= $projeto['prorrogacao'] ?? 'Não houve' ?></span></div>

    <div class="resumo">
      <strong>Resumo:</strong><br>
      <?= nl2br(htmlspecialchars($projeto['resumo'])) ?>
    </div>
  </div>

  <div class="separador-container">
    <div class="div-traco"></div>
    <div class="link-pares">
      <a href="postagens-projeto.php?idProjeto=<?= $projeto['idProjeto'] ?>"
         class="separador-link <?= $paginaAtual === 'postagens-projeto.php' ? 'ativo' : '' ?>">Ver Postagens</a>
      <span class="separador-hifen">-</span>
      <a href="artigos-projeto.php?idProjeto=<?= $projeto['idProjeto'] ?>"
         class="separador-link <?= $paginaAtual === 'artigos-projeto.php' ? 'ativo' : '' ?>">Ver Artigos</a>
    </div>
    <div class="div-traco"></div>
  </div>

  <!-- Artigos -->
  <section class="artigos">
    <h3 style="color: #fff;">📄 Artigos do Projeto</h3>

    <?php if (!empty($artigos) && is_array($artigos)): ?>
      <?php foreach ($artigos as $titulo): ?>
        <div class="artigo-item">
          <p><?= htmlspecialchars($titulo) ?></p>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p style="color: #fff;">Nenhum artigo cadastrado.</p>
    <?php endif; ?>
  </section>

</div>

</body>
</html>