<?php
include_once("header.php");
include_once("../model/noticiaDAO.php");
include_once("../model/postagemDAO.php");

$noticias = buscarNoticias();
$postagens = buscarPostagensGerais();
?>

<style>
  * {
    box-sizing: border-box;
  }

  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color:#ECECEC ;
  }

  /* Área principal abaixo do header */
  .main-content {
    display: flex;
    height: calc(100vh - 80px); /* ajuste conforme altura do seu header */
    overflow: hidden;
  }

  .coluna-noticias {
    width: 25%;
    background-color: #BBC8BE;
    padding: 20px;
    overflow-y: auto;
    /* border-right: 1px solid #ccc; */
    border-radius:8px;
    margin:10px;
  }

  .coluna-noticias h2 {
    color: #386641;
    margin-bottom: 15px;
  }

  .coluna-noticias a {
    text-decoration: none;
    color: inherit;
  }

  .noticia {
    margin-bottom: 20px;
    font-size: 14px;
    padding-bottom: 10px;
    border-bottom: 1px solid #ddd;
    transition: background-color 0.2s ease;
    
  }

  .noticia:hover {
    background-color: #ECECEC;
    border-radius: 6px;
  }

  .noticia img {
  width: 100%;
  height: auto; /* altura conforme proporção natural */
  display: block;
  border-radius: 6px;
  margin-bottom: 8px;
}


  .noticia h4 {
    margin: 0;
    color: #386641;
  }

  .noticia p {
    margin: 5px 0;
    color: black;
  }

  .coluna-postagens {
    flex: 1;
    padding: 30px;
    background-color: #e9f0ea;
    overflow-y: auto;
  }

 
  
  .grid-postagens {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.postagem img {
  width: 100%;
  max-width: 100%;
  height: auto;
  border-radius: 6px;
  margin-bottom: 10px;
  object-fit: cover;
}

  .postagem {
    background-color: #386641;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
  }

 

  .postagem .legenda {
    color: #FFFFFF;
    font-weight: bold;
    margin-bottom: 5px;
  }

  
</style>

<div class="main-content">

  <div class="coluna-noticias">
    <h2> Notícias</h2>
    <?php foreach ($noticias as $noticia): ?>
      <a href="tela-noticia-detalhes.php?idNoticia=<?= $noticia['idNoticia'] ?>">
        <div class="noticia">
          <?php if (!empty($noticia['arquivoFoto'])): ?>
            <img src="data:image/jpeg;base64,<?= base64_encode($noticia['arquivoFoto']) ?>" alt="Imagem da notícia">
          <?php endif; ?>
          <h4><?= htmlspecialchars($noticia['titulo']) ?></h4>
          <p><?= substr(strip_tags($noticia['texto']), 0, 80) ?>...</p>
        </div>
      </a>
    <?php endforeach; ?>
  </div>

  <div class="coluna-postagens">
    <div class="grid-postagens">
      <?php foreach ($postagens as $post): ?>
        <div class="postagem">
          <img src="<?= !empty($post['arquivoFoto']) ? 'data:image/jpeg;base64,' . base64_encode($post['arquivoFoto']) : '../view/FotoPadrao.png' ?>" alt="Imagem da postagem">
          <div class="legenda"><?= htmlspecialchars($post['legenda'] ?? 'Sem legenda') ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

</div>

<?php include_once("footer.php"); ?>
