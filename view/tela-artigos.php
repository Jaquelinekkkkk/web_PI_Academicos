<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela artigos</title>
  
</head>
<body>
    <?php


include_once("header.php");
include_once("../model/artigoDAO.php"); 
$artigos = buscarArtigos();


?>



    <div class="separador-container">
        <div class="div-traco"></div>
        <span class="campus-title">ARTIGOS</span>
        <div class="div-traco"></div>
    </div>

    <div class="vertical-links">

    <?php foreach ($artigos as $artigo): ?>

        <div><a href="/WEB_PI_Academicos/view/tela-artigo-detalhes.php?idArtigo=<?= $artigo['idArtigo'] ?>"> <?= htmlspecialchars($artigo['titulo']) ?> </a>
       <p><?= htmlspecialchars($artigo['autores']) ?> - <?= date('d/m/y', strtotime($artigo['dataPublicacao'])) ?></p>
        </div>    

        <?php endforeach; ?>
        
    </div>

</body>
<?php

include_once("footer.php");

?>
</html>