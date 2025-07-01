<?php
include_once("header.php");
include_once("../model/postagemDAO.php");

$postagens = buscarPostagensGerais();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Postagens Gerais</title>
  <style>
    body {
      background-color: #ECECEC;
      font-family: "Courier New", monospace;
      margin: 0;
      padding: 20px;
    }

    .publicacoes-gerais {
      max-width: 1200px;
      margin: auto;
      padding: 20px;
    }
    

    .grid-postagens {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    .postagem-item {
      background-color: #386641;
      border-radius: 10px;
      padding: 16px;
      color: #FFFFFF;
      font-size: 15px;
      box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: box-shadow 0.3s ease;
    }

    .postagem-item:hover {
      box-shadow: 3px 3px 12px rgba(56,102,65,0.2);
    }

    .postagem-img {
      width: 100%;
      height: auto;
      max-height: 300px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
    }

    .legenda {
      font-size: 16px;
      margin-bottom: 5px;
      color: #FFFFFF;
    }

    .no-posts {
      text-align: center;
      font-size: 18px;
      color: #444;
      padding: 40px 0;
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
  </style>
</head>
<body>
<div class="separador-container">
        <div class="div-traco"></div>
        <span class="campus-title">PUBLICAÇÕES GERAIS</span>
        <div class="div-traco"></div>
    </div>
<section class="publicacoes-gerais">



  

  <?php if (!empty($postagens) && is_array($postagens)): ?>
    <div class="grid-postagens">
      <?php foreach ($postagens as $post): ?>
        <div class="postagem-item">
          <?php if (!empty($post['arquivoFoto'])): ?>
            <img class="postagem-img" src="data:image/jpeg;base64,<?= base64_encode($post['arquivoFoto']) ?>" alt="Imagem da postagem">
          <?php else: ?>
            <img class="postagem-img" src="../view/FotoPadrao.png" alt="Imagem padrão">
          <?php endif; ?>

          <p class="legenda"><?= htmlspecialchars($post['legenda'] ?? '') ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="no-posts">Nenhuma postagem geral cadastrada.</div>
  <?php endif; ?>
</section>

</body>
</html>